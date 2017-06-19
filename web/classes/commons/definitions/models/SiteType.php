<?php

require_once(_ENV_PROJECT_BASE . "/classes/commons/definitions/models/Model.php");

class SiteType extends Model
{
    public static function get($id = null)
    {
        $st = new SiteType();
        $id = empty($id) ? "1" : $id;
        $path = _ENV_PROJECT_BASE . "/templates/common/types/sitetypes/" . $id . ".json";

        $st->id = $id;
        $st->parseFile($path);
        $st->setProps();

        return $st;
    }
}
