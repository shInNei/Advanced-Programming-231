<?php require_once('../includes/header.php')?>
<?php require_once('watchCalendar.php')?>
<link rel="stylesheet" href="../assets/css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php require_once('navbar.php')?>
    <style>
        .table th {
            background-color: #00856f;
            color: #fff;
        }
        .view-details-btn {
            background-color: #00856f; 
            border: none;
            color: #ffffff; 
            text-decoration: none;
            transition: background-color 0.3s ease; 
            padding: 5px 10px; 
            border-radius: 5px; 
        }

        .view-details-btn:hover {
            background-color: #45a049; 
        }
    </style>
    <div class="content-wrap login" style="width:900px">
    <div class="login-box" style="height:700px; width:900px"> 
        <table class="table" id="myTable">
            <thead class="thead-dark">
                <tr>
                <th scope="col" class="text-center">ID</th>
                <th scope="col" class="text-center">Appointment's Date</th>
                <th scope="col" class="text-center">Appointment's Time</th>
                <th scope="col" class="text-center">Patient's ID</th>
                <th scope="col" class="text-center">Specialization</th>
                <th scope="col" class="text-center">More</th>
                </tr>
            </thread>
            <tbody>
                <?php
                    if($result) {
                        usort($result, function($a, $b) {
                            $t1 = strtotime($a['Appointment_Time']);
                            $t2 = strtotime($b['Appointment_Time']);
                            return $t1 - $t2;
                        });
                        usort($result, function($a, $b) {
                            $t1 = strtotime($a['Appointment_Date']);
                            $t2 = strtotime($b['Appointment_Date']);
                            return $t1 - $t2;
                        });
                        foreach(array_values($result) as $record) {
                            echo '<tr>';
                            echo '<td class="text-center">'.$record['Schedule_ID'].'</td>';
                            echo '<td class="text-center">'.date_format(date_create($record['Appointment_Date']), "d/m/Y").'</td>';
                            echo '<td class="text-center">'.$record['Appointment_Time'].'</td>';
                            echo '<td class="text-center">'.$record['Patient_ID'].'</td>';
                            echo '<td class="text-center">'.$record['Specialization'].'</td>';
                            echo "<td><center><a class='view-details-btn' href='patientInfo.php?Patient_ID=" . $record["Patient_ID"] . "'>View Details</a></center></td>";
                            echo '</tr>';
                        }
                    }
                ?>
            </tbody>
        </table>
        </div>
    </div>
    
<?php require_once('../includes/footer.php')?>