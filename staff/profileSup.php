<?php
require_once("../classes/Dbh.php");
session_start();
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$DB = new dbh();
$where = array (
    "staffUserName"=> $username,
    "staffPassword"=> $password
);
$result = $DB->select("staffs", "*", $where);