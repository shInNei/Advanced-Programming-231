<?php

session_start();

if(!isset($_SESSION['loginad']) || $_SESSION['loginad'] !== true){
    // If not logged in, move to index 
    header('location: ../../index.php');
    exit;
}
?>

<?php
    require_once('../../includes/header.php');
?>

    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <style>
        
        .center-form {
            width: 100%;
            margin: 0 auto;
        }

        .modal-title{
            margin: 0 auto;
        }

        .form-group{
            margin: 0 auto;
            padding-top: 20px;
            
        }
        
        
        .form-check{
            border: 1px solid black;
            display: inline;
            margin: 0;
            margin-right: 5px; 
            height: 5px;
        }

        .form-check-label{
            margin:0;
        }

        .block-check-box{
            display: flex;
        }

        .form-check-label{
            text-align: top;
        }

        .container1{
            border: 2px solid black;
            width: 55%;
            margin: 0 auto;
            margin-top: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .btn-primary{
            padding: 5px 10px 5px 10px;

        }

        .btn-primary:hover{
            background-color: green;
        }

        .header{
            display: block;
            text-align: center;
            background-color: #00856f;
            color: white;
            padding-top: 20px;
            padding-bottom: 20px;
        }
    </style>


</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
        <div class="container main-nav">
            <a class="navbar-brand" href="#">
                <h4> <img src="../../assets/imgs/icons.png" alt="ABC-Hospital" style="width: 5%;"> &nbsp ABC Hospital</h4>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item" style="margin-right:40px;">
                        <a class="nav-link active" aria-current="page" href="../dashboard.php"> <i class="fa fa-th-large"></i> &nbsp Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../logout.php"><i class="fa fa-share"></i> &nbsp Log out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="header">
        <h3 class="title" id="exampleModalLongTitle">Add Schedule Staff</h3>
    </div>

    <div class="container">
    <div class="container1">
        <form action="add_schedule_staff.php" method="post" class="center-form">
            <div class="form-group">
                <label for="name">Staff ID:</label>
                <input type="number" class="form-control" id="id" name="id"> 
            </div>

            <div class="form-group">
                <label for="name">Decription:</label>
                <input type="decription" class="form-control" id="decription" name="decription"> 
            </div>

            <div class="form-group">
            <label for="name">Work Shift:</label>
            <select class="form-control" id="work-shift" name="work-shift">
                <option value="Morning Shift (7am to 11am)">Morning Shift</option>
                <option value="Afternoon Shift (13pm to 17pm)">Afternoon Shift</option>
                <option value="Night Shift (19pm to 23pm)">Night Shift</option>

            </select>
            </div>

            <div class="form-group">
            <div class = "block-check-box"> <input class="form-check" type="checkbox" value="Monday" name = "Monday"> 
            <label class="form-check-label">
                Monday
            </label>
            </div>
            </div>

            <div class="form-group">
            <div class = "block-check-box"> <input class="form-check" type="checkbox" value="Tuesday" id="flexCheckDefault" name = "Tuesday">
            <label class="form-check-label">
                Tuesday
            </label>
            </div>
            </div>

            <div class="form-group">
            <div class = "block-check-box"> <input class="form-check" type="checkbox" value="Wednesday" id="flexCheckDefault" name = "Wednesday">
            <label class="form-check-label">
                Wednesday
            </label>
            </div>
            </div>

            <div class="form-group">
            <div class = "block-check-box"> <input class="form-check" type="checkbox" value="Thursday" id="flexCheckDefault" name = "Thursday">
            <label class="form-check-label">
                Thursday
            </label>
            </div>
            </div>

            <div class="form-group">
            <div class = "block-check-box"> <input class="form-check" type="checkbox" value="Friday" id="flexCheckDefault" name = "Friday">
            <label class="form-check-label">
                Friday 
            </label>
            </div>
            </div>

            <div class="form-group">
            <div class = "block-check-box"> <input class="form-check" type="checkbox" value="Saturday" id="flexCheckDefault" name = "Saturday">
            <label class="form-check-label">
                Saturday
            </label>
            </div>
            </div>

            
            <div class="form-group">
            <div class = "block-check-box"> <input class="form-check" type="checkbox" value="Sunday" id="flexCheckDefault" name = "Sunday">
            <label class="form-check-label">
                Sunday
            </label>
            </div>
            </div>

            <div class="form-group">
            <button type="submit" class="btn-primary" name = "submit" >Submit</button>
            </div>
        </form>
    </div>
</body>

<?php
    $connect = mysqli_connect("localhost", "root", "", "hospital");

    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    if(isset($_POST["submit"])){

        $staff_id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
        $decription = filter_input(INPUT_POST, "decription", FILTER_SANITIZE_SPECIAL_CHARS);
        $work_shift = $_POST['work-shift'];
        if(empty($staff_id) || empty($decription) || empty($work_shift)){
            $error_message = "Please input all the information";
        } else {
            $result = FALSE;
            if(isset($_POST['Monday'])){
                $sql = "INSERT INTO schedule_staff (staff_id, work_shift, day_of_the_week, decription)
                        VALUES ('$staff_id', '$work_shift', 'Monday', '$decription')";
                $result = mysqli_query($connect, $sql);
            }

            if(isset($_POST['Tuesday'])){
                $sql = "INSERT INTO schedule_staff (staff_id, work_shift, day_of_the_week, decription)
                        VALUES ('$staff_id', '$work_shift', 'Tuesday', '$decription')";
                $result = mysqli_query($connect, $sql);
            }

            if(isset($_POST['Wednesday'])){
                $sql = "INSERT INTO schedule_staff (staff_id, work_shift, day_of_the_week, decription)
                        VALUES ('$staff_id', '$work_shift', 'Wednesday', '$decription')";
                $result = mysqli_query($connect, $sql);
            }

            if(isset($_POST['Thursday'])){
                $sql = "INSERT INTO schedule_staff (staff_id, work_shift, day_of_the_week, decription)
                        VALUES ('$staff_id', '$work_shift', 'Thursday', '$decription')";
                $result = mysqli_query($connect, $sql);
            }

            if(isset($_POST['Friday'])){
                $sql = "INSERT INTO schedule_staff (staff_id, work_shift, day_of_the_week, decription)
                        VALUES ('$staff_id', '$work_shift', 'Friday', '$decription')";
                $result = mysqli_query($connect, $sql);
            }

            if(isset($_POST['Saturday'])){
                $sql = "INSERT INTO schedule_staff (staff_id, work_shift, day_of_the_week, decription)
                        VALUES ('$staff_id', '$work_shift', 'Saturday', '$decription')";
                $result = mysqli_query($connect, $sql);
            }

            if(isset($_POST['Sunday'])){
                $sql = "INSERT INTO schedule_staff (staff_id, work_shift, day_of_the_week, decription)
                        VALUES ('$staff_id', '$work_shift', 'Sunday', '$decription')";
                $result = mysqli_query($connect, $sql);
            }

            if($result){
                $error_message = "Successfully!";
            } else {
                $error_message = "Input failed!";
            }
        }
        if (!empty($error_message)) {
            echo '<script type="text/javascript">'; 
            echo 'alert("' . $error_message . '");'; 
            echo 'window.location.href = "add_schedule_staff.php";';
            echo '</script>';
        }
    }   

?>