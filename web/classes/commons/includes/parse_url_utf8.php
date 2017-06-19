<?php

function parse_url_utf8($url)
{
    /*

    parse_url() stand-in, not a fully featured
    replacement, only extracts the path and query.

    Reasons:

        parse_url corrupts UTF-8 strings
        https://bugs.php.net/bug.php?id=52923

        parse_url() is unpredicatable, from the docs:
            http://php.net/manual/en/function.parse-url.php
            > On seriously malformed URLs, parse_url() may return FALSE.
        Saw this behavior on php54 (but not php53).

    Do not use any preg functions, Windows will fail with
    error PREG_BAD_UTF8_ERROR

    */

    $parsed = array();
    $encoded = urlencode($url);
    $parts = explode(urlencode('?'), $encoded, 2);

    $parsed['path'] = urldecode($parts[0]);
    if (count($parts) > 1) {
        $parsed['query'] = urldecode($parts[1]);
    }

    return $parsed;

}
