<?php


namespace controller
{
    require_once $_SERVER['DOCUMENT_ROOT'].'/PHPbeadando/model/RegistrationModel.php';
    use model\RegistrationModel;
    
    class RegistrationController
    {
        private $model;

        public  function __construct($username,$password,$email,$gender,$name) 
		{
			$this->model = new RegistrationModel($username,$password,$email,$gender,$name);
        }
      
        public function createUser()
        {
            $result = $this->model->registerUser();
            return $result;
        }

        public function checkUsername($username)
        {
            if($this->model->checkUsername($username))
            {
                return true;
            }

            else
            {
                return false;
            }
        }

        public function checkDatabase()
        {
            if($this->model->checkDatabase())
            {
                return true;
            }

            else
            {
                return false;
            }
        }

        public function Registration()
        {
            //Ha a felhasználónév és a jelszó is megfelelő hosszúságú
			if(strlen($this->model->username) > 5 && ((strlen($this->model->password) > 5 )))	
			{
				//Ha a név nem lett megadva akkor adunk egy default értéket neki
				if(strlen($this->model->name)<2)
				{
					$this->model->name = "Nem Publikus";
				}
				//A jelszót átkonvertáljuk
				$this->model->password = md5($this->model->password);

					
				if($this->checkDatabase())
				{
					//A felhasználónevet lefuttatjuk, annak egyedinek kell lennie
					if($this->checkUsername($_POST['username']))
					{	
						//Ha stimmel akkor létrehozzuk a felhasználót
						$result = $this->createUser();

                        //Ha sikerült a beszúrás, akkor visszajelzünk.
						if($result)
						{
                            unset($result);
                            return 1;
                        }
                        
                        //Ha nem sikerült a beszúrás, akkor is azért visszajelzünk.
						else
						{
							unset($result);
							return 0;
						}
					}
                    //Ha a felhasználónév ellenörzés fail volt
					else
					{
                        return 2;
					}
				}
                //Ha még nincs aktív adatbázisunk
				else
				{
                    return 3;
				}
				
			}
            //Ha a karakterhossz nem megfelelő
			else
			{
                return 4;
			}
        }
    }

}
