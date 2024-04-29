<?php
require_once("../classes/Dbh.php");
if(session_status() !== PHP_SESSION_ACTIVE) session_start();
$DB = new dbh();
$result = $DB->select("schedule", '*', array("Doctor_ID" => $_SESSION['userid']), true);
