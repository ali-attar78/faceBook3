<?php
include "model/dataBase.php";


$find1 = strpos($_POST["emailOrPhone"], '@');
$find2 = strpos($_POST["emailOrPhone"], '.');
$find3 = strpos($_POST["emailOrPhone"], '09');

$password=$_POST["password"];
$secure_pass=md5($password);

if ($find1 !== false && $find2 !== false && $find2 > $find1){
    $email=$_POST["emailOrPhone"];
    $loginWithEmail=$db->query("SELECT * FROM users WHERE password='$secure_pass' AND email='$email'");
    $emailRow=$loginWithEmail->num_rows;
    $user=$loginWithEmail->fetch_assoc();

}
else if($find3 !== false && strlen($_POST["emailOrPhone"])==11){
    $phone=$_POST["emailOrPhone"];
    $loginWithPhone=$db->query("SELECT * FROM users WHERE password='$secure_pass' AND mobile_number='$phone'");
    $phoneRow=$loginWithPhone->num_rows;
    $user=$loginWithPhone->fetch_assoc();

}

$userId=$user["id"];

$EmailOrPhone=$_POST["emailOrPhone"];

if(isset($phoneRow) && $phoneRow == 1) {

        $_SESSION["login_admin_status"] = true;
        $_SESSION["userID"]=$userId;
    header("Location: explore");
//    header("Location: explore");

    }
elseif (isset($emailRow) && $emailRow == 1) {
    $_SESSION["login_admin_status"] = true;
    $_SESSION["userID"]=$userId;
    header("Location: explore");
//    header("Location: explore");

}
else {

        $_SESSION["message"] = "your email or password is incorrect";
        $_SESSION["type"] = "error";
    header("Location: index");


    }



?>

