<?php
session_start();
require_once '../../classes/Dbh.php';
$resetDB = new dbh();
$resetDB->resetTable("staffs");
$_SESSION['alert_message'] = 'Table truncated successfully!';
header('location:deleteStaff_func.php');