<?php
require_once('../../classes/Dbh.php');
session_start();
$db = new Dbh();
if(isset($_POST['addEquipSubmit'])){
    $name = $_POST['equipName'];
    $tilMaintenance = $_POST['medTilMain'];

    $equipItems = array(
        'equipName' => $name,
        'tilMaintenance' => $tilMaintenance
    );

    $db->insert('equipment', $equipItems);
    header('location:addEquip.php');
}