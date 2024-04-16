<?php
require_once(__DIR__ . '/../Dbh.php');
class EquipmentControl
{
    private $db;
    function __construct()
    {
        $this->db = new Dbh();
    }
    public function searchByID($id, array $items = null,$likeFlag = true){
        if($items == null){
            $item = '*';
        }else{
            $item = implode(", ", $items);
        }
        
        return $this->search($item, array("ID" => $id,"con" => "Good", "availability" => "Available"),true,$likeFlag);
    }
    public function search($items,$where = null, $allFlag = false, $likeFlag = false){
        return $this->db->select('equipment',$items,$where,$allFlag,$likeFlag);
    }
    public function selectEquip($ID){
        return $this->db->select("equipment","*",array('id' => $ID,'con' => "Good",'availability'=>"Available"));
    }
    public function equipRequestSearch(){
        return $this->db->select("equiprequest",'*');
    }
    public function addEquipRequest(array $items){
        return $this->db->insert('equiprequest',$items);
    }
    public function equipmentSearchMax($equipName, $allFlag = false)
    {

        try {
            //code...
            $conn = $this->db->getConnection();
            
            // Prepare the statement
            $sql = "SELECT equip.ID, equip.equipName, equip.noUsage AS maxUsage
                FROM equipment AS equip 
                JOIN (
                    SELECT equipName, MAX(noUsage) AS max_noUsage
                    FROM equipment
                    WHERE con = 'Good'
                    GROUP BY equipName
                    ) AS subquery
                ON equip.equipName = subquery.equipName AND equip.noUsage = subquery.max_noUsage
                WHERE equip.equipName = ?";

            $stmt = $conn->prepare($sql);
            if (!$stmt) {
                throw new Exception("Error preparing statement: " . $conn->error);
            }
            // Bind parameters
            $stmt->bind_param("s",$equipName);
            // Execute the statement
            $stmt->execute();

            // Get the results
            $result = $stmt->get_result();

            // Fetch all rows
            $results = $result->fetch_assoc();

            // Free result and close statement
            $stmt->close();
            return $results;
        } catch (\Throwable $th) {
            //throw $th;
            echo $th;
        }
    }
}
