<?php
    if(session_status() !== PHP_SESSION_ACTIVE) session_start();
    if(!isset($_SESSION['loginP']) || $_SESSION['loginP'] !== true){
    // If not logged in, move to index 
    session_destroy();
    header('location:../../index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
    
    //$connect = mysqli_connect("localhost", "root", "", "hospital");
    $connect = mysqli_connect("localhost", "id22036229_abchospital", "Abc@123@", "id22036229_abchosptital");
    if ($connect === false) {
        die("ERROR: Could not connect
        ." . mysqli_connect_error());
    }

    $query = "SELECT * from patients";
    $result = mysqli_query($connect, $query);
?>
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../../assets/imgs/icon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/view_contact_infor.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.13/css/all.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <title>ABC HOSPITAL</title>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
        <div class="container main-nav">
            <a class="navbar-brand" href="#" >
                <h4> <img src="../../assets/imgs/icons.png" alt="ABC-Hospital" width="30"> &nbsp ABC Hospital</h4>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-right">
                    <li class="nav-item" style="margin-right:20px;">
                        <a class="nav-link active" aria-current="page" href="../dashboard.php"> <i class = "fa fa-bars"></i> &nbsp Dashboard</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../../logout.php"><i class="fa fa-share" ></i> &nbsp Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div>
        <p class = "header">Your Contact Information</p>
    </div>

    <div class = "container1">
        <?php
            $user = $_SESSION['user'];
            $id = $user['ID'];
            $fName = $user['fName'];
            $lName = $user['lName'];
            $email = $user['email'];
            $phone = $user['phoneNum'];
            $gender = $user['gender'];
            $sql = "SELECT * FROM contact_and_medhis WHERE '$id' = id_patient";
            $result = mysqli_query($connect, $sql);
            $row = $result->fetch_assoc();
            if(!empty($row['birthday'])) $birth = $row['birthday']; else $birth = "NULL";
            if(!empty($row['age'])) $age = $row['age']; else $age = "NULL";
            if(!empty($row['job'])) $job = $row['job']; else $job = "NULL";
            if(!empty($row['duration_insurance'])) $duration = $row['duration_insurance']; else $duration = "NULL";
            if(!empty($row['family_phone'])) $family_phone = $row['family_phone']; else $family_phone = "NULL";
            if(!empty($row['address'])) $address = $row['address']; else $address = "NULL";
            if(!empty($row['symptom'])) $symptom = $row['symptom']; else $symptom = "NULL";
            if(!empty($row['history_sick'])) $history_sick = $row['history_sick']; else $history_sick = "NULL";
            if(!empty($row['allergy'])) $allergy = $row['allergy']; else $allergy = "NULL";

            echo "<div class = \"line_text\"> ID: <div class = \"infor\"> $id</div> </div>";
            echo "<div class = \"line_text\"> First Name: <div class = \"infor\"> $fName</div> </div>";
            echo "<div class = \"line_text\"> Last Name: <div class = \"infor\"> $lName</div> </div>";
            echo "<div class = \"line_text\"> Email: <div class = \"infor\"> $email</div> </div>";
            echo "<div class = \"line_text\"> Phone Number: <div class = \"infor\"> $phone</div> </div>";
            
            if($gender == 'F')
                echo "<div class = \"line_text\"> Gender: <div class = \"infor\"> Female</div> </div>"; 
            else 
                echo "<div class = \"line_text\"> Gender: <div class = \"infor\"> Male</div> </div>";
            
            echo "<div class = \"line_text\"> Birth Day: <div class = \"infor\"> $birth</div> </div>";
            echo "<div class = \"line_text\"> Age: <div class = \"infor\"> $age</div> </div>";
            echo "<div class = \"line_text\"> Job: <div class = \"infor\"> $job</div> </div>";
            echo "<div class = \"line_text\"> Duration Insurance: <div class = \"infor\"> $duration</div> </div>";
            echo "<div class = \"line_text\"> Family Phone: <div class = \"infor\"> $family_phone</div> </div>";
            echo "<div class = \"line_text\"> Address: <div class = \"infor\"> $address</div> </div>";
            echo "<div class = \"line_text\"> Symptom: <div class = \"infor\"> $symptom</div> </div>";
            echo "<div class = \"line_text\"> History Sick: <div class = \"infor\"> $id</div> </div>";
            echo "<div class = \"line_text\"> Allergy: <div class = \"infor\"> $allergy</div> </div>";
        ?>  
    </div>
        
</body>