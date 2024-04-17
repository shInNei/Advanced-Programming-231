<?php require_once('../includes/header.php')?>
<link rel="stylesheet" href="../assets/css/style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha384-xBuQ/xzmlsLoJpyjoggmTEz8OWUFM0/RC5BsqQBDX2v5cMvDHcMakNTNrHIW2I5f" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

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
<div class="content-wrap">
    <div class="container">
        <div class="card">
            <div class="card-header">
                Patient's Medical Record 
            </div>
            <div class="card-body">
                <form>
                    <?php
                    require_once("../classes/Dbh.php");
                    $db = new Dbh();
                    if(isset($_GET["Patient_ID"])) {
                        $result = $db->select("contact_and_medhis", "*", array("id_patient" => $_GET["Patient_ID"]), false);
                        $flag = false;
                        if($result) {
                            $flag = true;
                        } else {
                            $flag = false;
                        }
                        $prescription = $db->select("medication", "*", array("patientID" => $_GET["Patient_ID"]), true);
                    } else {
                        echo "No details found for this Patient_ID";
                    }
                    ?>    
                <div id='if' style='display: none;'>
                <div class="form-group row">
                    <label for="id" class="col-sm-4 col-form-label">Patient's ID</label>
                    <div class="col-sm-8">
                    <input type="text" readonly class="form-control" name="pid" id="id" value="<?php echo $result['id_patient']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="age" class="col-sm-4 col-form-label">Age</label>
                    <div class="col-sm-8">
                    <input type="text" readonly class="form-control" name="age" id="age" value="<?php echo $result['age']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="family_phone" class="col-sm-4 col-form-label">Family's Phone Number</label>
                    <div class="col-sm-8">
                    <input type="text" readonly class="form-control" name="family_phone" id="family_phone" value="<?php echo $result['family_phone']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Insu" class="col-sm-4 col-form-label">Insurance Duration</label>
                    <div class="col-sm-8">
                    <input type="text" readonly class="form-control" name="Insu" id="Insu" value="<?php echo date_format(date_create($result['duration_insurance']), "d/m/Y")?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="symptom" class="col-sm-4 col-form-label">Symptom</label>
                    <div class="col-sm-8">
                    <textarea rows="3" readonly class="form-control" id="symptom"><?php echo $result['symptom']; ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="history_sick" class="col-sm-4 col-form-label">Past Medical History</label>
                    <div class="col-sm-8">
                    <textarea rows="3" readonly class="form-control" id="history_sick"><?php echo $result['history_sick']; ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="symptom" class="col-sm-4 col-form-label">Allergy</label>
                    <div class="col-sm-8">
                    <textarea rows="3" readonly class="form-control" id="symptom"><?php echo $result['allergy']; ?></textarea>
                    </div>
                </div>
                </div>
                <div id='else' style='display: none;'>
                <p style="text-align: center;">Patient has not added MedHis</p>
                </div>
                <script>
                    var result = "<?php echo $flag;?>";
                    var node;
                    if(result) {
                        node = document.getElementById('if');
                    } else {
                        node = document.getElementById('else');
                    }
                    node.style.display = 'block';
                </script>
                <div class="form-group row">
                    <div class="col-sm">
                    <a href="Appointment.php" style="margin-bottom: 0px" class="btn btn-primary" style="margin-bottom: 0px">Close</a>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Pres" style="margin-bottom: 0px">Old Prescription</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="modal fade" id="Pres" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 1000px">
            <div class="modal-content" style="width: 1000px">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Past Prescriptions</h5>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">ID</th>
                            <th scope="col" class="text-center">Doctor's ID</th>
                            <th scope="col" class="text-center">Medication's ID</th>
                            <th scope="col" class="text-center">Illness's ID</th>    
                            <th scope="col" class="text-center">Dosage</th>
                            <th scope="col" class="text-center">Prescibe Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if($prescription) {
                            usort($prescription, function($a, $b) {
                                $t1 = strtotime($a['prescribeDate']);
                                $t2 = strtotime($b['prescribeDate']);
                                return $t2 - $t1;
                            });
                            foreach(array_values($prescription) as $pres) {
                                echo '<tr>';
                                echo '<td class="text-center">'.$pres['ID'].'</td>';
                                echo '<td class="text-center">'.$pres['doctorID'].'</td>';
                                echo '<td class="text-center">'.$pres['medID'].'</td>';
                                echo '<td class="text-center">'.$pres['illID'].'</td>';
                                echo '<td class="text-center">'.$pres['dosage'].'</td>';
                                echo '<td class="text-center">'.date_format(date_create($pres['prescribeDate']), "d/m/Y").'</td>';
                                echo '</tr>';
                            }
                        } 
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-bottom: 0px">Close</button>
            </div>
            </div>
            </div>
        </div>

    </div>
</div>
<?php require_once('../includes/footer.php')?>
