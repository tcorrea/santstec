<?php

require_once(_ENV_PROJECT_BASE . "/classes/commons/definitions/models/Model.php");

class Site extends Model
{
    public $auth;
    public $facebookPageId;
    public $locale;
    public $name;
    public $navigation;
    public $type = "1"; // all sites have been migrated to type "1"

    public static function deserialize($str)
    {
        $site = new Site();

        $site->parse($str);
        $site->setProps();
        $site->auth = $site->getAuth();
        $fb = $site->lookup("facebook_page_id");
        $site->facebookPageId = $fb ? $fb : '';
        $site->id = $site->lookup("id");
        $site->locale = $site->lookup("locale");
        $site->name = $site->lookup("name");
        $site->navigation = $site->lookup("navigation");

        return $site;
    }

    public function getAuth()
    {
        $user = $this->lookup("auth_user");
        $pass = $this->lookup("auth_user");
        return array(
            "pass" => $pass ? $pass : '',
            "user" => $user ? $user : '',
        );
    }
}
