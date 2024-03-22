<?php
require_once 'Dbh.php';
class User extends Dbh{
    public function __construct()
    {
        echo "userPreRun <br>";
        parent::__construct();

        echo "userRun <br>";
    }
    public function checkLogin($email, $pw){
        $userInfo = $this->select('patients','email ='.$email.' AND pw ='.$pw);
        if(isset($userInfo) && $email === $userInfo['email'] && $pw === $userInfo['pw']){
            return $userInfo;
        }
        return false;
    }
}
