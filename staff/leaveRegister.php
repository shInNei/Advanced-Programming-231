<?php

require_once('../includes/header.php')

?>

<link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <?php require_once('navbar.php') ?>

    <div class="content-wrap login">
        <a href="leaveHistory.php" class="login-header-link">View History</a>
        <div class="login-box">
            <div class="login-image" style="padding:25px;background-color:#00856f;">
                <h2 style="color:white;">Personal Leave Information</h2>
            </div>
            <form action="process/processLeave.php" method="post">
                <div class="login-form">
                    <div class="form-group" style="color:#00856f; border-bottom: solid 2px;">
                        <h2>Staff Information</h2>
                    </div>
                    <div class="form-group row">
                        <div class="col-4">
                            <label for=""> ID</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <input type="checkbox" id="sIdSelector" name="sIdSelector" aria-label="Checkbox for following text input">
                                </div>
                                <input type="text" id="sID" class="form-control" name="staffID" placeholder="ID.." aria-label="ID" onkeyup="showHint(this.value,'staffID.php','suggestion','sID')" disabled>
                            </div>
                            <div class="suggestions" id="suggestion"></div>
                        </div>
                        <div class="col-4">
                            <label for="">First Name</label>
                            <input type="text" id="fname" class="form-control" name="fname" placeholder="" aria-label="firstName">
                        </div>
                        <div class="col-4">
                            <label for="">Last Name</label>
                            <input type="text" id="lname" class="form-control" name="lname" placeholder="" aria-label="lastName">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="">Email</label>
                            <input type="text" name="email" id="email" class="form-control" aria-label="email">

                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="">Role</label>
                            <input type="text" id="role" class="form-control" name="role" placeholder="Doctor,Nurse,..." aria-label="role">
                        </div>
                        <div class="col">
                            <label for="">Start Date</label>
                            <input type="date" id="startDate" class="form-control" name="sDate" style="color: gray;" value="" max="<?php echo date('Y-m-d'); ?>" required>
                        </div>

                    </div>
                    <div class="form-group" style="color:#00856f; border-bottom: solid 2px;">
                        <h2>Reason of Absence</h2>
                    </div>
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="">Type of Leave</label>
                            <select name="leaveType" id="leaveType" class="form-select" aria-label=".form leave-select">
                                <option value="al" selected>Annual Leave</option>
                                <option value="spl">Special Leave</option>
                                <option value="sl">Sick Leave</option>
                            </select>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="">From Date</label>
                            <input type="date" class="form-control" id="fromDate" name="fromDate" style="color: gray;" value="<?php echo date('Y-m-d', strtotime('+5 days')); ?>" min="<?php echo date('Y-m-d', strtotime('+5 days')); ?>" required>
                        </div>
                        <div class="col">
                            <label for="">Duration</label>
                            <input type="number" class="form-control" name="leaveDuration" placeholder="" aria-label="duration">
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="">Reason</label>
                            <input type="text" class="form-control" name="reason" placeholder="Reason of absence.." maxlength="50">
                        </div>
                    </div>
                </div>
                <div class="text-center"><input type="submit" name="leaveSubmit" class="btn btn-primary" value="Submit"></div>

            </form>

        </div>
    </div>
    <script src="../assets/jscript/showHint.js"></script>
    <script>
        document.getElementById('leaveType').addEventListener('change', function() {
            var leaveType = this.value;
            var minDate = new Date();
            if (leaveType === 'al') {
                minDate.setDate(minDate.getDate() + 5); // 5 days for Annual Leave
            } else {
                minDate.setDate(minDate.getDate()); // 1 day for Sick Leave or Special Leave
            }
            var formattedMinDate = minDate.toISOString().split('T')[0]; // Format as YYYY-MM-DD
            document.getElementById('fromDate').setAttribute('min', formattedMinDate);
            document.getElementById('fromDate').value = formattedMinDate; // Set default value
        });
    </script>
    <script>
        const sIdSelector = document.getElementById("sIdSelector");
        const sID = document.getElementById("sID");
        const fname = document.getElementById("fname");
        const lname = document.getElementById("lname");
        const role = document.getElementById("role");
        const sDate = document.getElementById("startDate");
        const email = document.getElementById("email");
        sIdSelector.addEventListener("change", function() {
            if (sIdSelector.checked) {
                sID.required = true;
                sID.disabled = false;
                fname.disabled = true;
                lname.disabled = true;
                role.disabled = true;
                sDate.disabled = true;
                email.disabled = true;
            } else {
                sID.required = false;
                sID.disabled = true;
                fname.disabled = false;
                lname.disabled = false;
                role.disabled = false;
                sDate.disabled = false;
                email.disabled = false;
            }
        });
    </script>
    <?php require_once('../includes/footer.php') ?>