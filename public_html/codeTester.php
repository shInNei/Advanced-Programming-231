<?php
require_once("classes/control/equipmentControl.php");
require_once("assets/func/debugToConsole.php");
$eControl = new EquipmentControl();
$id = "2%";
$idArray = $eControl->searchByID($id, array("id","equipName"));
// echo var_dump($idArray)."<br>";             
// debugToConsole($idArray);

foreach($idArray as &$equipment){
    // echo var_dump($patient)."<br>";             

    $equipment['eID'] = $equipment['id'];
    unset($equipment['id']);
}

echo json_encode($idArray);



