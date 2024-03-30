<!DOCTYPE html>
<html lang="en">

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
            box-shadow: 0px 0px 10px rgba(0,0,0,0.5);
        }
        #contact form h3 {
            text-align: center;
            font-family: "Anta", sans-serif;
        }
        textarea {
            resize: none;
        }
        .contact-image{
            text-align: center;
        }
        .contact-image img{
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
                        <a class="nav-link" href="../../index.php"><i class="fa fa-share" ></i> &nbsp Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container login" style="font-family: 'IBM Plex Sans', sans-serif;">
        <div class="row login-image">
            <!--<img src="../assets/imgs/icons.png" alt="ABC Hospital">-->
            <h3>Book Appointment</h3>
        </div>
    </div>

    <div class="container">
    <section id="contact" class="d-flex align-items-center flex-column" >
        <form action="" method="POST">
            <h2>Specialization: </h2>

            <div class="select-box">
                <div class="options-container">
                    <div class="option">
                        <input type="radio" class="radio" id="Skin" name="category" value="Skin"/>
                        <label for="Skin">Skin</label>
                    </div>

                    <div class="option">
                        <input type="radio" class="radio" id="Stomach" name="category" value="Stomach" />
                        <label for="Stomach">Stomach</label>
                    </div>

                    <div class="option">
                        <input type="radio" class="radio" id="Eyes" name="category" value="Eyes"/>
                        <label for="Eyes">Eyes</label>
                    </div>

                    <div class="option">
                        <input type="radio" class="radio" id="Heart" name="category" value="Heart"/>
                        <label for="Heart">Heart</label>
                    </div>

                    <div class="option">
                        <input type="radio" class="radio" id="Cancer" name="category" value="Cancer"/>
                        <label for="Cancer">Cancer</label>
                    </div>
                </div>

                <div class="selected">
                    Select Specialization
                </div>
            </div>

            </br>

            <h2>Doctor: </h2>
            <div class="select-box">
                <div class="options-container">
                    <div class="option">
                        <input type="radio" class="radio" id="A" name="category" value="A"/>
                        <label for="A">A</label>
                    </div>

                    <div class="option">
                        <input type="radio" class="radio" id="B" name="category" value="B"/>
                        <label for="B">B</label>
                    </div>

                    <div class="option">
                        <input type="radio" class="radio" id="C" name="category" value="C"/>
                        <label for="C">C</label>
                    </div>

                    <div class="option">
                        <input type="radio" class="radio" id="D" name="category" value="D"/>
                        <label for="D">D</label>
                    </div>
                </div>

                <div class="selected">
                    Select Doctor
                </div>
            </div>

            </br>

            <h2>Appointment Date: </h2>
            <div class="select-box-1">
                <div class="col-md-8">
                    <input type="date" class="form-control datepicker" id="appointment-date" name="appointment-date" value="date">
                </div>
            </div>

            </br>

            <h2>Appointment Time: </h2>
            <div class="select-box">
                <div class="options-container">
                    <div class="option">
                        <input type="radio" class="radio" id="7:00 AM" name="category" value="7:00 AM"/>
                        <label for="7:00 AM">7:00 AM</label>
                    </div>

                    <div class="option">
                        <input type="radio" class="radio" id="10:00 AM" name="category" value="10:00 AM"/>
                        <label for="10:00 AM">10:00 AM</label>
                    </div>

                    <div class="option">
                        <input type="radio" class="radio" id="1:00 PM" name="category" value="1:00 PM"/>
                        <label for="1:00 PM">1:00 PM</label>
                    </div>

                    <div class="option">
                        <input type="radio" class="radio" id="4:00 PM" name="category" value="4:00 PM"/>
                        <label for="4:00 PM">4:00 PM</label>
                    </div>
                </div>

                <div class="selected">
                    Select Appointment Time
                </div>
            </div>

        </form>
    </section>
    </div>
    <footer class="text-center text-dark fixed-bottom" style="position:fixed; ">
        Copyright &copy; 2024 ABC Hospital. All rights reserved.
    </footer>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="main.js"></script>
</body>
</html>
