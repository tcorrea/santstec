<?php

require_once ('BlogDAO.interface.php');

/**
 * APIBlogDAO
 *
 * @author stefan
 */
class APIBlogDAO implements BlogDAO {

    private static $API_BASE_URL;
    private static $BLOG_URI = '/site/%s/blog/%s';
    private static $TAG_LIST_URI = '/tags';
    private static $ARCHIVE_USAGE_URI = '/archive';
    private static $CATEGORY_USAGE_URI = '/categories';
    private static $POST_LIST_URI = '/posts';
    private static $POST_LIST_CURRENT_URI = '/posts/title/%s';
    private static $POST_COUNT_URI = '/posts/count';
    private static $POST_CATEGORY_LIST_URI = '/posts/%s/categories';

    private $siteId;
    private $blogId;
    private $blogURI;

    function __construct($siteId, $blogId) {
        if (!isset (self::$API_BASE_URL)) {
            self::$API_BASE_URL = 'http://' . getenv("HTTP_HOST") . '/rest';
        }

        $this->siteId = $siteId;
        $this->blogId = $blogId;
        $this->blogURI = sprintf(self::$BLOG_URI, $siteId, $blogId);
    }



    public function getBlog() {
        return $this->makeRequest($this->blogURI);
    }

    /**
     *
     * @param string $requestURI
     * @return array
     */
    private function makeRequest($requestURI) {
       $curl = curl_init(self::$API_BASE_URL . $requestURI);

       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curl, CURLOPT_TIMEOUT, 20);

       $content = curl_exec($curl);
       $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

       curl_close($curl);

       switch ($httpcode) {
           case 200 :
               return json_decode($content, true);
               break;

           case 500 :
               throw new Exception('Server error calling URL : ' . self::$API_BASE_URL . $requestURI , $httpcode);
               break;

           case 404 :
               throw new Exception('Object could not be found : ' . self::$API_BASE_URL . $requestURI , $httpcode);
               break;

           default :
               throw new Exception('Error calling : ' . self::$API_BASE_URL . $requestURI , $httpcode);
               break;

       }

    }


    /**
     * This is a simple function to convert a boolean
     * to a string, seeing as PHP has seen it fit to make it imposible
     * to concat "true" to a string when converting from booleans, at least as far
     * as I can see, but I really hope I am wrong. Also an interesting
     * potencial PHP bug :
     *  FAILS : die('This will not print ' . true ? 'true' : 'false' . ' some more stuff that wont print'); // only prints true
     *  WORKS : die('This will not print ' . (true ? 'true' : 'false') . ' some more stuff that wont print');
     * @param boolean $bool
     * @return string
     */
    private static function printBool($bool) {
        return $bool ? 'true' : 'false';
    }


    public function getTagUsage($maxResults = -1) {
        $requestURI = $this->blogURI . self::$TAG_LIST_URI . '?limit=' . $maxResults;
        return $this->makeRequest($requestURI);
    }


    public function getArchiveDates($acending = false, $limit = -1) {
        $requestURI = $this->blogURI . self::$ARCHIVE_USAGE_URI . '?asc=' . self::printBool($acending) . '&limit=' . $limit;

        return $this->makeRequest($requestURI);
    }


    public function getCategoryUsage($orderByUsage = false, $limit = -1, $nameFilter = null) {
        $requestURI = $this->blogURI . self::$CATEGORY_USAGE_URI . '?orderByUsage=' .  self::printBool($orderByUsage) . '&limit=' . $limit;

        if ($nameFilter != null) {
            $requestURI .= '&nameFilter=' . urlencode($nameFilter);
        }

        return $this->makeRequest($requestURI);

    }


    public function getPosts($ageDecending = true, $limit = -1, $tagFiler = null, $categoryFilter = null,
        $dateFilter = null, $resultOffset = 0) {

        $requestURI = $this->blogURI . self::$POST_LIST_URI . '?ageDecending=' . self::printBool($ageDecending) . '&limit=' . $limit;

        if ($tagFiler != null) {
            $requestURI .= '&tagFilter=' . urlencode($tagFiler);
        }

        if ($categoryFilter != null) {
            $requestURI .= '&categoryFilter=' . urlencode($categoryFilter);
        }

        if ($dateFilter != null) {
            $requestURI .= '&dateFilter=' . urlencode($dateFilter);
        }

        if ($resultOffset >= 1) {
            $requestURI .= '&resultOffset=' . urlencode($resultOffset);
        }

        return $this->makeRequest($requestURI);
    }

    public function getCurrentNextAndPreviousPost($title) {
        $requestURI = $this->blogURI . urlencode(sprintf(self::$POST_LIST_CURRENT_URI, $title));

        return $this->makeRequest($requestURI);
    }


    public function getCategories($postId) {
        $requestURI = $this->blogURI . sprintf(self::$POST_CATEGORY_LIST_URI, $postId);

        return $this->makeRequest($requestURI);
    }

    public function getPostCount() {
        $requestURI = $this->blogURI . self::$POST_COUNT_URI;

        return $this->makeRequest($requestURI);
    }

}
?>
