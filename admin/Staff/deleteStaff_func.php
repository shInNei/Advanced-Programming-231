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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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

<div class="content-wrap">
        <div class="container login">
            <div class="row login-image">
                <!-- <img src="assets/imgs/icons.png" alt="ABC Hospital"> -->
                <h3>Welcome Admin!</h3>
            </div>
            <div class="container dashboard" id = "deleteStaff">
                <div class="row">
                    <div class="col">
                        <a href="resetTable.php" class="col btn btn-danger m-2 py-4"><i class="fas fa-user-minus" name='Truncate'></i><br>Reset Staffs Table</a>
                        <button type="button" class="btn btn-danger m-2 py-4" data-toggle="modal" data-target="#exampleModalCenter">
                            <i class="fas fa-user-minus"></i><br>
                                Delete Multiples
                        </button>
                        <button type="button" class="btn btn-danger m-2 py-4" data-toggle="modal" data-target="#deleteSpecific">
                            <i class="fas fa-user-minus" name='Truncate'></i><br>
                                Delete Specific Staffs
                        </button>
                    </div>
                </div>


<!-- Modal Delete Multiples-->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete Multiples</h5>
                </div>
            <div class="modal-body">
            <form method="post"  action="deleteMultiples.php">
                <div class="form-group">
                    <label for="fName">First Name</label>
                    <input type="text" class="form-control" name="fName" placeholder="First Name">
                </div>
                <div class="form-group">
                    <label for="lName">Last Name</label>
                    <input type="text" class="form-control" name="lName" placeholder="Last Name">
                </div>
                <div class="form-group">
                    <label for="Profession">Profession</label>
                    <select class="form-control" name="Profession">
                        <option value="Doctor">Doctor</option>
                        <option value="Nurse">Nurse</option>
                        <option value="Other">Other</option>
                        <option value="No">No information</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Department">Department ID</label>
                    <select class="form-control" name="Department">
                        <option value=01>Department of Pharmacy - 01</option> <!-- Khoa dược -->
                        <option value=02>Department of Cardiology - 02</option> <!-- Khoa tim mạch -->
                        <option value=03>Department of Pediatrics - 03</option> <!-- Khoa nhi -->
                        <option value=04>Intensive Care Unit - 04</option> <!-- Khoa hồi sức cấp cứu -->
                        <option value=05>Department of Otorhinolaryngology - 05</option> <!-- Khoa tai mũi họng -->
                        <option value=06>Department of Obstetric - 06</option> <!-- Khoa sản -->
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-bottom: 0px">Close</button>
                <input type="submit" name="deleteMultiples" class="btn btn-primary " style="margin-bottom: 0px" value="Delete">
            </div>
            </form>
            </div>
            </div>
        </div>

<!-- Modal Delete Specific-->
        <div class="modal fade" id="deleteSpecific" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Delete Specific</h5>
            </div>
            <div class="modal-body">
                <form method="post"  action="deleteSpecific.php">
                    <div class="form-group">
                        <label for="ID">ID</label>
                        <input type="text" class="form-control" name="ID" placeholder="ID">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-bottom: 0px">Close</button>
                <input type="submit" name="deleteSpecific" class="btn btn-primary " style="margin-bottom: 0px" value="Delete">
            </div>
            </form>
            </div>
            </div>
        </div>

            </div>
        </div>
    </div>

<script>
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>
<?php
    if (isset($_SESSION['alert_message'])) {
        echo '<script>alert("' . $_SESSION['alert_message'] . '");</script>';
        unset($_SESSION['alert_message']); // Clear the session variable
    }   
    require_once('../../includes/footer.php');
?>