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
$_SESSION['SID'] = $result["ID"];
$hidden = str_repeat("*", strlen($result["staffPassword"]));
$diploma = $DB->select("diploma", "*", array('SID'=> $result["ID"]), true);
$contract = $DB->select("contract", "*", array('SID'=> $result["ID"]));