<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
require_once("../../classes/control/equipmentControl.php");
$eControl = new EquipmentControl();
$results = $eControl->equipRequestSearch(array("*"),array('approve' => "F"));
// echo var_dump($results)."<br>";
if(is_array($results)){
    foreach($results as $key => $request){
        // echo var_dump($request)."<br>";
        // echo var_dump($results[$key])."<br>";

        $equipment = $eControl->selectEquip($request['equipID']);
        // echo var_dump($equipment);
        if(is_array($equipment)){
        $results[$key]['eName'] = $equipment['equipName'];
        $results[$key]['condition'] = $equipment['con'];
        $results[$key]['available'] = $equipment['availability'];
        $results[$key]['state'] = true;
    
        }else{
            $results[$key]['state'] = false;
        }
    }
    
}
