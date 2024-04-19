<?php
require_once(__DIR__ . '/../../classes/control/equipmentControl.php');
require_once(__DIR__ . '/../../classes/control/PatientControl.php');

session_start();

$staffID = $_SESSION['userid'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // echo var_dump($_POST) . "<br>";

    $pControl = new PatientControl();

    // Process patient Info
    if (isset($_POST['pIdSelector']) && $_POST['pIdSelector'] === 'on') {
        $id = $_POST['patientID'];

        $checkID = $pControl->searchByID($id, array("1"), false);

        if (!isset($checkID)) {
            $_SESSION['eRequest_msg'] = "The ID is invalid";
            header("location:../requestEquip.php");
            exit;
        }
    } else {
        echo "a<br>";
        $fname = $_POST['pFName'];
        $lname = $_POST['pLName'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];

        $id = $pControl->searchIDStandard($fName, $lname, $email, $gender);

        if (!isset($id)) {
            $_SESSION['eRequest_msg'] = "The given patient Info is invalid";
            header("location:../requestEquip.php");
            exit;
        }
        $id = $id['ID'];
    }

    // echo var_dump($id);
    // echo var_dump($_POST['eIdSelector']);

    unset($pControl);
    //Process Equip Info

    $eControl = new EquipmentControl();

    if (isset($_POST['eIdSelector']) && $_POST['eIdSelector'] === 'on') {
        $eid = $_POST['eID'];

        $checkID = $eControl->searchByID($eid, array("1"), false);

        if (!isset($checkID)) {
            $_SESSION['eRequest_msg'] = "The equipment ID is invalid";
            header("location:../requestEquip.php");
            exit;
        }
    } else {
        $eName = $_POST['eName'];

        $equipArray = $eControl->equipmentSearchMax($eName);
        if(!isset($equipArray)){
            $_SESSION['eRequest_msg'] = "The given equipment name is unavailable";
            header("location:../requestEquip.php");
            exit;
        }
        // echo var_dump($equipArray)."<br>";
        $eid = $equipArray["ID"];
    }


    $requestDate = $_POST['requestDate'];
    // echo var_dump($requestDate) . "<br>";

    $eRItems = array(
        'equipID' => $eid,
        'patientID' => $id,
        'staffID' => $staffID,
        'requestDate' => $requestDate,
    );
    $eControl->addEquipRequest($eRItems);
}
header("location:../requestEquip.php");
