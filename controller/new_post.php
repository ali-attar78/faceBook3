<?php
include "model/dataBase.php";






$caption=$_POST["caption"];
$userId=$_POST["user_id"];




        $db->query("INSERT INTO posts(caption,user_id) VALUES('$caption',$userId)");

        header("Location:explore");







?>
