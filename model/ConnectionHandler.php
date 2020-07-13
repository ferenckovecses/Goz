<?php

namespace model
{
	require_once $_SERVER['DOCUMENT_ROOT'].'/PHPbeadando/model/Config.php';
    use PDO;
    use model\Config;

    class ConnectionHandler
    {
        private $config;
        //Konstruktor
        public function __construct()
        {
            $this->config = new Config();
        }

        //Kapcsolatot létesít a model és egy adatbázis között.
        public function getConnection()
        {

            try{
                $conn = new PDO("mysql:host=".$this->config->dbHost.";dbname=".$this->config->dbName.";charset=utf8mb4", $this->config->dbUser, $this->config->dbPass);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
            }

            catch(PDOException $e)
            {
                echo 'Connection failed: ' . $e->getMessage();
                die();
            }

            return $conn;
        }
        //Kapcsolatot létesít a model és az adatbázis kiszolgálója között, adatbázis megnevezés nélkül
        public function getAccess()
        {
            try{
                $conn = new PDO("mysql:host=".$this->config->dbHost.";charset=utf8mb4", $this->config->dbUser, $this->config->dbPass);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
            }

            catch(PDOException $e){
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }

            return $conn;
        }
    }
}