<?php require_once('../includes/header.php');
if(session_status() !== PHP_SESSION_ACTIVE) session_start(); 

?>

<link rel="stylesheet" href="../assets/css/style.css">
<style>

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
        * { box-sizing: border-box; }

.autocomplete-items {
  position: relative;
  border: 1px solid #000000;
  border-bottom: none;
  border-top: none;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}
.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff;
  border-bottom: 1px solid #d4d4d4;
}
.autocomplete-items div:hover {
  /*when hovering an item:*/
  background-color: #e9e9e9;
}
.autocomplete-active {
  /*when navigating through the items using the arrow keys:*/
  background-color: DodgerBlue !important;
  color: #ffffff;
}
</style>
</head>
<body>
    <?php require_once('navbar.php') ?>
    <div class="content-wrap login">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <center><h2 style="padding:25px;">Add Medical Record</h2></center> 
                </div>
                <div class="card-body">
                    <form autocomplete="off" method="POST" action="addMR.php">
                        <div class = "login-form">
                            <div class="form-group">
                                <label> Patient's ID</label>
                                <div class="autocomplete" >
                                <input type="text" id="pID" class="form-control" name="pID" placeholder="Patient's ID" aria-label="pID" required pattern="[0-9]+">
                                <?php
                                require_once("../classes/Dbh.php");
                                $db = new Dbh();
                                $id1 = $db->select("patients", "ID", null, true);
                                if($id1 !== false) {
                                    $pID = json_encode(array_map('current',array_values($id1))); 
                                }
                                $id2 = $db->select("medication", "ID", array("doctorID" => $_SESSION['userid']), true);
                                if($id2 !== false) {
                                    $prID = json_encode(array_map('current',array_values($id2)));
                                }
                                $id3 = $db->select("test_result", "ID", null, true);
                                if($id3 !== false) {
                                    $trID = json_encode(array_map('current',array_values($id3)));
                                }
                                ?>
                                <script src="../assets/jscript/autoComplete.js"></script>
                                <script>
                                    var array = <?php echo $pID?>; 
                                    autocomplete(document.getElementById("pID"), array.map(String));
                                </script>
                                </div>
                            </div>
                            <div class="form-group">
                                <label> Doctor's ID</label>
                                <input type="text" class="form-control" readonly name="DID" value="<?php echo $_SESSION['userid']; ?>">
                            </div>
                            <div class="form-group">
                                <div class="autocomplete" >
                                <label> Prescription's ID</label>
                                <input id="prID" type="text" class="form-control" name="prID" placeholder="Prescription's ID" aria-label="prID" pattern="[0-9]+">
                                <script src="../assets/jscript/autoComplete.js"></script>
                                <script>
                                    var array2 = <?php echo $prID?>; 
                                    autocomplete(document.getElementById("prID"), array2.map(String));
                                </script>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="autocomplete">
                                <label> Test's result ID</label>
                                <input id="trID" type="text" class="form-control" name="trID" placeholder="Test's Result ID" aria-label="trID" pattern="[0-9]+">
                                <script src="../assets/jscript/autoComplete.js"></script>
                                <script>
                                    var array3 = <?php echo $trID?>; 
                                    autocomplete(document.getElementById("trID"), array3.map(String));
                                </script>
                            </div>
                        </div>
                        <div class="text-center"><input type="submit" name="submit" class="btn btn-primary" value="Submit"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
        if (isset($_SESSION['alert_message'])) {
            echo '<script>alert("' . $_SESSION['alert_message'] . '");</script>';
            unset($_SESSION['alert_message']); // Clear the session variable
        } 
    ?>
    <?php require_once('../includes/footer.php') ?>