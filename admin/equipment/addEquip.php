<?php
require_once('../../includes/header.php');
?>
<link rel="stylesheet" href="../../assets/css/style.css">

</head>

<body>
    <?php require_once('navbarEquip.php'); ?>

    <div class="login content-wrap">
        <div class="login-image">
            <h2>Welcome Admin</h2>
        </div>
        <div class="login-box">
            <ul class="nav nav-tabs nav-justified" role="tablist">
                <div class="slider"></div>
                <li class="nav-item">
                    <a class="nav-link active" id="findTab" data-bs-toggle="tab" data-bs-target="#find-nav" type="button" role="tab" aria-controls="find-nav" aria-selected="true">Find Equipment</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="addTab" data-bs-toggle="tab" data-bs-target="#add-nav" type="button" role="tab" aria-controls="add-nav" aria-selected="false">Add Equipment</a>
                </li>
            </ul>
            <div class="tab-content" id="nav-tabContent" style="margin-top:15px;">
                <div class="tab-pane fade show active" id="find-nav" role="tabpanel" aria-labelledby="findTab">
                    <form method="post" action="addEquip.php">
                        <div class="login-form">
                            <div class="form-group">
                                <label>Equipment name</label>
                                <input type="text" class="form-control" name="equipName" placeholder="Name" required>
                            </div>
                            <div class="text-center"><input type="submit" name="findEquipSubmit" class="btn btn-primary " value="Find"></div>
                        </div>
                    </form>

                    <?php
                    if (isset($_POST["equipName"])) {
                        require_once('equipSearch.php');
                        if (count($results)) {
                            echo '<table class="table table-striped table-bordered table-hover">
                                    <thead class="table-light" bgcolor="#00856f">
                                        <tr class = "bg-primary">
                                            <th scope="col"> #</th>
                                            <th scope="col">Equipment Name</th>
                                            <th scope = "col">Condition </th>
                                            <th scope = "col">Availability </th>
                                            <th scope = "col">No.Usage </th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                            foreach (array_values($results) as $equipment) {
                                # code...
                    ?>
                                <tr>
                                    <td scope = "row"><?php echo $equipment["id"] ?></td>
                                    <td><?php echo $equipment["equipName"] ?></td>
                                    <td><?php echo $equipment["con"] ?></td>
                                    <td><?php echo $equipment["availability"] ?></td>
                                    <td><?php echo $equipment["noUsage"] ?></td>
                                    

                                </tr>
                    <?php
                            }
                            echo "</tbody>";
                            echo "</table>";
    
                        } 
                    }
                    ?>

                </div>
                <div class="tab-pane fade show" id="add-nav" role="tabpanel" aria-labelledby="addTab">
                    <form method="post" action="processAdd.php">
                        <div class="login-form">
                            <div class="form-group">
                                <label>Equipment name</label>
                                <input type="text" class="form-control" name="equipName" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                                <label>Recommended period of usage</label>
                                <input type="text" class="form-control" pattern = "^[1-9]\d*$" title = "Only positive number and at least 1"name="medTilMain" placeholder="" required>
                            </div>
                            <div class="text-center"><input type="submit" name="addEquipSubmit" class="btn btn-primary " value="Add"></div>
                        </div>
                    </form>
                </div>

            </div>



        </div>
    </div>
    <?php
    require_once('../../includes/footer.php');
