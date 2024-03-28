<?php
    require_once('../../classes/Dbh.php');
    $db = new Dbh();
    $conn = $db->getConnection();

    // Sanitize input (e.g., trim whitespace)
    $medName = trim($_POST['medName']) . "%";
    // Prepare the statement
    $stmt = $conn->prepare("SELECT * FROM `medicines` WHERE `medName` LIKE ?");

    // Bind parameters
    $stmt->bind_param("s", $medName);

    // Execute the statement
    $stmt->execute();

    // Get the results
    $result = $stmt->get_result();

    // Fetch all rows
    $results = $result->fetch_all(MYSQLI_ASSOC);
    // Free result and close statement
    $stmt->close();
?>
