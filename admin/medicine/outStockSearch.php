<?php
    require_once('../../classes/Dbh.php');
    $db = new Dbh();
    $conn = $db->getConnection();

    // Prepare the statement
    $sql = "SELECT med.ID, med.medName, SUM(ship.quantity) as inStock
            FROM medicines AS med
            JOIN medshipment AS ship ON med.ID = ship.medID
            GROUP BY med.ID, med.medName
            HAVING SUM(ship.quantity) = 0";

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
