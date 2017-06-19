<?php
require_once(_ENV_PROJECT_BASE . '/classes/commons/errorpage/ErrorPage.php');
require_once(_ENV_PROJECT_BASE . '/classes/commons/includes/parse_url_utf8.php');

class CanonicalUri
{

    public function __construct($uri, $script)
    {
        $this->uri = $uri;
        $this->canonical = $this->canonicalize($uri, $script);
    }


    public static function canonicalize($uri, $script = null)
    {
        $canonical = parse_url_utf8($uri);

        $isSbui = strpos($canonical['path'], 'restricted_view') !== false;
        if ($isSbui) {
            return $uri;
        }

        $canonical = CanonicalUri::stashParentDir($canonical, $script);
        $canonical = CanonicalUri::handleUsingPhpAsDirectory($canonical);
        if ($canonical === null) {
            return null;
        }

        $canonical['path'] = CanonicalUri::removeRepeatingSlashes($canonical['path']);
        $canonical['path'] = CanonicalUri::removeIndex($canonical['path']);

        $isRoot = $canonical['path'] == '/';
        $isRobots = $canonical['path'] == '/robots.txt';
        $isSitemap = $canonical['path'] == '/sitemap.xml';

        $canonical = CanonicalUri::checkBlog($canonical);
        $canonical = CanonicalUri::checkRequestDepth($canonical);
        if ($canonical === null) {
            return null;
        }
        $isBlog = $canonical['isblog'];

        if ($isRoot || $isBlog || $isRobots || $isSitemap) {
            $canonical = CanonicalUri::restoreParentDir($canonical);
            return CanonicalUri::unparse($canonical);
        }

        $canonical['path'] = CanonicalUri::addPhpExtenstion($canonical['path']);
        $canonical = CanonicalUri::restoreParentDir($canonical);
        return CanonicalUri::unparse($canonical);
    }


    public static function stashParentDir($canonical, $script)
    {
        $canonical['parent'] = '';
        $path = $canonical['path'];
        $parent = dirname($script);

        // On Windows, both slash and backslash are used
        $parent = str_replace('\\', '/', $parent);

        if ($parent == '/') {
            return $canonical;
        }

        $isParentPrefixed = substr($path, 0, strlen($parent)) == $parent;
        if (!$isParentPrefixed) {
            // received a strange request on a subdir pub'd site
            return null;
        }

        $path = substr($path, strlen($parent));
        if (empty($path)) {
            $path = '/';
        }

        $canonical['path'] = $path;
        $canonical['parent'] = $parent;
        return $canonical;
    }


    public static function restoreParentDir($canonical)
    {
        $canonical['path'] = $canonical['parent'] . $canonical['path'];
        return $canonical;
    }


    public static function removeRepeatingSlashes($path)
    {
        return preg_replace('/\/{2,}/', '/', $path);
    }


    public static function handleUsingPhpAsDirectory($canonical)
    {
        if ($canonical === null) {
            return null;
        }

        $hasPhpDir = strpos($canonical['path'], '.php/') !== false;
        if (!$hasPhpDir) {
            return $canonical;
        }

        // canonicalize: /page.php/ > /page.php
        $path = rtrim($canonical['path'], '/');
        $phpDirsResolved = strpos($path, '.php/') === false;
        if ($phpDirsResolved) {
            $canonical['path'] = $path;
            return $canonical;
        }

        // request looks like: /page.php/foo
        return null;
    }


    public static function removeIndex($path)
    {
        return preg_replace('/^\/index(?:\.php)?\/?$/', '/', $path);
    }


    public static function checkRequestDepth($canonical)
    {
        if ($canonical == null) {
            return $canonical;
        }
        $path = $canonical['path'];
        $nesting = count(explode('/', $path));

        // blog archive should be longest path attempted to be canonicalized
        if ($nesting > 5) {
            return null;
        }

        // php should not be nested
        $isPathPhp = substr($path, -4) == '.php';
        if ($isPathPhp && $nesting > 2) {
            return null;
        }

        return $canonical;
    }


    public static function checkBlog($canonical)
    {
        /*
        blog paths expected to look like one of:
          /<blog-name>.rss
          /<blog-name>.search
          /<blog-name>/<blog-post-title>
          /<blog-name>/archive/<YYYY>/<Month>
          /<blog-name>/category/<category>
          /<blog-name>/tag/<tag>
        */
        $canonical['isblog'] = true;
        $path = $canonical['path'];
        $isSearchRss = preg_match('/\.(rss|search)$/', $path) === 1;
        if ($isSearchRss) {
            $trimmed = ltrim($path, '/');
            $hasUnexpectedDirectoryPrefixing = strpos($trimmed, '/') !== false;
            if ($hasUnexpectedDirectoryPrefixing) {
                return null;
            }
            return $canonical;
        }

        $looksLikeLostSpider = CanonicalUri::isIgnoringBaseTag($path);
        if ($looksLikeLostSpider) {
            return null;
        }

        $parts = explode('/', $path);
        $hasTrailingSlash = substr($path, -1) === '/';
        if ((count($parts) < 3) || $hasTrailingSlash) {
            $canonical['isblog'] = false;
        }

        return $canonical;
    }


    public static function addPhpExtenstion($p)
    {
        $path = rtrim($p, '/');
        $isPathPhp = substr($path, -4) == '.php';
        if ($isPathPhp) {
            return $path;
        }
        return $path . '.php';
    }


    public static function isIgnoringBaseTag($path)
    {
        $parts = explode('/', $path);

        if (count($parts) <= 3) {
            return false;
        }

        $isCollection = ($parts[2] == 'category' || $parts[2] == 'tag');
        if ($isCollection && count($parts) == 4) {
            return false;
        }

        $base = $parts[1];
        $pageParts = array_slice($parts, 2);
        return in_array($base, $pageParts) || in_array($base . '.php', $pageParts);
    }


    public static function unparse($parts)
    {
        $url = '';
        $url .= empty($parts['scheme']) ? '' : '://';

        if (!empty($parts['user'])) {
            $url .= $parts['user'];
            if (isset($parts['pass'])) {
                $url .= ':' . $parts['pass'];
            }
            $url .= '@';
        }

        $url .= empty($parts['host']) ? '' : $parts['host'];
        $url .= empty($parts['port']) ? '' : ':' . $parts['port'];
        $url .= empty($parts['path']) ? '' : $parts['path'];
        $url .= empty($parts['query']) ? '' : '?' . $parts['query'];
        $url .= empty($parts['fragment']) ? '' : '#' . $parts['fragment'];

        return $url;
    }


    public function notfound()
    {
        header('Content-type: text/html; charset=utf-8');
        header('HTTP/1.1 404 Not Found');
        $errorpage = new ErrorPage();
        $errorpage->render();
        exit(0);
    }


    public function redirect()
    {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ? 'https' : 'http';
        $location = $protocol . '://' . $_SERVER['SERVER_NAME'] . $this->canonical;
        header('HTTP/1.1 301 Moved Permanently');
        header('Location: ' . $location);
        exit(0);
    }


    public function enforceCanonical()
    {
        if ($this->canonical === null) {
            $this->notfound();
        }
        if ($this->uri !== $this->canonical) {
            $this->redirect();
        }
    }
}
