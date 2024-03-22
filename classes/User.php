<?php
include_once("Dbh.php");
class User extends Dbh{
    public function checkLogin($type, $firstLoca, $pw){
        $userInfo = $this->select('patients',$type. ' ='.$firstLoca.' AND pw ='.$pw);
        if($userInfo->count()){
            if($firstLoca === $userInfo[$type] && $pw === $userInfo['pw']){
                return $userInfo;
            }
        }
        return false;
    }
}
