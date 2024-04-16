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
        body {
            font-family: Arial, sans-serif; 
        }

        .table {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .table th,
        .table td {
            border: none;
            vertical-align: middle;
            text-align: center; 
        }

        .table th {
            background-color: #00856f;
            color: #fff;
        }

        .table td {
            color: #555;
        }

        .view-details-btn {
            background-color: #00856f; 
            border: none;
            color: #ffffff; 
            text-decoration: none;
            transition: background-color 0.3s ease; 
            padding: 5px 10px; 
            border-radius: 5px; 
        }

        .view-details-btn:hover {
            background-color: #45a049; 
        }

        .welcome-text {
            text-align: center;
            margin-top: 50px; 
            margin-bottom: 20px; 
        }

        .table-container {
            margin-top: 20px; 
        }
    </style>
    <?php if(session_status() !== PHP_SESSION_ACTIVE) session_start(); ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
        <div class="container main-nav">
            <a class="navbar-brand" href="#">
                <h4> <img src="../../assets/imgs/icons.png" alt="ABC-Hospital" width="30"> &nbsp ABC Hospital</h4>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-right">
                    <li class="nav-item" style="margin-right:20px;">
                        <a class="nav-link active" aria-current="page" href="../dashboard.php"> <i class="fa fa-bars"></i> &nbsp Dashboard</a>
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
    <div class="container welcome-text">
        <h3>Welcome to Admin!</h3>
    </div>
    <div class="content-wrap">
    <div class="container table-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="table-responsive">
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Date received</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once("../../classes/Dbh.php");
                            $db = new Dbh();
                            $report = $db->select("report", "SID, RID, current, subject", null, true);
                            usort($report, function($a, $b) {
                                $t1 = strtotime($a['current']);
                                $t2 = strtotime($b['current']);
                                return $t2 - $t1;
                            });
                            if($report) {
                                $count = 1;
                                if($report) {
                                    foreach(array_values($report) as $rSID) {
                                        $rEmail = $db->select("staffs", "staffUserName", array("ID" => $rSID["SID"]), false);
                                        echo "<tr>";
                                        echo "<td>" . $count . "</td>";
                                        echo "<td>" . $rEmail["staffUserName"] . "</td>";
                                        echo "<td>".$rSID['subject']."</td>";
                                        echo "<td>".date_format(date_create($rSID['current']), "d/m/Y H:i:s")."</td>";
                                        echo "<td><a class='view-details-btn' href='view_details_staff.php?id=" . $rSID["RID"] . "'>View Details</a></td>";
                                        echo "</tr>";
                                        $count++;
                                    }
                                }
                            } else {
                                echo "<tr><td colspan='3'>No mails found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
                        </div>
    <?php
        if (isset($_SESSION['alert_message'])) {
            echo '<script>alert("' . $_SESSION['alert_message'] . '");</script>';
            unset($_SESSION['alert_message']); // Clear the session variable
        } 
    ?>
    <footer class="text-center text-dark" style = "margin-top: 5%">
        Copyright &copy; 2024 ABC Hospital. All rights reserved.
    </footer>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>