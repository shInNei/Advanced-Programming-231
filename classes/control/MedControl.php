<?php
require_once(__DIR__ . '/../Dbh.php');
class MedControl
{
    private $db;
    function __construct()
    {
        $this->db = new Dbh();
    }
    public function medSearch()
    {
        $conn = $this->db->getConnection();


        $currentDate = date('Y-m-d');
        // Prepare the statement
        $sql = "SELECT med.ID, med.medName, SUM(ship.quantity) as inStock
            FROM medicines AS med
            JOIN medshipment AS ship ON med.ID = ship.medID
            WHERE expirationDate >= ?
            GROUP BY med.ID, med.medName";

        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bind_param("s", $currentDate);

        // Execute the statement
        $stmt->execute();

        // Get the results
        $result = $stmt->get_result();

        // Fetch all rows
        $results = $result->fetch_all(MYSQLI_ASSOC);
        // Free result and close statement
        $stmt->close();

        return $results;
    }
}
