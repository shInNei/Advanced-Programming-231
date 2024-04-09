<?php
require_once('../../includes/header.php');

?>
<link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body>
<?php require_once('navbarMed.php')?>
    
    <div class="login content-wrap" id="addMed">
        <div class="login-image">
            <h2>Welcome Admin</h2>
        </div>
        <div class="login-box">
            <ul class="nav nav-tabs nav-justified" role="tablist">
                <div class="slider"></div>
                <li class="nav-item">
                    <a class="nav-link active" id="restockTab" data-bs-toggle="tab" data-bs-target="#restock-nav" type="button" role="tab" aria-controls="restock-nav" aria-selected="true">Find Medicine</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="addTab" data-bs-toggle="tab" data-bs-target="#add-nav" type="button" role="tab" aria-controls="add-nav" aria-selected="false">Add Medicine</a>
                </li>
            </ul>
            <div class="tab-content" id="nav-tabContent" style="margin-top:15px;">
                <div class="tab-pane fade show active" id="restock-nav" role="tabpanel" aria-labelledby="restockTab">
                    <form method="post" action="addMed.php">
                        <div class="login-form">
                            <div class="form-group">
                                <label>Medicine name</label>
                                <input type="text" class="form-control" name="medName" placeholder="Name" required>
                            </div>
                            <div class="text-center"><input type="submit" name="findMedSubmit" class="btn btn-primary " value="Find"></div>
                        </div>
                    </form>

                    <?php
                    if (isset($_POST["medName"])) {
                        require_once('medSearch.php');
                        if (count($results)) {
                            echo '<table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col"> ID</th>
                                            <th scope="col">Medicine Name</th>
                                            <th scope = "col">In Stock </th>
                                            <th scope = "col">Recommended Dosage</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                            foreach (array_values($results) as $medicine) {
                                # code...
                    ?>
                                <tr>
                                    <td><?php echo $medicine["ID"] ?></td>
                                    <td><?php echo $medicine["medName"] ?></td>
                                    <td><?php echo $medicine["recommendedDosage"] ?></td>
                                    <td><?php echo $medicine["inStock"] ?></td>
                                </tr>
                    <?php
                            }
                            echo "</tbody>";
                            echo "</table>";
                        } //else {
                        //     echo "<h2> The medicine is not available </h2>";
                        // }
                    }


                    ?>
                </div>
                <div class="tab-pane fade show" id="add-nav" role="tabpanel" aria-labelledby="addTab">
                    <form method="post" action="processAddMed.php">
                        <div class="login-form">
                            <div class="form-group">
                                <label>Medicine name</label>
                                <input type="text" class="form-control" name="medName" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                                <label>Lot Number</label>
                                <input type="text" class="form-control" name="medLot" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" class="form-control" name="medPrice" placeholder="Price" required>
                            </div>
                            <div class="form-group">
                                <label> Type</label>
                                <select name="medType" id="" class="form-select" aria-label=".form-select-sm example">
                                    <option value="Liquid">Liquid</option>
                                    <option value="Tablet">Tablet</option>
                                    <option value="Capsule">Capsule</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label> Quantity</label>
                                <input type="text" class="form-control" name="medQuantity" placeholder="Amount to add (at least 1)" required>
                            </div>
                            <div class="form-group">
                                <label> Recommended Dosage</label>
                                <input type="text" class="form-control" name="medDosage" placeholder="Amount to add (at least 1)" required>
                            </div>
                            <div class="form-group">
                                <label>Manufacture date</label>
                                <input type="date" class="form-control" name="medManuDate" style="color:gray;" value="" min="1997-01-01" max="<?php $date = date('Y-m-d');
                                                                                                                                                echo $date; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Expiration date</label>
                                <input type="date" class="form-control" name="medExpireDate" style="color:gray;" value="" min="<?php $date = date('Y-m-d');
                                                                                                                                echo $date; ?>" max="2030-12-31" required>
                            </div>
                            <div class="text-center"><input type="submit" name="addMedSubmit" class="btn btn-primary " value="Add"></div>
                        </div>
                    </form>
                </div>

            </div>



        </div>
    </div>

    <?php
    require_once('../../includes/footer.php');
    ?>