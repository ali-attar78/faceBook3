<?php
include "model/dataBase.php";


$userName=$_POST["username"];
$name=$_POST["name"];
$pass=$_POST["pass"];
$confirm_pass=$_POST["confirm_pass"];
$date=$_POST["date"];
$phone=$_POST["phone"];
$email=$_POST["email"];
$bio=$_POST["bio"];
$gender=$_POST["gender"];


$secure_pass=md5($pass);

if($pass==$confirm_pass){
$numUser=$db->query("SELECT * FROM users WHERE user_name='$userName'")->num_rows;
if ($numUser==0){

    $find1 = strpos($email, '@');
    $find2 = strpos($email, '.');
    if ($find1 !== false && $find2 !== false && $find2 > $find1){

        if(strlen($phone)==11){
            $db->query("INSERT INTO users(user_name,name,password,email,birthday,bio,mobile_number,gender) VALUES ('$userName','$name','$secure_pass','$email','$date','$bio','$phone',$gender)");
            $_SESSION["message"]="your sign up is success";
            $_SESSION["type"]="success";
        }else{

            $_SESSION["message"]="your number must be 11 character";
            $_SESSION["type"]="error";

        }


    }else{
        $_SESSION["message"]="your email is incorrect";
        $_SESSION["type"]="error";
    }

}else{
    $_SESSION["message"]="username already exist";
    $_SESSION["type"]="error";

}

}

else{
$_SESSION["message"]="passsword is incorrect";
    $_SESSION["type"]="error";

}


header("Location: index");

?>