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
            $this->conn = new mysqli($this->host, 'root', '', $this->dbName);

            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }

            // $this->createPatientTable();
            // $this->createDoctorTable();
        } catch (RuntimeException $e) {
            //throw $th;
            echo $e->getMessage();
        }
    }
    public function __destruct()
    {
        $this->conn->close();
    }
    private function checkForConnection()
    {
        echo var_dump($this->conn) . "<br>";
    }
    public function getConnection()
    {
        return $this->conn;
    }
    public function query($sql, $bind) {
        $stmt = $this->conn->prepare($sql);
    
        // Execute the statement
        if (!$stmt) {
            echo "EMPTY QUERY<br>";
            return null;
        }
    
        if ($bind) {
            // Bind parameters to the statement
            foreach ($bind as $type => $values) {
                foreach ($values as $value) {
                    $stmt->bind_param($type, $value);
                }
            }
        }
    
        $stmt->execute();
    
        // Get the results
        $result = $stmt->get_result();
    
        // Fetch all rows
        if ($result) {
            $results = $result->fetch_all(MYSQLI_ASSOC);
        }
    
        // Free result and close statement
        $stmt->close();
    
        return $results;
    }
    
    
    // dbName => component
    public function select($table, $items = '*', $where = null, $allFlag = false)
    {

        $sql = 'SELECT ' . $items . ' FROM ' . $table;

        if ($where !== null) {
            $sql .= ' WHERE';

            $firstDBname = array_key_first($where);

            foreach ($where as $nameInDB => $component) {
                $sql .= ($nameInDB == $firstDBname ? '' : 'AND') . ' ' . $nameInDB . ' = "' . $component . '" ';
            }
        }
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        if ($result->num_rows > 0) {
            $row = ($allFlag) ? $result->fetch_all(MYSQLI_ASSOC) : $result->fetch_assoc();
            return $row;
        }
        return false;
    }
    //FOR INSERT REMEMBER dbName => component
    public function insert($table, $items)
    {


        $sql = 'INSERT INTO ' . $table . ' (';

        if (isset($items)) {
            $keys = array_keys($items);
            $sql .= $keys[0];
            for ($i = 1; $i < count($keys); $i++) {
                $sql .= ', ' . $keys[$i];
            }

            $sql .= ') VALUES (';

            $values = array_values($items);
            $sql .= '"' . $values[0] . '"';
            for ($i = 1; $i < count($values); $i++) {
                $sql .= ', ' . '"' . $values[$i] . '"';;
            }
            $sql .= ')';
        } else {
            die("No Items to insert<br>");
        }
        if (isset($this->conn)) {
            $this->conn->query($sql);
        } else {
            die("Cant insert<br>");
        }
    }
    public function resetTable($table) {
        $this->checkForConnection();
        $sql = 'TRUNCATE TABLE '.$table;
        if(isset($this->conn)) {
        $this->conn->query($sql);
        } else {
            die("Cant truncate<br>");
        }
    }
    public function delete($table, $item) {
    
    $this->checkForConnection();
    $sql = 'DELETE FROM '.$table.' WHERE';

    if ($item !== null) {
        $flag = true;
        $firstDBname = array_key_first($item);

        foreach ($item as $nameInDB => $component) {
            if($component == "" || $component == "No") {
                continue;
            } else if ($flag) {
                $firstDBname = $nameInDB;
                $flag = false;
            }
            $sql .= ($nameInDB == $firstDBname ? '' : 'AND') . ' ' . $nameInDB . ' = "' . $component . '" ';
        }
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        
    }
    }
    // nameInDB => amount
    public function updateAmount($table, $items, $where)
    {
        // Initialize SQL query
        $sql = 'UPDATE ' . $table . ' SET ';
        $updates = [];

        // Construct the SET clause
        foreach ($items as $nameInDb => $amount) {
            $updates[] = $nameInDb . ' = ' . $nameInDb . ' + ?';
        }
        $sql .= implode(', ', $updates);
        echo "after set: ".var_dump($sql)."<br>";
        // Construct the WHERE clause
        $whereClause = [];
        foreach ($where as $keyInDb => $key) {
            $whereClause[] = $keyInDb . ' = ?';
        }
        $sql .= ' WHERE ' . implode(' AND ', $whereClause);
        echo "after WHERE: ".var_dump($sql)."<br>";
        // Prepare and bind parameters
        $stmt = $this->conn->prepare($sql);
        if ($stmt === false) {
            echo "Error preparing statement: " . $this->conn->error;
            return;
        }

        $types = str_repeat('s', count($items) + count($where)); // Assuming all parameters are strings
        $params = array_merge(array_values($items), array_values($where));
        $stmt->bind_param($types, ...$params);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $stmt->error;
        }
        $stmt->close();
    }
    public function createPatientTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS patients (
            ID INT(10),
            fName VARCHAR(30),
            lName VARCHAR(30),
            email VARCHAR(50) not null,
            phoneNum VARCHAR(15),
            gender ENUM('M', 'F'),
            pw VARCHAR(16) not null,
            PRIMARY KEY (ID)
            )";
        $this->conn->query($sql);
    }

    public function createDoctorTable()
    {
        // tạo một cái bảng name staffs
        // ID để phân biệt giữa các nhân viên y tế (BẮT BUỘC: PRIMARY KEY)
        $sql = "CREATE TABLE IF NOT EXISTS staffs (
            ID VARCHAR(10),
            staffUserName VARCHAR(50),
            fname VARCHAR(30),
            lname VARCHAR(30),
            email VARCHAR(50),
            prof INT(2),
            staffPassword VARCHAR(16),
            gender ENUM('Male', 'Female'),
            task ENUM('Doctor', 'Nurse', 'Other'),
            startDate DATE,
            phoneNumber VARCHAR(11),
            annualLeaveDate INT(2) DEFAULT(12),
            PRIMARY KEY (ID)
        )";
        $this->conn->query($sql);
    }
}
