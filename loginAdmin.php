<?php
session_start();

if (
    isset($_POST['adminUserName']) &&
    isset($_POST['adminPassword']) 
) {
    include "DB_connection_fad.php";

    $adminUserName = $_POST['adminUserName'];
    $adminPassword = $_POST['adminPassword'];

    if (empty($adminUserName)) {
        $em = "Username is required";
        header("Location: index.php");
    } else if (empty($adminPassword)) {
        $em = "Password is required";
        header("Location: index.php");
    } else {
        $sql = "SELECT * FROM ad WHERE username = ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$adminUserName]);

        if($stmt->rowCount() == 1) {
            $user = $stmt->fetch();
            $username = $user['username'];
            $password = $user['password'];

            if ($username == $adminUserName) {
                if ($password == $adminPassword) {
                    $id = $user['admin_id'];
                    $_SESSION['admin_id'] = $id;
                    header("Location: admin/dashboard.php");
                    exit;
                }
                else {
                    $em = "Incorrect Username or Password";
                    header("Location: contact.html");
                    exit;
                }
            }

        }
        else {
            $em = "Incorrect Username or Password";
            header("Location: index.php?error=$em");
            exit;
        }
    }
} else {
    header("Location: contact.html");
    exit;
}