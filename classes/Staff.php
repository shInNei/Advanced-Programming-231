<?php
class Staff
{
    private $staffUserName;
    private $staffPassword;
    private $gender;
    public function __construct($staffUserName, $staffPassword, $gender)
    {
        $this->staffUserName = $staffUserName;
        $this->staffPassword = $staffPassword;
        $this->gender = $gender;
    }
}