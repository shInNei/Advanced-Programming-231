<?php

require_once('../includes/header.php');

?>

<link rel="stylesheet" href="../assets/css/style.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-DBjhmceckmzwrnMMrjI7BvG2FmRuxQVaTfFYHgfnrdfqMhxKt445b7j3KBQLolRl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha384-xBuQ/xzmlsLoJpyjoggmTEz8OWUFM0/RC5BsqQBDX2v5cMvDHcMakNTNrHIW2I5f" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>

<body>

    <?php require_once('navbar.php') ?>

    <div class="login content-wrap" id="addMed">
        <div class="login-image">
            <h2>Your Leave History</h2>
        </div>
        <a class="login-header-link" href="leaveRegister.php"> Return to Request</a>

        <div class="login-box">
            <div class="input-group search-table">
                <div class="input-group-text">
                    <select id="optionFilter">
                        <option value="all" selected>All Option</option>
                    </select>
                </div>

                <input type="text" class="form-control" id="leaveInput" placeholder="Type to search...">
            </div>
            <table class="table">
                <thead id = "leaveTableHead">
                    <th scope="col">#</th>
                    <th scope="col">Your ID</th>
                    <th scope="col">Leave Date</th>
                    <th scope="col">Return Date</th>
                    <th scope="col">Reason</th>
                    <th scope="col">Leave Type</th>
                    <th scope="col">Status</th>
                </thead>
                <tbody id = "leaveTable">
                    <?php
                    require_once(__DIR__ . "/../classes/control/StaffControl.php");
                    $sControl = new StaffControl();
                    // echo var_dump($_SESSION)."<br>";
                    $results = $sControl->searchLeaveRequest(array("ID", "startDate", "endDate", "reason", "leaveType", "approve"), array("staffID" => $_SESSION['userid']));
                    if (is_array($results)) {
                        foreach ($results as $leaveRequest) {
                            $approve = $leaveRequest['approve'];
                            echo
                            "<tr>
                                <td> " . $leaveRequest['ID'] . "</td>
                                <td> " . $_SESSION['userid'] . "</td>
                                <td> " . $leaveRequest['startDate'] . "</td>
                                <td> " . $leaveRequest['endDate'] . "</td>
                                <td> " . $leaveRequest['reason'] . "</td>
                                <td> " . $leaveRequest['leaveType'] . "</td>
                                <td> " . (($approve === "T") ? "<i class='fas fa-check-circle'></i>" : "<i class='fas fa-times-circle'></i>") . "</td>
                            </tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>

        </div>

    </div>



    <script src="../assets/jscript/generateOption.js"></script>
    <script src="../assets/jscript/filterTable.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            generateSelectOptions("leaveTableHead", "leaveTable", "optionFilter");
        });
        document.addEventListener("DOMContentLoaded", function() {
            filterTable("leaveInput", "leaveTable", "optionFilter");
            document.getElementById("optionFilter").addEventListener("change", function() {
                filterTable("leaveInput", "leaveTable", "optionFilter");
            });
        });
    </script>
    <?php
    require_once('../includes/footer.php');
    ?>