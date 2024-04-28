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
                    <a class="nav-link active" id="maintenanceTab" data-bs-toggle="tab" data-bs-target="#maintenance-nav" type="button" role="tab" aria-controls="maintenance-nav" aria-selected="trie">Up For Maintenance</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " id="findTab" data-bs-toggle="tab" data-bs-target="#find-nav" type="button" role="tab" aria-controls="find-nav" aria-selected="false">History</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="inMaintainTab" data-bs-toggle="tab" data-bs-target="#inMaintain-nav" type="button" role="tab" aria-controls="inMaintain-nav" aria-selected="false">In Maintenance</a>
                </li>
            </ul>
            <div class="tab-content" id="nav-tabContent" style="margin-top:15px;">
                <div class="tab-pane fade show active" id="maintenance-nav" role="tabpanel" aria-labelledby="maintenanceTab">
                    <table class="table  table-bordered table-hover table-striped">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Equipment Name</th>
                                <th scope="col">Reason for maintenance</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once('maintenanceSearch.php');
                            foreach (array_values($results) as $equipment) {
                                # code...
                            ?>
                                <tr>
                                    <td><?php echo $equipment["id"] ?></td>
                                    <td><?php echo $equipment["equipName"] ?></td>
                                    <td><?php echo ($equipment["noUsage"] >= $equipment["tilMaintenance"]) ? "Due date for maintenance" : "Unexpected failure" ?></td>

                                    <td> <a href="sendMaintenance.php?id=<?php echo $equipment["id"] ?>">Maintain</a></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade show " id="find-nav" role="tabpanel" aria-labelledby="findTab">
                    <form method="post" action="inventoryMaintenance.php?tab=find-nav">
                        <div class="login-form">
                            <div class="form-group">
                                <label>Equipment name</label>
                                <input type="text" class="form-control" name="equipName" required>
                            </div>
                            <div class="text-center"><input type="submit" name="findSubmit" class="btn btn-primary " value="Find"></div>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST["findSubmit"])) {
                        require_once('findHistory.php');
                        if (count($results)) {
                            echo '<table class="table table-bordered table-hover table-striped">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col"> #</th>
                                            <th scope="col">Equipment ID</th>
                                            <th scope = "col">Equipment Name </th>
                                            <th scope = "col">Maintenance Date </th>

                                        </tr>
                                    </thead>
                                    <tbody>';
                            foreach (array_values($results) as $equipment) {
                                # code...
                    ?>
                                <tr>
                                    <td><?php echo $equipment["id"] ?></td>
                                    <td><?php echo $equipment["equipID"] ?></td>
                                    <td><?php echo $equipment["equipName"] ?></td>
                                    <td><?php echo $equipment["maintenanceDate"] ?></td>
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
                <div class="tab-pane fade show " id="inMaintain-nav" role="tabpanel" aria-labelledby="inMaintainTab">
                    <table class="table table-bordered table-hover table-striped">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Equipment Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once('inMaintainSearch.php');
                            foreach (array_values($results) as $equipment) {
                                # code...
                            ?>
                                <tr>
                                    <td><?php echo $equipment["id"] ?></td>
                                    <td><?php echo $equipment["equipName"] ?></td>
                                    <td> <a href="doneMaintain.php?id=<?php echo $equipment["id"] ?>">Finish</a></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            


        </div>
    </div>
    <script src="../../assets/jscript/directToTab.js"></script>
    <?php
    require_once('../../includes/footer.php');
