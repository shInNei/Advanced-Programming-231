<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../../assets/imgs/icon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/infor_form.css" />
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.13/css/all.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>ABC HOSPITAL</title>
    <script>
        function myFunction() {
            <?php 
                //$connect = mysqli_connect("localhost", "root", "", "hospital");
                $connect = mysqli_connect("localhost", "id22104283_hospital", "Abc@123@", "id22104283_hospital");
                if (!$connect) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $email = $_SESSION['email'];
                $sql = "SELECT * FROM patients WHERE email = '$email'";
                $result = mysqli_query($connect, $sql);

                $row = mysqli_fetch_assoc($result);
                $hidden = str_repeat("*", strlen($row["pw"]));
                
            ?>
            var staffPassword = "<?php Print($row["pw"]); ?>";
            var hidden = "<?php Print($hidden); ?>";
            
            var x = document.getElementById("mypass");
            if (x.innerHTML === hidden) {
                x.innerHTML = staffPassword;
            } else {
                x.innerHTML = hidden;
            }
        }
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
                const inputTypeSelect = document.getElementById('inputTypeSelect');
                const dynamicInput = document.getElementById('dynamicInput');

                // Event listener for select change
                inputTypeSelect.addEventListener('change', function () {
                    const selectedType = inputTypeSelect.value;
                    if (selectedType === 'staffPassword' || selectedType === 'phoneNumber') {
                        dynamicInput.type = 'text';
                    } else {
                        dynamicInput.type = selectedType;
                    }
                    dynamicInput.value = ''; // Clear the input value when changing type
                });
            });
    </script>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .table {
            margin: auto;
            width: 90%;
            border-collapse: collapse;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
        .search-form {
            width: 70%;
            margin: auto;
            padding-left: 200px;
        }
        .change {
        overflow: auto;
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
                        <a class="nav-link" href="../../logout.php"><i class="fa fa-share" ></i> &nbsp Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container login" style="font-family: 'IBM Plex Sans', sans-serif;">
        <div class="row login-image">
            <!--<img src="../assets/imgs/icons.png" alt="ABC Hospital">-->
            <h3>Patient Information</h3>
        </div>
    </div>
    
    <!-- <table class="table">  
        <?php 
            
            //$connect = mysqli_connect("localhost", "root", "", "hospital");
            $connect = mysqli_connect("localhost", "id22104283_hospital", "Abc@123@", "id22104283_hospital");
            if (!$connect) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $email = $_SESSION['email'];
            $sql = "SELECT * FROM patients WHERE email = '$email'";
            $result = mysqli_query($connect, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo "<tr>
                        <th> ID </th>
                        <th> fName </th>
                        <th> lName </th>
                        <th> email </th>
                        <th> phoneNum </th>
                        <th> gender </th>
                        <th> pw </th>
                    </tr>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                        <td> ".$row["ID"]." </td>
                        <td> ".$row["fName"]." </td>
                        <td> ".$row["lName"]." </td>
                        <td> ".$row["email"]." </td>
                        <td> ".$row["phoneNum"]." </td>
                        <td> ".$row["gender"]." </td>
                        <td> ".$row["pw"]." </td>
                    </tr>";
                }
                echo "</table>";
            }
            else {
                echo "<p style='color: red; font-size: 20px; font-weight: bold; text-align: center;'>0 Results</p>";
            }
        
        ?>
    </table> -->
    <div class="container">
        <div class="container rounded bg-white mt-5 mb-4">
            <div id="soo" class="row" >
                <?php 
                    $result = mysqli_query($connect, $sql);
                    $row = mysqli_fetch_assoc($result);
                ?>
                <div class="col-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-6">
                        <img class="rounded-circle mt-0" width="140px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                        <span class="font-weight-bold"><p><?php echo $row["ID"]." - ".$row["fName"]." ".$row["lName"]; ?></p></span>
                        <span> </span>
                    </div>

                </div>
                <div class="col-7 border-right">  
                    <div class="p-4 py-5">
                        <div class="row">
                            <div class="col-5"><p class="text-justify"><mark><b>ID: </b></mark></p></div>
                            <div class="col-7"><p class="text-justify change"><?php echo $row["ID"]; ?></p></div>
                        </div>
                        <div class="row">
                            <div class="col-5"><p class="text-justify"><mark><b>Username: </b></mark></p></div>
                            <div class="col-7"><p class="text-justify change"><?php echo $row["lName"]; ?></p></div>
                        </div>
                        <div class="row">
                            <div class="col-3"><p class="text-justify"><mark><b>Password: </b></mark></p></div>
                            <div class="col-5"><p class="text-center change" id = "mypass"><?php echo $hidden; ?></p></div> 
                            <div class="col-4"><button type="button" onclick="myFunction()" class="btn btn-primary btn-sm ">Show</button></div>
                        </div>  
                        <div class="row">
                            <div class="col-5"><p class="text-justify"><mark><b>Gender: </b></mark></p></div>
                            <div class="col-7"><p class="text-justify change"><?php echo $row["gender"]; ?></p></div>
                        </div>
                        <div class="row">
                            <div class="col-5"><p class="text-justify"><mark><b>Email: </b></mark></p></div>
                            <div class="col-7"><p class="text-justify change"><?php echo $row["email"]; ?></p></div>
                        </div>
                        <div class="row">
                            <div class="col-5"><p class="text-justify"><mark><b>Phone number: </b></mark></p></div>
                            <div class="col-7"><p class="text-justify change"><?php echo $row["phoneNum"]; ?></p></div>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </div>
    <footer class="text-center text-dark fixed-bottom">
        Copyright &copy; 2024 ABC Hospital. All rights reserved.
    </footer>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
