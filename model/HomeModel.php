<?php

namespace model
{
    class HomeModel
    {
        private $articles;

        public  function __construct() 
		{
			
        }

        public function fetchArticle()
        {
            $import = file_get_contents('content/article.txt');	
            $article = explode("*", $import);
            $db = count($article);
            if($db>0)
            {
                for($i=0; $i<$db; $i++)
                {
                    $rows = trim($article[$i]);
                    $rows = explode("\n", $rows);
                    $this->articles[$i]['title'] = $rows[0];
                    $this->articles[$i]['image'] = $rows[1];
                    $this->articles[$i]['alt'] = $rows[2];
                    $this->articles[$i]['text'] = $rows[3];

                    unset($rows);
                }

            }

            else
            {
                    $this->articles[0]['title'] = "Sajnos még egy cikkünk sincs! :(";
                    $this->articles[0]['image'] = "default.jpg";
                    $this->articles[0]['alt'] = "Nincs itt semmi látnivaló.";
                    $this->articles[0]['text'] = "UwU";
            }

            unset($import);
            unset($article);
            

            return $this->articles;

        }

    }
}