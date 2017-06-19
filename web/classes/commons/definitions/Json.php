<?php

class Json
{
    public static function parse($str)
    {
        if (empty($str)) {
            throw new Exception("Parsing requires an object, empty string given.");
        }

        $json_obj = json_decode($str, true);

        if (!$json_obj || json_last_error() !== JSON_ERROR_NONE) {
            $msg_fmt = "Failed to parse json string, error: '%s'";
            $err = function_exists("json_last_error_msg") ? json_last_error_msg() : json_last_error();
            throw new Exception(sprintf($msg_fmt, $err));
        }

        return $json_obj;
    }

    public static function lookup($json, $lookup, $default = null)
    {
        if (empty($json)) {
            throw new Exception("JSON lookup on an empty object.");
        }

        $keys = is_array($lookup) ? $lookup : array((string)$lookup);
        $val = is_object($json) ? Json::parse(json_encode($json)) : $json;

        $lookuperror = false;
        foreach ($keys as $key) {
            if (!array_key_exists($key, $val)) {
                $lookuperror = true;
                break;
            }
            $val = $val[$key];
        }

        if ($lookuperror) {
            if (!is_null($default)) {
                return $default;
            }
            throw new Exception("JSON lookup key error ['" . implode("']['", $keys) . "']");
        }

        return $val;
    }
}
