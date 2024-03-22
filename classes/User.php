<?php
include_once("Dbh.php");
class User extends Dbh{
    public function checkLogin($email, $pw){
        $userInfo = $this->select('patients','email ='.$email.' AND pw ='.$pw);
        if($userInfo->count()){
            if($email === $userInfo['email'] && $pw === $userInfo['pw']){
                return $userInfo;
            }
        }
        return false;
    }
}
