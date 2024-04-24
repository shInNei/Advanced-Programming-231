<?php
session_start();
require_once 'classes/User.php';
$user = new User();

if (isset($_POST['patient-login'])) { 
    $email = $_POST['email'];
    $pw = $_POST['password'];   
    $auth = $user->checkLogin($email,$pw);
    if($auth){
        $_SESSION['user'] = $auth;
        $_SESSION['loginP'] = true;
        $_SESSION['email'] = $email;
        header('location:patient/dashboard.php');
    }
    else{
        $_SESSION['message'] = "Invalid Username or password";
        header('location:index.php');
    }
}
else{
    header('location:index.php');
}

