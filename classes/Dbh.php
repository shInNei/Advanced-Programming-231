<?php
class Dbh
{
    protected $conn;
    private $host = "localhost";
    private $dbName = "hospital";
    public function __construct()
    {
        echo"did db run? :( <br>";
        try {
            //code...
            $this->conn = new mysqli($this->host, 'root', '',$this->dbName);
            echo ":) <br>";
            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            } 

            $this->createPatientTable();
            $this->createDoctorTable();
            
            echo"it did yippeeee <br>";
        } catch (RuntimeException $e) {
            //throw $th;
            echo $e->getMessage();
        } catch (Exception $e){
            echo $e->getMessage();
        }
    }
    private function checkForConnection(){
        echo var_dump($this->conn);
    }
    public function select($table, $items = '*', $where = null, $order = null)
    {
        $this->checkForConnection();
        $sql = 'SELECT ' . $items . ' FROM ' . $table;

        if ($where !== null)
            $sql .= ' WHERE ' . $where;

        if ($order !== null)
            $sql .= ' ORDER BY ' . $order;
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            $row = $result->fetch_array();
            return $row;
        }
        return false;
    }
    public function createPatientTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS patients (
            fName VARCHAR(30),
            lName VARCHAR(30),
            email VARCHAR(50),
            phoneNum VARCHAR(15),
            gender ENUM('M', 'F'),
            pw VARCHAR(16);
            PRIMARY KEY (email)
            )";
        $this->conn->query($sql);
    }
    
    public function createDoctorTable()
    {
        // tạo một cái bảng name staffs
        // ID để phân biệt giữa các nhân viên y tế (BẮT BUỘC: PRIMARY KEY)
        $sql = "CREATE TABLE IF NOT EXISTS staffs (
            ID INT(10),
            fname VARCHAR(30),
            lname VARCHAR(30),
            prof INT(2)
            pw VARCHAR(16);
            gender ENUM('M', 'F');
            PRIMARY KEY (ID)
        )"; 
        $this->conn->query($sql);
    }
}
