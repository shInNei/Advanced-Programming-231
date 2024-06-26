<?php
    if(session_status() !== PHP_SESSION_ACTIVE) session_start();
    if(!isset($_SESSION['loginP']) || $_SESSION['loginP'] !== true){
    // If not logged in, move to index 
    session_destroy();
    header('location:../../index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../../assets/imgs/icon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.13/css/all.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <title>ABC HOSPITAL</title>

    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .table {
            margin: auto;
            width: 90%;
            border-collapse: collapse;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #00856f;
            color: white;
        }
        .search-form {
            width: 70%;
            margin: auto;
            padding-left: 200px;
        }
    </style>
</head>

<body>
    <style>
        .my-custom-row {
            background-color: bisque;
            height: 400px;
        }
    </style>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
        <div class="container main-nav">
            <a class="navbar-brand" href="#" >
                <h4> <img src="../../assets/imgs/icons.png" alt="ABC-Hospital" width="30"> &nbsp ABC Hospital</h4>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-right">
                    <li class="nav-item" style="margin-right:20px;">
                        <a class="nav-link active" aria-current="page" href="../dashboard.php"> <i class = "fa fa-bars"></i> &nbsp Dashboard</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../../logout.php"><i class="fa fa-share" ></i> &nbsp Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container login" style="font-family: 'IBM Plex Sans', sans-serif;">
        <div class="row login-image">
            <!--<img src="../assets/imgs/icons.png" alt="ABC Hospital">-->
            <h3>Patient's Schedule</h3>
        </div>
    </div>
    
    <table class="table">  
        <?php 
            //$connect = mysqli_connect("localhost", "root", "", "hospital");
            $connect = mysqli_connect("localhost", "id22104283_hospital", "Abc@123@", "id22104283_hospital");
            if (!$connect) {
                die("Connection failed: " . mysqli_connect_error());
            }
            
            $email = $_SESSION['email'];
            $query = "SELECT * FROM patients WHERE email = '$email'";
            $result = mysqli_query($connect, $query);
            if (mysqli_num_rows($result) > 0) {
                // Fetch the result as an associative array
                $row = mysqli_fetch_assoc($result);
            
                // Get the ID of the patient
                $pat_id = $row["ID"];
            } else {
                // Handle the case where the patient is not found
                echo "No patient found with email: $email";
            }
            $sql = "SELECT * FROM schedule WHERE Patient_ID = '$pat_id'";
            $result_1 = mysqli_query($connect, $sql);

            if (mysqli_num_rows($result_1) > 0) {
                echo "<tr>
                        <th> Schedule ID </th>
                        <th> Appointment Date </th>
                        <th> Appointment Time </th>
                        <th> Patient ID </th>
                        <th> Specialization </th>
                        <th> Doctor ID </th>
                        <th> Edit Schedule </th>
                    </tr>";
                while ($row = mysqli_fetch_assoc($result_1)) {
                    echo "<tr>
                        <td>".$row["Schedule_ID"]."</td>
                        <td>".$row["Appointment_Date"]."</td>
                        <td>".$row["Appointment_Time"]."</td>
                        <td>".$row["Patient_ID"]."</td>
                        <td>".$row["Specialization"]."</td>
                        <td>".$row["Doctor_ID"]."</td>
                        <td style='text-align: center;'>
                            <form action='book_3.php' method='POST'>
                                <input type='hidden' name='id' value='".$row["Schedule_ID"]."'>
                                <input type='submit' value='Edit' style='background-color: #159eb7; color: white;'>
                            </form>
                        </td>
                    </tr>";
                }
                echo "</table>";
            } else {
                echo "<p style='color: red; font-size: 20px; font-weight: bold; text-align: center;'>0 Results</p>";
            }
        ?>
    </table>



    </br> </br>
    
    
    <footer>
        <div class="text-center text-dark" style = "margin-top: 5%">
            Copyright &copy; 2024 ABC Hospital. All rights reserved.
        </div>
    </footer>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
