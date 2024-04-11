<?php
session_start();
require_once '../../classes/Dbh.php';
$db = new Dbh();
$item = array(
    "DIPID" => $_POST['DIPID'],
    "SID" => $_POST['SID']
);
$db->delete("diploma", $item);
$_SESSION['alert_message'] = 'Delete successfully!';
header('location:deleteStaff_func.php');