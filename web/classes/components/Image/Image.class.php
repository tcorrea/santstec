<?php
require_once (_ENV_COMMONS_CLASSPATH . _COMP_SUBSCRIBER);

class Image extends Subscriber {

    public function subscriberInit() {

        $src = $this->getComponentProperty('src');
        $file = substr(strrchr($src, '/'), 1);
        $path = substr($src, 0, strrpos($src, '/'));
        if(strrpos($src, '/')){
            $path = $path.'/';
        }else{
            $file = $src;
        }
        $file = $path.rawurlencode($file);

        $this->addTemplateVariable('src', $file);
        $this->addTemplateVariable('_SYSTEM_MODE', _SYSTEM_MODE);

    }

}
?>
