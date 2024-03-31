<?php
    require_once('../../classes/Dbh.php');
    $db = new Dbh();
    $conn = $db->getConnection();

    // Sanitize input (e.g., trim whitespace)
    $equipName = trim($_POST['equipName']) . "%";
    
    // Prepare the statement
    $sql = "SELECT * 
            FROM equipment AS equip
            WHERE equipName LIKE ?";

    $stmt = $conn->prepare($sql);

    // Bind parameters
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
