<?php
/**
 * HTTP Helper class
 */
class HTTPUtils {

    private static function getWidgetCurlOptions($maxRedirects=5) {

           return array(
            CURLOPT_RETURNTRANSFER => true, // return web page
            CURLOPT_FOLLOWLOCATION => true, // follow redirects
            CURLOPT_ENCODING => "", // handle all encodings
            CURLOPT_USERAGENT => "YolaWidgetHTTP/1.0", // who am i
            CURLOPT_AUTOREFERER => true, // set referer on redirect
            CURLOPT_CONNECTTIMEOUT => 10, // timeout on connect
            CURLOPT_TIMEOUT => 10, // timeout on response
            CURLOPT_MAXREDIRS => $maxRedirects, // stop after n redirects
        );

    }

    //cURL can't follow redirects in safe mode or if open_basedir is on
    public static function curlCanFollow() {
        return !(ini_get('safe_mode') || ini_get('open_basedir'));
    }

    public static function getURLContent($url, $maxRedirects=5) {

        if (!self::curlCanFollow()) {
            return self::getURLContentSafe($url, $maxRedirects);
        }

        $options = self::getWidgetCurlOptions($maxRedirects);

        $ch = curl_init($url);
        curl_setopt_array($ch, $options);
        $content = curl_exec($ch);
        $err = curl_errno($ch);
        $errmsg = curl_error($ch);
        $header = curl_getinfo($ch);
        curl_close($ch);

        if ($header['http_code'] != 200) {
            $content = '<div> Widget is unavailable at this time : ' . $errmsg . '</div>';
        }

        return $content;
    }

    // work around for https://github.com/yola/p-whitelabel/issues/246
    // http://slopjong.de/2012/03/31/curl-follow-locations-with-safe_mode-enabled-or-open_basedir-set/
    // recursive method
    public static function getURLContentSafe($url, $maxRedirects=5, $redirCount=0) {

        if ($redirCount > $maxRedirects) {
            trigger_error('Too many redirects.', E_USER_WARNING);
            return;
        }

        $options = self::getWidgetCurlOptions($maxRedirects);
        $options[CURLOPT_FOLLOWLOCATION] = false;
        $options[CURLOPT_HEADER] = true; // headers included
        $options[CURLOPT_NOBODY] = false;

        $ch = curl_init($url);
        curl_setopt_array($ch, $options);

        $html = curl_exec($ch);
        $info = curl_getinfo($ch);
        $err = curl_errno($ch);
        $errmsg = curl_error($ch);
        $http_code = $info['http_code'];
        curl_close($ch);

        // Split out http header and body
        list($http_header, $html) = explode("\r\n\r\n", $html, 2);
        if ($http_code == 301 || $http_code == 302) {
            $matches = array();
            preg_match('/\r\nLocation:(.*?)\n/i', $http_header, $matches);
            $new_url = trim(array_pop($matches));

            // If this is a relative redirect we need to rebuild the url using
            // parts of the original url.
            if(!preg_match("/^https?:/i", $new_url)){
                $url_parsed = parse_url($url);
                $host = $url_parsed['host'];
                if (isset($url_parsed['port'])) {
                    $host .= ":" . $url_parsed['port'];
                }
                $new_url = sprintf("%s://%s%s",
                    $url_parsed['scheme'],
                    $host,
                    $new_url);
            }

            $url_parsed = parse_url($new_url);
            // Check that the new url format is valid.
            if (isset($url_parsed)) {
                $redirCount++;
                return self::getURLContentSafe($new_url, $maxRedirects, $redirCount);
            }
        }

        if ($http_code != 200) {
            $html = '<div> Widget is unavailable at this time : ' . $errmsg . '</div>';
        }
        return $html;

    }

}
?>
