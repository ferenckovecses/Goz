<?php

namespace controller
{
    require_once $_SERVER['DOCUMENT_ROOT'].'/PHPbeadando/model/HomeModel.php';
    use model\HomeModel;

    class HomeController
    {
        public $model;

        public  function __construct() 
        {
            $this->model = new HomeModel();
        }

        public function getArticle()
        {
            $articles = $this->model->fetchArticle();
            return $articles;
        }
    }
}