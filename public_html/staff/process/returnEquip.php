<?php
session_start();
require_once(__DIR__."/../../classes/control/equipmentControl.php");
if(isset($_GET['eId'])){
    $eId = $_GET['eId'];
    // echo var_dump($_GET['sID']);
    // echo var_dump($_SESSION['userid']);

    if($_GET['sID'] !== $_SESSION['userid']){
        $_SESSION['error'] = "true";
        $_SESSION['errorMsg'] = "Unauthorized Staff access";
        // echo var_dump("pien?");
        header("location:../../error.php");
        exit;
    }

    $eControl = new EquipmentControl();
    $eControl->returnEquipment($eId,$_GET['id']);   
    header('location:../viewRequest.php'); 
}