<?php

session_start();

$request=$_SERVER["REQUEST_URI"];


switch ($request){

    case("/facebook/"):
    case("/facebook/index"):
        require __DIR__ . "/view/index.php";
        break;

    case("/facebook/explore"):

        if($_SESSION["login_admin_status"]==true){
            require __DIR__ . "/view/explore.php";
        }else{
            require __DIR__ . "/view/index.php";
        }

        break;

    case("/facebook/personal_page"):
    case("/facebook/personal"):
        require __DIR__ . "/view/personal_page.php";
        break;

    case("/facebook/register.php"):
    case("/facebook/register"):
        require __DIR__ . "/controller/register.php";
        break;

    case("/facebook/login_process.php"):
    case("/facebook/login_process"):
        require __DIR__ . "/controller/login_process.php";
        break;

    case("/facebook/logOut.php"):
    case("/facebook/logOut"):
        require __DIR__ . "/controller/logOut.php";
        break;

    case("/facebook/new_post.php"):
    case("/facebook/new_post"):
        require __DIR__ . "/controller/new_post.php";
        break;

}






?>