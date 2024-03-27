<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/imgs/icon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.13/css/all.css'>
    <title>ABC HOSPITAL</title>
</head>

<body>
    <style>
        .my-custom-row {
            background-color: bisque;
            height: 400px;
        }
    </style>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
        <div class="container main-nav">
            <a class="navbar-brand" href="#">
                <h4> <img src="assets/imgs/icons.png" alt="ABC-Hospital" style="width: 5%;"> &nbsp ABC Hospital</h4>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item" style="margin-right:40px;">
                        <a class="nav-link active" aria-current="page" href="index.php"> <i class="fas fa-user"></i> &nbsp Home</a>
                    </li>
                    <li class="nav-item" style="margin-right:40px;">
                        <a class="nav-link" href="about.html"><i class="fas fa-users"></i> &nbsp About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html"><i class="fas fa-address-book"></i> &nbsp Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

        <!-- dummycode -->
        <a href="codeTester.php">code test</a>
        <a href="admin/dashboard.php">dashboard Admin</a>
    <div class="container login" style="font-family: 'IBM Plex Sans', sans-serif;">
        <div class="row login-image">
            <img src="assets/imgs/icons.png" alt="ABC Hospital">
            <h3>Welcome to ABC hospital!</h3>
        </div>
        <div class="login-box" id="login">
            <ul class="nav nav-tabs nav-justified" role="tablist">
                <div class="slider"></div>
                <li class="nav-item">
                    <a class="nav-link active" id="patientTab" data-bs-toggle="tab" data-bs-target="#patient-nav" type="button" role="tab" aria-controls="patient-nav" aria-selected="true">Patient</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="doctorTab" data-bs-toggle="tab" data-bs-target="#doctor-nav" type="button" role="tab" aria-controls="doctor-nav" aria-selected="false">Staff</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="adminTab" data-bs-toggle="tab" data-bs-target="#admin-nav" type="button" role="tab" aria-controls="admin-nav" aria-selected="false">Admin</a>
                </li>
            </ul>
            <div class="row justify-content-center">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="patient-nav" role="tabpanel" aria-labelledby="patientTab">
                        <h2 class="login-heading">Login as Patient</h2>
                        <form method="post" action = "loginPatient.php">
                            <div class="login-form">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email(me@gmail.com) *" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Password *" required>
                                </div>
                                <div class="form-group">
                                    Need an account?
                                    <a href="register.php" style="color:#00856f"> Register</a>
                                </div>
                                <div class="text-center"><input type="submit" name="patient-login" class="btn btn-primary" value="Login"></div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade show" id="doctor-nav" role="tabpanel" aria-labelledby="doctorTab">
                        <h2 class="login-heading"> Login as Staff</h2>
                        <form method="post" action="loginStaff.php">
                            <div class="login-form">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="staffUserName" placeholder="User name *" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="staffPassword" placeholder="Password *" required>
                                </div>
                                <div class="text-center"><input type="submit" name="staff-login" class="btn btn-primary " value="Login"></div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade show" id="admin-nav" role="tabpanel" aria-labelledby="adminTab">
                        <h2 class="login-heading"> Login as Admin</h2>
                        <form class="login" method="post" action="loginAdmin.php">
                            <div class="login-form">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="adminUserName" placeholder="User name *" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="adminPassword" placeholder="Password *" required>
                                </div>
                                <div class="text-center"><input type="submit" name = "admin-login" class="btn btn-primary" value="Login"></div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
        <div class="text-center text-dark">
            Copyright &copy; 2024 ABC Hospital. All rights reserved.
        </div>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function(){
                      
        $("#login .nav-tabs a").click(function() {
      
        var position = $(this).parent().position();
      
        var width = $(this).parent().width();
      
        $("#login .slider").css({"left":+ position.left,"width":width});
      
        });
        var actWidth = $("#login .nav-tabs").find(".active").parent("li").width();
    
        var actPosition = $("#login .nav-tabs .active").position();
    
        $("#login .slider").css({"left":+ actPosition.left,"width": actWidth});
    
        });        
    </script>    
</body>
<?php
    if(isset($_SESSION['message'])) echo $_SESSION['message'];
?>

</html>