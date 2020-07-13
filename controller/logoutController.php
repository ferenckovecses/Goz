<?php

namespace controller
{
    class LogoutController
    {
        public  function __construct() 
        {

        }

        public function logout()
        {
            session_destroy();
            header('Location: .\index.php?page=login');
        }
    }
}