<?php
require_once('../../classes/Dbh.php');
$db = new Dbh();
$conn = $db->getConnection();

$results = $db->select('medication','*',array('isPrescribe' => 0),true);
foreach ($results as $key => $medication) {
    $patientLName = findName('patients','lname',array('ID' =>$medication['patientID']),$db);
    $patientFName = findName('patients','fname',array('ID' =>$medication['patientID']),$db);
    $medName = findName('medicines','medName',array('ID' =>$medication['medID']),$db);
    $illName = findName('illness','name',array('ID' =>$medication['illID']),$db);
    
    $results[$key]['pName'] = $patientFName." ".$patientLName;
    $results[$key]['mName'] = $medName;
    $results[$key]['iName'] = $illName; 
}

function findName($table, $nameInDB, $where, Dbh $db):string
{
    $result = $db->select($table, $nameInDB, $where);

    // Log the inputs for debugging
    error_log("Table: $table, Name in DB: $nameInDB, Where: " . print_r($where, true));

    // Check if any result is returned
    if ($result && isset($result[$nameInDB])) {
        return $result[$nameInDB];
    } else {
        // Handle cases where no result is found
        error_log("No result found for $table, $nameInDB, " . print_r($where, true)); // Log for debugging
        return null;
    }
}