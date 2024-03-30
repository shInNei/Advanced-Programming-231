<?php
require_once('../../classes/Dbh.php');
$db = new Dbh();

$conn = $db->getConnection();

// Get current date
$currentDate = date('Y-m-d');

// Prepare the statement
$sql = 'SELECT m.ID, m.medName,s.Lot,s.quantity,s.expirationDate
        FROM medshipment AS s
        INNER JOIN medicines AS m ON s.medID = m.ID
        WHERE s.expirationDate <= ?';

$stmt = $conn->prepare($sql);
$stmt->bind_param("s",$currentDate);

// Execute the statement
$stmt->execute();

// Get the results
$result = $stmt->get_result();

// Fetch all rows
$results = $result->fetch_all(MYSQLI_ASSOC);
// Free result and close statement
$stmt->close();
?>