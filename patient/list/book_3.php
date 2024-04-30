<?php
    if(session_status() !== PHP_SESSION_ACTIVE) session_start();
    if(!isset($_SESSION['loginP']) || $_SESSION['loginP'] !== true){
    // If not logged in, move to index 
    session_destroy();
    header('location:../index.php');
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<?php
    
    //$connect = mysqli_connect("localhost", "root", "", "hospital");
    $connect = mysqli_connect("localhost", "id22104283_hospital", "Abc@123@", "id22104283_hospital");
    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $email = $_SESSION['email'];
    $query = "SELECT * FROM patients WHERE email = '$email'";
    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) > 0) {
        // Fetch the result as an associative array
        $row = mysqli_fetch_assoc($result);
    
        // Get the ID of the patient
        $_SESSION['patient_id'] = $row["ID"];
    } else {
        // Handle the case where the patient is not found
        echo "No patient found with email: $email";
    }
?>
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../../assets/imgs/icon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.13/css/all.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <title>ABC HOSPITAL</title>

    <style>
    .search-form {
        width: 70%;
        margin: auto;
        padding-left: 200px;
        padding-top: 0%;
        
    }

    #contact {
        min-height: 100vh;
    }

    #contact form {
        max-width: 600px;
        width: 90%;
        background: white !important;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
    }

    #contact form h3 {
        text-align: center;
        font-family: "Anta", sans-serif;
    }

    textarea {
        resize: none;
    }

    .contact-image {
        text-align: center;
    }

    .contact-image img {
        border-radius: 6rem;
        width: 11%;
        margin-top: -4%;
    }
    </style>
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
                <h4> <img src="../../assets/imgs/icons.png" alt="ABC-Hospital" width="30"> &nbsp ABC Hospital</h4>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-right">
                    <li class="nav-item" style="margin-right:20px;">
                        <a class="nav-link active" aria-current="page" href="../dashboard.php"> <i
                                class="fa fa-bars"></i> &nbsp Dashboard</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../../logout.php"><i class="fa fa-share"></i> &nbsp Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container login" style="font-family: 'IBM Plex Sans', sans-serif;">
        <div class="row login-image">
            <!--<img src="../assets/imgs/icons.png" alt="ABC Hospital">-->
            <h3>Change Appointment</h3>
        </div>
    </div>

    <div class="container">
        <section id="contact" class="d-flex align-items-center flex-column">
            <form action="result.php" method="POST">
                <div class="from-group mb-3">
                    <label for="">Specialization:</label>
                    <select name="specialization" class="form-control">
                        <option value="">--Select Specialization--</option>
                        <option value="Pharmacy">Pharmacy</option>
                        <option value="Cardiology">Cardiology</option>
                        <option value="Pediatrics">Pediatrics</option>
                        <option value="ICU">ICU</option>
                        <option value="Otorhinolaryngologist">Otorhinolaryngologist</option>
                        <option value="Obstetric">Obstetric</option>
                    </select>
                </div>
                </br>
                <div class="from-group mb-3">
                    <label for="adate">Appointment Date:</label>
                    <input type="date" id="adate" name="adate" class="form-control">
                </div>
                </br>
                <div class="from-group mb-3">
                    <label for="">Appointment Time:</label>
                    <select name="atime" class="form-control">
                        <option value="">--Select Appointment Time--</option>
                        <option value="07:00:00">07:00:00</option>
                        <option value="10:00:00">10:00:00</option>
                        <option value="13:00:00">13:00:00</option>
                        <option value="16:00:00">16:00:00</option>
                    </select>
                </div>
                <input type="hidden" name="id" value = '<?php echo $_POST['id']; ?>'>
                <div class="from-group mb-3">
                    <button type="submit" name="ctSubmit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </section>

    </div>

    <div class="text-center text-dark">
        Copyright &copy; 2024 ABC Hospital. All rights reserved.
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>