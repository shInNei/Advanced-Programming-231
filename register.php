<?php
    session_start();
?>

<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "hospital";
    $conn = "";
    try{
        $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
    }
    catch (mysqli_sql_exception){
        echo "Failed connection";
    } 
?>

<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <link rel="icon" href="assets/imgs/icon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/register.css">
    <link rel="stylesheet" href="assets/css/register_minhkhanh.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.13/css/all.css'>
    <link rel='stylesheet' href="assets/css/">
    <title>ABC HOSPITAL</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
        <div class="container main-nav">
            <a class="navbar-brand" href="#" >
                <h4> <img src="assets/imgs/icons.png" alt="ABC-Hospital" style="width: 5%;"> &nbsp ABC Hospital</h4>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item" style="margin-right:40px;">
                        <a class="nav-link active" aria-current="page" href="index.php"> <i class = "fas fa-user"></i> &nbsp Home</a>
                    </li>
                    <li class="nav-item" style="margin-right:40px;">
                        <a class="nav-link" href="about.html"><i class = "fas fa-users"></i> &nbsp About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html"><i class = "fas fa-address-book"></i> &nbsp Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container login" style="font-family: 'IBM Plex Sans', sans-serif;">
        <div class="row login-image">
            <img src="assets/imgs/icons.png" alt="ABC Hospital">
            <h3>Welcome to ABC hospital</h3>
        </div>
        
    </div>
    <div class = "container">
        <section id="register" class="d-flex justify-content-center align-items-center flex-column">
            <form method="post" action="register.php">
                <div class="register-image">
                    <img src="edit.png" alt="user register" />
                </div>
                <div>
                    <p class = "Register_sentence">Register As Patient</p>
                </div>
                <div class = "input">

                        <div> <input class = "INPUT_INFOR" placeholder="First Name *" name = "first_name" type = "text"> </div>
                        <div> <input class = "INPUT_INFOR" placeholder="Last Name *" name = "last_name" type = "text"> </div>
                        <div> <input class = "INPUT_INFOR" placeholder="Your Email *" name = "email" type = "text"></div>
                        <div> <input class = "INPUT_INFOR" placeholder="Your Phone *" name = "phone_number" type = "text" ></div>
                        <div> <input class = "INPUT_INFOR" placeholder="Password *" name = "password" type = "password"></div>
                        <div> <input class = "INPUT_INFOR" placeholder="Confirm Your Password *" name = "confirm_password" type = "password"></div>

                </div>
                <div class = "Under_Register_Block">
                    <div class ="Left_Under_Register_Block">
                        <div class = "gender_checkbox">
                            <div class = "Male_box">
                                <input class = "Male_checkbox" placeholder="Male_checkbox" type = "radio" name = "gender" value = "M">
                                <p class = "Male_text" >Male</p>
                            </div>
            
                            <div class = "Female_box">
                                <input class = "Female_checkbox" placeholder ="Female_checkbox" type = "radio" name = "gender" value = "F">
                                <p class = "Female_text" >Female</p>
                          
                            </div>
                        </div>
                        <a href = "index.php" class = "Have_an_account"> Already have an account?</a>
    
                    </div>
                    
                    <div class = "Right_Under_Register_Block">
                        <button class = "Register_button" name = "register">Register</button>
                    </div>
                </div>
            </form>
        </section>
        <footer class="text-center text-dark">
            Copyright &copy; 2024 ABC Hospital. All rights reserved.
        </footer>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>

<?php 
    if(isset($_POST["register"])){
        
        $gender = "";
        $firstname = filter_input(INPUT_POST, "first_name", FILTER_SANITIZE_SPECIAL_CHARS);
        $lastname = filter_input(INPUT_POST, "last_name", FILTER_SANITIZE_SPECIAL_CHARS);
        $email_check = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
        $phone = filter_input(INPUT_POST, "phone_number", FILTER_SANITIZE_NUMBER_INT);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
        $confirm_password = filter_input(INPUT_POST, "confirm_password", FILTER_SANITIZE_SPECIAL_CHARS);


        $error_message = "";
        if(isset($_POST["gender"])){
            $gender = $_POST["gender"];
        }

        if(empty($firstname) || empty($lastname) || empty($email) || empty($phone) || empty($confirm_password) || empty($password) || empty($gender)){
            $error_message = "Please input all the information";
        } 
        elseif(!$email_check) {
            $error_message = "Email is not valid";
        } elseif($password != $confirm_password) {
            $error_message = "Passwords are different"; 
        } else {
            $sql = "SELECT * FROM patients WHERE email = '$email'";
            $result = $conn->query($sql);

            if($result->num_rows > 0){
                $error_message = "Email already exists, please choose another email";
            }
            else {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
                $sql = "INSERT INTO patients (fName, lName, email, phoneNum, gender, pw)
                        VALUES ('$firstname', '$lastname', '$email', '$phone', '$gender', '$hashed_password')";

                $result = mysqli_query($conn, $sql);

                // if($result)
                // {
                //     echo '<script type="text/javascript">'; 
                //     echo 'alert("Dang ki thanh cong!");'; 
                //     echo 'window.location.href = "index.php";';
                //     echo '</script>';
                // } 
                if($result){
                    mysqli_query($conn, $sql);
                    mysqli_close($conn);
                    $error_message = "Dang ki thanh cong";
                    header("location: index.php");
                }
                
                // catch (mysqli_sql_exception){
                //     $error_message = "Dang ki that bai";    
                // }
    
                // mysqli_close($conn);
                   
                
                // $_SESSION["email"] = $email;
                // $_SESSION["password"] = $password;
                
            }  
        }
        
    }
    if (!empty($error_message)) {
        echo '<script type="text/javascript">'; 
        echo 'alert("' . $error_message . '");'; 
        echo 'window.location.href = "register.php";';
        echo '</script>';
    }
?>
