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
    $connect = mysqli_connect("localhost", "id22104283_hospital", "Abc@123@", "id22104283_hospital");
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
    <link rel="stylesheet" href="../../assets/css/add_contact_infor.css">
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
        <p class = "header"> CHANGE CONTACT INFORMATION</p>
    </div>



        <form action = "change_contact_infor.php" method = "post">
        <div class = "container1">
            <div class = "line_text">
                <label> Enter Your Birthday</label> 
                <input class = "infor" type = "date" name = "birthday"> 
            </div>

            <div class = "line_text"> 
                <label> Enter Your Age</label>
                <input class = "infor" type = "number"  name = "age" min = "0" max = "200" step = "1"> 
            </div>    

            <div class = "line_text"> 
                <label> Enter Your Job </label>
                <input class = "infor" type = "text"  name = "job"> 
            </div>

            <div class = "line_text"> 
            <label> Enter Your Duraton Of Health Insurance  </label>
                <input type = "date" class = "infor" name = "duration"> 
            </div>

            <div class = "line_text">
                <label> Enter Your Family Phone Number  </label>
                <input type = "number" class = "infor" name = "family_phone"> 
            </div>

            <div class = "line_text"> 
                <label> Input Your Address  </label>
                <input type = "text" class = "infor" name = "address"> 
            </div>

            <div class = "line_text">
                <label> Input Your Symptom</label>
                <textarea id="symptom" name="symptom" class = "infor" rows="4" cols="50"></textarea>
            </div>

            <div class = "line_text">
                <label> Input Your History Sick</label>
                <textarea id="history_sick" class = "infor" name="history_sick" rows="4" cols="50"></textarea>
            </div>

            <div class = "line_text">
                <label> Input Your Allergy</label> 
                <textarea id="allergy" name="allergy" class = "infor" rows="4" cols="50"></textarea>
            </div>

            <div class = "line_text"> 
                <input type = "submit" class = "submit" value = "Submit" class = "infor" name = "Submit"> 
            </div>
        </div>
        </form>



    <?php
        if(isset($_POST['Submit'])){
            $user = $_SESSION['user'];
            $patient_id = $user['ID'];
            $birthday = $_POST['birthday'];
            $age = $_POST['age'];
            $job = filter_input(INPUT_POST, "job", FILTER_SANITIZE_SPECIAL_CHARS);
            $duration = $_POST['duration'];
            $family_phone = $_POST['family_phone'];
            $address = filter_input(INPUT_POST, "address", FILTER_SANITIZE_SPECIAL_CHARS);
            $allergy = filter_input(INPUT_POST, "allergy", FILTER_SANITIZE_SPECIAL_CHARS);
            $history_sick = filter_input(INPUT_POST, "history_sick", FILTER_SANITIZE_SPECIAL_CHARS);
            $symptom = filter_input(INPUT_POST, "symptom", FILTER_SANITIZE_SPECIAL_CHARS);

            {

                if(!empty($_POST['birthday'])){
                    $sql = "UPDATE contact_and_medhis
                            SET birthday = '$birthday'
                            WHERE id_patient = '$patient_id'";
                    mysqli_query($connect, $sql);
                }

                if(!empty($_POST['age'])){
                    $sql = "UPDATE contact_and_medhis
                            SET age = '$age'
                            WHERE id_patient = '$patient_id'";
                    mysqli_query($connect, $sql);
                }

                if(!empty($_POST['job'])){
                    $sql = "UPDATE contact_and_medhis
                            SET job = '$job'
                            WHERE id_patient = '$patient_id'";
                    mysqli_query($connect, $sql);
                }

                if(!empty($_POST['duration'])){
                    $sql = "UPDATE contact_and_medhis
                            SET duration_insurance = '$duration'
                            WHERE id_patient = '$patient_id'";
                    mysqli_query($connect, $sql);
                }

                if(!empty($_POST['family_phone'])){
                    $sql = "UPDATE contact_and_medhis
                            SET family_phone = '$family_phone'
                            WHERE id_patient = '$patient_id'";
                    mysqli_query($connect, $sql);
                }

                if(!empty($_POST['address'])){
                    $sql = "UPDATE contact_and_medhis
                            SET address = '$address'
                            WHERE id_patient = '$patient_id'";
                    mysqli_query($connect, $sql);
                }

                if(!empty($_POST['allergy'])){
                    $sql = "UPDATE contact_and_medhis
                            SET allergy = '$allergy'
                            WHERE id_patient = '$patient_id'";
                    mysqli_query($connect, $sql);
                }

                if(!empty($_POST['history_sick'])){
                    $sql = "UPDATE contact_and_medhis
                            SET history_sick = '$history_sick'
                            WHERE id_patient = '$patient_id'";
                    mysqli_query($connect, $sql);
                }

                if(!empty($_POST['symptom'])){
                    $sql = "UPDATE contact_and_medhis
                            SET history_sick = '$symptom'
                            WHERE id_patient = '$patient_id'";
                    mysqli_query($connect, $sql);
                }
            }
            {
                echo '<script type="text/javascript">'; 
                echo 'alert("Change Information successfully");'; 
                echo 'window.location.href = "view_contact_infor.php";';
                echo '</script>';
            }
        }
        
    ?>
        <footer>
        <div class="text-center text-dark" style = "margin-top: 2%">
            Copyright &copy; 2024 ABC Hospital. All rights reserved.
        </div>
        </footer>
</body>