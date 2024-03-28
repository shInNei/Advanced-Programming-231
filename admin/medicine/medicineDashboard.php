<?php
    require_once('../../includes/header.php');
?>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
        <div class="container main-nav">
            <a class="navbar-brand" href="#">
                <h4> <img src="../../assets/imgs/icons.png" alt="ABC-Hospital" style="width: 5%;"> &nbsp ABC Hospital</h4>
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

    <div class="content-wrap">
        <div class="container login">
            <div class="row login-image">
                <!-- <img src="assets/imgs/icons.png" alt="ABC Hospital"> -->
                <h3>Welcome Admin!</h3>
            </div>
            <div class="container dashboard" id = "med-dashboard">
                <div class="row">
                    <div class="col">
                        <a href="addMed.php" class = "btn btn-primary"><i class="fa fa-pills"></i><br>Find & Add Medicines</a>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col">
                        <a href="" class="btn btn-primary"><i class=""></i> <br> Find Equipments</a>
                    </div>
                    <div class="col">
                        <a href="" class="btn btn-primary"><i class=""></i><br>Add Equipments</a>
                    </div>
                    <div class="col">
                        <a href="" class="btn btn-primary"><i class=""></i><br>Delete Equipments</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    require_once('../../includes/footer.php');
?>