<?php

require_once(_ENV_PROJECT_BASE . "/classes/commons/definitions/models/Model.php");

class PageType extends Model
{
    public static function get($id)
    {
        $pt = new PageType();
        $path = _ENV_PROJECT_BASE . "/templates/common/types/pagetypes/" . $id . ".json";

        $pt->id = $id;
        $pt->parseFile($path);
        $pt->setProps();
        $pt->name = $pt->lookup("name");

        return $pt;
    }
}
