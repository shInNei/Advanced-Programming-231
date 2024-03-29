<?php
require_once("../../includes/header.php");
?>
</head>
<link rel="stylesheet" href="../../assets/css/style.css">
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<body>
    <div class="container login" id = "addStaff">
        <div class="login-box">
            <form method="post"  action="insertStaff.php">
                <div class="login-form"> 
                        <div class="form-group">
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
                    <fieldset class="form-group">
                        <legend class="col-form-label col-sm">Gender</legend>
                        <div class="form-check form-check-inline" >
                            <input class="form-check-input" type="radio" name="Gender" value="M" id="Male">
                            <label class="form-check-label" for="Male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Gender" value="F" id="Female">
                            <label class="form-check-label" for="Female">Female</label>
                </fieldset>
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
                    <div class="text-center"><input type="submit" name="addStaffSubmit" class="btn btn-primary " value="Add"></div>
                </div>
            </form>            
        </div>
    </div>
<?php
require_once("../../includes/footer.php");
?>