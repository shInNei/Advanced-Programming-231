<?php
session_start();
require_once(__DIR__."/../../classes/control/equipmentControl.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $eControl = new EquipmentControl();
    $eRInfo = $eControl->equipRequestSearch(array("equipID"),array("ID" => $id),false);
    $eInfo = $eControl->search("con, availability",array("id" => $eRInfo['equipID']));
    $con = $eInfo['con'];
    $avail = $eInfo['availability'];
    // DOUBLE CHECK
    if($con !== "Good" || $avail !== "Available"){
        $_SESSION['msg'] = "Unavailable equipment";
        header("location:request.php");
        exit;
    }
    // echo var_dump($eInfo)."<br>";

    // update status
    $eControl->approveER($id,$eRInfo['equipID']);

    header('location:request.php');
}