<?php

namespace model
{
	require_once $_SERVER['DOCUMENT_ROOT'].'/PHPbeadando/model/DatabaseHandler.php';
	use model\DatabaseHandler;

	require_once $_SERVER['DOCUMENT_ROOT'].'/PHPbeadando/model/DatabaseMaker.php';
	use model\DatabaseMaker;

	class LoginModel
	{
		private $username;
		private $password;

		public function __construct($username,$password)
		{
			$this->username = $username;
			$this->password = $password;
		}

		public function loginAuthentication()
		{
			$db = new DatabaseHandler();
			//Felhasználó és jelszó alapján lekér rekordot az adatbázisból.
			$result = $db->SelectIdByNameAndPassword($this->username,$this->password);
			//Ha van találat, akkor return-öli a kapcsolodó userID-t.
			if(count($result) == 1)
			{
				return $result[0]['userID'];
			}

			//Ha nincs megfelelő találat, akkor egy 0-t küld vissza (ami nem lehet az userId, mivel az AI)
			else
			{
				unset($db);
				return 0;
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