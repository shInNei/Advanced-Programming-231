<?php
require_once 'Dbh.php';
require_once 'Hash.php';
class User extends Dbh{
    private $userid;
    public function __construct()
    {
        parent::__construct();

    }
    public function __destruct(){
        parent::__destruct();
    }
    public function checkLogin($email, $pw){
        $where = array(
            "email" => $email,
            "pw" => $pw
        );

        $userInfo = $this->select('patients','*',$where);

        if(isset($userInfo) && $email === $userInfo['email'] && $pw === $userInfo['pw']){
            return $userInfo;
        }
        return false;
    }
    public function getUserId(){
        return $this->userid;
    }
    public function checkSLogin($username, $password){
        $where = array(
            "staffUserName" => $username,
            "staffPassword" => $password
        );

        $userInfo = $this->select('staffs','*',$where);
        if(isset($userInfo) && $username === $userInfo['staffUserName'] && $password === $userInfo['staffPassword']){
            $this->userid = $userInfo['ID'];
            return $userInfo;
        }
        return false;
    }
}
