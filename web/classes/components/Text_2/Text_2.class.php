<?php
require_once (_ENV_COMMONS_CLASSPATH . _COMP_SUBSCRIBER);

class Text_2 extends Subscriber {

    public function subscriberInit() {

        global $systemProperties;

        $safeMode = false;

        if(isset($_REQUEST["safeMode"]) && $_REQUEST["safeMode"] == 'true'){
            $safeMode = true;
        }

        $this->addTemplateVariable('safeMode', $safeMode);

        $text = $this->getComponentProperty('text');
        $isDefault = false;

        // Legacy - DO NOT TRANSLATE
        if($text == '<p>Click here to edit this text.</p>' || $text == '<p>Click here to start typing your text</p>'){
            $isDefault = true;
        }

        if(preg_match("/class=(\"|')yola-empty-text-widget-paragraph-unique-class(\"|')/", $text, $matches)){
            $isDefault = true;
        }

        $this->addTemplateVariable('isDefault', $isDefault);

        if(_MOBILE || _FACEBOOK){
            $text = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $text);
            $text = preg_replace('/<[font]+\s+[^>]*>/i', '$1', $text);
            $text = preg_replace("/<style(.*?)>(.*?)<\/style>/is", "", $text);
        }

        $this->addTemplateVariable('text', $text);

    }

}

?>
