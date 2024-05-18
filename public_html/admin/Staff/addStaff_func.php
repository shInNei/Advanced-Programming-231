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
                    <!-- <li class="nav-item" style="margin-right:40px;">
                        <a class="nav-link active" aria-current="page" href="../dashboard.php"> <i class="fa fa-th-large"></i> &nbsp Dashboard</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="../../logout.php"><i class="fa fa-share"></i> &nbsp Log out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
        <div class="content-wrap">
        <div class="container login" style="height:500px">
            <div class="container dashboard" id = "uniqueee" style="height:500px">
                <div class="row row-cols-1 justify-content-center">
                        <button type="button" class="btn btn-info m-2 py-4" data-toggle="modal" data-target="#addStaff">
                            <i class="fas fa-user-plus"></i><br>
                                Add Staff
                        </button>
                        <button type="button" class="btn btn-info m-2 py-4" data-toggle="modal" data-target="#Diploma">
                            <i class="fas fa-graduation-cap"></i><br>
                                Add Diploma
                        </button>
                        <button type="button" class="btn btn-info m-2 py-4" data-toggle="modal" data-target="#addContract">
                            <i class="fas fa-receipt" name='AddContract'></i><br>
                            Add Contract
                        </button>
                        <button type="button" class="btn btn-info m-2 py-4" data-toggle="modal" data-target="#Contract">
                            <i class="fas fa-wrench"></i><br>
                                Update Contract
                        </button>
                    </div>
<!-- Modal Add Staff-->
        <div class="modal fade" id="addStaff" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Staff</h5>
            </div>
            <div class="modal-body">
                <form method="post"  action="insertStaff.php">
                    <div class="form-group">
                        <label for="fName">First Name</label>
                        <input type="text" class="form-control" name="fName" placeholder="First Name" required pattern="[a-zA-Z ]{1,30}">
                    </div>
                    <div class="form-group">
                        <label for="lName">Last Name</label>
                        <input type="text" class="form-control" name="lName" placeholder="Last Name" required pattern="[a-zA-Z]{1,30}">
                    </div>
                    <div class="form-group">
                        <label for="lName">Username</label>
                        <input type="text" class="form-control" name="Username" placeholder="Username" required pattern="[A-Za-z0-9]{1,50}">
                    </div>
                    <div class="form-group">
                        <label for="lName">Personal Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Personal Email" required>
                    </div>
                    <div class="form-group">
                        <label for="lName">Phone number</label>
                        <input type="text" class="form-control" name="phoneNumber" placeholder="Phone number" required pattern="[0-9]{6,11}">
                    </div>
                    <fieldset class="form-group">
                        <legend class="col-form-label col-sm">Gender</legend>
                        <div class="form-check form-check-inline" >
                            <input class="form-check-input" type="radio" name="Gender" value="Male" id="Male" required>
                            <label class="form-check-label" for="Male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Gender" value="Female" id="Female" required>
                            <label class="form-check-label" for="Female">Female</label>
                    </fieldset>
                    <div class="form-group">
                        <label for="staffPassword">Password</label>
                        <input type="text" class="form-control" name="staffPassword" placeholder="Password *" required pattern="[A-Za-z0-9]{1,16}">
                        <small id="passwordHelpInline" class="text-muted">
                        </small>
                    </div>
                    <div class="form-group">
                    <label for="Profession">Profession</label>
                        <select class="form-control" name="Profession">
                        <option value="Doctor">Doctor</option>
                        <option value="Nurse">Nurse</option>
                        <option value="Other">Other</option>
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
                    <div class="form-group">
                                <label>Work Start Date</label>
                                <input type="date" class="form-control" name="startDate" style="color:gray;" value="" min="1997-01-01" max="<?php $date = date('Y-m-d');
                                                                                                                                                echo $date; ?>" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-bottom: 0px">Close</button>
                <input type="submit" name="addStaffSubmit" class="btn btn-primary " style="margin-bottom: 0px" value="Add">
            </div>
            </form>
            </div>
            </div>
        </div>

<!-- Modal Diploma-->
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
                    <input type="text" class="form-control" name="DIPID" placeholder="Diploma ID" required pattern="[A-Za-z0-9]{1,20}">
                </div>
                <div class="form-group">
                    <label for="SID">Staff ID</label>
                    <input type="text" class="form-control" name="SID" placeholder="Staff ID" required pattern="[A-Za-z0-9]{10}">
                </div>
                <div class="form-group">
                    <label for="college">College</label>
                    <input type="text" class="form-control" name="college" placeholder="College" required pattern="[A-Za-z ]{1,30}">
                </div>
                <div class="form-group">
                    <label for="nation">Nation</label>
                    <input type="text" class="form-control" name="nation" placeholder="Nation" required pattern="[A-Za-z ]{1,20}">
                </div>
                <div class="form-group">
                    <label for="gYear">Graduation Year</label>
                    <input type="text" class="form-control" name="gYear" placeholder="Graduation Year" required pattern="[0-9]{1,4}">
                </div>
                <div class="form-group">
                    <label for="major">Major</label>
                    <input type="text" class="form-control" name="major" placeholder="Major" required pattern="[A-Za-z ]+">
                </div>
                <div class="form-group">
                    <label for="specializedField">Specialized Field</label>
                    <input type="text" class="form-control" name="specializedField" placeholder="Specialized Field" required pattern="[A-Za-z ]{1,30}">
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

        <div class="modal fade" id="Contract" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Update Contract</h5>
            </div>
            <div class="modal-body">
                <form method="post"  action="updateContract.php">
                    <div class="form-group">
                        <label for="ID">Contract ID</label>
                        <input type="text" class="form-control" name="ContractID" placeholder="ID" required pattern="[0-9]+">
                    </div>
                    <div class="form-group">
                                <label>Expiration date</label>
                                <input type="date" class="form-control" name="exDate" style="color:gray;" value="" min="<?php $date = date('Y-m-d');
                                                                                                                                echo $date; ?>" max="2030-12-31" required>
                            </div>
                            <div class="form-group">
                        <label for="salary">Salary</label>
                        <input type="text" class="form-control" name="salary" placeholder="Salary" required pattern="[0-9]+">
                    </div>
                    <div class="form-group">
                        <label for="director">Employer's name</label>
                        <input type="text" class="form-control" name="director" placeholder="Employer's name" required pattern="[A-Za-z ]{1,20}">
                    </div>
                    <div class="form-group">
                        <label for="dPosition">Employer's position</label>
                        <input type="text" class="form-control" name="dPosition" placeholder="Employer's Position" required pattern="[A-Za-z ]{1,20}">
                    </div>
                    <div class="form-group">
                        <label for="position">Employee's position</label>
                        <input type="text" class="form-control" name="position" placeholder="Employee's Position" required pattern="[A-Za-z ]{1,20}">
                    </div>
                    <div class="form-group">
                    <label for="form">Form of Employment</label>
                        <select class="form-control" name="form">
                        <option value="Full-Time">Full-Time</option>
                        <option value="Part-Time">Part-Time</option>
                        <option value="Intern">Intern</option>
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="assure">Assuarance</label>
                        <input type="text" class="form-control" name="assure" placeholder="Assuarance" required pattern="[0-9]+">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-bottom: 0px">Close</button>
                <input type="submit" name="updateContract" class="btn btn-primary " style="margin-bottom: 0px" value="Update">
            </div>
            </form>
            </div>
            </div>
        </div>

<!-- Modal Add Contract-->
        <div class="modal fade" id="addContract" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Contract</h5>
            </div>
            <div class="modal-body">
                <form method="post"  action="addContract.php" >
                    <div class="form-group" >
                        <label for="SID">staff ID</label>
                        <input type="text" class="form-control" name="SID" placeholder="staff ID" required pattern="[A-Za-z0-9]{10}">
                    </div>
                    <div class="form-group">
                                <label>Expiration date</label>
                                <input type="date" class="form-control" name="exDate" style="color:gray;" value="" min="<?php $date = date('Y-m-d');
                                                                                                                                echo $date; ?>" max="2030-12-31" required>
                            </div>
                    <div class="form-group">
                        <label for="salary">Salary</label>
                        <input type="text" class="form-control" name="salary" placeholder="Salary" required pattern="[0-9]+">
                    </div>
                    <div class="form-group">
                        <label for="hospital">Working Place </label>
                        <input type="text" class="form-control" name="hospital" placeholder="Working Place" required pattern="[A-Za-z ]{1,20}">
                    </div>
                    <div class="form-group">
                        <label for="hospitaladdress">Working Place's Address</label>
                        <input type="text" class="form-control" name="hospitaladdress" placeholder="Working Place's Address" required pattern='[^"]+'>
                    </div>
                    <div class="form-group">
                        <label for="director">Employer's name</label>
                        <input type="text" class="form-control" name="director" placeholder="Employer's name" required pattern="[A-Za-z ]{1,20}">
                    </div>
                    <div class="form-group">
                        <label for="dPosition">Employer's position</label>
                        <input type="text" class="form-control" name="dPosition" placeholder="Employer's Position" required pattern="[A-Za-z ]{1,20}">
                    </div>
                    <div class="form-group">
                        <label for="position">Employee's position</label>
                        <input type="text" class="form-control" name="position" placeholder="Employee's Position" required pattern="[A-Za-z ]{1,20}">
                    </div>
                    <div class="form-group">
                        <label for="CCCD">Identification</label>
                        <input type="text" class="form-control" name="CCCD" placeholder="Identification" required pattern="[A-Za-z0-9]{1,12}">
                    </div>
                    <div class="form-group">
                    <label for="form">Form of Employment</label>
                        <select class="form-control" name="form">
                        <option value="Full-Time">Full-Time</option>
                        <option value="Part-Time">Part-Time</option>
                        <option value="Intern">Intern</option>
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="assure">Assuarance</label>
                        <input type="text" class="form-control" name="assure" placeholder="Assuarance" required pattern="[0-9]+">
                    </div>
                    <div class="form-group">
                        <label for="address">Employee's Address</label>
                        <input type="text" class="form-control" name="address" placeholder="Employee's Address" required pattern='[^"]+'>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-bottom: 0px">Close</button>
                <input type="submit" name="addContractSubmit" class="btn btn-primary " style="margin-bottom: 0px" value="Add">
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