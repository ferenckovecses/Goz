<?php
//Megnyitáskor session indítása
session_start();

//Ha van page paraméter és létezik ilyen view fájl, akkor azt és a hozzá tartozó controller-t tölti be.
if (isset($_GET['page']) && is_file('view/'.$_GET['page'].'.php'))
{
    $page = $_GET['page'];

    //Ha van aktív session
    if( isset($_SESSION['loggedin']) )
    {
        if($page == "registration" || $page == "login")
        {
            $page = "home";
        }
    }

    //Ha nincs aktív session
    else
    {
        if( $page != 'registration' && $page != 'login' && $page != 'databasemaker')
        {
            $page = "login";
        }
    }

    include 'controller/'.$page.'Controller.php';
    include 'view/begin.php';
    include 'view/'.$page.'.php';
    include 'view/end.php';    
}


//Alapértelmezett a login oldal
else
{
    header('Location: .\index.php?page=login');
}


