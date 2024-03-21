<?php

session_start();
require 'vendor/autoload.php';

$db = new Dbh();

if (isset($_POST['patientLogin'])) {
    $email = $_POST['$email'];
    $pw = Hash::makeHash($_POST['password']);
}
