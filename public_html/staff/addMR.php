<?php 
require_once("../classes/Dbh.php");
session_start();
$db = new Dbh();
if(isset($_POST['submit'])) {
    $patientCheck = $db->select("patients", "ID", array("ID" => $_POST["pID"]), false);
    if($patientCheck == FALSE) {
        $_SESSION['alert_message'] = "There is no patient with ID ".$_POST["pID"];
        header('location:addMedicalRecord.php');
    } else {
        $check = $db->select("schedule", "Schedule_ID", array("Patient_ID" => $_POST["pID"], "Doctor_ID" => $_POST["DID"]), false);
        if($check == FALSE) {
            $_SESSION['alert_message'] = "You do not have permission for that!";
            header('location:addMedicalRecord.php');
        } else if(strlen($_POST["prID"]) == 0 && strlen($_POST["trID"]) == 0) {
            $_SESSION['alert_message'] = "You have not put any ID!";
            header('location:addMedicalRecord.php');
        } else {
            $item = array(
                "patientID" => $_POST["pID"]
            );
            if(strlen($_POST["prID"]) != 0) {
                $checkPre = $db->select("medication", "ID", array("ID" => $_POST["prID"], "patientID" => $_POST["pID"]), false);
                if($checkPre == FALSE) {
                    $_SESSION['alert_message'] = "Please check again your prescription's ID!";
                    header('location:addMedicalRecord.php');
                } 
                $item['medicationID'] = $_POST["prID"];
            } 
            if(strlen($_POST["trID"]) != 0) {
                $checkTest = $db->select("test_result", "ID", array("ID" => $_POST["trID"], "patientID" => $_POST["pID"]), false);
                if($checkTest == FALSE) {
                    $_SESSION['alert_message'] = "Please check again your test's result ID!";
                    header('location:addMedicalRecord.php');
                } 
                $item['test_result'] = $_POST["trID"];
            } 
                $db->insert("medicalrecord", $item);
                $_SESSION['alert_message'] = "Add successfully!";
                header('location:addMedicalRecord.php');
        }
    }
}