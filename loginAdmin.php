<?php

session_start();

if (
    isset($_POST['adminUsername']) &&
    isset($_POST['adminPassword']) 
) {
    include "../DB_connection_fad.php";

    $adminUsername = $_POST['adminUsername'];
    $adminPassword = $_POST['adminPassword'];

    if (empty($adminUsername)) {
        $em = "Username is required";
        header("Location: index.php");
    } else if (empty($adminPassword)) {
        $em = "Password is required";
        header("Location: index.php");
    } else {
        $sql = "SELECT * FROM ad WHERE username = ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$adminUsername]);

        if($stmt->rowCount() == 1) {
            
        }
    }
}