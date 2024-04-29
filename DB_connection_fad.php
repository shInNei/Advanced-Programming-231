<?php

// $sName = "localhost";
// $uName = "root";
// $pass = "";
// $db_name = "hospital";
$sName = "localhost";
$uName = "id22036229_abchospital";
$pass = "Abc@123@";
$db_name = "id22036229_abchospital";

try {
    $conn = new PDO("mysql:host=$sName; dbname=$db_name", $uName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e) {
    echo "Connection Error: " . $e->getMessage();
    exit();
}