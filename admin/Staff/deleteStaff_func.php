<?php
    session_start();
    require_once('../../includes/header.php');
?>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
<div class="content-wrap">
        <div class="container login">
            <div class="row login-image">
                <!-- <img src="assets/imgs/icons.png" alt="ABC Hospital"> -->
                <h3>Welcome Admin!</h3>
            </div>
            <div class="container dashboard" id = "deleteStaff">
                <div class="row">
                    <div class="col">
                        <a href="resetTable.php" class="col btn btn-danger m-2 py-4"><i class="fa fa-pills" name='Truncate'></i><br>Reset Staffs Table</a>
                        <a href="resetTable.php" class="col btn btn-danger m-2 py-4"><i class="fa fa-pills" name='Truncate'></i><br>Delete Departments</a>
                        <a href="staffInfo.php" class="col btn btn-danger m-2 py-4"><i class="fa fa-pills" name='Truncate'></i><br>Delete Specific Staffs</a>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="" class="btn btn-primary m-2 py-4"><i class=""></i> <br> Find Equipments</a>
                    </div>
                    <div class="col">
                        <a href="" class="btn btn-primary m-2 py-4"><i class=""></i><br>Add Equipments</a>
                    </div>
                    <div class="col">
                        <a href="" class="btn btn-primary m-2 py-4"><i class=""></i><br>Delete Equipments</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    if (isset($_SESSION['alert_message'])) {
        echo '<script>alert("' . $_SESSION['alert_message'] . '");</script>';
        unset($_SESSION['alert_message']); // Clear the session variable
    }   
    require_once('../../includes/footer.php');
?>