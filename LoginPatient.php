<?php

session_start();
require 'vendor/autoload.php';

$user = new User();
$user->connect();

if (isset($_POST['patientLogin'])) {
    $email = $_POST['$email'];
    $pw = Hash::makeHash($_POST['password']);
    $patientInfo = $user->select('patient','email, password');
    $auth =  

}
