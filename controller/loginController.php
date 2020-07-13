<?php


namespace controller
{
	require_once $_SERVER['DOCUMENT_ROOT'].'/PHPbeadando/model/LoginModel.php';
	use model\LoginModel;
	class LoginController
	{
		public $model;

		public  function __construct($username,$password) 
		{
			$this->model = new LoginModel($username,$password);
		}

		//Belépéskor a model objektummal elvégezteti az adatellenőriztetést, majd a view-nak reagál.
		public function login()
		{
			if($this->model->checkDatabase())
			{
				$result = $this->model->loginAuthentication();
				if($result > 0)
				{
					return $result;
				}

				else
				{
					return 0;
				}
			}

			else
			{
				return -1;
			}

		
		}
	}


}


 