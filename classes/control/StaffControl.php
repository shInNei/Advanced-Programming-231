<?php
require_once(__DIR__.'/../Dbh.php');
class StaffControl{
    private $db;
    function __construct(){
        $this->db = new Dbh();
    }
    public function searchByID($id, array $where,$likeFlag = true){
        $item = implode(", ", $where);
        return $this->search($item, array("ID" => $id),true,$likeFlag);
    }
    public function search($items,$where = null, $allFlag = false, $likeFlag = false){
        return $this->db->select('staffs',$items,$where,$allFlag,$likeFlag);
    }
    public function addLeaveRequest($items){
        $this->db->insert('leaveregister',$items);
    }
}