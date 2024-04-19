<?php
require_once("../../includes/header.php"); ?>
<link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body>
    <?php
    require_once("navbar.php"); ?>
    <div class="login content-wrap" style="margin: 2% auto;">
        <div class="login-box">
            <table class="table">
                <thead>
                    <th scope="col">#</th>
                    <th scope="col">staffID</th>
                    <th scope="col">start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Action</th>
                </thead>
                <tbody>
                    <?php
                    require_once("../../classes/control/StaffControl.php");
                    $sControl = new StaffControl();
                    $results = $sControl->searchLeaveRequest(array('*'),array('approve' => "F"));
                    // echo var_dump($results)."<br>";
                    if (is_array($results)) {
                        foreach ($results as $lRequest) {
                            echo "<tr>";
                            echo "<td scope = 'row'> " . $lRequest['ID'] . " </td>";
                            echo "<td> " . $lRequest['staffID'] . " </td>";
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