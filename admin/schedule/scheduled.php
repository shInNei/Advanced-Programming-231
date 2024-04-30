<?php

session_start();

if(!isset($_SESSION['loginad']) || $_SESSION['loginad'] !== true){
    // If not logged in, move to index 
    header('location: ../../index.php');
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
            margin: 0;
            padding: 0;
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

    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
        <div class="container main-nav">
            <a class="navbar-brand" href="#">
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
            <h3>Schedule Information</h3>
        </div>
    </div>
    
    <div class="search-form">
    <form class="form-group" action="searchSchedule.php" method="post">
        <div class="row">
            <div class="col-md-10">
                <input type="text" name="schedule_id" placeholder="Enter Schedule ID" class="form-control">
            </div>
            <div class="col-md-2">
                <input type="submit" name="schedule_search_submit" class="btn btn-primary" value="Search">
            </div>
        </div>
    </form>
</div>

<table class="table">  
    <?php 
        //$connect = mysqli_connect("localhost", "root", "", "hospital");
        $connect = mysqli_connect("localhost", "id22104051_hospital", "Abc@123@", "id22104051_hospital");
        if (!$connect) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
        if (isset($_POST['schedule_search_submit'])) {
            $schedule_id = $_POST['schedule_id'];
            $sql = "SELECT * FROM schedule WHERE Schedule_ID = '$schedule_id' AND Doctor_ID IS NOT NULL";
        } else {
            $sql = "SELECT * FROM schedule WHERE Doctor_ID IS NOT NULL";
        }

        $result = mysqli_query($connect, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<tr>
                    <th> Schedule ID </th>
                    <th> Appointment Date </th>
                    <th> Appointment Time </th>
                    <th> Patient ID </th>
                    <th> Specialization </th>
                    <th> Doctor ID </th>
                </tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                    <td>".$row["Schedule_ID"]."</td>
                    <td>".$row["Appointment_Date"]."</td>
                    <td>".$row["Appointment_Time"]."</td>
                    <td>".$row["Patient_ID"]."</td>
                    <td>".$row["Specialization"]."</td>
                    <td>".$row["Doctor_ID"]."</td>
                </tr>";
            }
            echo "</table>";
        } else {
            echo "<p style='color: red; font-size: 20px; font-weight: bold; text-align: center;'>0 Results</p>";
        }
    ?>
</table>


    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
    <?php  require_once('../../includes/footer.php'); ?>
</html>
