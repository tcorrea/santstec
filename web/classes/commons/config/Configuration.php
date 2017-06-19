<?php

class Configuration
{
    private $_config;

    public function __construct()
    {
        $path = dirname(__FILE__) . DIRECTORY_SEPARATOR . "configuration_public.json";
        $this->_config = $this->readJson($path);
    }

    private function readJson($path)
    {
        $json = file_get_contents($path);
        $json = json_decode($json);
        if ($json === null && json_last_error() !== JSON_ERROR_NONE) {
            $msg_fmt = "Failed to parse json file '%s', error: '%s'";
            $msg = sprintf($msg_fmt, $file, json_last_error_msg());
            throw new Exception($msg);
        }
        return $json;
    }

    public function __get($name)
    {
        return $this->_config->$name;
    }

    public function __set($name, $val)
    {
        throw new Exception("Configuration is read-only.");
    }
}
