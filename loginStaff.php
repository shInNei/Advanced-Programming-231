<?php
session_start();
require_once 'classes/User.php';
$user = new User();
if (isset($_POST['staff-login'])) {
    $username = $_POST['staffUserName'];
    $password = $_POST['staffPassword'];
    $auth = $user->checkSLogin($username, $password);
    if($auth == true) {
        $_SESSION['loggedin'] = $auth;
        header('location:staffTab.php');
    } else {        
        header('location:index.php');
    }
} else {
    header('location:index.php');
}