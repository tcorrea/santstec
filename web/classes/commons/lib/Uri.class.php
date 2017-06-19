<?php

 /*
     http://www.site.com/index.php?blog/{page}
     http://www.site.com/index.php?blog/{page}/{id}
 */

require_once(_ENV_COMMONS_CLASSPATH . "includes/Common.functions.php");
require_once(_ENV_PROJECT_BASE . '/classes/commons/includes/Router.php');

class Uri
{
   /**
    * Properties
    */
    private $params;
    private $uriString;

    public function __construct()
    {
        $router = new Router();
        $this->uriString = $router->path;
        $this->params    = explode("/",$this->uriString);

        if ($this->params[0] == '') {
            array_shift($this->params);//drop off the empty value
        }

        if(is_array($this->params)){
            $this->params = array_filter($this->params);

        }

        //print_r($this->params);exit;
    }

   /**
    * Return uri segments
    *
    * @access public
    * @return array
    */
    public function Segments()
    {
        $tmpArr = $this->params;
        unset($tmpArr[0]);
        return $tmpArr;
    }

   /**
    * Return uri segments
    *
    * @access public
    * @return array
    */
    public function getAllSegments()
    {
        return $this->params;
    }

   /**
    * Return specific uri segment
    *
    * @param int $number
    * @access public
    * @return array
    */
    public function segment($number)
    {
        if(array_key_exists($number,$this->params)){
            return $this->params[$number];
        }
        return false;
    }

   /**
    * Return number of uri segments
    *
    * @access public
    * @return int
    */
    public function totalSegments()
    {
        return count($this->params);
    }

   /**
    * Check if uri has valid segments
    *
    * @access public
    * @return bool
    */
    public function hasSegments()
    {
        if(is_array($this->params) && count($this->params) > 0){
            return true;
        } else {
            return false;
        }
    }

    /**
     * get the actual pagename
     * @param string $stripExtension - it will remove whatever is provided here off the end of the string
     * @return
     */
    public function getPage($stripExtension = false){

        global $systemProperties;

        //first check if it is set in the properties
        if (isset($systemProperties) && $systemProperties['system']['page']['name'] != '') {

            $page = $systemProperties['system']['page']['name'];

        //not in the properties -> get it from path_info
        } else if ($this->segment(0) != '') {

            $page = $this->segment(0);

        //not in path_info or properties, then they are using a normal .php page with no path info
        } else { //they are using a normal php extension

            $page = getCurrentPageName();
        }

        if(substr($page,-4) == '.php') { //strip off .php
            $page = substr($page,0,strlen($page)-4);
        }

        if($stripExtension) { //if they want to strip off an extensin, get rid of that bugga
            if(substr($page,-strlen($stripExtension)) == $stripExtension) { //check if the page ends with the same extension the user wants to strip
                $page = substr($page,0,strlen($page)-strlen($stripExtension)); //strip it off the end
            }
        }

        return $page;
    }

    /**
     * cleans input
     * @todo: make this more elegant!!
     * @param $string string to be cleaned
     * @deprecated
     * @return
     */
    public function clean($string){

        $string = ereg_replace('\.php&', '', $string);
        $string = ereg_replace('&', '', $string);
        return $string;
    }

   /**
    * Print debugging info
    *
    * @access public
    */
    public function Debug()
    {
        echo "<pre>"; print_r($this->params); echo "</pre>";
    }
}

?>
