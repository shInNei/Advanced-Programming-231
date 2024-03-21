<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="assets/imgs/icon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/register.css" />
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.13/css/all.css'>
    <title>ABC HOSPITAL</title>
</head>

<body>
    <style>
        .my-custom-row {
            background-color: bisque;
            height: 400px;
        }
        body{
            background-color: white;   
            margin: 0;
        }
        .Register_box{
            position: relative;
            margin: auto;
            background-color: white;
            max-width: 700px;
        }

        .Register_sentence{

            font-size: 30px;
            text-align: center;
            color: rgb(73, 80, 87);
        }
        .input{
            display: grid;
            grid-template-columns: 1fr 1fr;
            column-gap: 30px;
            row-gap: 15px;

        }
        .INPUT_INFOR{
            box-sizing: border-box;
            padding-left: 10px;
            width: 100%;
            height: 40px;
            border-radius: 10px;
            font-size: 15px;

        }
        .Female_checkbox{
            border-radius: 50%;
        }
        .Male_box,
        .Female_box{
            display: flex;
        }
        .Female_box{
            margin-left: 10px;
        }
        .gender_checkbox{
            display: inline-block;
            display:flex;
        }
        .Have_an_account{
            margin-top:0;
            color:rgb(0, 123, 255);
            display: inline-block;
            cursor: pointer;
        }
        .Have_an_account:hover{
            text-decoration: underline;
        }
        .Under_Register_Block{
            display: flex;
            justify-content: space-between;
        }
        .Register_button{
            border-radius: 30px;
            background-color: rgb(3, 126, 106);
            color: white;
            width: 120px;
            height: 40px;
            font-size: 20px;
            cursor: pointer;
            transition: opacity 0.3;
            margin-top: 60px;
            margin-left: 20px;
        }
        .Register_button:hover{
            opacity: 0.7;
        }
        .Register_button:active{
            background-color: antiquewhite;
            color: red;
        }
        .iconYTe{
            border-radius: 50%;
            width: 50px;
            margin-right: 10px;
        }
        .left_header{
            display: flex;
        }
        .right_header{
            display: flex;
        }
        .header{
            background-color:white;
            font-size: 21px;
            display: flex;
            justify-content: space-between;
            margin-bottom: 70px;
            margin-top:0px;
        }
        .header_content_box{
            padding-left: 10px;
            padding-right:10px;
            cursor: pointer;
        }
        .header_content_box:hover{
            background-color: rgb(3, 126, 106);
        }
    </style>
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
                    <div> <input class = "INPUT_INFOR" placeholder="First Name *"> </div>
                    <div> <input class = "INPUT_INFOR" placeholder="Last Name *"> </div>
                    <div> <input class = "INPUT_INFOR" placeholder="Your Email *"></div>
                    <div> <input class = "INPUT_INFOR" placeholder="Your Phone *"></div>
                    <div> <input class = "INPUT_INFOR" placeholder="Password *"></div>
                    <div> <input class = "INPUT_INFOR" placeholder="Confirm Your Password *"></div>
                </div>
                <div class = "Under_Register_Block">
                    <div class ="Left_Under_Register_Block">
                        <div class = "gender_checkbox">
                            <div class = "Male_box">
                                <input class = "Male_checkbox" placeholder="Male_checkbox" type = "checkbox">
                                <p>Male</p>
                            </div>
            
                            <div class = "Female_box">
                                <input class = "Female_checkbox" placeholder ="Female_checkbox" type = "checkbox">
                                <p>Female</p>
                          
                            </div>
                        </div>
                        <p class = "Have_an_account"> Already have an account?</p>
    
                    </div>
                    
                    <div class = "Right_Under_Register_Block">
                        <button class = "Register_button">Register</button>
                    </div>
                </div>
            </form>
        </section>
        <div class="text-center text-dark">
            Copyright &copy; 2024 ABC Hospital. All rights reserved.
        </div>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>


</html>