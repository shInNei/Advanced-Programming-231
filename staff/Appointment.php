<?php require_once('../includes/header.php')?>
<?php require_once('watchCalendar.php')?>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<?php require_once('navbar.php')?>
    <div class="content-wrap login">
    <div class="login-box" style="height:700px"> 
        <table class="table" id="myTable">
            <thead class="thead-dark">
                <tr>
                <th scope="col" class="text-center">ID</th>
                <th scope="col" class="text-center">Appointment's Date</th>
                <th scope="col" class="text-center">Appointment's Time</th>
                <th scope="col" class="text-center">Patient's ID</th>
                <th scope="col" class="text-center">Specialization</th>
                </tr>
            </thread>
            <tbody>
                <?php
                    foreach(array_values($result) as $record) {
                        echo '<tr>';
                        echo '<td class="text-center">'.$record['Schedule_ID'].'</td>';
                        echo '<td class="text-center">'.$record['Appointment_Date'].'</td>';
                        echo '<td class="text-center">'.$record['Appointment_Time'].'</td>';
                        echo '<td class="text-center">'.$record['Patient_ID'].'</td>';
                        echo '<td class="text-center">'.$record['Specialization'].'</td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
        </div>
    </div>
<?php require_once('../includes/footer.php')?>