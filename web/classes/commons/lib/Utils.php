<?php

/**
 * Perform Spatial Array Sort
 */
function sort_spatial($a, $b){
    if($a['matchCount'] > $b['matchCount']) {
        return -1;
    } else {
        return 1;
    }
}

function pregGrepKeys($pattern, $input, $flags = 0)
{
    $keys = preg_grep($pattern, array_keys($input), $flags);
    $values = array();

    foreach ($keys as $key)
    {
        $values[$key] = $input[$key];
    }

    return $values;
}
