<?php

namespace controller
{
    require_once $_SERVER['DOCUMENT_ROOT'].'/PHPbeadando/dto/genders.php';
    use dto;
    

    class dtoController
    {
        public  function __construct() 
        {

        } 

        static function getGenders()
        {
            $genders = new dto\Genders();
            $array = $genders->options;
            var_dump($array);
            return $array;
        }
    }
}