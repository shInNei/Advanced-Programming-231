<?php
require_once(__DIR__.'/../Dbh.php');
class StaffControl{
    private $db;
    function __construct(){
        $this->db = new Dbh();
    }
    public function search($items,$where){
        return $this->db->select('staffs',$items,$where);
    }
    public function addLeaveRequest($items){
        $this->db->insert('leaveregister',$items);
    }
}