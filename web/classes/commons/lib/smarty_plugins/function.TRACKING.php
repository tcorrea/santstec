<?php

/**
 * site footer
 * @return void
 * @param $params Object
 * @param $smarty Object
 */
function smarty_function_TRACKING($params, & $smarty)
{
    $footer = _ENV_PROJECT_BASE . '/classes/commons/lib/smarty_plugins/snippits/tracking/footer.tpl';

    $safeModeEnabled = $_REQUEST['safeMode'] == 'true';
    $runModeEnabled = _SYSTEM_MODE == 'RUN';

    $config = $smarty->get_template_vars('config');
    $siteAnalyticsJsUrl = $config->sitecomponents->site_analytics_js_url;

    $system = $smarty->get_template_vars('system');
    $customTrackingPurchased = $system['purchased']['custom_tracking']['enabled'];
    $uniproperties  = $smarty->get_template_vars('uniproperties');

    $smarty->assign('tracking', array(
        'site_analytics' => array(
            'url' => $siteAnalyticsJsUrl,
            'enabled' => $runModeEnabled,
        ),
        'google_analytics' => array(
            'id' => $uniproperties['tracking']['gaid'],
            'enabled' => $runModeEnabled,
        ),
        'custom' => array(
            'script' => $uniproperties['tracking']['footer'],
            'enabled' => !$safeModeEnabled && $customTrackingPurchased,
        ),
        'quantcast' => array(
            'enabled' => $runModeEnabled,
        )
    ));

    return $smarty->fetch($footer);
}
