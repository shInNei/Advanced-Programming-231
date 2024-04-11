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

        .card {
            margin-top: 20px;
        }

        .card-header {
            background-color: #00856f;
            color: white;
            font-weight: bold;
        }

        .form-control[readonly] {
            background-color: #f8f9fa;
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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        View 
                    </div>
                    <div class="card-body">
                        <?php
                        // Kết nối đến cơ sở dữ liệu
                        $conn = mysqli_connect("localhost", "root", "", "hospital");

                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        // Kiểm tra xem có tham số email được truyền qua URL không
                        if (isset($_GET['email'])) {
                            $email = $_GET['email'];

                            // Truy vấn để lấy thông tin chi tiết của bác sĩ dựa trên email
                            $sql = "SELECT * FROM staffs WHERE email = '$email'";
                            $result = mysqli_query($conn, $sql);

                            // Kiểm tra xem có bản ghi nào được trả về không
                            if (mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_assoc($result);
                        ?>
                                <div class="form-group row">
                                    <label for="staffID" class="col-sm-4 col-form-label">ID</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control" id="staffID" value="<?php echo $row['ID']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staffUserName" class="col-sm-4 col-form-label">Username</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control" id="staffUserName" value="<?php echo $row['staffUserName']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fullName" class="col-sm-4 col-form-label">Full Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control" id="fullName" value="<?php echo $row['fname'] . ' ' . $row['lname']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-4 col-form-label">Email</label>
                                    <div class="col-sm-8">
                                        <input type="email" readonly class="form-control" id="email" value="<?php echo $row['email']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="profession" class="col-sm-4 col-form-label">Profession</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control" id="profession" value="<?php echo $row['prof'] == 1 ? 'Doctor' : ($row['prof'] == 2 ? 'Nurse' : 'Other'); ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="startDate" class="col-sm-4 col-form-label">Start Date</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control" id="startDate" value="<?php echo $row['startDate']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phoneNumber" class="col-sm-4 col-form-label">Phone Number</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control" id="phoneNumber" value="<?php echo $row['phoneNumber']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="annualLeaveDay" class="col-sm-4 col-form-label">Annual Leave Day</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control" id="annualLeaveDay" value="<?php echo $row['annualLeaveDay']; ?>">
                                    </div>
                                </div>
                        <?php
                            } else {
                                echo "No details found for this email.";
                            }
                        } else {
                            echo "No email parameter provided.";
                        }

                        // Đóng kết nối
                        mysqli_close($conn);
                        ?>
                    </div>
                </div>
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
