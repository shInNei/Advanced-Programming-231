<?php require_once('../includes/header.php')

?>
<link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <?php require_once('navbar.php') ?>

    <div class="content-wrap login">
        <div class="printarea login-box" style="padding-top:25px">
            <form method="post" action="processPrescription.php">
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
                    <div class="form-group" style="color:#00856f; border-bottom: solid 2px;">
                        <h2>Diagnosis</h2>
                    </div>
                    <div class="form-group row">
                        <div class=" col">
                            <label for="">Diagnos with:</label>
                            <input type="text" class="form-control" name="pIllness" placeholder="" aria-label="Illness">
                        </div>
                    </div>
                    <div class="form-group" style="color:#00856f; border-bottom: solid 2px;">
                        <h2>Treatment</h2>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="">Drug Name</label>
                            <input class="form-control" list="medData" id="drugDataList" placeholder="Type to search...">
                            <?php
                            require_once(__DIR__.'/../assets/func/generateDataList.php');
                            require_once(__DIR__.'/../classes/control/MedControl.php');
                            require_once(__DIR__.'/../assets/func/arrayByKey.php');
                            
                            $mControl = new MedControl();
                            $options = $mControl->medSearch('');
                            $optionNames = extractItemsByKey($options,'medName');
                            // $options = array('foo');
                            echo createDataList("medData", $optionNames);                            
                            ?>
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
                            <input type="number" class="form-control" name="drugDosage" placeholder="(per day)" min = '1' aria-label="Drug dosage">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="">Equipment Name</label>
                            <input class="form-control" list="equipData" id="equipDatalist" placeholder="Type to search...">
                            <?php
                            require_once(__DIR__.'/../assets/func/generateDataList.php');
                            require_once(__DIR__.'/../classes/control/equipmentControl.php');
                            require_once(__DIR__.'/../assets/func/arrayByKey.php');
                            
                            $mControl = new EquipmentControl();
                            $options = $mControl->equipmentSearchMax();
                            $optionNames = extractItemsByKey($options,'equipName');
                            // $options = array('foo');
                            echo createDataList("equipData", $optionNames);                            
                            ?>
                        </div>
                    </div>

                    <div class="text-center"><input type="submit" name="patient-login" class="btn btn-primary" value="Prescribe"></div>
                </div>
            </form>
        </div>
    </div>

    <?php require_once('../includes/footer.php') ?>