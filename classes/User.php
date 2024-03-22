<?php
require_once 'Dbh.php';
class User extends Dbh{
    public function __construct()
    {
        parent::__construct();

    }
    public function checkLogin($email, $pw){
        $where = array(
            $email => "email",
            $pw => "pw"
        );

        $userInfo = $this->select('patients','*',$where);
        if(isset($userInfo) && $email === $userInfo['email'] && $pw === $userInfo['pw']){
            return $userInfo;
        }
        return false;
    }
}
