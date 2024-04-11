<?php

require_once('../includes/header.php')

?>

<link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <?php require_once('navbar.php') ?>

    <div class="content-wrap login">
        <div class="login-box" >
            <div class="login-image" style = "padding:25px;background-color:#00856f;">
                <h2 style = "color:white;">Personal Leave Information</h2>
            </div>
            <form action="leaveRegister.php" method="post">
                <div class="login-form">
                    <div class="form-group row">
                        <div class="col-4">
                            <label for="">ID</label>
                            <input type="text" class="form-control" name="staffID" placeholder="ID.." aria-label="ID">
                        </div>
                        <div class="col-8">
                            <label for="">Full Name</label>
                            <input type="text" class="form-control" name="staffName" placeholder="" aria-label="fullName">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="">Role</label>
                            <input type="text" class="form-control" name="staffRole" placeholder="Doctor,Nurse,..." aria-label="role">
                        </div>
                        <div class="col">
                            <label for="">Start Date</label>
                            <input type="date" class="form-control" name="staffSDate" style="color: gray;" value="" max="<?php echo date('Y-m-d'); ?>" required>
                        </div>

                    </div>
                    <div class="form-group" style="color:#00856f; border-bottom: solid 2px;">
                        <h2>Reason of Absence</h2>
                    </div>
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="">Type of Leave</label>
                            <select name="leaveType" id="" class="form-select" aria-label=".form leave-select">
                                <option value="al" selected>Annual Leave</option>
                                <option value="spl">Special Leave</option>
                                <option value="sl">Sick Leave</option>
                            </select>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="">From Date</label>
                            <input type="date" class="form-control" name="fromDate" style="color: gray;" value="" min="<?php echo date('Y-m-d', strtotime('+5 days')); ?>" required>
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

    <?php require_once('../includes/footer.php') ?>
    <?php

    require_once('../classes/control/StaffControl.php');
    $staffCon = new StaffControl();

    if (isset($_POST['leaveSubmit'])) {
        $fullName = explode(' ', $_POST['staffName']);
        $doctorIdentifier = array(
            'ID' => $_POST['staffID'],
            'fName' => $fullName[0],
            'startDate' => $_POST['staffSDate'],
            'task' => $_POST['staffRole']
        );

        $id =  $staffCon->search('ID', $doctorIdentifier);

        if ($id) {
            $endDate = date('Y-m-d',strtotime($_POST['fromDate'] . ' + 5 days'));
            
            $regLeaveItems = array(
                'staffID' => $id['ID'],
                'startDate' => $_POST['fromDate'],
                'endDate' => date('Y-m-d',strtotime($_POST['fromDate'] . ' + '.$_POST['leaveDuration'].' days')),
                'leaveType' => $_POST['leaveType'],
                'reason' => $_POST['reason']
            );
            
            $staffCon->addLeaveRequest($regLeaveItems);
        }
    }
