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

        .card {
            margin-top: 20px;
        }

        .card-header {
            background-color: #00856f;
            color: white;
            font-weight: bold;
        }

        .form-control[readonly] {
            background-color: #f8f9fa;
        }
    </style>
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
    <div class="content-wrap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        View 
                    </div>
                    <div class="card-body">
                        <?php
                        require_once("../../classes/Dbh.php");
                        // Kết nối đến cơ sở dữ liệu
                        $db = new Dbh();
                        // Kiểm tra xem có tham số email được truyền qua URL không
                        if (isset($_GET['id'])) {
                                $result = $db->select("contact", "*", array("id" => $_GET['id']), false);
                        } else {
                            echo "No details found for this ID";
                        }
                        ?>
                                <form method="post" action="deletemail.php">
                                <div class="form-group row">
                                    <label for="id" class="col-sm-4 col-form-label">Mail's ID</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control" name="mailid" id="id" value="<?php echo $result['id']?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-4 col-form-label">Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control" id="name" value="<?php echo $result['name']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-4 col-form-label">Email</label>
                                    <div class="col-sm-8">
                                        <input type="email" readonly class="form-control" id="email" value="<?php echo $result['email']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="current" class="col-sm-4 col-form-label">Time received</label>
                                    <div class="col-sm-8">
                                        <input type="datetime" readonly class="form-control" id="current" value="<?php echo $result['current']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="contact" class="col-sm-4 col-form-label">Contact</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control" id="contact" value="<?php echo $result['contact']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="message" class="col-sm-4 col-form-label">Message</label>
                                    <div class="col-sm-8">
                                        <textarea rows="10" readonly class="form-control" id="message"><?php echo $result['message']; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm">
                                    <a href="mailbox.php" style="margin-bottom: 0px" class="btn btn-primary">Close</a>
                                    <input type="submit" name="Delete" value="Delete" class="btn btn-danger" style="margin-bottom: 0px">
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <footer class="text-center text-dark" style = "margin-top: 5%">
        Copyright &copy; 2024 ABC Hospital. All rights reserved.
    </footer>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>
