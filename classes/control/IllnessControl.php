<?php
require_once(__DIR__ . '/../Dbh.php');

class IllnessControl{
    private $db;
    function __construct(){
        $this->db = new Dbh();
    }
    public function illnessSearchID($illName){
        if(!isset($illName)) return false;
        if(!$this->db->select('illness',"1",array('name' => $illName))){
            $this->illnessInsert($illName);
        }
        return $this->db->select('illness','ID',array('name' => $illName))['ID'];
    }
    public function illnessInsert($illName){
        $this->db->insert('illness',array('name' => $illName));
    }
}