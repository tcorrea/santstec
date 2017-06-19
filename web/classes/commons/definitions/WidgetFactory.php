<?php

require_once(_ENV_PROJECT_BASE . "/classes/commons/definitions/PropArray.php");
require_once(_ENV_PROJECT_BASE . "/classes/commons/definitions/Json.php");

class WidgetFactory
{

    public $widgets;

    public function __construct($config, $context)
    {
        $this->_config = $config;
        $this->_context = $context;
        $this->widgets = array();
    }

    public function create($classname, $props)
    {
        require_once(_ENV_PROJECT_BASE . "/classes/components/$classname/$classname.class.php");
        $widget = new $classname($this->_context, $props, $this->_config);
        $this->widgets[] = $widget;
        return $widget;
    }

    public function deserialize($data)
    {
        $legacypropdata = Json::lookup($data, "properties");
        $propdata = PropArray::convertLegacy($legacypropdata);
        $proparray = new PropArray($propdata);
        $props = $proparray->toNestedArray();

        // extend properties with meta data
        $props["id"] = Json::lookup($data, "id");
        $props["sys_displayType"] = Json::lookup($data, "display");
        $props["sys_layoutName"] = Json::lookup($data, "layoutName");
        $props["sys_className"] = Json::lookup($data, "className");
        $props["sys_hasCSS"] = Json::lookup($data, "hasCSS");
        $props["sys_hasDynamicCSS"] = Json::lookup($data, "hasDynamicCSS");

        // process nested widgets
        foreach (Json::lookup($data, "regions") as $regiondata) {
            $region = Json::lookup($regiondata, "name");
            $serialized_widgets = Json::lookup($regiondata, "components");
            $deserialized_widgets = array();
            foreach ($serialized_widgets as $str) {
                $deserialized_widgets[] = $this->deserialize($str);
            }
            if (empty($deserialized_widgets)) {
                continue;
            }
            if (!array_key_exists("regions", $props)) {
                $props["regions"] = array();
            }
            $props["regions"][$region] = $deserialized_widgets;
        }

        // create widget and store in the factory list of all widgets created
        $classname = Json::lookup($data, "shortName");
        return $this->create($classname, $props);
    }

    public function hasCreated($name)
    {
        foreach ($this->widgets as $w) {
            if (is_a($w, $name)) {
                return true;
            }
        }
        return false;
    }
}
