<?php
session_start();
include('classes/Users.php');
$user = new User();
if (isset($_POST['staff-login'])) {
    $username = $_POST['staffUserName'];
    $password = $_POST['name="staffPassword'];
    $auth = $user->checkLogin($username, $password);
    if($auth == true) {
        session_regenerate_id();
        $_SESSION['loggedin'] = $auth;
        $_SESSION['staffName'] = $username;
        header('location:staffTab.php');
    } else {        
        header('location:index.php');
    }
} else {
    header('location:index.php');
}