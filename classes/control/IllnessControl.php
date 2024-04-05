<?php
require_once(__DIR__ . '/../Dbh.php');

class IllnessControl{
    private $db;
    function __construct(){
        $this->db = new Dbh();
    }
    public function illnessSearch($illName){
        return $this->db->select('illness','ID',array('name' => $illName));
    }
    public function illnessInsert($illName){
        $this->db->insert('illness',array('name' => $illName));
    }
}