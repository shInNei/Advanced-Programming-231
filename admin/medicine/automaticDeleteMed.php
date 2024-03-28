<?php
// Include your database connection file
require_once('../../classes/Dbh.php');
$db = new Dbh();
$conn = $db->getConnection();
if (isset($conn)) {
    // Define the current date
    $currentDate = date('Y-m-d');

    // Prepare and execute SQL query to delete expired items
    $stmt = $conn->prepare("DELETE FROM medicines WHERE expirationDate < ?");
    $stmt->bind_param("s", $currentDate);
    $stmt->execute();

    // Close the statement and database connection
    $stmt->close();
    $conn->close();
}
