<?php

/**
 * @author <a href = mailto:stefan.l@incubeta.com>Stefan Lourens</a>
 */

require_once (_ENV_COMMONS_CLASSPATH . _COMP_COMPONENT_BASE);

abstract class Subscriber extends ComponentBase {

    public final function publisherInit() {
        throw new Exception('Should not be called on implementing classes');
    }

   /*
    * A method that allows access to variables exposed by
    * other components on the page
    */
    public final function getPublishedProperty($name) {
        return $this->getPageContext()->getPublishedProperty($name);
    }

    /*
     * A method that allows access to variables exposed by
     * other components on the page
     */
    public final function getPublishedProperties() {
        return $this->getPageContext()->getPublishedProperties();
    }

}
?>
