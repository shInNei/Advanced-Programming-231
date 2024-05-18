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
            <h2>Prescription History</h2>
        </div>
        <a class = "login-header-link" href="requestMed.php"> Return to Request</a>

        <div class="login-box">
            <table class="table">
                <thead>
                    <th scope="col">ID</th>
                    <th scope="col">Doctor ID</th>
                    <th scope="col">Patient ID</th>
                    <th scope="col">Medicine ID</th>
                    <th scope="col">Illness ID</th>
                    <th scope="col">Dosage</th>
                    <th scope="col">Prescribe Date</th>
                </thead>
                <tbody>
                    <?php
                    require_once(__DIR__."/../../classes/control/MedControl.php");
                    $mControl = new MedControl();
                    $results = $mControl->medicationSearch(array("*"),array("isPrescribe" => 1),true);
                    if (is_array($results)) {
                        foreach($results as $medication){
                            echo 
                            "<tr>
                                <td> ".$medication['ID']."</td>
                                <td> ".$medication['doctorID']."</td>
                                <td> ".$medication['patientID']."</td>
                                <td> ".$medication['medID']."</td>
                                <td> ".$medication['illID']."</td>
                                <td> ".$medication['dosage']."</td>
                                <td> ".$medication['prescribeDate']."</td>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        
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