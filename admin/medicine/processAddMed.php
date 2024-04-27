<?php
session_start();

// require_once('../../classes/Med.php');
require_once('../../classes/control/MedControl.php');
require_once('../../classes/Dbh.php');
$db = new Dbh();
if (isset($_POST['addMedSubmit'])) {
    $name = strtolower($_POST['medName']);
    $lot = $_POST['medLot'];
    $price = $_POST['medPrice'];
    $type = $_POST['medType'];
    $quantity = $_POST['medQuantity'];
    $expireDate = date_create_from_format("Y-m-d", $_POST['medExpireDate']);
    $manuDate = date_create_from_format("Y-m-d", $_POST['medManuDate']);

    $conn = $db->getConnection();
    $mControl = new MedControl();

    $medicineItem = array(
        'medName' => $name,
        'medType' => $type
    );
    $result = $db->select('medicines', 'ID', $medicineItem);
    if (!$result) {
        // $medicineItem['restockPoint'] = $_POST['restockPoint'];
        $db->insert('medicines', $medicineItem);
        $result = $db->select('medicines', 'ID', $medicineItem);
    }
    $mControl->update(array('price' => $price),array('ID' => $result['ID']));
    $shipmentItem = array(
        'Lot' => $lot,
        'quantity' => $quantity,
        'expirationDate' => date_format($expireDate, 'Y-m-d'),
        'manufactureDate' => date_format($manuDate, 'Y-m-d'),
        'medID' => $result['ID']
    );
    echo var_dump($lot)."<br>";
    echo var_dump($result['ID'])."<br>";

    $result = $db->select('medshipment', '*', array('Lot' => $lot,'medID' => $result['ID']));



    if ($result) {
        if (($result['expirationDate'] != date_format($expireDate, 'Y-m-d') || $result['manufactureDate'] != date_format($manuDate, 'Y-m-d'))) {
            $_SESSION['msg'] = "Manufacture date or expiration date don't match with Lot ID";
            header('location:addMed.php?tab=add-nav');
        }else

        $db->updateAmount('medshipment', array('quantity' => $quantity), array('Lot' => $lot));
    } else {
        $db->insert('medshipment', $shipmentItem);
    }
    unset($_SESSION['messageLot']) ;
    header('location:addMed.php');
}
