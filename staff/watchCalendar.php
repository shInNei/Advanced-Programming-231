<?php
require_once("../classes/Dbh.php");
session_start();
$DB = new dbh();
$result = $DB->select("schedule", '*', array("Doctor_ID" => $_SESSION['userid']), true);
