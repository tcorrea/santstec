<?php

require_once(_ENV_PROJECT_BASE . "/classes/commons/definitions/models/Model.php");

class User extends Model
{
    public static function deserialize($str)
    {
        $user = new User();
        $user->parse($str);
        $user->id = $user->lookup("id");
        return $user;
    }

    /**
     * The user json is pulled from local definitions
     */
    public static function get()
    {
        $userstr = file_get_contents('definitions/user.json.inc', true);
        return User::deserialize($userstr);
    }

    public function isWhiteLabel()
    {
        // this piece of logic is being taken from: http://git.io/vm6l7
        return strpos($this->partner_id, "WL_") === 0;
    }

    public function getPartnerFooterUrl()
    {
        return $this->lookup(array("partner", "properties", "footer_url"), "");
    }

    public function __get($attr)
    {
        return $this->lookup($attr);
    }

    public function __set($name, $value)
    {
        throw new Exception("User property '" . $name . "' is read only.");
    }
}
