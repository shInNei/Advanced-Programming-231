<?php
session_start();

require_once('../../classes/control/MedControl.php');
require_once('../../classes/Dbh.php');

// $mControl = new MedControl();
$db = new Dbh();
$conn = $db->getConnection();

$medicationID = $_GET['id'];

//Get medication Info
$medicationInfo = $db->select('medication', '*', array("ID" => $medicationID));
// echo var_dump($medicationInfo) . "<br>";

$currentDate = date('Y-m-d');

$sql = "SELECT med.ID, med.medName, SUM(ship.quantity) as inStock
            FROM medicines AS med
            JOIN medshipment AS ship ON med.ID = ship.medID
            WHERE med.ID = ? AND expirationDate >= ?
            GROUP BY med.ID, med.medName";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    // Handle query preparation error
    exit("Query preparation failed");
}

// Bind parameters
$stmt->bind_param("is", $medicationInfo['medID'], $currentDate);

// Execute the statement
if (!$stmt->execute()) {
    // Handle query execution error
    exit("Query execution failed");
}

// Get the results
$result = $stmt->get_result();

if (!$result) {
    // Handle result retrieval error
    exit("Result retrieval failed");
}

// Fetch 
$results = $result->fetch_assoc();

// check for out of stock
if($results['inStock'] < $medicationInfo['dosage']){
    $_SESSION['stockMsg-'.$medicationID] = "Inadequate ".$medicationInfo['medID']."'s quantity in Stock (Corresponding to ID = ".$medicationID.")";
    header("location:requestMed.php");
    exit;
}else{
    unset($_SESSION['stockMsg-'.$medicationID]);
}

$db->update('medication',array('isPrescribe' => 1),array('ID' => $medicationID));
header("location:requestMed.php");

// echo var_dump($results) . "<br>";