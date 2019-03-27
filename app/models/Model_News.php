<?php

namespace app\models;

use app\core\Model;
use app\models\Model_Comment;

class Model_News extends Model {
    protected $news_table = 'news';

//    protected $orders_table = 'orders';

    public function __construct() {
        parent::__construct();
    }

    /**Get all news
     * @return array|bool
     */
    public function get_all_news() {
        $query = 'select * from ' . $this->news_table;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        if ($result = $stmt->fetchAll()) {
            return $result;
        }
        return false;
    }

    public function get_most_commented_news() {
        $query = 'select * from php_blog.news left join(SELECT news_id, count(news_id) as count_comm 
          FROM php_blog.comments group by news_id) b
          on b.news_id = news.id order by count_comm desc limit 5';
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        if ($result = $stmt->fetchAll()) {
            return $result;
        }
        return false;
    }

    public function get_all_news_with_count_comments() {
        $arr_news = $this->get_all_news();
        $new_arr_news = [];
        $model_comment = new Model_Comment();
        foreach ($arr_news as $news) {
            $count_comments = $model_comment->get_news_count_comments($news['id']);
            $news['count_comments'] = $count_comments['count(id)'];
            array_push($new_arr_news, $news);
        }
        return $new_arr_news;
    }

    /**Get one news by id
     * @param $id
     * @return bool|mixed
     */
    public function get_one_news($id) {
        $query = 'select * from ' . $this->news_table . ' where id=' . $id[0];
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        if ($result = $stmt->fetch()) {
            return $result;
        }
        return false;
    }

    /**Insert news to table news_table
     * @param $author
     * @param $name
     * @param $text
     * @return bool
     */
    public function insert_news($author, $name, $text) {
        $query = 'insert into ' . $this->news_table . ' (author, name, text) values(:author, :name, :text)';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':author', $author);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':text', $text);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}