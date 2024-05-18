<?php
require_once('../../classes/Dbh.php');
if(isset($_GET['Lot'])){
    
    $db = new Dbh();
    $conn = $db->getConnection();

    $lot = $_GET['Lot'];
    // echo var_dump($lot).'<br>'; 
    $stmt = $conn->prepare("DELETE FROM `medshipment` WHERE `medshipment`.`Lot` = ?");
    $stmt->bind_param("s",$lot);
    $stmt->execute();
    $stmt->close();
    header('location:inventoryMaintenance.php');
}
