<?php
session_start();
require_once(__DIR__.'/../../classes/control/PatientControl.php');
require_once(__DIR__.'/../../classes/control/MedControl.php');
require_once(__DIR__.'/../../classes/control/IllnessControl.php');
require_once(__DIR__."/../../assets/func/debugToConsole.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $doctorID = $_SESSION['userid'];
    $pControl = new PatientControl();

    // Process patient Info
    if (isset($_POST['pIdSelector']) && $_POST['pIdSelector'] === 'on') {
        $pId = $_POST['patientID'];

        $checkID = $pControl->searchByID($pId, array("1"), false);
        echo var_dump($checkID);
        if (!$checkID) {
            $_SESSION['prescribe_msg'] = "The ID is invalid";
            echo var_dump($_SESSION);
            header("location:../prescription.php");
            exit;
        }
    } else {
        echo "a<br>";
        $fname = $_POST['pFName'];
        $lname = $_POST['pLName'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];

        $id = $pControl->searchIDStandard($fName, $lname, $email, $gender);

        if (!$id) {
            $_SESSION['prescribe_msg'] = "The given patient Info is invalid";
            header("location:../prescription.php");
            exit;
        }
        $pId = $id['ID'];
    }

    unset($pControl);
    // add Illness if not exist
    $iControl = new IllnessControl();


    echo var_dump($pId)."<br>";
    

    //INSERT ILLNESS
    $iControl = new IllnessControl();
    $iName = $_POST['illness'];
    $iID = $iControl->illnessSearchID($iName);
    echo var_dump($iID)."<br>";

    //FIND MEDICINE
    $mControl = new MedControl();
    if (isset($_POST['mIdSelector']) && $_POST['mIdSelector'] === 'on') {
        $mId = $_POST['mID'];

        $checkID = $mControl->searchByID(array("1"), $mId, false);

        if (!$checkID) {
            $_SESSION['prescribe_msg'] = "The medicine ID is invalid";
            header("location:../prescription.php");
            exit;
        }
    }else {
        // echo "a<br>";
        $mInfo = $_POST['medName'];
        $mInfo = explode('-',$mInfo);

        $id = $mControl->search(array('ID'),array('medName' => $mInfo[0],'medType' => $mInfo[1]));

        if (!$id) {
            $_SESSION['prescribe_msg'] = "The given medicine Info is invalid";
            header("location:../prescription.php");
            exit;
        }
        $mId = $id['ID'];
    }
    echo var_dump($mId)."<br>";

    echo var_dump($_POST)."<br>";
    // FORM MEDICATION ENTITY
    $mControl->pushMedication($doctorID,$pId,$mId,$_POST['MedDosage'],$iID);

    // if(isset($_POST['drugName'])){
    //     $medIdentifier = array(
    //         'medName' => $_POST['drugName'],
    //         'medType' => $_POST['drugType'],
    //     );
    //     $med = $db->select('medicines','ID',$medIdentifier);
    //     $medID = $med['ID'];

    //     $medicationItems = array(
    //         'patientID' => $pID,
    //         'doctorID' =>$doctorID,
    //         'medID' => $medID,
    //         'dosage' => $_POST['drugDosage'],
    //         'prescribeDate' => date('Y-m-d')
    //     );

    //     $db->insert('medication',$medicationItems);
        
    //     //Document cure
    //     $cureItem = array("illID" => $illnessID,"medID" => $medID);
    //     if(!$db->select('cure','1',$cureItem)){
    //         $db->insert('cure', $cureItem);
    //     }

    // }
}   
// if (isset($_SESSION['prescribe_msg'])) unset($_SESSION['prescribe_msg']);
header('location:../prescription.php');
