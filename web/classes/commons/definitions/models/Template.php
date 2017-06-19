<?php

require_once(_ENV_PROJECT_BASE . "/classes/commons/definitions/models/Model.php");

class Template extends Model
{
    public $name;

    public function __construct()
    {
        parent::__construct();

        // Jsbbe distinguishes id & name, that distinction is not relevant
        // and the template name should always == id.
        $this->id = &$this->name;
    }

    public static function get($name)
    {
        $tpl = new Template();
        $path = _ENV_PROJECT_BASE . "/templates/" . $name . "/base_template.json";

        $tpl->name = $name;
        $tpl->parseFile($path);
        $tpl->setProps();

        return $tpl;
    }
}
