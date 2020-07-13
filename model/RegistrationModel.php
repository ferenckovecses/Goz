<?php

namespace model 
{
    require_once $_SERVER['DOCUMENT_ROOT'].'/PHPbeadando/model/DatabaseHandler.php';
    use model\DatabaseHandler;
    
    require_once $_SERVER['DOCUMENT_ROOT'].'/PHPbeadando/model/DatabaseMaker.php';
	use model\DatabaseMaker;

    class RegistrationModel
    {
        public $username;
        public $password;
        public $email;
        public $name;
        public $gender;

        public function __construct($username,$password,$email,$gender,$name)
        {
            $this->username = $username;
            $this->password = $password;
            $this->email = $email;
            $this->name = $name;
            $this->gender = $gender;
        }

        public function checkUsername($username)
        {
            $db = new DatabaseHandler();
            $result = $db->SelectByUsername($username);
            unset($db);
            if(count($result) == 1)
            {
                return false;
            }

            else
            {
                return true;
            }
        }

        public function registerUser()
        {
            $db = new DatabaseHandler();
            //Ha sikeres a beszúrás
            if($db->InsertUser($this->username,
                                $this->password,
                                $this->name,
                                $this->gender,
                                $this->email))
            {
                unset($db);
                return true;
            }
            //Ha nem
            else
            {
                unset($db);
                return false;
            }
        }

        public function checkDatabase()
		{
			$db = new DatabaseMaker();
			$result = $db->checkDatabase();
			$result = count($result);

			if($result > 0)
			{
				return true;
			}

			else
			{
				return false;
			}
		}

    }
}