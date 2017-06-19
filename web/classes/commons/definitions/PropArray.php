<?php

class PropArray implements ArrayAccess, Countable
{
    private $_props;

    public function __construct($props = array())
    {
        $this->setProps($props);
    }

    public function setProps($props)
    {
        $this->verify($props);
        $this->_props = $props;
    }

    private function verify($props)
    {
        if (!is_array($props)) {
            throw new Exception("PropArray can only be initialized with an array.");
        }
        foreach ($props as $val) {
            if (!is_string($val) && !is_null($val) && !is_int($val)) {
                throw new Exception("PropArray can only use strings, ints, or nulls.");
            }
        }
    }

    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            throw new Exception('Offset required');
        }
        $this->_props[$offset] = $value;
    }

    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->_props);
    }

    public function offsetUnset($offset)
    {
        unset($this->_props[$offset]);
    }

    public function offsetGet($offset)
    {
        return isset($this->_props[$offset]) ? $this->_props[$offset] : null;
    }

    /**
    * Merge
    * Accepts an unsepcified number of parameters, each an associative array.
    * Each argument extends/overwrites the previous.
    * Null values do not overwrite.
    **/
    public function merge()
    {
        $property_sources = func_get_args();
        foreach ($property_sources as $props) {
            foreach ($props->toArray() as $key => $value) {
                $skip = is_null($value) && array_key_exists($key, $this->_props);
                if ($skip) {
                    continue;
                }
                $this->_props[$key] = $value;
            }
        }
    }

    public function toArray()
    {
        return $this->_props;
    }

    public function count()
    {
        return count($this->_props);
    }

    public static function convertLegacy($legacy_props)
    {
        $props = array();
        foreach ($legacy_props as $p) {
            $props[$p["name"]] = $p["v"];
        }
        return $props;
    }

    public function toNestedArray()
    {
        $nested = array();
        foreach ($this->_props as $key => $value) {
            $keys = explode(".", $key);
            $nested = $this->setNestedKeys($nested, $keys, $value);
        }
        return $nested;
    }

    private function setNestedKeys($nested, $keys, $value)
    {
        $key = array_shift($keys);
        if (count($keys) === 0) {
            // capturing same behavior as jsbbe, all nulls are converted to ""
            if (is_null($value)) {
                $value = "";
            }
            $nested[$key] = $value;
            return $nested;
        }
        if (!array_key_exists($key, $nested)) {
            $nested[$key] = array();
        }
        $nested[$key] = $this->setNestedKeys($nested[$key], $keys, $value);
        return $nested;
    }
}
