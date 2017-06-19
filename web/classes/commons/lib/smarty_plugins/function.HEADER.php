<?php
require_once(_ENV_COMMONS_CLASSPATH . 'includes/Common.functions.php');

/**
 * Construct HTML Header Chunk
 *
 * @author Sean Nieuwoudt <a href="mailto:sean@yola.com">sean@yola.com</a>
 * @param $params Object
 * @param $smarty Object
 */

function fetchDynamicComponentData($component, &$smarty)
{
    $styleTemplate = $component->template_dir . DIRECTORY_SEPARATOR . $component->styleName . '.css.tpl';
    return(array(
        'className' => $component->className,
        'propertiesId' => $component->componentProperties['id'],
        'styleTemplate' => $smarty->fetch($styleTemplate)
    ));
}

function fetchComponentClassTemplates(&$smarty)
{
    $fetchComponentClassTemplates = function ($component_class) use ($smarty) {
        $snippits = _ENV_PROJECT_BASE . '/classes/commons/lib/smarty_plugins/snippits';
        $css_file = "classes/components/$component_class/layouts/Default/Default.css";
        $header_file = "classes/components/$component_class/layouts/Header.tpl";
        $css_include = '';
        $header_tpl = '';

        if (file_exists(_ENV_PROJECT_BASE . '/' . $css_file)) {
            $smarty->assign('widget_header_css', $css_file);
            $css_include = $smarty->fetch("$snippits/css.tpl");
        }

        if (file_exists(_ENV_PROJECT_BASE . '/' . $header_file)) {
            $header_tpl = $smarty->fetch($header_file);
        }

        return array(
            'css_include' => $css_include,
            'header_tpl' => $header_tpl
        );
    };

    return $fetchComponentClassTemplates;
}

function smarty_function_HEADER($params, & $smarty)
{
    $header = _ENV_PROJECT_BASE . '/classes/commons/lib/smarty_plugins/snippits/header.tpl';
    $safemodeDisabled = !isset($_REQUEST['safeMode']) || $_REQUEST['safeMode'] != 'true';
    $desktopView = !_MOBILE && !_FACEBOOK;
    $system = $smarty->get_template_vars('system');
    $uniproperties = $smarty->get_template_vars('uniproperties');
    $meta = $uniproperties['meta'];
    $tracking = $uniproperties['tracking'];
    $css = $uniproperties['css'];

    $pageContext = $smarty->get_template_vars('pageContext');
    $blogPostTitle = $pageContext->getPublishedProperty('blogPostTitle');
    $pageTitle = $uniproperties['title']['text'];
    if (!empty($blogPostTitle)) {
        $pageTitle = $blogPostTitle;
    }

    $base_url = '';
    $pageType = strtolower($system['page']['type']);
    if ($pageType == 'blog' || $pageType == 'news') {
        $base_url = getBaseURI();
    }

    $pageProperties = $smarty->get_template_vars('properties');
    $component_classes = array();
    $dynamicCssComponents = array();
    $page_has_ecwid_store = false;

    foreach ($pageProperties['masterComponentList'] as &$component) {
        $component_classes[] = get_class($component);

        if ($component->componentProperties['sys_hasDynamicCSS']) {
            $dynamicCssComponents[] = fetchDynamicComponentData($component, $smarty);
        }

        if ($component->getComponentProperty('sys_className') == 'Ecwid_Ecommerce_Default') {
            $page_has_ecwid_store = true;
        }
    }

    $component_classes = array_unique($component_classes);
    $component_classes = array_map(fetchComponentClassTemplates($smarty), $component_classes);

    $crawlTrigger = '';
    $dns_prefetch_urls = null;
    if ($page_has_ecwid_store) {
        if (!isset($_GET['_escaped_fragment_'])) {
            $crawlTrigger = '<meta name="fragment" content="!" />';
        } else {
            require_once(_ENV_PROJECT_BASE . '/classes/commons/lib/ecwid/StoreIndexing.php');

            $ecwid_store_id = $system['purchased']['ecommerce']['storeId'];
            $store_indexing = new StoreIndexing($ecwid_store_id);
            $ecwid_dict = $store_indexing->ecwid_generate_indexing_dict();
            $ecwid_description = $ecwid_dict['description'];
            $ecwid_title = $ecwid_dict['title'];


            if (!empty($ecwid_description)) {
                $meta['description'] = htmlspecialchars($ecwid_description);
            }
            if (!empty($ecwid_title)) {
                $pageTitle = $ecwid_title;
            }
        }

        $config = $smarty->get_template_vars('config');
        $ecwid_api_domain = '//' . parse_url($config->common->ecwid->url, PHP_URL_HOST);
        $dns_prefetch_urls = array(
            '//images-cdn.ecwid.com',
            '//images.ecwid.com',
            $ecwid_api_domain,
        );
    }

    $styleName = $system['template']['name'];
    if (_MOBILE) {
        $styleName = $system['template']['mobile']['name'];
    } elseif (_FACEBOOK) {
        $styleName = 'Facebook';
    }

    // style_designer.enabled is only false if the value is explicitly false
    // this is due to the site migration logic forcing a false value, whereas the
    // other possible values are null or true, both of which are considered enabled
    $style_designer_enabled = $uniproperties['style_designer']['enabled'];
    $style_designer_enabled = ($style_designer_enabled === 'false' ? false : true);

    $font_string = '';
    $site_style = '';
    $legacyFontsEnabled = false;
    if ($style_designer_enabled && $desktopView) {
        $google_font_prop = $uniproperties['site']['google_fonts'];

        if (!is_null($google_font_prop)) {
            $google_fonts_json = json_decode($google_font_prop, true);
            $google_fonts = $google_fonts_json['fonts'];

            if (is_array($google_fonts)) {

                foreach ($google_fonts as &$font) {
                    $font_string .= urlencode($font) . '|';
                }
                // strip off trailing pipe |
                $font_string = substr($font_string, 0, -1);
                $font_string .= '&subset=latin,latin-ext';
            }
        }
    }

    // enable legacy font import
    // enabled == null defaults to true
    $legacyFontsEnabled = $css['fonts'] && $css['fonts'] !== '' && $desktopView  && !$style_designer_enabled;

    // style-enabled == null defaults to true
    $cssOverridesBought = $system['purchased']['css_overrides']['enabled'];
    $cssOverridesEnabled = $css['overrides'] && $css['overrides-enabled'] !== 'false';

    $customTrackingBought = $system['purchased']['custom_tracking']['enabled'];

    $rssUrl = substr($system['page']['name'], 0, strlen($system['page']['name'])-4) . '.rss';

    $siteStyleEnabled = empty($params['site_style']) || $params['site_style'] == 'true';
    $siteStylePath = "$snippits/blank.tpl";
    if ($siteStyleEnabled) {
        $siteStylePath = 'classes/commons/resources/designsettings/site_style.css';
    }

    $smarty->assign('header', array(
        'base_url' => $base_url,
        'crawlTrigger' => $crawlTrigger,
        'component_classes' => $component_classes,
        'dns_prefetch_urls' => $dns_prefetch_urls,
        'dynamicCssComponents' => $dynamicCssComponents,
        'favicon' => $meta['favicon'],
        'pageTitle' => $pageTitle,
        'siteStylePath' => $siteStylePath,
        'templateCssPath' => 'templates/' . $styleName . '/style.css',
        'cssOverrides' => array(
            'enabled' => $safemodeDisabled && $cssOverridesBought && $cssOverridesEnabled && $desktopView,
            'content' => $css['overrides']
        ),
        'customTracking' => array(
            'enabled' => $safemodeDisabled && $customTrackingBought && !empty($tracking['header']),
            'content' => $tracking['header']
        ),
        'defaultCss'=> array(
            'enabled' => !($cssOverridesBought) || $css['style-enabled'] !== 'false',
            'content' => $smarty->fetch('templates/' . $styleName . '/style.css')
        ),
        'googleWebmaster' => array(
            'enabled' => $system['page']['name'] == 'index.php' && $meta['googleWebmaster'] != '',
            'content' => $meta['googleWebmaster']
        ),
        'legacyFonts' => array(
            'enabled' => $legacyFontsEnabled,
            'fonts' => $css['fonts']
        ),
        'meta' => array(
            'description' => $meta['description'],
            'keywords' => $meta['keywords']
        ),
        'rss' => array(
            'enabled' => $pageType == 'blog' || $pageType == 'news',
            'url' => $rssUrl
        ),
        'styleDesigner' => array(
            'enabled' => $style_designer_enabled && $desktopView,
            'fonts' => $font_string
        )
    ));

    return $smarty->fetch($header);
}

?>
