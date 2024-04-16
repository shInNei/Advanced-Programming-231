<?php
session_start();

?>

<?php require_once('../includes/header.php')

?>

<link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <?php require_once('navbar.php') ?>

    <div class="content-wrap login">
        <div class="login-box">
            <div class="login-image" style="padding:25px;background-color:#00856f;">
                <h2 style="color:white;">Request Equipment Information</h2>
            </div>
            <form action="processRequest.php" method="post">
                <div class="login-form">
                    <div class="form-group" style="color:#00856f; border-bottom: solid 2px;">
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
                            <label for="">Email address</label>
                            <input type="email" id="email" class="form-control" name="email" placeholder="patient@gmail.com" required>

                        </div>
                        <div class="col-4">
                            <label> Gender</label>
                            <select name="gender" id="gender" class="form-select" aria-label="form gender-select">
                                <option selected value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" style="color:#00856f; border-bottom: solid 2px;">
                        <h2>Equipment</h2>
                    </div>
                    <div class="form-group row">
                        <div class="col-4">
                            <label for="">ID</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <input type="checkbox" id="eIdSelector" name="eIdSelector" aria-label="Checkbox for following text input">
                                </div>
                                <input type="text" id="eID" class="form-control" name="eID" placeholder="ID.." aria-label="eID" onkeyup="showHint(this.value,'equipID.php','equipmentSuggestions','eID')" disabled>
                            </div>

                            <div id="equipmentSuggestions"></div>
                        </div>
                        <div class="col-8">
                            <label for=""> Name <span class="require">*</span></label>
                            <input type="text" id="equipName" class="form-control" name="eName" placeholder="Name.." aria-label="eName" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class=""></div>
                        <div class="col-8 offset-2">
                            <label for="">Request Date</label>
                            <input type="date" class="form-control" name="requestDate" style="color: gray;" value="" min="<?php echo date('Y-m-d'); ?>" required>
                        </div>

                    </div>
                    <div class="text-center"><input type="submit" name="requestSubmit" class="btn btn-primary" value="Submit"></div>
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
        const eIdSelector =document.getElementById("eIdSelector");
        const eName =document.getElementById("equipName");
        
        eIdSelector.addEventListener("change", function() {
            console.log(eIdSelector.checked);
            if (eIdSelector.checked) {
                eID.required = true;
                eID.disabled = false;
                eName.disabled = true;
            } else {
                eID.required = false;
                eID.disabled = true;
                eName.disabled = false;
                
            }
        });
    </script>
    <?php require_once('../includes/footer.php') ?>