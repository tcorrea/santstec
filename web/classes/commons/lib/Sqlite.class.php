<?php

/**
 * SqLite Class
 *
 * @package        SynthaSite SqLite Access Layer
 * @author        Sean Nieuwoudt
 * @copyright    Copyright (c) 2008, SynthaSite.com
 */

final class Sqlitedb {
    /**
     * Properties
     */
    private $_obj = array('error'    => null,
    'db'       => null,
    'resource' => null);

    /**
     * Construct, pass db file name
     *
     * @param string $file = null
     * @accesss public
     * @return object
     */
    public function __construct($file = null) {
        try {
            $this->_obj['db']       = $file;
            $this->_obj['resource'] = new PDO('sqlite:'.$file);
        } catch(PDOException $e)  {
            $this->Error($e->getMessage());
        }
    }

    /**
     * Perform 'select-type' query
     *
     * @param string $q
     * @accesss public
     * @return bool
     */
    public function Query($q) {
        try {
            $result = array();
            $tmp    = $this->_obj['resource']->query($q);

            if (!empty ($tmp)) {
                foreach($tmp as $row) {
                    if(is_array($row)) {
                        $result[] = $row;
                    }
                }
                return $result;
            } else {
                return null;

            }



        } catch(PDOException  $e){
            $this->Error($e->getMessage());
            return false;
        }
    }

    /**
     * Perform 'insert-type' query
     *
     * @param string $q
     * @accesss public
     * @return bool
     */
    public function Exec($q) {
        try {
            $this->_obj['resource']->exec($q);
            return true;
        } catch(PDOException $e ){
            $this->Error($e->getMessage());
            return false;
        }
    }

    /**
     * Close db connection
     *
     * @accesss public
     * @return void
     */
    public function Close() {}

    /**
     * Escape string before insert
     *
     * @param string $input
     * @accesss public
     * @return string
     */
    public function Escape($input) {}

    /**
     * Get or set error string
     *
     * @param string $msg = null
     * @accesss public
     * @return array
     */
    public function Error($msg = null) {
        if(is_null($msg)) {
            return $this->_obj['error'];
        } else {
            $this->_obj['error'] = $msg;
        }
    }

    /**
     * Determine if an error has occured
     *
     * @accesss public
     * @return bool
     */
    public function hasError() {
        if(!empty($this->_obj['error'])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine db writability status
     *
     * @accesss public
     * @return bool
     */
    public function isWritable() {
        if(is_writable($this->_obj['db'])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine if db exists
     *
     * @accesss public
     * @return bool
     */
    public function dbExists() {
        if(file_exists($this->_obj['db'])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine db readablility status
     *
     * @accesss public
     * @return bool
     */
    public function isReadable() {
        if(is_readable($this->_obj['db'])) {
            return true;
        } else {
            return false;
        }
    }
}

?>
