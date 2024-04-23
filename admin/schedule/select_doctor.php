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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <title>ABC HOSPITAL</title>

    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .my-custom-row {
            background-color: bisque;
            height: 400px;
        }

        .form-container {
            margin: auto;
            width: 50%;
            padding-top: 50px;
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
                        <a class="nav-link active" aria-current="page" href="../dashboard.php"> <i class="fa fa-bars"></i> &nbsp Dashboard</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../../logout.php"><i class="fa fa-share"></i> &nbsp Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container login" style="font-family: 'IBM Plex Sans', sans-serif;">
        <div class="row login-image">
            <h3>Select Doctor</h3>
        </div>
    </div>
    
   
    <div class="form-container">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        
        <?php
        $scheduleID = isset($_GET['schedule_id']) ? $_GET['schedule_id'] : '';
        ?>

        <input type="hidden" name="schedule_id" value="<?php echo htmlspecialchars($scheduleID); ?>">

            <div class="form-group">
                <label for="Department">Select Department:</label>
                <select class="form-control" name="Department" id="Department">
                    <option value="">Select Department</option>
                    <option value="01">Department of Pharmacy</option>
                    <option value="02">Department of Cardiology</option>
                    <option value="03">Department of Pediatrics</option>
                    <option value="04">Intensive Care Unit</option>
                    <option value="05">Department of Otorhinolaryngology</option>
                    <option value="06">Department of Obstetric</option>
                </select>
            </div>
            <div class="form-group">
                <label for="doctorID">Select Doctor ID:</label>
                <select class="form-control" id="doctorID" name="Doctor_ID">
                    <option value="">Select ID</option>
                </select>
            </div>
            <div class="form-group">
                <label for="doctorName">Doctor Name:</label>
                <input type="text" class="form-control" id="doctorName" readonly>
            </div>
            <input type="hidden" name="Doctor_ID" value="">
            <button type="submit" class="btn btn-primary">Confirm</button>
        </form>
    </div>
    


    <?php
        $conn = new mysqli('localhost', 'root', '', 'hospital');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $scheduleID = $_POST['schedule_id'];
            $doctorID = $_POST['Doctor_ID'];

            $sql = "UPDATE schedule SET Doctor_ID = '$doctorID' WHERE Schedule_ID = '$scheduleID'";

            if ($conn->query($sql) === TRUE) {
        
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        $conn->close();
    ?>


    <footer class="text-center text-dark fixed-bottom">
        Copyright &copy; 2024 ABC Hospital. All rights reserved.
    </footer>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Script -->
    <script>
        $(document).ready(function () {
            $('#Department').on('change', function () {
                var department = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: 'getDoctorlist.php',
                    data: { department: department },
                    success: function (response) {
                        $('#doctorID').html(response);
                        $('#doctorName').val('');
                    }
                });
            });

            $('#doctorID').on('change', function () {
                var doctorID = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: 'getDoctorName.php',
                    data: { doctorID: doctorID },
                    success: function (response) {
                        $('#doctorName').val(response);
                        $('[name="Doctor_ID"]').val(doctorID);
                    }
                });
            });
            
        });
    </script>

</body>

</html>
