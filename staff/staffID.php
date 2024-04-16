<?php
require_once("../classes/control/StaffControl.php");
require_once("../assets/func/debugToConsole.php");
$sControl = new StaffControl();
$id = $_GET['id']. "%";
$idArray = $sControl->searchByID($id, array("ID","fname","lname","email","task","startDate"));
// echo var_dump($idArray)."<br>";             
// debugToConsole($idArray);
if(is_array($idArray)){
    foreach($idArray as &$staff){
        // echo var_dump($patient)."<br>";             
    
        $staff['sID'] = $staff['ID'];
        $staff['role'] = $staff['task'];
        unset($staff['ID']);
        unset($staff['task']);        
    }
}
echo json_encode($idArray);
