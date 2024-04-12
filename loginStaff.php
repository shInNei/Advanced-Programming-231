<?php
session_start();
require_once 'classes/User.php';
$user = new User();
if (isset($_POST['staff-login'])) {
    $username = $_POST['staffUserName'];
    $password = $_POST['staffPassword'];
    $auth = $user->checkSLogin($username, $password);
    if($auth == true) {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['login'] = true;
        $_SESSION['userid'] = $user->getUserId();
        header('location:staff/staffHome.php');
    } else {
        $_SESSION['message'] = "Invalid Username or password";        
        header('location:index.php');
    }
} else {
    header('location:index.php');
}