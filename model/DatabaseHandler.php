<?php

namespace model
{
    require_once $_SERVER['DOCUMENT_ROOT'].'/PHPbeadando/model/ConnectionHandler.php';
    use model\ConnectionHandler;
    class DatabaseHandler
    {
        private $conn;
        private $handler;
        public function __construct()
        {
            $this->handler = new ConnectionHandler();
            $this->conn = $this->handler->getConnection();
        }

        //Lekérdezi és ha tudja visszaadja a felhasználó id-ját felhasználónév és jelszó alapján
        public function SelectIdByNameAndPassword($username,$password)
        {
            if($this->conn != null)
            {
                $query = $this->conn->prepare('SELECT users.userID FROM Users WHERE users.username = :first AND users.password = :second');
                $query->execute([
                'first' => $username,
                'second' => $password 
                ]);
                $result = $query->fetchAll();

                unset($query);
                $conn = null;
                return $result;
            }

            //Ha nincs találat, akkor 0-t ad vissza, ami egy nem lehetséges Id
            //Ez a továbbiakban a rossz adatokból fakadó sikertelen lekérdezést jeletni bejelentkezésnél
            else
            {
                $conn = null;
                return 0;
            }
            
        }

        public function SelectByUsername($username)
        {
            if($this->conn != null)
            {
                $query = $this->conn->prepare('SELECT users.userID FROM Users WHERE users.username = :first');
                $query->execute([
                'first' => $username
                ]);
                $result = $query->fetchAll();

                unset($query);
                $conn = null;
                return $result;
            }

            //Ha nincs találat, akkor 0-t ad vissza, ami egy nem lehetséges Id
            //Ez a továbbiakban a rossz adatokból fakadó sikertelen lekérdezést jeletni bejelentkezésnél
            else
            {
                $conn = null;
                return 0;
            }
        }

        //Beszúr egy user-t a Users táblába.
        public function InsertUser($username,$password,$name,$gender,$email)
        {
            try
            {
                $stmt = $this->conn->prepare("INSERT INTO Users(username,password,email,nev,nem) VALUES(:par,:par2,:par3,:par4,:par5)");
                $stmt->bindParam(':par', $username);
                $stmt->bindParam(':par2', $password);
                $stmt->bindParam(':par3', $email);
                $stmt->bindParam(':par4', $gender);
                $stmt->bindParam(':par5', $name);
                $result = $stmt->execute();
            }

            catch(PDOException $ex)
            {
                if ($ex->errorInfo[1] == 1062)
                {
                    return false;
                }

                else
                {
                    throw $ex;
                }
            }

            return $result;
        }

    }
}