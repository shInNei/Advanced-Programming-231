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
        <a href="requestHistory.php" class="login-header-link">View History</a>
        <div class="login-box">
            
            <table class="table table-striped table-hover">
                <thead>
                <th scope="col">#</th>                    
                    <th scope="col">Equipment ID</th>
                    <th scope="col">Patient ID</th>
                    <th scope="col">Request Date</th>
                    <th scope="col">Equipment Status</th>
                </thead>
                <tbody>
                    <?php
                    require_once('processRequest.php');
                    if (is_array($results)) {
                        // echo var_dump($results)."<br>";
                        // $i = 0;
                        foreach (array_values($results) as $equipRequest) {
                            // echo var_dump($medication)."<br>";

                    ?>
                            <tr>
                                <td scope = "row"><?php echo $equipRequest['ID'] ?></td>
                                <td><?php echo $equipRequest['equipID'] ?></td>
                                <td><?php echo $equipRequest['patientID'] ?></td>
                                <td><?php echo $equipRequest['requestDate'] ?></td>

                                <td>
                                    <button type="button" class="btn btn-primary" <?php echo ($equipRequest['state']) ? "" : ("disabled "); ?>id="open-modal" data-toggle="modal" data-target="#modalER" 
                                    data-ID = "<?php echo $equipRequest['ID']?>"
                                    data-eName = "<?php echo $equipRequest['eName']?>"
                                    data-con = "<?php echo $equipRequest['condition']?>"
                                    data-avail = "<?php echo $equipRequest['available']?>"
                                    data-eID = "<?php echo $equipRequest['equipID']?>"
                                    data-pID = "<?php echo $equipRequest['patientID']?>">
                                        Info
                                    </button>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>



        </div>
        <div class="modal fade" id="modalER" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="col-11">
                            <h5 class="modal-title" id="exampleModalLongTitle">Request Details - #<span id = "ID"></span></h5>

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
                                <p>Equipment ID: <span id="eID"></span></p>
                            </div>
                            <div class="col">
                                <p>Equipment Name: <span id="eName"></span></p>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col">
                                <p>Condition: <span id="con"></span></p>
                            </div>
                            <div class="col">
                                <p>Availability: <span id="avail"></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a id="allow-button" type="button" class="btn btn-primary" role="button" target="_self">Approve</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        
    document.addEventListener("DOMContentLoaded", function() {
        // Get all elements with the class "open-modal"
        var openModalButtons = document.querySelectorAll("#open-modal");

        // Loop through each button and attach a click event listener
        openModalButtons.forEach(function(button) {
            button.addEventListener("click", function() {
                console.log("HI");
                // Get the value of the data
                var id = this.getAttribute('data-ID')
                var eName = this.getAttribute('data-eName');
                var con = this.getAttribute('data-con');
                var avail = this.getAttribute('data-avail');
                var pID = this.getAttribute('data-pID');
                var eID = this.getAttribute('data-eID');

                // Set the text content 
                document.getElementById("eName").textContent = eName;
                document.getElementById("con").textContent = con;
                document.getElementById("avail").textContent = avail;
                document.getElementById("eID").textContent = eID;
                document.getElementById("ID").textContent = id;

                //Set allow button
                var allowButton =document.getElementById("allow-button");
                allowButton.href = "processER.php?id=" + id;
            });
        });
    });
</script>
    <?php
    require_once('../../includes/footer.php');
