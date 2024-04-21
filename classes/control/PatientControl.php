<?php
require_once(__DIR__.'/../Dbh.php');
class PatientControl{
    private $db;
    function __construct(){
        $this->db = new Dbh();
    }
    function __destruct(){
        unset($this->db);
    }
    public function searchByID($id, array $items = null,$likeFlag = true){
        if($items == null){
            $item = '*';
        }else{
            $item = implode(", ", $items);
        }
        return $this->search($item, array("ID" => $id),true,$likeFlag);
    }
    public function search($items,$where = null, $allFlag = false, $likeFlag = false){
        return $this->db->select('patients',$items,$where,$allFlag,$likeFlag);
    }
    public function searchIDStandard($lname,$fname,$email,$gender){
        $pIdentifier = array(
            'lname' => $lname,
            'fname' => $fname,
            'email' => $email,
            'gender' => $gender
        );
        return $this->search("ID",$pIdentifier);
    }
    public function jsonEncodeFromArray(){
        
    }
    public function insertTR(array $items): void{
        $this->db->insert('test_result',$items);
    }
}