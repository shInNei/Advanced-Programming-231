<?php
require_once("../classes/Dbh.php");
$DB = new dbh();
$where = array (
    "ID" => $_SESSION['userid']
);
$result = $DB->select("staffs", "*", $where);
$_SESSION['SID'] = $result["ID"];
$hidden = str_repeat("*", strlen($result["staffPassword"]));
$diploma = $DB->select("diploma", "*", array('SID'=> $result["ID"]), true);
$contract = $DB->select("contract", "*", array('SID'=> $result["ID"]));