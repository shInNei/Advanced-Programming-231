<?php
require 'vendor/autoload.php';

class Patient
{
    private $name;
    private $email;
    private $pw;
    private $gender;
    public function __construct($email, $pw, $name, $gender)
    {
        $this->email = $email;
        $this->pw = $pw;
        $this->name = $name;
        $this->gender = $gender;
    }
}
