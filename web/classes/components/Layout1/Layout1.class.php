<?php
require_once (_ENV_COMMONS_CLASSPATH . _COMP_SUBSCRIBER);

class Layout1 extends Subscriber {

    public function subscriberInit(){
        global $systemProperties;

        $widgetId = $this->getComponentProperty('id');

        $this->addTemplateVariable('_SYSTEM_MODE', _SYSTEM_MODE);
        $this->addTemplateVariable('mobile', _MOBILE);
        $this->addTemplateVariable('widgetId', $widgetId);
    }
}
?>
