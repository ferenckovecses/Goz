<?php

namespace model
{
    class Config
    {
        public $dbHost;
        public $dbName;
        public $dbPass;
        public $dbUser;

        public function __construct()
        {
            $this->dbHost = "localhost";
            $this->dbName = "UT2BZ6";
            $this->dbPass = "";
            $this->dbUser = "root";
        }
    }
}