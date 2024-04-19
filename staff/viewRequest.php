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
           <table class = "table table-hover table-striped table-border">
            <thead>
                <th scope = "col">#</th>
                <th scope = "col">Equipment ID</th>
                <th scope = "col">Patient ID</th>
                <th scope = "col">Status </th>
                <th scope = "col">Action</th>
            </thead>
            <tbody>
                <?php
                    require_once(__DIR__."/../classes/control/equipmentControl.php");
                    $eControl = new EquipmentControl();
                    $results = $eControl->equipRequestSearch(array('*'),array('staffID' => $_SESSION['userid']));
                    if(is_array($results)){
                        foreach($results as $equipRequest){
                            $hasReturned = $equipRequest['hasReturn'];
                            echo 
                            "<tr>
                                <td> ".$equipRequest["ID"]."</td>
                                <td> ".$equipRequest["equipID"]."</td>
                                <td> ".$equipRequest["patientID"]."</td>
                                <td> ".(($equipRequest["approve"] === 'T')? "Approved":"Waiting")."</td>
                                <td> ".(($hasReturned !== "T")?"<a href = 'process/returnEquip.php?id=".$equipRequest["ID"]."&eId=".$equipRequest['equipID']."&sID=".$equipRequest['staffID']."' class = 'btn btn-primary' > Return </a>":"<i class='fa fa-check'></i>"). "</td>
                            </tr>";
                        }
                    }
                
                ?>
            </tbody>
           </table>
        </div>
    </div>

    
    <?php require_once('../includes/footer.php') ?>