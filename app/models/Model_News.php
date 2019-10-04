<?php

namespace app\models;

use app\core\Db;
use app\core\Model;

class Model_News extends Model
{
    /**
     * @return string
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * Model_News constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get all news
     * @return array|bool
     */
    public function get_all_news()
    {
        $query = 'SELECT * FROM ' . self::tableName() . ' ORDER BY id DESC';
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        if ($result = $stmt->fetchAll()) {
            return $result;
        } else {
            return false;
        }
    }

    /**
     * Get 5 most commented news
     * @return array|bool
     */
    public function get_most_commented_news()
    {
        $query = 'SELECT * FROM news LEFT JOIN(SELECT news_id, count(news_id) AS count_comm 
          FROM comments GROUP BY news_id) b
          ON b.news_id = news.id Order BY count_comm DESC limit 5';
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        if ($result = $stmt->fetchAll()) {
            return $result;
        } else {
            return false;
        }
    }

    /**
     * Get news count comm
     * @return array
     */
    public function get_all_news_with_count_comments()
    {
        $arr_news = $this->get_all_news();
        $new_arr_news = [];
        $model_comment = new Model_Comment();
        if (!empty($arr_news)) {
            foreach ($arr_news as $news) {
                $count_comments = $model_comment->get_news_count_comments($news['id']);
                if (!empty($count_comments['count(id)'])) {
                    $news['count_comments'] = $count_comments['count(id)'];
                } else {
                    $news['count_comments'] = 0;
                }
                array_push($new_arr_news, $news);
            }
        }
        return $new_arr_news;
    }

    /**
     * Get one news by id
     * @param $id
     * @return bool|mixed
     */
    public function get_one_news($id)
    {
        $query = 'SELECT * FROM ' . self::tableName() . ' WHERE id=:id';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        if ($result = $stmt->fetch()) {
            return $result;
        } else {
            return false;
        }
    }

    /**
     * Insert news to table news_table
     * @param $author
     * @param $name
     * @param $text
     * @return bool
     */
    public function insert_news($author, $name, $text)
    {
        $query = 'INSERT INTO ' . self::tableName() . ' (author, name, text) VALUES(:author, :name, :text)';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':author', $author);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':text', $text);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}