<?php
require_once("../../includes/header.php");
?>
</head>
<link rel="stylesheet" href="../../assets/css/style.css">
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<body>
    <div class="container login" id = "addStaff">
        <div class="login-box">
            <form method="post"  action="loginStaff.php">
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
                        
                            <input class="form-check-input" type="radio" name="Gender" id="Male">
                            <label class="form-check-label" for="Male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Gender" id="Female" checked>
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
                    <label for="staffPassword">Profession</label>
                        <select class="form-control ">
                        <option>Doctor</option>
                        <option>Nurse</option>
                        <option>Other</option>
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="medName">Department ID</label>
                        <input type="number" class="form-control" name="Department ID" placeholder="Department ID" required>
                    </div>
                    <div class="text-center"><input type="submit" name="addMedSubmit" class="btn btn-primary " value="Add"></div>
                </div>
            </form>            
        </div>
    </div>
<?php
require_once("../../includes/footer.php");
?>


