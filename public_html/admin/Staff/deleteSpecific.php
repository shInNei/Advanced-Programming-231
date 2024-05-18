<?php
session_start();
require_once '../../classes/Dbh.php';
$resetDB = new dbh();
$item = array(
    "ID"=> $_POST['ID'],
);
$resetDB->delete("staffs", $item);
$_SESSION['alert_message'] = 'Delete successfully!';
header('location:deleteStaff_func.php');