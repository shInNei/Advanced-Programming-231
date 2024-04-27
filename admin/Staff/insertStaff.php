<?php
require_once '../../classes/Dbh.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$insertDB = new dbh();
$findUsername = $insertDB->select('staffs', 'staffUserName', array('staffUserName' => $_POST['Username']));
if($findUsername) {
    $_SESSION['alert_message'] = 'There is already a username '.$_POST['Username'].'. Please enter another username.';
    header('location:addStaff_func.php');
} else if(!ctype_digit($_POST["phoneNumber"]) || strlen($_POST["phoneNumber"]) < 6 || strlen($_POST["phoneNumber"]) > 11) {
    $_SESSION['alert_message'] = 'Please use valid phone number.';
    header('location:addStaff_func.php');
} else {
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
$_SESSION['alert_message'] = 'Add successfully!';
header('location:addStaff_func.php');
}
}