<?php

// session_start();

// if(!isset($_SESSION['loginad']) || $_SESSION['loginad'] !== true){
//     // If not logged in, move to index 
//     header('location: ../index.php');
//     exit;
// }
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
                <h4> <img src="../assets/imgs/icons.png" alt="ABC-Hospital" width="30"> &nbsp ABC Hospital</h4>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-right">
                    <li class="nav-item" style="margin-right:20px;">
                        <a class="nav-link active" aria-current="page" href="dashboard.php"> <i class = "fa fa-bars"></i> &nbsp Dashboard</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php"><i class="fa fa-share" ></i> &nbsp Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container login" style="font-family: 'IBM Plex Sans', sans-serif;">
        <div class="row login-image">
            <!--<img src="../assets/imgs/icons.png" alt="ABC Hospital">-->
            <h3>Welcome to ABC hospital</h3>
        </div>
    </div>
    <div class="container mt-5">
        <div class="container text-center">
            <div class="row row-cols-4 justify-content-center">
                <a href="Staff/Staff_List.php" class="col btn btn-success m-2 py-4">
                    <i class="fa fa-user-md fs-1"></i><br>
                    Staff List
                </a>
                <a href="patient/patient_dashboard.php" class="col btn btn-success m-2 py-4">
                    <i class="fa fa-user-circle-o fs-1"></i><br>
                    Patient List
                </a>
                <a href="medicine/medicineDashboard.php" class="col btn btn-success m-2 py-3">
                    <i class="fa-solid fa-pills" style="font-size: 40px;"></i><br>
                    Medicines & Medical Equipment 
                </a>

                <a href="schedule/scheduleDashboard.php" class="col btn btn-success m-2 py-4">
                    <i class="fa-regular fa-calendar-plus" style="font-size: 40px;"></i><br>
                    Patient's Treatment Schedule
                </a>
                <a href="Staff/addStaff_func.php" class="col btn btn-info m-2 py-4">
                    <i class="fa-solid fa-notes-medical" style="font-size: 40px;"></i><br>
                    Add New Staff
                </a>
                <a href="Staff/deleteStaff_func.php" class="col btn btn-danger m-2 py-4">
                    <i class="fa-solid fa-user-minus" style="font-size: 40px;"></i><br>
                    Delete Staff
                </a>
            </div>
        </div>
    </div>
    <footer class="text-center text-dark fixed-bottom">
        Copyright &copy; 2024 ABC Hospital. All rights reserved.
    </footer>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>


</html>
