<?php
require_once(_ENV_COMMONS_CLASSPATH . 'lib' . DIRECTORY_SEPARATOR . 'smarty_plugins' . DIRECTORY_SEPARATOR . 'function.PROPERTY.php');

/**
 * This method converts the specified property values to integers and returns their sum.
 */
function smarty_function_SUMPROPERTIES($params, & $smarty) {
  $properties = explode(",", $params['properties']);
  $sum = 0;
  foreach ($properties as &$value) {
    $prop_param = array(
      "name" => trim($value)
    );
    $property = smarty_function_PROPERTY($prop_param, $smarty);
    $proporty_int = is_int (intval($property)) ? intval($property) : 0 ;
    $sum += $proporty_int;
  }
  return $sum;
}

?>
