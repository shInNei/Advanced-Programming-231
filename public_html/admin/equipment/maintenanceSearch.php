<?php
require_once('../../classes/Dbh.php');
$db = new Dbh();

$conn = $db->getConnection();

// Prepare the statement
$sql = 'SELECT *
        FROM equipment
        WHERE (availability <> "In maintain") AND (con = "Poor" OR noUsage >= tilMaintenance)';

$stmt = $conn->prepare($sql);

// Execute the statement
$stmt->execute();

// Get the results
$result = $stmt->get_result();

// Fetch all rows
$results = $result->fetch_all(MYSQLI_ASSOC);

// Free result and close statement
$stmt->close();
?>