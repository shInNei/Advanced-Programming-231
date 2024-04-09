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

        /* Màu xanh lam cho các ô có Doctor_ID khác NULL */
        .table td.doctor-confirmed {
            background-color: #90caf9;
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
            background-color: #4CAF50;
            color: white;
        }
        .select-doctor-container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .add-doctor-btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 8px 16px;
            cursor: pointer;
            text-decoration: none; /* Loại bỏ dấu gạch chân */
        }
    </style>
</head>

<body>
    <!-- Your existing HTML content here -->

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
        <div class="row login-image" style="margin-bottom: 20px;">
            <h3 style="margin-bottom: 30px;">Patient List Waiting For Progressing</h3>

            
                <table class="table">
                    <thead>
                        <tr>
                            <th>Schedule ID</th>
                            <th>Appointment Date</th>
                            <th>Appointment Time</th>
                            <th>Patient ID</th>
                            <th>Specialization</th>
                            <th>Select Doctor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- PHP code to populate table rows will go here -->
                        <?php
                        $connect = mysqli_connect("localhost", "root", "", "hospital");

                        if (!$connect) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        $sql = "SELECT * FROM schedule";
                        $result = mysqli_query($connect, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                // Kiểm tra nếu Doctor_ID là NULL, chỉ hiển thị chức năng chọn bác sĩ
                                if ($row["Doctor_ID"] === NULL) {
                                    echo "<tr>
                                                <td>" . $row["Schedule_ID"] . "</td>
                                                <td>" . $row["Appointment_Date"] . "</td>
                                                <td>" . $row["Appointment_Time"] . "</td>
                                                <td>" . $row["Patient_ID"] . "</td>
                                                <td>" . $row["Specialization"] . "</td>
                                                <td class='select-doctor-container'>
                                                    <a class='add-doctor-btn' href='select_doctor.php?schedule_id=" . $row["Schedule_ID"] . "' onclick='submitForm(" . $row["Schedule_ID"] . ")'>ADD</a>
                                                </td>
                                            </tr>";
                                } else {
                                    // Nếu Doctor_ID đã được xác nhận, hiển thị màu xanh lam
                                    echo "<tr>
                                                <td class='doctor-confirmed'>" . $row["Schedule_ID"] . "</td>
                                                <td class='doctor-confirmed'>" . $row["Appointment_Date"] . "</td>
                                                <td class='doctor-confirmed'>" . $row["Appointment_Time"] . "</td>
                                                <td class='doctor-confirmed'>" . $row["Patient_ID"] . "</td>
                                                <td class='doctor-confirmed'>" . $row["Specialization"] . "</td>
                                                <td class='doctor-confirmed'>Doctor Confirmed</td>
                                            </tr>";
                                }
                            }
                        } else {
                            echo "<tr>
                                        <td colspan='6' style='text-align: center;'>0 Results</td>
                                    </tr>";
                        }
                        ?>
                    </tbody>
                </table>
        </div>
    </div>


    <footer class="text-center text-dark fixed-bottom">
        Copyright &copy; 2024 ABC Hospital. All rights reserved.
    </footer>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
