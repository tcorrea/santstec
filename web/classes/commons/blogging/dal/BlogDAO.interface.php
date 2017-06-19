<?php

/**
 * BlogDAO
 *
 * @author stefan
 */
interface BlogDAO {

    /**
     *
     * @param string $siteId
     * @param string $blogId
     * @return BlogDAO
     */
    function __construct($siteId, $blogId);

    /**
     * Retrieve the highLevel blog info
     * @return array
     */
    public function getBlog();

    /**
     * Retrieve an associative array containing tag id, tag name, tag usage count
     * @param string $siteId
     * @param string $blogId
     * @param int $maxResults
     * @return array
     */
    public function getTagUsage($maxResults = -1);


    /**
     *
     * @param string $siteId
     * @param string $blogId
     * @param boolean $acending
     * @return array
     */
    public function getArchiveDates($acending = false, $limit = -1);


    /**
     *
     * @param string $siteId
     * @param string $blogId
     * @param boolean $orderByUsage
     * @param int $limit
     * @return array
     */
    public function getCategoryUsage($orderByUsage = false, $limit = -1, $nameFilter = null);


    /**
     *
     * @param string $ageDecending
     * @param string $limit
     * @return array
     */
    public function getPosts($ageDecending = true, $limit = -1, $tagFiler = null, $categoryFilter = null,
        $dateFilter = null, $resultOffset = 0);


    /**
     * @param string $title
     */
    public function getCurrentNextAndPreviousPost($title);



    /**
     *
     * @param string $postId
     * @return array
     */
    public function getCategories($postId);

    /**
     * @return int
     */
    public function getPostCount();


}
?>
