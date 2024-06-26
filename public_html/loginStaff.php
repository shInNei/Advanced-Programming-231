<?php
session_start();
require_once 'classes/User.php';
$user = new User();
if (isset($_POST['staff-login'])) {
    $username = $_POST['staffUserName'];
    $password = $_POST['staffPassword'];
    $auth = $user->checkSLogin($username, $password);
    
    if($auth) {
        $_SESSION['role'] = $auth['task'];
        $_SESSION['login'] = true;
        $_SESSION['userid'] = $user->getUserId();
        header('location:staff/profile.php');
    } else {
        $_SESSION['message'] = "Invalid Username or password";        
        header('location:index.php?tab=doctor-nav');
        exit;
    }
} else {
    header('location:index.php?tab=doctorTab');
}
