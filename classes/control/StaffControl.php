<?php
require_once(__DIR__.'/../Dbh.php');
class StaffControl {
    private $db;
    function __construct(){
        $this->db = new Dbh();
    }
    public function searchByID($id, array $items,$likeFlag = true){
        $item = implode(", ", $items);
        return $this->search($item, array("ID" => $id),true,$likeFlag);
    }
    public function search($items,$where = null, $allFlag = false, $likeFlag = false){
        return $this->db->select('staffs',$items,$where,$allFlag,$likeFlag);
    }
    public function addLeaveRequest($items){
        $this->db->insert('leaveregister',$items);
    }
    public function searchIDStandard($fname, $email, $lname,$role,$sDate){
        $staffIdentifier = array(
            'fname' => $fname,
            'lname' => $lname,
            'email' =>$email,
            'task' => $role,
            'startDate' => $sDate
        );
        return $this->search("ID",$staffIdentifier);
    }
    public function takeLeave($id){
        $this->db->updateAmount('staffs',array('annualLeaveDay' => -1),array('ID' => $id));
    }
}