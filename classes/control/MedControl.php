<?php
require_once('../Dbh.php');
class MedControl
{
    private $db;
    function __construct()
    {
        $db = new Dbh();
    }
    public function medSearch($medName, )
    {
        $conn = $this->db->getConnection();

        $medName.='%';

        $currentDate = date('Y-m-d');
        // Prepare the statement
        $sql = "SELECT med.ID, med.medName, SUM(ship.quantity) as inStock
            FROM medicines AS med
            JOIN medshipment AS ship ON med.ID = ship.medID
            WHERE medName LIKE ? AND expirationDate >= ?
            GROUP BY med.ID, med.medName";

        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bind_param("ss", $medName, $currentDate);

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
