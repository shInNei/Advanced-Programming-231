<?php
session_start();

require_once('../../classes/Med.php');
require_once('../../classes/Dbh.php');
$db = new Dbh();
if (isset($_POST['addMedSubmit'])) {
    $name = $_POST['medName'];
    $lot = $_POST['medLot'];
    $price = $_POST['medPrice'];
    $type = $_POST['medType'];
    $quantity = $_POST['medQuantity'];
    $expireDate = date_create_from_format("Y-m-d",$_POST['medExpireDate']);
    $manuDate = date_create_from_format("Y-m-d",$_POST['medManuDate']);

    $conn = $db->getConnection();

    $medicineItem = array(
        'medName'=>$name,
        'price' => $price,
        'medType' => $type
    );
    $result = $db->select('medicines','ID',$medicineItem);
    if(!$result){
        $db->insert('medicines',$medicineItem);
    }

    $shipmentItem = array(
        'Lot' => $lot,
        'quantity' => $quantity,
        'expirationDate' => date_format($expireDate,'Y-m-d'),
        'manufactureDate' => date_format($manuDate,'Y-m-d'),
        'medID' => $id
    );
    $result = $db->select('medshipment','*',array('Lot' => $lot));
    echo var_dump($result)."<br>";
    if($result){
        $db->updateAmount('medshipment',array('quantity' => $quantity),array('Lot' => $lot));
    }else{
        $db->insert('medshipment',$shipmentItem);
    }
    header('location:addMed.php');
}
