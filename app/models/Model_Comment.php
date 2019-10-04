<?php

namespace app\models;

use app\core\Db;
use app\core\Model;

class Model_Comment extends Model
{

    /**
     * @return string
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * Model_Comment constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get all comment by news id
     * @param $news_id
     * @return array|bool
     */
    public function get_news_comments($news_id)
    {
        $query = 'SELECT * FROM ' . self::tableName() . ' WHERE news_id=:news_id';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':news_id', $news_id);
        $stmt->execute();
        if ($result = $stmt->fetchAll()) {
            return $result;
        } else {
            return false;
        }
    }

    /**
     * Select count comments by news_id
     * @param $news_id
     * @return bool|mixed
     */
    public function get_news_count_comments($news_id)
    {
        $query = 'SELECT count(id) FROM ' . self::tableName() . ' WHERE news_id=:news_id';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':news_id', $news_id);
        $stmt->execute();
        if ($result = $stmt->fetch()) {
            return $result;
        } else {
            return false;
        }
    }

    /**
     * Insert comment to table comments
     * @param $author
     * @param $news_id
     * @param $comm
     * @return bool
     */
    public function insert_comment($author, $news_id, $comm)
    {
        $query = 'INSERT INTO ' . self::tableName() . ' (author, news_id, comm) VALUE(:author, :news_id, :comm)';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':author', $author);
        $stmt->bindParam(':news_id', $news_id);
        $stmt->bindParam(':comm', $comm);

        return $stmt->execute();
    }
}