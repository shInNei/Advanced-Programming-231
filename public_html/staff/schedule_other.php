<?php 
if(session_status() !== PHP_SESSION_ACTIVE) session_start();

if(!isset($_SESSION['login']) || $_SESSION['login'] !== true){
    // If not logged in, move to index 
    header('location: ../index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">    
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../assets/imgs/icon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
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
    <?php require_once('checkStaff.php')?>
        <nav nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
            <div class="container main-nav">
            
            <a class="navbar-brand" href="#">
                <h4> <img src="../assets/imgs/icons.png" alt="ABC-Hospital" width="30"> &nbsp ABC Hospital</h4>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                            <a class="nav-link"  href="profile.php"> <i class="fa fa-pills"></i> &nbsp Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="leaveRegister.php"> <i class="fa fa-notes-medical"></i> &nbsp Register of Leave</a>
                        </li>
                        <?php
                            if($_SESSION['role'] === "Doctor") {
                                echo '
                                <li class="nav-item" style="margin-right:40px;">
                                    <a class="nav-link"  href="prescription.php"> <i class="fa fa-prescription-bottle"></i> &nbsp Prescription</a>
                                </li>';
                                echo "
                                <li class='nav-item' style='margin-right:40px;'>
                                <a class='nav-link'  href='Appointment.php'> <i class='fas fa-stethoscope'></i> &nbsp Doctor's Appointment</a>
                                </li>
                                ";
                                echo "
                                <li class='nav-item' style='margin-right:40px;'>
                                <a class='nav-link'  href='addMedicalRecord.php'> <i class='fas fa-stethoscope'></i> &nbsp Medical Record</a>
                                </li>
                                ";
                            } else if($_SESSION['role'] === "Nurse") {
                                echo '
                                <li class="nav-item">
                                    <a class="nav-link"  href="requestEquip.php"> <i class="fas fa-x-ray"></i> &nbsp Equipment</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link"  href="testResult.php"> <i class="fa fa-prescription-bottle"></i> &nbsp Test Result</a>
                                </li>
                                ';
                            } else if($_SESSION['role'] === "Other"){
                                echo '
                                <li class="nav-item">
                                    <a class="nav-link"  href="schedule_other.php"> <i class="fas fa-x-ray"></i> &nbsp Shedule</a>
                                </li>
                                ';
                            }
                        ?>
                        <li class="nav-item log">
                            <a class="nav-link" href="../logout.php"><i class="fa fa-share"></i> &nbsp Log out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container login" style="font-family: 'IBM Plex Sans', sans-serif;">
            <div class="row login-image">
                <!--<img src="../assets/imgs/icons.png" alt="ABC Hospital">-->
                <h3>Your Schedule</h3>
            </div>
        </div>
    
    <table class="table">  
        <?php 
            $db_server = "localhost";
            $db_user = "id22036229_abchospital";
            $db_pass = "Abc@123@";
            $db_name = "id22036229_abchospital";
            $connect = "";

                $connect = mysqli_connect("localhost", "id22104283_hospital", "Abc@123@", "id22104283_hospital");
            
            //$connect = mysqli_connect("localhost", "root", "", "hospital");

            if (!$connect) {
                die("Connection failed: " . mysqli_connect_error());
            }
            
            $staff_id = $_SESSION['userid'];
            $sql = "SELECT * FROM schedule_staff WHERE staff_id = '$staff_id'";

            $result = mysqli_query($connect, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo "<tr>
                        <th> Work Shift </th>
                        <th> Day Of The Week </th>
                        <th> Decription </th>
                    </tr>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                        <td>".$row["work_shift"]."</td>
                        <td>".$row["day_of_the_week"]."</td>
                        <td>".$row["decription"]."</td>
                    </tr>";
                }
                echo "</table>";
            } else {
                echo "<p style='color: red; font-size: 20px; font-weight: bold; text-align: center;'>0 Results</p>";
            }
        ?>
    </table>



    </br> </br>
    
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <footer>
        <div class="text-center text-dark" style = "margin-top: 2%">
            Copyright &copy; 2024 ABC Hospital. All rights reserved.
        </div>
    </footer>
</body>