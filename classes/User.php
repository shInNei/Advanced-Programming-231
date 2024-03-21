<?php
require 'vendor/autoload.php';

class User extends Dbh{
    public function checkLogin($email, $pw){
        $userInfo = $this->select('patients','email ='.$email.' AND pw ='.$pw);
        if($userInfo->count()){
            return 
        }
        return false;
    }
}
