<?php
require_once("../classes/Dbh.php");
session_start();
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$where = array (
    "staffUserName"=> $username,
    "staffPassword"=> $password
);
$DB = new dbh();
$ID = $DB->select("staffs", 'ID', $where);
$result = $DB->select("schedule", '*', array("Doctor_ID" => $ID['ID']), true);
