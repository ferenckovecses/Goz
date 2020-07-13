<?php

namespace model
{
    require_once $_SERVER['DOCUMENT_ROOT'].'/PHPbeadando/model/ConnectionHandler.php';
    use model\ConnectionHandler;

    require_once $_SERVER['DOCUMENT_ROOT'].'/PHPbeadando/model/DatabaseHandler.php';
    use model\DatabaseHandler;

    class DatabaseMaker
    {
        public $handler;
        public $conn;

        //Konstruktor
        public function __construct()
        {
            $this->handler = new ConnectionHandler();
            $this->conn = $this->handler->getAccess();
        }

        //Létrehozza a Db-t, ha még nem létezik
        public function CreateDatabase($dbName)
        {
            $pstatement = $this->conn->prepare("CREATE DATABASE IF NOT EXISTS ".$dbName);
            $result = $pstatement->execute();
            
            unset($access);
            unset($pstatement);
            return $result;
        }
        //Létrehozza a Users táblát
        public function CreateUserTable()
        {
            $this->conn = $this->handler->getConnection();
            $sql = "CREATE TABLE Users(
                userID int AUTO_INCREMENT,
                username varchar(150) NOT NULL UNIQUE,
                password varchar(150) NOT NULL,
                email varchar(255) NOT NULL,
                nev varchar(100),
                nem varchar(100) NOT NULL,
                PRIMARY KEY  (userID))";
            
            $result = $this->conn->query($sql);

            unset($sql);
            
            if($result == false)
            {
                return $result;
            }

            else
            {
                unset($result);
                return true;
            }

        }

        //Beszúr egy előre definiált rekordot a teszteléshez.
        public function InsertAdmin()
        {
            $dbHandler = new DatabaseHandler();
            $psw = md5('admin');
            $result = $dbHandler->InsertUser('admin',$psw,'Admin Tamás','Férfi','admin@freemail.hu');
            unset($psw);
            unset($dbHandler);
            
            return $result;
        }

        public function checkDatabase()
        {
            $sql = "SHOW DATABASES LIKE 'UT2BZ6';";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll();

            return $result;
        }




    }
}