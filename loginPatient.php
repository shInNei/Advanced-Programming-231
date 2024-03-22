<?php

session_start();
include_once('classes/User.php');
$user = new User();
$user->connect();

if (isset($_POST['patientLogin'])) {
    $email = $_POST['email'];
    $pw = $_POST['password'];
    $auth = $user->checkLogin($email,$pw);
    if($auth){
        $_SESSION['user'] = $auth;
        header('location:patientTab.php');
    }
    else{
        $_SESSION['message'] = "Invalid Username or password";
        header('location:index.php');
    }
}
