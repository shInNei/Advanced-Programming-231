<?php

session_start();

if(!isset($_SESSION['loginad']) || $_SESSION['loginad'] !== true){
    // If not logged in, move to index 
    header('location: ../../index.php');
    exit;
}
?>


<?php
require_once("../../includes/header.php"); ?>
<link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body>
    <?php
    require_once("navbar.php"); ?>
    <div class="login content-wrap" style="margin: 2% auto;">
        <div class="login-image">
            <h2>Approve Staff Leave</h2>
        </div>
        <a href="reviewLeaveHistory.php" class="login-header-link"> View History</a>
        <div class="login-box">
            <table class="table">
                <thead>
                    <th scope="col">#</th>
                    <th scope="col">Staff ID</th>
                    <th scope="col">Staff Name</th>
                    <th scope="col">Department</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Action</th>
                </thead>
                <tbody>
                    <?php
                    require_once("../../classes/control/StaffControl.php");
                    $sControl = new StaffControl();
                    $results = $sControl->searchLeaveRequest(array('*'),array('approve' => "F"),true);
                    // echo var_dump($results)."<br>";
                    if (is_array($results)) {
                        foreach ($results as $lRequest) {
                            echo "<tr>";
                            echo "<td scope = 'row'> " . $lRequest['ID'] . " </td>";
                            echo "<td> " . $lRequest['staffID'] . " </td>";
                            echo "<td> " . $lRequest['fname']." ".$lRequest['lname'] . " </td>";
                            echo "<td> " . $lRequest['department'] . " </td>";
                            echo "<td> " . $lRequest['startDate'] . " </td>";
                            echo "<td> " . $lRequest['endDate'] . " </td>";
                            echo "<td> <a href = 'approveLeave.php?id=".$lRequest['ID']."' class = 'btn btn-primary'> Approve </a> </td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>

            </table>

        </div>
    </div>
    <?php
    require_once("../../includes/footer.php"); ?>