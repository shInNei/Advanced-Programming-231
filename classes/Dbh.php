<?php
class Dbh
{
    protected $conn;
    private $host = "localhost";
    private $dbName = "hospital";
    public function __construct()
    {
        try {
            //code...
            $this->conn = new mysqli($this->host, 'root', '',$this->dbName);
            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            } 

            $this->createPatientTable();
            $this->createDoctorTable();
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
    public function select($table, $items = '*', $where = null)
    {
        $sql = 'SELECT ' . $items . ' FROM ' . $table;
        
        if ($where !== null){
            $sql.= ' WHERE';

            $firstComponent = array_key_first($where);

            foreach($where as $component => $nameInDB){
                $sql .= ($component == $firstComponent ? '':'AND').' '.$nameInDB.' = "' .$component.'" ';
            }
        }
        echo var_dump($sql)."<br>";
        echo var_dump(array_key_first($where))."<br>";
        echo var_dump($where)."<br>";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
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
            pw VARCHAR(16),
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
            prof INT(2),
            pw VARCHAR(16),
            gender ENUM('M', 'F'),
            PRIMARY KEY (ID)
        )"; 
        $this->conn->query($sql);
    }
}
