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
<link rel="stylesheet" href="../../assets/css/style.css">

</head>

<body>
    <?php require_once('navbarEquip.php'); ?>

    <div class="login content-wrap">
        <div class="login-image">
            <h2>Welcome Admin</h2>
        </div>
        <div class="login-box">
            <table class="table">
                <thead>
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
                                <td><?php echo $equipRequest['equipID'] ?></td>
                                <td><?php echo $equipRequest['patientID'] ?></td>
                                <td><?php echo $equipRequest['requestDate'] ?></td>

                                <td>
                                    <button type="button" class="btn btn-primary" <?php echo ($equipRequest['state']) ? "" : ("disabled "); ?>id="open-modal" data-toggle="modal" data-target="#modalER" 
                                    data-eName = "<?php echo $equipRequest['eName']?>"
                                    data-con = "<?php echo $equipRequest['condition']?>"
                                    data-avail = "<?php echo $equipRequest['available']?>"
                                    data-eID = "<?php echo $equipRequest['equipID']?>"
                                    data-pID = "<?php echo $equipRequest['pID']?>">

                                        Info
                                    </button>
                                </td>
                                <td>
                                    <?php

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
        <div class="modal fade" id="modalER" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="col-11">
                            <h5 class="modal-title" id="exampleModalLongTitle">Request Details</h5>

                        </div>
                        <div class="col-1">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-3">
                                <p>Equipment ID: <span id="eID"></span></p>
                            </div>
                            <div class="col-9">
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
                        <a id="allow-button" type="button" class="btn btn-primary" role="button" target="_self">Allow</a>

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
                // Get the value of the data
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

                //Set allow button
                var allowButton =document.getElementById("allow-button");
                allowButton.href = "processER.php?pID=" +pID + "&eID = " + eID;
            });
        });
    });
</script>
    <?php
    require_once('../../includes/footer.php');
