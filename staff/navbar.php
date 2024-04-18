

<?php 
if(session_status() !== PHP_SESSION_ACTIVE) session_start();

if(!isset($_SESSION['login']) || $_SESSION['login'] !== true){
    // If not logged in, move to index 
    header('location: ../index.php');
    exit;
}
require_once('checkStaff.php')?>
<nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
        <div class="container main-nav">
        
            <a class="navbar-brand" href="#" style = "width: 20%;">
                <h4> <img src="../assets/imgs/icons.png" alt="ABC-Hospital" style="width: 15%;"> &nbsp ABC Hospital</h4>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                        <a class="nav-link"  href="profile.php"> <i class="fa fa-pills"></i> &nbsp Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="leaveRegister.php"> <i class="fa fa-notes-medical"></i> &nbsp Register of Leave</a>
                    </li>
                    <?php
                        if($_SESSION['role'] === "Doctor") {
                            echo '
                            <li class="nav-item" style="margin-right:40px;">
                                <a class="nav-link"  href="prescription.php"> <i class="fa fa-prescription-bottle"></i> &nbsp Prescription</a>
                            </li>';
                            echo "
                            <li class='nav-item' style='margin-right:40px;'>
                            <a class='nav-link'  href='Appointment.php'> <i class='fas fa-stethoscope'></i> &nbsp Doctor's Appointment</a>
                            </li>
                            ";
                        } else if($_SESSION['role'] === "Nurse") {
                            echo '
                            <li class="nav-item">
                                <a class="nav-link"  href="requestEquip.php"> <i class="fas fa-x-ray"></i> &nbsp Equipment</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"  href="testResult.php"> <i class="fa fa-prescription-bottle"></i> &nbsp Test Result</a>
                            </li>
                            ';
                        } else if($_SESSION['role'] === "Other"){
                            echo '
                            <li class="nav-item">
                                <a class="nav-link"  href="schedule_other.php"> <i class="fas fa-x-ray"></i> &nbsp Shedule</a>
                            </li>
                            ';
                        }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link"  href="staffHome.php"> <i class="fa fa-th-large"></i> &nbsp Home Page</a>
                    </li>
                    <li class="nav-item log">
                        <a class="nav-link" href="../logout.php"><i class="fa fa-share"></i> &nbsp Log out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>