<?php

/**
 * @author <a href = mailto:stefan.l@incubeta.com>Stefan Lourens</a>
 */

class PageContext {

    private $exposedProperties = array ();
    private $stateValues = array ();
    private $exclutionList = array ();

    /*
     * This method adds the given name/value paid to the state regester, optionally targeted
     * by the given $targetId. The exclutionList shold be a list of parameter names that should
     * cause the given state value to not be appended to the url if they occur in the url already.
     */
    public function addToState($name, $value, $targetId = null, $exclutionList = null) {
        //if (!is_null($targetId)) {
        //        $targetId = substr($targetId, 3);
        //}
        if ($targetId) {
            if (!array_key_exists($targetId, $this->stateValues)) {
                $this->stateValues[$targetId] = array ();
            }
        }

        $this->stateValues[$targetId][$name] = $value;

        if (!is_null($exclutionList)) {
            if (!array_key_exists($targetId, $this->exclutionList)) {
                $this->exclutionList[$targetId] = array ();
            }

            $this->exclutionList[$targetId][$name] = $exclutionList;
        }
    }

    public function getStateValue($name, $componentId = null) {
        if (array_key_exists($componentId, $this->stateValues) && array_key_exists($name, $this->stateValues[$componentId])) {
            return $this->stateValues[$componentId][$name];
        } elseif (!is_null($componentId) && array_key_exists(null, $this->stateValues)) {
            if (array_key_exists($name, $this->stateValues[null])) {
                return $this->stateValues[null][$name];
            }
        }else {
            return null;
        }
    }

    public function getStateValues() {
        return $this->stateValues;
    }

    public function getExclutionList() {
        return $this->exclutionList;
    }

    public function getPublishedProperty($name) {
        return $this->exposedProperties[$name];
    }

    public function getPublishedProperties() {
        return $this->exposedProperties;
    }

    public function exposeProperty($name, $value) {
        $this->exposedProperties[$name] = $value;
    }

}
?>
