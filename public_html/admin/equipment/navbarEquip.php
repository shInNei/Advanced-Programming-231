<?php
if(!isset($_SESSION) ||!isset($_SESSION['loginad']) || $_SESSION['loginad'] !== true){
    // If not logged in, move to index 
    session_destroy();
    header('location: ../../index.php');
    exit;
}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
        <div class="container main-nav">
        
        <a class="navbar-brand" href="#">
            <h4> <img src="../../assets/imgs/icons.png" alt="ABC-Hospital" width="30"> &nbsp ABC Hospital</h4>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-right">
                <li class="nav-item" style="margin-right:20px;">
                    <a class="nav-link active" aria-current="page" href="../medicine/medicineDashboard.php"> <i class="fa fa-bars"></i> &nbsp Dashboard</a>
                </li>
            </ul>
                <ul class="navbar-nav ms-auto">
                <li class="nav-item" style="margin-right:40px;">
                        <a class="nav-link"  href="addEquip.php"> <i class="fa fa-x-ray"></i> &nbsp Equipment</a>
                    </li>
                    <li class="nav-item" style="margin-right:40px;">
                        <a class="nav-link"  href="request.php"> <i class="fa fa-notes-medical"></i> &nbsp Request</a>
                    </li>
                    <li class="nav-item" style="margin-right:40px;">
                        <a class="nav-link"  href="inventoryMaintenance.php"> <i class="fa fa-truck"></i> &nbsp Inventory</a>
                    </li>
                    <!-- <li class="nav-item" style="margin-right:40px;">
                        <a class="nav-link"  href="../medicine/medicineDashboard.php"> <i class="fa fa-th-large"></i> &nbsp Dashboard</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="../../logout.php"><i class="fa fa-share"></i> &nbsp Log out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>