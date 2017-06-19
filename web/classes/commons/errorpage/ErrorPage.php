<?php
require_once(_ENV_PROJECT_BASE . '/classes/commons/lib/smarty/Smarty.class.php');
require_once(_ENV_PROJECT_BASE . '/classes/commons/includes/LocaleHelper.php');


class ErrorPage
{
    private function initSmarty()
    {
        $this->smarty = new Smarty();
        $this->smarty->compile_dir = _ENV_PROJECT_BASE . '/classes/work/templates_c';
        $this->smarty->plugins_dir[] = _ENV_PROJECT_BASE . '/classes/commons/lib/smarty_plugins';
        $this->smarty->left_delimiter = '<%';
        $this->smarty->right_delimiter = '%>';
    }

    public function render()
    {
        $locale = $this->getLocale();
        setlocale(LC_ALL, $locale);
        bindtextdomain('messages', _ENV_PROJECT_BASE . '/classes/commons/errorpage/locale');

        $home = '/';
        if (file_exists(_ENV_PROJECT_BASE . '/domain.info')) {
            $home = trim(file_get_contents(_ENV_PROJECT_BASE . '/domain.info'));
        }

        $this->initSmarty();
        $this->smarty->assign('url', $home);
        $this->smarty->assign('locale', $locale);
        $this->smarty->display(_ENV_PROJECT_BASE . '/classes/commons/errorpage/404.tpl');
    }

    public function getLocale()
    {
        global $systemProperties;
        if (!is_array($systemProperties)) {
            require_once('definitions/site.inc.php');
        }
        $langcode = $systemProperties['system']['locale'];
        return LocaleHelper::convertUnixLocale($langcode) . ".UTF-8";
    }
}
