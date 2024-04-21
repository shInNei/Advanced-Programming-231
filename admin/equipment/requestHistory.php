<?php

// session_start();

// if(!isset($_SESSION['loginad']) || $_SESSION['loginad'] !== true){
//     // If not logged in, move to index 
//     header('location: ../../index.php');
//     exit;
// }
?>

<?php
require_once('../../includes/header.php');
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-DBjhmceckmzwrnMMrjI7BvG2FmRuxQVaTfFYHgfnrdfqMhxKt445b7j3KBQLolRl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha384-xBuQ/xzmlsLoJpyjoggmTEz8OWUFM0/RC5BsqQBDX2v5cMvDHcMakNTNrHIW2I5f" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<link rel="stylesheet" href="../../assets/css/style.css">

</head>

<body>
    <?php require_once('navbarEquip.php'); ?>

    <div class="login content-wrap">
        <div class="login-image">
            <h2>Welcome Admin</h2>
        </div>
        <a href="request.php" class="login-header-link">Return to request</a>
        <div class="login-box">
            
            <table class="table table-striped table-hover   ">
                <thead>
                <th scope="col">#</th>                    
                    <th scope="col">Equipment ID</th>
                    <th scope="col">Patient ID</th>
                    <th scope="col">Nurse ID</th>
                    <th scope="col">Request Date</th>
                    <th scope="col">Status</th>                    
                </thead>
                <tbody>
                    <?php
                    require_once(__DIR__.'/../../classes/control/equipmentControl.php');
                    $results = (new EquipmentControl())->equipRequestSearch(array('*'),array('approve' => 'T'));
                    if (is_array($results)) {
                        foreach($results as $equipRequest){
                            $hasReturned = $equipRequest['hasReturn'];
                            echo 
                            "<tr>
                                <td>".$equipRequest['ID']."</td>
                                <td>".$equipRequest['equipID']."</td>
                                <td>".$equipRequest['patientID']."</td>
                                <td>".$equipRequest['staffID']."</td>
                                <td>".$equipRequest['requestDate']."</td>
                                <td>".(($hasReturned === 'T') ? "Returned" : "Not Returned")."</td>
                            </tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>



        </div>
        
    </div>
    
    <?php
    require_once('../../includes/footer.php');
