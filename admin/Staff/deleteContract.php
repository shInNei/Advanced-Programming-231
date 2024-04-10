<?php
session_start();
require_once '../../classes/Dbh.php';
$db = new Dbh();
$item = array(
    "ContractID" => $_POST['ContractID'],
    "SID" => $_POST['SID']
);
$db->delete("contract", $item);
$_SESSION['alert_message'] = 'Delete successfully!';
header('location:deleteStaff_func.php');