<?php
require 'vendor/autoload.php';

class User extends Dbh{
    public function checkLogin($email, $pw){
        $sql = 'SELECT FROM patients WHERE email ='.$email.' AND pw ='.$pw;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }
}
