<?php
session_start();
require_once('../classes/Dbh.php');
require_once('../classes/control/IllnessControl.php');

if (isset($_POST['prescribe'])) {
    $db = new Dbh();
    $doctorID = $_SESSION['userid'];
    echo var_dump($_POST)."<br>";
    $patientIdentifier = array(
        'fName' => $_POST['pFName'],
        'lName' => $_POST['pLName'],
        'gender' =>$_POST['gender'],
        'email' => $_POST['email']
    );
    $p = $db->select('patients','ID',$patientIdentifier);
    $pID = $p['ID'];

    //INSERT ILLNESS
    $iControl = new IllnessControl();
    $iName = $_POST['pIllness'];

    $illnessID = ($iControl->illnessSearch($iName))['ID'];
    if(!$illnessID){
        $iControl->illnessInsert($iName);
        $illnessID = ($iControl->illnessSearch($iName))['ID'];
    }
    if(isset($_POST['drugName'])){
        $medIdentifier = array(
            'medName' => $_POST['drugName'],
            'medType' => $_POST['drugType'],
        );
        $med = $db->select('medicines','ID',$medIdentifier);
        $medID = $med['ID'];

        $medicationItems = array(
            'patientID' => $pID,
            'doctorID' =>$doctorID,
            'medID' => $medID,
            'dosage' => $_POST['drugDosage'],
            'prescribeDate' => date('Y-m-d')
        );

        $db->insert('medication',$medicationItems);
        
        //Document cure
        $cureItem = array("illID" => $illnessID,"medID" => $medID);
        if(!$db->select('cure','1',$cureItem)){
            $db->insert('cure', $cureItem);
        }

    }
}   
header('location:../prescription.php');
