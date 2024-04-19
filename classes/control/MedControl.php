<?php
require_once(__DIR__ . '/../Dbh.php');
class MedControl
{
    private $db;
    function __construct()
    {
        $this->db = new Dbh();
    }
    public function update($items,$where,$isMed = true){
        $this->db->update(($isMed)? 'medicines' : 'medshipment',$items,$where);
    }
    public function searchByID(array $items, $id,$allFlag = false ,$likeFlag = false){
        return $this->search($items, array('ID' => $id), $allFlag,$likeFlag);
    }
    public function search(array $items, array $where = null,$allFlag = false ,$likeFlag = false){
        $itemStr = implode(", ",$items);
        return $this->db->select('medicines',$itemStr, $where, $allFlag,$likeFlag);

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
    public function pushMedication($doctorID,$pID,$mID,$dosage,$iID){
        $medicationInfo = array(
            'doctorID' => $doctorID,
            'patientID' => $pID,
            'medID' => $mID,
            'dosage' => $dosage,
            'illID' => $iID,
            'prescribeDate' => date('Y-m-d')
        );
        return $this->db->insert('medication',$medicationInfo);
    }
    public function medicationSearch(array $items, array $where, $allFlag = false, $likeFlag = false){
        $itemStr = implode(", ",$items);
        return $this->db->select('medication',$itemStr,$where,$allFlag,$likeFlag);
    }
}
