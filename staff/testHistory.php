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
    $result = $db->select("test_result", "*", array("patientID" => $_GET['patientID'], "test_date" => $_GET['date']), true);
?>
<div class="content-wrap">
    <div class="container">
        <div class="card">
            <div class="card-header">
                Patient's Medical Record 
            </div>
            <div class="card-body">
                <center>
                    <h3 class="text-success"><strong>Test Result</strong></h3>
                </center>
                    <?php
                     if($result) {
                        echo '<table class = "table">';
                        echo '<thead>';
                        echo '<tr>';
                        echo '<th scope="col" class="text-center">ID</th>';
                        echo '<th scope="col" class="text-center">Weight</th>';
                        echo '<th scope="col" class="text-center">Height</th>';
                        echo '<th scope="col" class="text-center">Body Temperature</th>';
                        echo '<th scope="col" class="text-center">Heart Rate</th>';
                        echo '<th scope="col" class="text-center">Systolic Pressure</th>';
                        echo '<th scope="col" class="text-center">Diastolic Pressure</th>';
                        echo '<th scope="col" class="text-center">Test Date</th>';
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';
                        foreach($result as $tr) {
                            echo "<tr>";
                            echo '<td class="text-center">'.$tr['ID'].'</td>';
                            echo '<td class="text-center">'.$tr['weight'].'</td>';
                            echo '<td class="text-center">'.$tr['height'].'</td>';
                            echo '<td class="text-center">'.$tr['body_temp'].'</td>';
                            echo '<td class="text-center">'.$tr['heart_rate'].'</td>';
                            echo '<td class="text-center">'.$tr['systolic_pressure'].'</td>';
                            echo '<td class="text-center">'.$tr['diastolic_pressure'].'</td>';
                            echo '<td class="text-center">'.date_format(date_create($tr['test_date']), "d/m/Y").'</td>';
                            echo "</tr>";
                        }
                        echo '</tbody>';
                        echo '</table>';
                     } else {
                        echo '<center><p>This patient had no test result on this day.</p></center>';
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