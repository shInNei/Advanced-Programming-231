<?php
session_start();
require_once('../classes/Dbh.php');
$id = $_SESSION['userid'];
$db = new Dbh();
$db->update('staffs',array('availability' => 'available'),array('ID' => $id));
header('location:profile.php');
