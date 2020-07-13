<?php

namespace controller
{
    require_once $_SERVER['DOCUMENT_ROOT'].'/PHPbeadando/model/DatabaseMaker.php';
    use model\DatabaseMaker;

    class DatabasemakerController
    {
        public $model;
        public  function __construct() 
        {
            $this->model = new DatabaseMaker();
        } 

        public function createFullDatabase($dbName)
        {
            if($this->model->CreateDatabase($dbName))
            {
                if($this->model->CreateUserTable())
                {
                    if($this->model->InsertAdmin())
                    {
                        return 3;
                    }

                    else
                    {
                        return 0;
                    }
                }

                else
                {
                    return 1;
                }
            }

            return 2;
        }
    }
}