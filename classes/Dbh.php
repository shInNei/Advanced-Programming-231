<?php

class Dbh
{
    private $conn;
    private $host = "localhost";
    private $dbName = "hospital";
    public function connect()
    {
        try {
            //code...
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbName);
            $sql = "CREATE DATABASE hospital";
            $this->conn->exec($sql);
            echo "DATABASE create successful <br>";
            $this->createPatientTable();
            $this->createDoctorTable();
            return $this->conn;
        } catch (PDOException $e) {
            //throw $th;
            echo $sql . "<br>" . $e->getMessage();
        }
    }
    public function select($table, $items = '*', $where = null, $order = null)
    {
        $sql = 'SELECT' . $items . 'FROM' . $table;

        if ($where != null)
            $sql .= ' WHERE ' . $where;

        if ($order != null)
            $sql .= ' ORDER BY ' . $order;
        $result = $this->conn->query($sql);

        if ($result) {
            $arrResult = $result->fetchAll(MYSQLI_ASSOC);
            return $arrResult;
        }
        return false;
    }
    public function createPatientTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS patients (
            ID INT(10),
            fName VARCHAR(30),
            lName VARCHAR(30),
            email VARCHAR(50),
            phoneNum VARCHAR(15),
            gender ENUM('M', 'F'),
            PRIMARY KEY (ID)
            )";
        $this->conn->exec($sql);
        echo "Table patients created successfully";
    }
    public function createDoctorTable()
    {
    }
}
