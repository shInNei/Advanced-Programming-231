<?php
session_start();

if (
    isset($_POST['adminUserName']) &&
    isset($_POST['adminPassword']) 
) {
    //include "DB_connection_fad.php";
    $conn = mysqli_connect("localhost", "id22104051_hospital", "Abc@123@", "id22104051_hospital");
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

        // $stmt = $conn->prepare($sql);
        // $stmt->execute([$adminUserName]);

        // if($stmt->rowCount() == 1) {
        //     $user = $stmt->fetch();
        //     $username = $user['username'];
        //     $password = $user['password'];

        //     if ($username == $adminUserName) {
        //         if ($password == $adminPassword) {
        //             $id = $user['admin_id'];
        //             $_SESSION['admin_id'] = $id;
        //             $_SESSION['loginad'] = true;
        //             header("Location: admin/dashboard.php");
        //             exit;
        //         }
        //         else {
        //             $em = "Incorrect Password";
        //             header("Location: index.php?error=$em");
        //             exit;
        //         }
        //     }
        // }
        // else {
        //     $em = "Incorrect Username";
        //     header("Location: index.php?error=$em");
        //     exit;
        // }
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $adminUserName); // Bind the username parameter
        $stmt->execute();

        $result = $stmt->get_result(); // Get the result
        if($result->num_rows == 1) {
            $user = $result->fetch_assoc(); // Fetch the result as an associative array
            $username = $user['username'];
            $password = $user['password'];

            if ($username == $adminUserName) {
                if ($password == $adminPassword) {
                    $id = $user['admin_id'];
                    $_SESSION['admin_id'] = $id;
                    $_SESSION['loginad'] = true;
                    header("Location: admin/dashboard.php");
                    exit;
                }
                else {
                    $em = "Incorrect Password";
                    header("Location: index.php?error=$em");
                    exit;
                }
            }
        }
        else {
            $em = "Username not found";
            header("Location: index.php?error=$em");
            exit;
        }
    }
} else {
    header("Location: contact.html");
    exit;
}