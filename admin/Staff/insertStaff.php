<?php
require_once '../../classes/Dbh.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$insertDB = new dbh();
$prof = $_POST["Profession"];
$ID =  uniqid($_POST["Department"], true);
// $DepId = $_POST["Department"];
$items = array(
    "ID"=> $ID,
    "staffUserName"=> $_POST['Username'],
    "fname"=> $_POST['fName'],
    "lname"=> $_POST['lName'],
    "email"=> $_POST["email"],
    "prof"=> $_POST["Department"],
    "staffPassword"=> $_POST["staffPassword"],
    "gender"=> $_POST["Gender"],
    "task"=> $_POST["Profession"],
    "startDate"=> $_POST["startDate"],
    "phoneNumber"=> $_POST["phoneNumber"],
);
$insertDB->insert("staffs", $items);
header('location:addStaff.php');
}