<?php
session_start();
require_once '../../classes/Dbh.php';
$resetDB = new dbh();
$item = array(
    "fname"=> $_POST['fName'],
    "lname"=> $_POST['lName'],
    "prof"=> $_POST["Department"],
    "task"=> $_POST["Profession"]
);
$resetDB->delete("staffs", $item);
$_SESSION['alert_message'] = 'Delete successfully!';
header('location:deleteStaff_func.php');