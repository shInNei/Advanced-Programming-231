<?php require_once('../includes/header.php')?>
<link rel="stylesheet" href="../assets/css/style.css">
<style>
        body {
            font-family: Arial, sans-serif; 
        }

        .card {
            margin-top: 20px;
        }

        .card-header {
            background-color: #00856f;
            color: white;
            font-weight: bold;
        }

        .form-control[readonly] {
            background-color: #f8f9fa;
        }
</style>
</head>
<body>
<?php require_once('navbar.php')?>
<?php
    require_once("../classes/Dbh.php");
    $db = new Dbh();
    $result = $db->select("medication", "*", array("patientID" => $_GET['patientID'], "prescribeDate" => $_GET['date']), true);
?>
<div class="content-wrap">
    <div class="container">
        <div class="card">
            <div class="card-header">
                Patient's Medical Record 
            </div>
            <div class="card-body">
                <center>
                    <h3 class="text-success"><strong>Prescription</strong></h3>
                </center>
                    <?php
                     if($result) {
                        echo '<table class = "table">';
                        echo '<thead>';
                        echo '<tr>';
                        echo '<th scope="col" class="text-center">ID</th>';
                        echo "<th scope='col' class='text-center'>Doctor's ID</th>";
                        echo "<th scope='col' class='text-center'>Medication's ID</th>";
                        echo "<th scope='col' class='text-center'>Illness's ID</th>";
                        echo '<th scope="col" class="text-center">Dosage</th>';
                        echo '<th scope="col" class="text-center">Prescibe Date</th>';
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';
                        foreach($result as $pres) {
                            echo "<tr>";
                            echo '<td class="text-center">'.$pres['ID'].'</td>';
                            echo '<td class="text-center">'.$pres['doctorID'].'</td>';
                            echo '<td class="text-center">'.$pres['medID'].'</td>';
                            echo '<td class="text-center">'.$pres['illID'].'</td>';
                            echo '<td class="text-center">'.$pres['dosage'].'</td>';
                            echo '<td class="text-center">'.date_format(date_create($pres['prescribeDate']), "d/m/Y").'</td>';
                            echo "</tr>";
                        }
                        echo '</tbody>';
                        echo '</table>';
                     } else {
                        echo '<center><p>This patient had no prescription on this day.</p></center>';
                     }
                    ?>  
                <div class="col-sm">
                    <a href="patientInfo.php?Patient_ID=<?php echo $_GET['patientID']?>" style="margin-bottom: 0px" class="btn btn-primary" style="margin-bottom: 0px">Close</a>
                </div>    
            </div>
        </div>
    </div>
</div>
<?php require_once('../includes/footer.php') ?>