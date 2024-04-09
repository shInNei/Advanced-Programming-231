<?php 

require_once("../classes/Dbh.php");
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$where = array (
    "staffUserName"=> $username,
    "staffPassword"=> $password
);
$DB = new dbh();
$task = $DB->select("staffs", 'task', $where);
