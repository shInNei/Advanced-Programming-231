<?php 

require_once("../classes/Dbh.php");
$where = array (
    "ID" => $_SESSION['userid']
);
$DB = new dbh();
$task = $DB->select("staffs", 'task', $where);
