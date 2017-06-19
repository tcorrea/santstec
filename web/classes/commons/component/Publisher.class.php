<?php

/**
 * @author <a href = mailto:stefan@synthasite.com>Stefan Lourens</a>
 */

require_once (_ENV_COMMONS_CLASSPATH . _COMP_COMPONENT_BASE);

abstract class Publisher extends ComponentBase {

    public final function subscriberInit() {
        throw new Exception('Should not be called on implementing classes');
    }

    /*
     * A method that allow a variable to be made available to the
     * other components on the page
     */
    public final function publishProperty($name, $value) {
        $this->getPageContext()->exposeProperty($name, $value);
    }

}
?>
