<?php

require_once('../../includes/header.php');

?>

<link rel="stylesheet" href="../../assets/css/style.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-DBjhmceckmzwrnMMrjI7BvG2FmRuxQVaTfFYHgfnrdfqMhxKt445b7j3KBQLolRl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha384-xBuQ/xzmlsLoJpyjoggmTEz8OWUFM0/RC5BsqQBDX2v5cMvDHcMakNTNrHIW2I5f" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>

<body>
    <?php require_once('navbarMed.php') ?>

    <div class="login content-wrap" id="addMed">
        <div class="login-image">
            <h2>Welcome Admin</h2>
        </div>
        <a class = "login-header-link" href="prescriptionHistory.php"> View History</a>

        <div class="login-box">
            <table class="table">
                <thead>
                    <th scope="col">ID</th>
                    <th scope="col">Doctor ID</th>
                    <th scope="col">Patient ID</th>
                    <th scope="col">Prescription Info</th>
                    <th scope="col">Status</th>

                </thead>
                <tbody>
                    <?php
                    require_once("medicationSearch.php");
                    if (is_array($results)) {
                        // echo var_dump($results)."<br>";
                        // $i = 0;
                        foreach (array_values($results) as $medication) {
                            // echo var_dump($medication)."<br>";

                    ?>
                            <tr>
                                <td><?php echo $medication['ID'] ?></td>
                                <td><?php echo $medication['doctorID'] ?></td>
                                <td><?php echo $medication['patientID'] ?></td>

                                <td>
                                    <button type="button" class="btn btn-primary" id = "open-modal" data-toggle="modal" data-target="#modalPre"
                                        data-pName = "<?php echo $medication['pName']?>"
                                        data-pID = "<?php echo $medication['patientID']?>"
                                        data-medName = "<?php echo $medication['mName']?>"
                                        data-mID = "<?php echo $medication['medID']?>"
                                        data-ill = "<?php echo $medication['iName']?>"
                                        data-dosage = "<?php echo $medication['dosage']?>"
                                        data-pDate = "<?php echo $medication['prescribeDate']?>"
                                        data-id = "<?php echo $medication['ID']?>">
                                        
                                        Prescription
                                    </button>
                                </td>
                                <td>
                                    <?php
                                    if(isset($_SESSION['stockMsg-'.$medication['ID']])){
                                        echo $_SESSION['stockMsg-'.$medication['ID']];
                                    }else{
                                        echo "Ready";
                                    }
                                    ?>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        
        </div>
        <div class="modal fade" id="modalPre" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="col-11">
                        <h5 class="modal-title" id="exampleModalLongTitle"><span id = "ID"></span> - Prescription Details - <span id = "pDate"></span></h5>

                        </div>
                        <div class="col-1">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                    </div>
                    <div class="modal-body">
                        <div class="row">
                        <div class="col">
                                <p>Patient ID: <span id = "pID"></span></p>
                            </div>
                            <div class="col">
                                <p>Patient Name: <span id="pName"></span></p>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col">
                                <p>Medcine ID: <span id="mID"></span></p>
                            </div>
                            <div class="col">
                                <p>Medicine Name: <span id="mName"></span></p>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col">
                                <p>Illness: <span id="ill"></span></p>
                            </div>
                            <div class="col">
                                <p>Dosage: <span id="dosage"></span></p>
                            </div>
                        </div>
                        
                        


                    </div>
                    <div class="modal-footer">
                        <a id = "allow-button"type="button" class="btn btn-primary" role="button" target="_self">Allow</a>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../assets/jscript/generateModal.js"></script>
    <script>
        
    document.addEventListener("DOMContentLoaded", function() {
        // Get all elements with the class "open-modal"
        var openModalButtons = document.querySelectorAll("#open-modal");

        // Loop through each button and attach a click event listener
        openModalButtons.forEach(function(button) {
            button.addEventListener("click", function() {
                // Get the value of the data
                var pName = this.getAttribute('data-pName');
                var pID = this.getAttribute('data-pID');
                var mID = this.getAttribute('data-mID');
                var mName = this.getAttribute("data-medName");
                var ill = this.getAttribute("data-ill");
                var dosage = this.getAttribute("data-dosage");
                var pDate = this.getAttribute("data-pDate");
                var id = this.getAttribute("data-ID");
  
                // Set the text content 
                document.getElementById("pName").textContent = pName;
                document.getElementById("mName").textContent = mName;
                document.getElementById("pID").textContent = pID;
                document.getElementById("mID").textContent = mID;
                document.getElementById("ill").textContent = ill;
                document.getElementById("dosage").textContent = dosage;
                document.getElementById("pDate").textContent = pDate;
                document.getElementById("ID").textContent = id;

                //Set allow button
                var allowButton =document.getElementById("allow-button");
                allowButton.href = "processPrescribe.php?id=" +id;
            });
        });
    });
</script>



    <?php
    require_once('../../includes/footer.php');
    ?>