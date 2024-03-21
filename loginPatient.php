<?php

session_start();
require 'vendor/autoload.php';

$user = new User();
$user->connect();

if (isset($_POST['patientLogin'])) {
    $email = $_POST['$email'];
    $pw = $_POST['password'];
    $user->checkLogin($email,$pw);
}
