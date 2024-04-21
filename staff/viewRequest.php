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
        <div class="login-image">
            <h2>Equipment Request History</h2>
        </div>
        <div class="login-box">
            <div class="input-group search-table">
                <div class="input-group-text">
                <select id="optionFilter">
                <option value="all" selected>All Option</option>
            </select>
                </div>
            
            <input type="text" class = "form-control"id="requestInput" placeholder="Type to search...">
            </div>
            
            <table class="table table-hover table-striped table-border">
                <thead id = "requestTableHead">
                    <th scope="col">#</th>
                    <th scope="col">Equipment ID</th>
                    <th scope="col">Patient ID</th>
                    <th scope="col">Status </th>
                    <th scope="col">Action</th>
                </thead>
                <tbody id="requestTable">
                    <?php
                    require_once(__DIR__ . "/../classes/control/equipmentControl.php");
                    $eControl = new EquipmentControl();
                    $results = $eControl->equipRequestSearch(array('*'), array('staffID' => $_SESSION['userid']));
                    if (is_array($results)) {
                        foreach ($results as $equipRequest) {
                            $hasReturned = $equipRequest['hasReturn'];
                            echo
                            "<tr>
                                <td> " . $equipRequest["ID"] . "</td>
                                <td> " . $equipRequest["equipID"] . "</td>
                                <td> " . $equipRequest["patientID"] . "</td>
                                <td> " . (($equipRequest["approve"] === 'T') ? "Approved" : "Waiting") . "</td>
                                <td> " . (($equipRequest["approve"] === 'T') ? (($hasReturned !== "T") ? "<a href = 'process/returnEquip.php?id=" . $equipRequest["ID"] . "&eId=" . $equipRequest['equipID'] . "&sID=" . $equipRequest['staffID'] . "' class = 'btn btn-primary' > Return </a>" : "<i class='fas fa-check-circle'></i>") : "<i class='fas fa-times-circle'></i>") . "</td>
                            </tr>";
                        }
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="../assets/jscript/filterTable.js"></script>
    <script src = "../assets/jscript/generateOption.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded",function(){
            generateSelectOptions("requestTableHead","requestTable","optionFilter");
        });
        document.addEventListener("DOMContentLoaded", function() {
            filterTable("requestInput", "requestTable","optionFilter");
            document.getElementById("optionFilter").addEventListener("change", function(){
                filterTable("requestInput", "requestTable","optionFilter");
            });
        });
    </script>

    <?php require_once('../includes/footer.php') ?>