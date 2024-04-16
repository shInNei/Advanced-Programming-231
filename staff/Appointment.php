<?php require_once('../includes/header.php')?>
<?php require_once('watchCalendar.php')?>
<link rel="stylesheet" href="../assets/css/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-DBjhmceckmzwrnMMrjI7BvG2FmRuxQVaTfFYHgfnrdfqMhxKt445b7j3KBQLolRl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha384-xBuQ/xzmlsLoJpyjoggmTEz8OWUFM0/RC5BsqQBDX2v5cMvDHcMakNTNrHIW2I5f" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<?php require_once('navbar.php')?>
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
                        foreach(array_values($result) as $record) {
                            echo '<tr>';
                            echo '<td class="text-center">'.$record['Schedule_ID'].'</td>';
                            echo '<td class="text-center">'.$record['Appointment_Date'].'</td>';
                            echo '<td class="text-center">'.$record['Appointment_Time'].'</td>';
                            echo '<td class="text-center">'.$record['Patient_ID'].'</td>';
                            echo '<td class="text-center">'.$record['Specialization'].'</td>';
                            echo '</tr>';
                        }
                    }
                ?>
            </tbody>
        </table>
        </div>
    </div>
    
<?php require_once('../includes/footer.php')?>