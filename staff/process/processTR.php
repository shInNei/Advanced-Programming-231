<?php
require_once(__DIR__ . '/../../classes/control/PatientControl.php');

session_start();

$staffID = $_SESSION['userid'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo var_dump($_POST) . "<br>";

    $pControl = new PatientControl();

    // Process patient Info
    if (isset($_POST['pIdSelector']) && $_POST['pIdSelector'] === 'on') {
        $id = $_POST['patientID'];

        $checkID = $pControl->searchByID($id, array("1"), false);

        if (!$checkID) {
            $_SESSION['msg'] = "The ID is invalid";
            header("location:../testResult.php");
            exit;
        }
    } else {
        // echo "a<br>";
        $fname = $_POST['pFName'];
        $lname = $_POST['pLName'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];

        $id = $pControl->searchIDStandard($fName, $lname, $email, $gender);

        if (!$id) {
            $_SESSION['msg'] = "The given patient Info is invalid";
            header("location:../testResult.php");
            exit;
        }
        $id = $id['ID'];
    }
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $temp = $_POST['temp'];
    $hRate = $_POST['hRate'];
    $sPressure = $_POST['sPressure'];
    $dPressure = $_POST['dPressure'];
    
    $testResultInfo = array(
        'patientID' => $id,
        'weight' => $weight,
        'height' => $height,
        'body_temp' => $temp,
        'heart_rate' => $hRate,
        'systolic_pressure' => $sPressure,
        'diastolic_pressure' => $dPressure
    );
    $pControl->insertTR($testResultInfo);
}
header("location:../testResult.php");
