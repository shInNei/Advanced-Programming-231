<?php require_once('../includes/header.php');
?>

<link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

    <?php require_once('navbar.php') ?>

    <div class="content-wrap login">
        <?php
        // echo var_dump($_SESSION)."<br>";
        if (isset($_SESSION['msg'])) {
            echo
            "<div class='alert alert-warning' role = 'alert'>
                " . $_SESSION['msg'] . "
            </div>";
            unset($_SESSION['msg']);
        }
        ?>
        <div class="printarea login-box">
            <div class="login-image form-header">
                <h2>Test Result Form</h2>
            </div>
            <form method="post" action="process/processTR.php" autocomplete="off">
                <div class="login-form">
                    <div class="form-group form-category">
                        <h2>Patient Information</h2>
                    </div>
                    <div class="form-group row">
                        <div class="col-4">
                            <label for="">ID</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <input type="checkbox" id="pIdSelector" name="pIdSelector" aria-label="Checkbox for following text input">
                                </div>
                                <input type="text" id="pID" class="form-control" name="patientID" placeholder="ID.." aria-label="ID" onkeyup="showHint(this.value,'patientID.php','suggestions','pID')" disabled>
                            </div>
                            <div id="suggestions" class="suggestion"></div>
                        </div>
                        <div class="col-4">
                            <label for=""> First Name <span class="require">*</span></label>
                            <input type="text" id="fname" class="form-control" name="pFName" placeholder="First name.." aria-label="firstName" required>
                        </div>
                        <div class="col-4">
                            <label for=""> Last Name <span class="require">*</span></label>
                            <input type="text" id="lname" class="form-control" name="pLName" placeholder="Last name.." aria-label="lastName" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-8">
                            <label for="">Email address <span class="require">*</span></label>
                            <input type="email" id="email" class="form-control" name="email" placeholder="***@******.com" pattern="^\w+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*\.com$" title="***@*****.com" required>

                        </div>
                        <div class="col-4">
                            <label> Gender</label>
                            <select name="gender" id="gender" class="form-select" aria-label="form gender-select">
                                <option selected value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-category">
                        <h2>Test Result</h2>
                    </div>
                    <div class="form-group row">
                        <div class=" col">
                            <label for="">Height <span class="require">*</span></label>
                            <input type="text" class="form-control" pattern="^\d+$" title="Only Whole Number" name="height" placeholder="(cm)" aria-label="height" required>
                        </div>
                        <div class=" col">
                            <label for="">Weight <span class="require">*</span></label>
                            <input type="text" class="form-control" pattern="^\d+\.\d$" title="Only Decimal Number and one after decimal point" name="weight" placeholder="(kg)" aria-label="weight" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class=" col">
                            <label for="">Body Temperature <span class="require">*</span></label>
                            <input type="text" class="form-control" pattern="^\d\d\.\d$" title="**.*" name="temp" placeholder="(*C)" aria-label="temp" required>
                        </div>
                        <div class=" col">
                            <label for="">Heart Rate <span class="require">*</span></label>
                            <input type="text" class="form-control" pattern="^\d+$" title="Only Whole Number" name="hRate" placeholder="(l/p)" aria-label="hr" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class=" col">
                            <label for="">Systolic Pressure <span class="require">*</span></label>
                            <input type="text" class="form-control" pattern="^\d+$" title="Only Whole Number" name="sPressure" placeholder="(mmHg)" aria-label="sPressure" required>
                        </div>
                        <div class=" col">
                            <label for="">Diastolic Pressure <span class="require">*</span></label>
                            <input type="text" class="form-control" pattern="^\d+$" title="Only Whole Number" name="dPressure" placeholder="(mmHg)" aria-label="dPressure" required>
                        </div>
                    </div>

                    <div class="text-center"><input type="submit" name="testResult" class="btn btn-primary" value="Submit"></div>
                </div>
            </form>
        </div>
    </div>

    <script src="../assets/jscript/showHint.js"></script>
    <script>
        const idSelector = document.getElementById("pIdSelector");
        const pID = document.getElementById("pID");
        const fname = document.getElementById("fname");
        const lname = document.getElementById("lname");
        const email = document.getElementById("email");
        const gender = document.getElementById("gender");

        idSelector.addEventListener("change", function() {
            if (idSelector.checked) {
                pID.required = true;
                pID.disabled = false;
                fname.disabled = true;
                lname.disabled = true;
                email.disabled = true;
                gender.disabled = true;
            } else {
                pID.required = false;
                pID.disabled = true;
                fname.disabled = false;
                lname.disabled = false;
                email.disabled = false;
                gender.disabled = false;
            }
        });
    </script>

    <?php require_once('../includes/footer.php') ?>