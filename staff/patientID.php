<?php
require_once("../classes/control/PatientControl.php");
require_once("../assets/func/debugToConsole.php");
$sControl = new PatientControl();
$id = $_GET['id']. "%";
$idArray = $sControl->searchByID($id, array("ID","fname","lname","email","gender"));
// echo var_dump($idArray)."<br>";             
// debugToConsole($idArray);
if(is_array($idArray)){
    foreach($idArray as &$patient){
        // echo var_dump($patient)."<br>";             
    
        $patient['pID'] = $patient['ID'];
        unset($patient['ID']);
    }       
}
echo json_encode($idArray);
