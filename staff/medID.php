<?php
require_once("../classes/control/MedControl.php");
require_once("../assets/func/debugToConsole.php");
$sControl = new MedControl();
$id = $_GET['id']. "%";
$idArray = $sControl->searchByID(array("ID","medName","medType"),$id,true,true);
// echo var_dump($idArray)."<br>";             
// debugToConsole($idArray);
if(is_array($idArray)){
    foreach($idArray as &$medicine){
        // echo var_dump($patient)."<br>";             
    
        $medicine['mID'] = $medicine['ID'];
        $medicine['medName'].="-".$medicine["medType"];
        unset($medicine['ID']);
        unset($medicine['medType']);
    }
}
echo json_encode($idArray);
