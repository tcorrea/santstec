<?php

/**
 * Modifies an asset path to be used with SBUI.
 * SBUI urls should:
 *  - use a CDN
 *  - include the app version for cache busting
 *  - use an absolute path (vs a relative one)
 */
class Anticache
{
    private $_app = 'ignore';
    private $_appVersions = array(
        'ignore' => null,
        'widgets' => null,
        'templates' => null,
    );
    private $_cdnDomains = array('');
    private $_prefix = null;

    public static $appPrefixes = array(
        array('widgets', 'classes/components/', '/components/system/'),
        array('widgets', 'classes/commons/', '/components/commons/'),
        array('templates', 'templates/', '/template_resources/0/'),
    );

    public function __construct($path)
    {
        $this->path = $path;
        $this->configure();
        $this->selectAppAndPrefix();
        $this->modifyPath();
    }

    public function modifyPath()
    {
        // Published site
        if (_SYSTEM_MODE == 'RUN') {
            $prefix = '?';
            $this->path .= $this->getVersion($prefix);
            return;
        }

        // SBUI
        $prefix = '/V';
        $this->path = $this->getCdn() . $this->getVersion($prefix) . $this->makeSbPath();
    }

    private function selectAppAndPrefix()
    {
        foreach (Anticache::$appPrefixes as $arr) {
            $app = $arr[0];
            $prefix = $arr[1];
            $prefix_for_sbui = $arr[2];
            if (strpos($this->path, $prefix) !== 0) {
                continue;
            }
            $this->_app = $app;
            $this->_prefix = array($prefix, $prefix_for_sbui);
            return;
        }
    }

    private function configure()
    {
        $configFile = _ENV_COMMONS_CLASSPATH . 'includes/version.inc.php';
        if (!file_exists($configFile)) {
            return;
        }
        include($configFile);
        $this->_cdnDomains = $cdnDomains;
        $this->_appVersions['widgets'] = $version;

        $st_version_file = _ENV_PROJECT_BASE . '/templates/version.txt';
        if (!file_exists($st_version_file)) {
            return;
        }
        $st_version = trim(file_get_contents($st_version_file));
        $this->_appVersions['templates'] = $st_version;
    }

    private function getVersion($prefix)
    {
        $version = $this->_appVersions[$this->_app];
        if (is_null($version)) {
            return '';
        }
        return $prefix . str_pad($version, 7, '0', STR_PAD_LEFT);
    }

    private function getCdn()
    {
        if ($this->_app == 'ignore') {
            return '';
        }
        // files are imported to the cdn on first access,
        // must evenly distribute files across all CDNs
        $cdnCount = count($this->_cdnDomains);
        $pathHash = md5($this->path);
        $pathInt = hexdec($pathHash[0]);
        return $this->_cdnDomains[$pathInt % $cdnCount];
    }

    private function makeSbPath()
    {
        $needle = $this->_prefix[0];
        $replacement = $this->_prefix[1];
        return substr_replace($this->path, $replacement, 0, strlen($needle));
    }
}

function smarty_modifier_anticache($path)
{
    $ac = new Anticache($path);
    return $ac->path;
}
