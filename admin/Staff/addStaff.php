<?php
require_once("../../includes/header.php");
?>
</head>
<link rel="stylesheet" href="../../assets/css/style.css">
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
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

    <div class="container login" id = "addStaff">
        <div class="login-box">
            <form method="post"  action="insertStaff.php">
                <div class="login-form"> 
                        <div class="form-group" style="margin-top:25px">
                            <label for="fName">First Name</label>
                            <input type="text" class="form-control" name="fName" placeholder="First Name" required>
                        </div>
                        <div class="form-group">
                            <label for="lName">Last Name</label>
                            <input type="text" class="form-control" name="lName" placeholder="Last Name" required>
                        </div>
                        <div class="form-group">
                            <label for="lName">Username</label>
                            <input type="text" class="form-control" name="Username" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <label for="lName">Personal Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Personal Email" required>
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
                        <input type="text" class="form-control" name="staffPassword" placeholder="Password *" required>
                        <small id="passwordHelpInline" class="text-muted">
                        Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
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
                                <input type="date" class="form-control" name="dateS" style="color:gray;" value="" min="1997-01-01" max="<?php $date = date('Y-m-d');
                                                                                                                                                echo $date; ?>" required>
                    </div>
                    <div class="text-center"><input type="submit" name="addStaffSubmit" class="btn btn-primary " value="Add"></div>
                </div>
            </form>            
        </div>
    </div>
<?php
require_once("../../includes/footer.php");
?>


