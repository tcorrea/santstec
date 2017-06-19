<?php

require_once 'dal' . DIRECTORY_SEPARATOR . 'APIBlogDAO.class.php';
require_once 'dal' . DIRECTORY_SEPARATOR . 'SQLiteBlogDAO.class.php';
require_once 'dal' . DIRECTORY_SEPARATOR . 'BlogDAO.interface.php';


/**
 *
 * BlogDAOFactory
 *
 * @author stefan
 */
abstract class BlogDAOFactory {

    /**
     *
     * @param string $siteId
     * @param string $blogId
     * @return BlogDAO
     */
    public static function getBlogDAO($siteId, $blogId) {
        if (_SYSTEM_MODE == 'RUN') {
            return new SQLiteBlogDAO($siteId, $blogId);
        } else {
            return new APIBlogDAO($siteId, $blogId);
        }
    }
}
?>
