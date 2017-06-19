<?php

require_once ('BlogDAO.interface.php');
require_once (_ENV_COMMONS_CLASSPATH . 'lib' . DIRECTORY_SEPARATOR . 'Sqlite.class.php');

/**
 * SQLiteBlogDAO
 *
 * @author stefan
 */
class SQLiteBlogDAO implements BlogDAO {

    private $siteId;
    private $blogId;
    private $sqliteDb;


    function __construct($siteId, $blogId) {
        $this->siteId = $siteId;
        $this->blogId = $blogId;

        $this->sqliteDb =  new Sqlitedb(_ENV_PROJECT_BASE . '/blog/data.db');
    }

    function  __destruct() {
        $this->sqliteDb->Close();
    }


    public function getBlog() {
        $query = "SELECT id, name FROM Blog WHERE id = '" . $this->blogId . "'";

        $blogData = $this->sqliteDb->Query($query);

        if (count($blogData) > 0) {
            return $blogData[0];
        } else {
            return null;
        }
    }


    public function getTagUsage($maxResults = -1) {
        $query = "SELECT T.id AS id, T.name AS name, count(BT.tagId) AS count
                  FROM BlogTag T
                  JOIN BlogPostBlogTag BT ON T.id = BT.tagId
                  AND T.blogId = '" . $this->blogId . "'
                  GROUP by T.id
                  ORDER BY count DESC, name ";

        if ($maxResults >= 1) {
            $query .= " LIMIT ". (int)$maxResults;
        }

        return $this->sqliteDb->Query($query);
    }


    public function getArchiveDates($acending = false, $limit = -1) {
        $query = "SELECT DISTINCT(strftime('%m', BlogPost.date)) as month, strftime('%Y', BlogPost.date) as year
                    from BlogPost WHERE BlogPost.blogId = '". $this->blogId ."' ORDER BY BlogPost.date ";

        if (!$acending) {
            $query .= " DESC";
        }

        if ($limit >= 1) {
            $query .= " LIMIT " . $limit;
        }

        return $this->sqliteDb->Query($query);
    }


    public function getCategoryUsage($orderByUsage = false, $limit = -1, $nameFilter = null) {
        $query = "Select B.id AS id, B.name AS name, COUNT(BC.categoryId) AS amount
            FROM BlogCategory B
            LEFT JOIN BlogPostBlogCategory BC ON B.id = BC.categoryId WHERE B.blogId = '". $this->blogId ."'";

        if ($nameFilter != null) {
            $query .= " AND B.name = '" . urldecode($nameFilter) . "'";
        }


        $query .= " GROUP BY B.id ";

        if ($orderByUsage) {
            $query .= " ORDER BY amount DESC ";
        } else {
            $query .=  " ORDER BY lower(B.name) ";
        }

        if ($limit >= 1) {
            $query .= " LIMIT " . $limit;
        }

        return $this->sqliteDb->Query($query);
    }


    public function getPosts($ageDecending = true, $limit = -1, $tagFiler = null, $categoryFilter = null,
        $dateFilter = null, $resultOffset = 0) {

        $query = "SELECT BP.* FROM BlogPost BP";

        $whereClause = " WHERE BP.blogId = '". $this->blogId ."'";

        if ($tagFiler != null) {
            $whereClause .= " AND BP.tags LIKE '%" . urldecode($tagFiler) . "%' ";
        }

        if ($categoryFilter != null) {
            $query .= ", BlogPostBlogCategory BPBC ";
            $whereClause .= " AND BPBC.postId = BP.id
                              AND BPBC.categoryId = '" . $categoryFilter . "'";
        }

        if ($dateFilter != null) {
            $whereClause .= " AND BP.date LIKE '%" . $dateFilter . "%'";
        }

        $query .= $whereClause;
        $query .= " ORDER BY BP.date ";

        if ($ageDecending) {
            $query .= " DESC ";
        } else {
            $query .= " ASC ";
        }

        if ($limit >= 1) {
            if ($resultOffset >= 1) {
                $query .= " LIMIT " . $resultOffset . "," . $limit;
            } else {
                $query .= " LIMIT " . $limit;
            }

        }

        return $this->sqliteDb->Query($query);

    }

    public function getCurrentNextAndPreviousPost($title) {
        return $this->getPosts(false);
    }


    public function getCategories($postId) {
        $query = "SELECT * FROM BlogPostBlogCategory, BlogCategory
                  WHERE BlogPostBlogCategory.postId = '". $postId ."'
                  AND BlogCategory.id = BlogPostBlogCategory.categoryId";

        return $this->sqliteDb->Query($query);

    }

    public function getPostCount() {
        $query = "SELECT count(*) AS count FROM BlogPost
                  WHERE BlogPost.blogId = '". $this->blogId . "' LIMIT 1";

        $result = $this->sqliteDb->Query($query);

        if (array_key_exists(0, $result) && array_key_exists("count", $result[0])) {
            return $result[0];
        } else {
            $result = array();
            $result["count"] = 0;

            return $result;
        }
    }

}
?>
