<?php
require_once(__DIR__ . '/../Dbh.php');
class EquipmentControl
{
    private $db;
    function __construct()
    {
        $this->db = new Dbh();
    }
    public function equipmentSearchMax()
    {

        $conn = $this->db->getConnection();

        // Sanitize input (e.g., trim whitespace)

        // Prepare the statement
        $sql = "SELECT equip.ID, equip.equipName, equip.noUsage AS maxUsage
            FROM equipment AS equip 
            JOIN (
                SELECT equipName, MAX(noUsage) AS max_noUsage
                FROM equipment
                WHERE noUsage < tilMaintenance
                GROUP BY equipName
                ) AS subquery
            ON equip.equipName = subquery.equipName AND equip.noUsage = subquery.max_noUsage";

        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            throw new Exception("Error preparing statement: " . $conn->error);
        }
        // Bind parameters

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
