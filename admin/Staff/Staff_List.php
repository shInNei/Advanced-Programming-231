<?php

session_start();

if(!isset($_SESSION['loginad']) || $_SESSION['loginad'] !== true){
     // If not logged in, move to index 
    header('location: ../../index.php');
    exit;
 }
?>



    <html>
        <head>
            <meta charset="UTF-8">
            <link rel="icon" href="../../assets/imgs/icon.png" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
            <link rel="stylesheet" href="../../assets/css/style.css">
            <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.13/css/all.css'>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
            <link rel="stylesheet" href="../../assets/css/staff_list.css">
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
                   
        
        <p class = 'Ten_bang'> STAFF INFORMATION </p>;

        <form class = "search_block" name = "search_block" action = "Staff_Search.php" method = "post">
            <div class = "search_box">
                <input type = "text" name = "search_box" placeholder = "Input ID to find" class = "ID"> 
            </div>

            <div class = "submit_search">
                <input type = "submit" name = "submit_search" value = "search" class = "search_text">
            </div>
        </form>
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

        $sql = "SELECT * FROM staffs";
        $result = $conn->query($sql);

        if($result->num_rows > 0){

            echo "<table>";    
            echo "<tr>
                    <th>ID</th>
                    <th>STAFF USER NAME</th>
                    <th>FIRST NAME</th>
                    <th>LAST NAME</th>
                    <th>EMAIL</th>
                    <th>PROF</th>
                    <th>PASSWORD</th>
                    <th>GENDER</th>
                    <th>TASK</th>
                    <th>START DAY</th>
                    <th>PHONE NUMBER</th>
                    <th>ANNUAL LEAVE DAY</th>
                   </tr>";
            
            while($row = $result->fetch_assoc()){
                echo "<tr>
                        <td>".$row["ID"]."</td>
                        <td>".$row["staffUserName"]."</td>
                        <td>".$row["fname"]."</td>
                        <td>".$row["lname"]."</td>
                        <td>".$row["email"]."</td>
                        <td>".$row["prof"]."</td>
                        <td>".$row["staffPassword"]."</td>
                        <td>".$row["gender"]."</td>
                        <td>".$row["task"]."</td>
                        <td>".$row["startDate"]."</td>
                        <td>".$row["phoneNumber"]."</td>
                        <td>".$row["annualLeaveDay"]."</td>
                      </tr>";

            }

            "</table>";

        } else {
        echo "0 result";
        }
        ?>
         <footer class="text-center text-dark fixed-bottom">
            Copyright &copy; 2024 ABC Hospital. All rights reserved.
        </footer>
        </body>

    </html>
        
        
        