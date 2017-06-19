<?php
require_once(_ENV_PROJECT_BASE . '/classes/commons/includes/parse_url_utf8.php');

class Router
{

    public function __construct()
    {
        $this->url = parse_url_utf8(urldecode($_SERVER['REQUEST_URI']));
        $this->script = $_SERVER['SCRIPT_NAME'];
        $this->parent = $this->getParent();
        $this->path = $this->getPathWithoutParents();
        $this->page = $this->getPageName();
        $this->include = $this->getIncluePath();
    }

    private function getIncluePath()
    {
        if ($this->path === '/sitemap.xml') {
            return '/sitemap.xml.php';
        }

        if ($this->path === '/robots.txt') {
            return '/robots.txt.php';
        }

        $isBlogRss = preg_match('/\.rss$/', $this->path) === 1;
        if ($isBlogRss) {
            return '/classes/components/BlogWidget/rss.php';
        }

        $isBlogSearch = preg_match('/\.search/', $this->path) === 1;
        if ($isBlogSearch) {
            return '/classes/components/BlogSearchWidget/search.php';
        }

        return '/page.inc.php';
    }

    private function getParent()
    {
        $isSbui = strpos($this->url['path'], 'restricted_view/') !== false;
        $parent = rtrim(dirname($this->script), '/');
        if ($isSbui) {
            $matches;
            $designview = '/\/restricted_view\/.+\/[a-f0-9]{32}/';
            preg_match($designview, $this->url['path'], $matches);
            $parent = $matches[0];
        }
        if (empty($parent) || strpos($this->url['path'], $parent) !== 0) {
            return '';
        }
        return $parent;
    }

    private function getPathWithoutParents()
    {
        return substr($this->url['path'], strlen($this->parent));
    }

    private function getPageName()
    {
        $parts = explode('/', ltrim($this->path, '/'));
        $path = pathinfo($parts[0]);
        $page = $path['filename'];
        return empty($page) ? 'index' : $page;
    }
}
