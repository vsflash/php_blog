<?php

namespace app\controllers;

use app\core\Controller;
use app\models\Model_News;
use app\models\Model_Comment;
use app\core\Route;

class Controller_News extends Controller
{

    public $model_news;
    public $model_comment;
    /**
     * Controller_News constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->model_news = new Model_News();
        $this->model_comment = new Model_Comment();
        $this->view->template_view = 'main.php';
    }

    /**
     * Render all news
     */
    public function action_index()
    {
        $this->view->all_news = $this->model_news->get_all_news_with_count_comments();
        $this->view->most_commented = $this->model_news->get_most_commented_news();
        $this->view->content_view = 'main/news_index.php';
        $this->view->render();
    }

    /**
     * Render one news
     * @param $id
     */
    public function action_view($id)
    {
        $this->view->comments = $this->model_comment->get_news_comments($id[0]);
        $this->view->count_comments = $this->model_comment->get_news_count_comments($id[0]);
        $this->view->one_news = $this->model_news->get_one_news($id[0]);
        $this->view->content_view = 'main/news_view.php';
        $this->view->render();
    }

    /**
     * Create news
     */
    public function action_create()
    {
        $name = $_POST['name'];
        $author = $_POST['author'];
        $text = $_POST['textNews'];
        return $this->model_news->insert_news($author, $name, $text);
    }

    /**
     * Add comment
     */
    public function action_add_comment()
    {
        $news_id = $_POST['news_id'];
        $comm = $_POST['comm'];
        $author = $_POST['author'];
        $this->model_comment->insert_comment($author, $news_id, $comm);
        Route::redirect('/news/view/' . $news_id);
    }
}