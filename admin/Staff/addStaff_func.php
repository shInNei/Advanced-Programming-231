<?php
    session_start();
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
                        <a href="addStaff.php" class="col btn btn-info m-2 py-4"><i class="fas fa-user-plus" name='addStaff'></i><br>Add Staff</a>
                        <button type="button" class="btn btn-info m-2 py-4" data-toggle="modal" data-target="#Diploma">
                            <i class="fas fa-graduation-cap"></i><br>
                                Add Diploma
                        </button>
                        <button type="button" class="btn btn-info m-2 py-4" data-toggle="modal" data-target="#deleteSpecific">
                            <i class="fa fa-pills" name='Truncate'></i><br>
                            Delete Specific Staffs
                        </button>
                    </div>
                </div>


<!-- Modal Delete Multiples-->
        <div class="modal fade" id="Diploma" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Diploma</h5>
                </div>
            <div class="modal-body">
            <form method="post"  action="addDiploma.php">
                <div class="form-group">
                    <label for="DIPID">Diploma ID</label>
                    <input type="text" class="form-control" name="DIPID" placeholder="Diploma ID" required>
                </div>
                <div class="form-group">
                    <label for="SID">Staff ID</label>
                    <input type="text" class="form-control" name="SID" placeholder="Staff ID" required>
                </div>
                <div class="form-group">
                    <label for="college">College</label>
                    <input type="text" class="form-control" name="college" placeholder="College" required>
                </div>
                <div class="form-group">
                    <label for="nation">Nation</label>
                    <input type="text" class="form-control" name="nation" placeholder="Nation" required>
                </div>
                <div class="form-group">
                    <label for="gYear">Graduation Year</label>
                    <input type="text" class="form-control" name="gYear" placeholder="Graduation Year" required>
                </div>
                <div class="form-group">
                    <label for="major">Major</label>
                    <input type="text" class="form-control" name="major" placeholder="Major" required>
                </div>
                <div class="form-group">
                    <label for="specializedField">Specialized Field</label>
                    <input type="text" class="form-control" name="specializedField" placeholder="Specialized Field" required>
                </div>
                <div class="form-group">
                    <label for="programType">Program Type</label>
                    <select class="form-control" name="programType">
                        <option value="Mass Education">Mass Education Program</option>
                        <option value="High Quality">High Quality Program</option>
                        <option value="Honors">Honors Program</option>
                        <option value="Transnational">Transnational Program</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="honor">Honor</label>
                    <select class="form-control" name="honor">
                        <option value='Excellent'>Excellent</option> 
                        <option value='Good'>Good</option> 
                        <option value='Average'>Average</option> 
                        <option value='Below Average'>Below Average</option> 
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-bottom: 0px">Close</button>
                <input type="submit" name="addDiplomaSubmit" class="btn btn-primary " style="margin-bottom: 0px" value="Add">
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
                <input type="submit" name="addStaffSubmit" class="btn btn-primary " style="margin-bottom: 0px" value="Delete">
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