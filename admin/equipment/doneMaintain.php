<?php
require_once('../../classes/Dbh.php');
if(isset($_GET['id'])){
    
    $db = new Dbh();
    $conn = $db->getConnection();

    $id = $_GET['id'];
    echo var_dump($id).'<br>'; 
    $stmt = $conn->prepare("UPDATE equipment
                            SET availability = 'Available'
                            WHERE id = ?");
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $stmt->close();
    $db->insert('maintenanceHistory',array('equipID' => $id, 'maintenanceDate' => date('Y-m-d')));
    header('location:inventoryMaintenance.php');
}
