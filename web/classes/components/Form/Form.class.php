<?php
require_once (_ENV_COMMONS_CLASSPATH . _COMP_SUBSCRIBER);

class Form extends Subscriber {

    public function subscriberInit() {

        global $systemProperties;

        $formServicePath = str_replace('http://', '//', $this->config->common->formservice->url);
        $formServicePath = rtrim($formServicePath, '/');

        $isWhiteLabel = $systemProperties['system']["isWhiteLabel"];
        $locale = $systemProperties['system']['locale'];
        $widgetId = $this->getComponentProperty('id');
        $destination = $this->getComponentProperty('destination');

        //$userId = $this->getComponentProperty('userId');
        //$siteId = $this->getComponentProperty('siteId');
        //$pageId = $this->getComponentProperty('pageId');

        $siteId = $systemProperties['system']['site']['id'];
        $pageId = $systemProperties['system']['page']['id'];
        $userId = $systemProperties['system']['user']['id'];

        $email = $this->getComponentProperty('email');
        $successMessage = $this->getComponentProperty('successMessage');
        $data = $this->getComponentProperty('json');

        $pageURL = 'http';
        $pageURLFail = 'http';

        if ($_SERVER["HTTPS"] == "on") {
            $pageURL .= "s";
        }

        $pageURL .= "://";
        $pageURLFail .= "://";

        $baseURL = $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
        $fbId = $systemProperties['system']['site']['facebookPageId'].'.';

        if(_FACEBOOK && $fbId != '.'){
            $baseURL = $fbId.'yolafb.com'.$_SERVER["REQUEST_URI"];
        }

        $baseURL = preg_replace('/\?form\w+Posted=(true|false)&/', '?', $baseURL);
        $baseURL = preg_replace('/[?&]form\w+Posted=(true|false)/', '', $baseURL);

        $pageURL .= $baseURL;
        $pageURLFail .= $baseURL;

        $siteName = $systemProperties['system']['site']['name'];

        if(strrpos($pageURL, '?') > -1){
            $pageURL .= "&form".$widgetId."Posted=true";
        }else{
            $pageURL .= "?form".$widgetId."Posted=true";
        }

        if(strrpos($pageURLFail, '?') > -1){
            $pageURLFail .= "&form".$widgetId."Posted=false";
        }else{
            $pageURLFail .= "?form".$widgetId."Posted=false";
        }

        $posted = false;
        if (isset($_REQUEST["form".$widgetId."Posted"]) && $_REQUEST["form".$widgetId."Posted"] == 'true') {
            $posted = true;
        }

        $failed = false;
        if (isset($_REQUEST["form".$widgetId."Posted"]) && $_REQUEST["form".$widgetId."Posted"] == 'false') {
            $failed = true;
            $posted = true;
        }

        $this->addTemplateVariable('_SYSTEM_MODE', _SYSTEM_MODE);
        $this->addTemplateVariable('data', json_decode($data, true));
        $this->addTemplateVariable('email', $email);
        $this->addTemplateVariable('userId', $userId);
        $this->addTemplateVariable('pageId', $pageId);
        $this->addTemplateVariable('siteId', $siteId);
        $this->addTemplateVariable('widgetId', $widgetId);
        $this->addTemplateVariable('redirect', $pageURL);
        $this->addTemplateVariable('destination', $destination);
        $this->addTemplateVariable('redirectFail', $pageURLFail);
        $this->addTemplateVariable('posted', $posted);
        $this->addTemplateVariable('failed', $failed);
        $this->addTemplateVariable('siteName', $siteName);
        $this->addTemplateVariable('successMessage', $successMessage);
        $this->addTemplateVariable('formServicePath', $formServicePath);
        $this->addTemplateVariable('locale', $locale);
        $this->addTemplateVariable('isWhiteLabel', ($isWhiteLabel === true)?("1"):("0"));
        $this->addTemplateVariable('templateDir', $this->template_dir);
        $this->addTemplateVariable('siteKey', $this->config->common->recaptcha_v2->user_sites->site_key);
    }
}
