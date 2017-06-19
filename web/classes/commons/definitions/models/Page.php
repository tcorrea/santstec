<?php

require_once(_ENV_PROJECT_BASE . "/classes/commons/definitions/PropArray.php");
require_once(_ENV_PROJECT_BASE . "/classes/commons/definitions/Json.php");
require_once(_ENV_PROJECT_BASE . "/classes/commons/definitions/models/Model.php");

class Page extends Model
{
    public $etag;
    public $type;
    public $template;
    public $regions;
    public $lastSaved;

    public function __construct()
    {
        $this->regions = array();
    }

    public function __get($attr)
    {
        return $this->lookup($attr);
    }

    public function __set($name, $value)
    {
        throw new Exception("Page property '" . $name . "' is read only.");
    }

    public static function deserialize($str)
    {
        $page = new Page();

        $page->parse($str);
        $page->setPropsFromLegacy();
        $page->lastSaved = $page->lookup(array("data", "data", "lastSaved"));
        $page->template = $page->lookup(array("data", "data", "template", "name"));
        $page->type = $page->lookup("page_type");
        $page->id = $page->lookup("id");

        // TODO: update once resolved: https://github.com/yola/production/issues/2351
        $page->etag = "-1";

        return $page;
    }

    public function parsePageData($widgetfactory)
    {
        // parse regions and deserialize widgets
        $regiondata = $this->lookup(array("data", "data", "regions"));
        foreach ($regiondata as $data) {
            $name = Json::lookup($data, "name");
            $serialized_widgets = Json::lookup($data, "components");
            $this->regions[$name] = array();
            foreach ($serialized_widgets as $str) {
                $widget = $widgetfactory->deserialize($str);
                $this->regions[$name][] = $widget;
            }
        }
    }

    public function getLayout()
    {
        $layouts = array(
            "4b067382-2daf-102c-9f4b-001c42dab01a" => "layout_A",
            "4db5c70e-2daf-102c-9f4b-001c42dab01a" => "layout_B",
            "51d22b2a-2daf-102c-9f4b-001c42dab01a" => "layout_C",
            "546cceb2-2daf-102c-9f4b-001c42dab01a" => "layout_D",
            "659de126-2daf-102c-9f4b-001c42dab01a" => "layout_E",
            "67fa3654-2daf-102c-9f4b-001c42dab01a" => "layout_F",
            "69fc75ca-2daf-102c-9f4b-001c42dab01a" => "layout_G",
            "6c748b08-2daf-102c-9f4b-001c42dab01a" => "layout_H",
            "6e879a20-2daf-102c-9f4b-001c42dab01a" => "layout_I",
        );
        $id = $this->lookup("layout");
        return $layouts[$id];
    }
}
