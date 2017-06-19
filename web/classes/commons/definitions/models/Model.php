<?php

require_once(_ENV_PROJECT_BASE . "/classes/commons/definitions/Json.php");
require_once(_ENV_PROJECT_BASE . "/classes/commons/definitions/PropArray.php");

abstract class Model
{
    public $id;
    public $properties;

    private $_json;

    public function __construct()
    {
        $this->properties = new PropArray();
    }

    protected function lookup($lookup, $default = null)
    {
        return Json::lookup($this->_json, $lookup, $default);
    }

    protected function setProps()
    {
        $props = $this->lookup("properties");
        $this->properties = new PropArray($props);
    }

    protected function setPropsFromLegacy()
    {
        $legacy_props = $this->lookup(array("data", "data", "properties"));
        $props = PropArray::convertLegacy($legacy_props);
        $this->properties = new PropArray($props);
    }

    protected function parseFile($path)
    {
        $str = file_get_contents($path, true);
        $this->parse($str);
    }

    protected function parse($str)
    {
        $this->_json = Json::parse($str);
    }
}
