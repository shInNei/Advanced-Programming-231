<?php
require_once('../../classes/Dbh.php');
$db = new Dbh();

$conn = $db->getConnection();

$equipName = '%' . trim($_POST['equipName']) . '%';

// Prepare the statement
$sql = 'SELECT mh.id,mh.maintenanceDate,e.equipName,e.id as equipID
        FROM maintenanceHistory AS mh
        JOIN equipment AS e ON mh.equipID = e.id
        WHERE  e.equipName LIKE ?';
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $equipName);

// Execute the statement
$stmt->execute();

// Get the results
$result = $stmt->get_result();

// Fetch all rows
$results = $result->fetch_all(MYSQLI_ASSOC);
// Free result and close statement
$stmt->close();
?>