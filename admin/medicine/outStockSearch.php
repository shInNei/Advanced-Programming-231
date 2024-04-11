<?php
require_once('../../classes/Dbh.php');
$db = new Dbh();
$conn = $db->getConnection();

// Prepare the statement
$sql = "SELECT med.ID, med.medName, SUM(ship.quantity) as inStock
FROM medicines AS med
JOIN medshipment AS ship ON med.ID = ship.medID
WHERE ship.expirationDate > CURRENT_DATE()
GROUP BY med.ID, med.medName
HAVING SUM(ship.quantity) <= 100";
try {
    //code...
    if($conn){
        $stmt = $conn->prepare($sql);
    }else {
        throw new Exception("Lose Connection");
    }
    
    
    // Execute the statement
    $stmt->execute();

    // Get the results
    if (!$stmt) {
        throw new Exception("Failed to prepare SQL statement: " . $conn->error);
    }
    $result = $stmt->get_result();
    if ($result) {
        // Fetch all rows and store them in $results1
        $results1 = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        throw new Exception("Failed to fetch results from the database.");
    }
    // Fetch all rows
    
    
    // Free result and close statement
    $stmt->close();
} catch (\Throwable $th) {
    //throw $th;
    echo $th->getMessage();
    
}
