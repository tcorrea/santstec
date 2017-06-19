<?php

// ENT_HTML401 is not available in version < php54
if (!defined('ENT_HTML401')) {
    define('ENT_HTML401', 0);
}

/**
 * Functions attempting to recreate functionality of the ecwid-shopping-cart.php
 *
 * PHP version 5
 *
 * @category Web_Services
 * @package  Services_Ecwid
 * @author   Vladimir Tarutko <marvin@ecwid.com>
 * @author   Yola <developers@yola.com>
 * @license  MIT License
 * @link     Most code originally from github.com/vuvvn/ecwid-wordpress-plugin
 */

/**
 * Declare if HTTPS is being used
 *
 * @return bool true if HTTPS is being used
 */
function isSecure() {
    return (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
        || $_SERVER['SERVER_PORT'] == 443;
}

/**
 * Reproduce output from Wordpress's esc_html function
 *
 * @param string $text the string containing HTML blocks to be escaped
 *
 * @return string escaped version of $text
 */
function esc_html($text) {
    return htmlspecialchars($text, ENT_QUOTES | ENT_HTML401, 'UTF-8', false);
}

/**
 * Reproduce output from Wordpress's esc_attr function
 *
 * @param string $text the string containing HTML attributes to be escaped
 *
 * @return string escaped version of $text
 */
function esc_attr($text) {
    return htmlentities($text, ENT_QUOTES | ENT_HTML401, 'UTF-8', false);
}

/**
 * Reproduce output from Wordpress's __
 *
 * Wordpress's version fetches translations for the certain domain, we just return
 * the original $text
 *
 * @param string $text   The string returned
 * @param string $domain In Wordpress this is the domain to retrieve the translated
 * text
 *
 * @return string returns $text
 */
function __( $text, $domain ) {
    return $text;
}

/*
 * ecwid-shopping-cart.php functionality
 */

/**
 * Retrieve URL for page
 *
 * @return string base URL for page
 */
function ecwid_get_store_page_url() {
    // Replacement for Ecwid using WP's get_page_link

    // http://stackoverflow.com/a/2886224
    $protocol = 'http';

    if (isSecure()) {
        $protocol = 'https';
    }

    $parts = parse_url($_SERVER['REQUEST_URI']);
    $queryString = array_key_exists('query', $parts) ? $parts['query'] : '';
    $queryParams = array();

    parse_str($queryString, $queryParams);
    unset($queryParams['_escaped_fragment_']);

    $queryString = http_build_query($queryParams);
    $url = $parts['path'] . '?' . $queryString;

    return $protocol . '://' . $_SERVER['HTTP_HOST'] . $url;
}

/**
 * Parse GET parameter _escaped_fragment_=
 *
 * Taken from ecwid-shopping-cart.php
 *
 * @param string $escaped_fragment escaped fragment to use
 *
 * @return array of mode and id for fragment
 */
function ecwid_parse_escaped_fragment($escaped_fragment) {
    $fragment = urldecode($escaped_fragment);
    $return = array();

    if (preg_match('/^(\/~\/)([a-z]+)\/(.*)$/', $fragment, $matches)) {
        parse_str($matches[3], $return);
        $return['mode'] = $matches[2];
    } elseif (preg_match('!.*/(p|c)/([0-9]*)!', $fragment, $matches)) {
        if (count($matches) == 3 && in_array($matches[1], array('p', 'c'))) {
            $return  = array(
                'mode' => 'p' == $matches[1] ? 'product' : 'category',
                'id' => $matches[2]
            );
        }
    }

    return $return;
}

/**
 * Generate entity URL
 *
 * Taken from ecwid-shopping-cart.php
 *
 * @param array/number $entity either an entity string or array with 'url' item.
 * @param string       $type   either 'p' or 'c' for category or product
 *
 * @return string of mode and id for fragment
 */
function ecwid_get_entity_url($entity, $type) {
    $link = ecwid_get_store_page_url();

    if (is_numeric($entity)) {
        return $link . '#!/' . $type . '/' . $entity;
    } elseif (is_array($entity) && isset($entity['url'])) {
        $link .= substr($entity['url'], strpos($entity['url'], '#'));
    }

    return $link;
}

/**
 * Generates product URL using get_entity_url
 *
 * @param array/string $product containing URL segment for product
 *
 * @return string full URL for product
 */
function ecwid_get_product_url($product) {
    return ecwid_get_entity_url($product, 'p');
}

/**
 * Generates category URL using get_entity_url
 *
 * @param array/string $category containing URL segment for category
 *
 * @return string full URL for category
 */
function ecwid_get_category_url($category) {
    return ecwid_get_entity_url($category, 'c');
}

/**
 * Prepare Ecwid description
 *
 * This trims and escapes the contents of the Ecwid product/category's description
 * to be used as the meta description on the page
 *
 * @param string $description Description from Ecwid for the product/category
 *
 * @return string escaped and cleaned up description
 */
function ecwid_prepare_meta_description($description) {
    $description = strip_tags($description);
    $description = html_entity_decode($description, ENT_NOQUOTES, 'UTF-8');

    // Strip space, tab, non-breaking space, newline, carriage return
    $description = preg_replace('![\p{Z}\s]{2,}!u', ' ', $description);
    $description = trim($description, " \t\xA0\n\r");

    $description = mb_substr($description, 0, 160);
    $description = htmlspecialchars($description, ENT_COMPAT, 'UTF-8');
    return $description;
}
