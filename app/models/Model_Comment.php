<?php

namespace app\models;

use app\core\Model;

class Model_Comment extends Model {

    protected $comment_table = 'comments';

    public function __construct() {
        parent::__construct();
    }

    /**Get all comment by news id
     * @param $news_id
     * @return array|bool
     */
    public function get_news_comments($news_id) {
        $query = 'select * from ' . $this->comment_table . ' where news_id=' . $news_id[0];
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        if ($result = $stmt->fetchAll()) {
            return $result;
        }
        return false;
    }

    public function get_news_count_comments($news_id) {
        $query = 'select count(id) from ' . $this->comment_table . ' where news_id=' . $news_id[0];
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        if ($result = $stmt->fetch()) {
            return $result;
        }
        return false;
    }

    /**Insert comment to table comments
     * @param $author
     * @param $news_id
     * @param $comm
     * @return bool
     */
    public function insert_comment($author, $news_id, $comm) {
        $query = 'insert into ' . $this->comment_table . ' (author, news_id, comm) values(:author, :news_id, :comm)';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':author', $author);
        $stmt->bindParam(':news_id', $news_id);
        $stmt->bindParam(':comm', $comm);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}