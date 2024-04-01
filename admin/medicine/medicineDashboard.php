<?php
require_once('../../includes/header.php');
?>
<link rel="stylesheet" href="../../assets/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
        <div class="container main-nav">
            <a class="navbar-brand" href="#" style="width: 20%;">
                <h4> <img src="../../assets/imgs/icons.png" alt="ABC-Hospital" style="width: 15%;"> &nbsp ABC Hospital</h4>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item" style="margin-right:40px;">
                        <a class="nav-link active" aria-current="page" href="../dashboard.php"> <i class="fa fa-th-large"></i> &nbsp Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../index.php"><i class="fa fa-share"></i> &nbsp Log out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- <div class="content-wrap">
        <div class="container login">
            <div class="row login-image">
                <h3>Welcome Admin!</h3>
            </div>
            <div class="container dashboard" id="med-dashboard">
                <div class="row">
                    <div class="col">
                        <a href="addMed.php" class="btn btn-primary"><i class="fa fa-pills"></i><br>Medicine</a>
                    </div>
                    <div class="col">
                        <a href="../equipment/addEquip.php" class="btn btn-primary"><i class=""></i><br>Equipment</a>
                    </div>
                </div>
            </div>
            
        </div>
    </div> -->

    <div class="container login" style="font-family: 'IBM Plex Sans', sans-serif;">
        <div class="row login-image">
            <h3>Welcome Admin!</h3>
        </div>
    </div>
    <div class="container mt-5">
        <div class="container text-center">
            <div class="row row-cols-4 justify-content-center">
                <a href="addMed.php" class="col btn btn-success m-2 py-4">
                    <i class="fa fa-pills" style="font-size: 40px;"></i><br>
                    Medicine
                </a>
                <a href="../equipment/addEquip.php" class="col btn btn-success m-2 py-4">
                    <i class="fa-solid fa-list" style="font-size: 40px;"></i><br>
                    Equipment
                </a>
            </div>
        </div>
    </div>
    <footer class="text-center text-dark fixed-bottom">
        Copyright &copy; 2024 ABC Hospital. All rights reserved.
    </footer>

</body>