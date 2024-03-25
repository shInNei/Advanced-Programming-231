<?php
require_once('../../includes/header.php');

?>
<link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body>
    <div class="container login" id = "addMed">
        <div class="login-box">
            <div class="login-image">

            </div>
            <form method="post" action="loginStaff.php">

                <div class="login-form">
                    <div class="form-group">
                        <label for="medName" style = "">Medicine name</label>
                        <input type="text" class="form-control" name="medName" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="staffPassword" placeholder="Password *" required>
                    </div>
                    <div class="text-center"><input type="submit" name="addMedSubmit" class="btn btn-primary " value="Add"></div>
                </div>
            </form>
        </div>
    </div>

    <?php
    require_once('../../includes/footer.php');
    ?>