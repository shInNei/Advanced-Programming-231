<?php require_once('../includes/header.php')

?>
<link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <?php require_once('navbar.php') ?>

    <div class="content-wrap login">
        <div class="printarea login-box" style = "padding-top:25px">
            <form method="post" action="loginPatient.php">
                <div class="login-form">
                    <div class="form-group row">
                        <div class="col">
                            <label> First Name</label>
                            <input type="text" class="form-control" name="pFName" placeholder="First name" aria-label="First name">
                        </div>
                        <div class="col">
                            <label> Last Name</label>
                            <input type="text" class="form-control" name="pLName" placeholder="Last name" aria-label="Last name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-8">
                            <label> Date of Birth</label>
                            <input type="date" class="form-control" name="DoB" style="color:gray;" required>
                        </div>
                        <div class="col-4">
                            <label> Sex</label>
                            <select name="gender" id="" class="form-select" aria-label=".form gender-select">
                                <option selected value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="">Email address</label>
                            <input type="email" class="form-control" name="email" placeholder="patient@gmail.com" required>
                        </div>
                    </div>
                    <div class="form-group" style="color:#00856f; border-bottom:5%;">
                        <h2>Diagnosis</h2>
                    </div>
                    <div class="form-group row"">
                        <div class=" col">
                        <label for="">Diagnos with:</label>
                        <input type="text" class="form-control" name="pIllness" placeholder="" aria-label="Illness">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col">
                        <label for="">Drug Name</label>
                        <input type="text" class="form-control" name="drugName" placeholder="" aria-label="Drug name">
                    </div>
                    <div class="col">
                        <label for="">Drug Type</label>
                        <select name="drugType" id="" class="form-select" aria-label=".form drug-select">
                            <option selected value="Liquid">Liquid</option>
                            <option value="Pill">Pill</option>
                            <option value="Tablet">Tablet</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="">Drug Dosage </label>
                        <input type="number" class="form-control" name="drugDosage" placeholder="(per day)" aria-label="Drug dosage">
                    </div>
                </div>
                <div class="text-center"><input type="submit" name="patient-login" class="btn btn-primary" value="Prescribe"></div>
                </div>
                </form>
        </div>
    </div>

    <?php require_once('../includes/footer.php') ?>