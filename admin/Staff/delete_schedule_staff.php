<?php
    session_start();

    if(!isset($_SESSION['loginad']) || $_SESSION['loginad'] !== true){
        header('location: ../../index.php');
        exit;
    }

    require_once('../../includes/header.php');
?>

    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <style>
        .center-form {
            width: 100%;
            margin: 0 auto;
        }

        .modal-title{
            margin: 0 auto;
        }

        .form-group{
            margin: 0 auto;
            padding-top: 20px;
        
        }
    
        .form-check{
            border: 1px solid black;
            display: inline;
            margin: 0;
            margin-right: 5px; 
            height: 5px;
        }

        .form-check-label{
            margin:0;
        }

        .block-check-box{
            display: flex;
        }

        .form-check-label{
            text-align: top;
        }

        .container1{
            border: 2px solid black;
            width: 100%;
            margin: 0 auto;
            margin-top: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .btn-primary{
            padding: 5px 10px 5px 10px;
        }

        .btn-primary:hover{
            background-color: green;
        }

        .header{
            display: block;
            text-align: center;
            background-color: #00856f;
            color: white;
            padding-top: 20px;
            padding-bottom: 20px;
        }
        table.table {
            border-collapse: collapse;
            width: 100%;
            transition: all 0.3s ease;
        }
        table.table th, table.table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        table.table th {
            background-color: #00856f;
            color: #333;
            font-weight: bold;
        }
        table.table tbody tr:hover {
            background-color: #f5f5f5;
        }

        table.table {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .delete-btn {
            transition: transform 0.3s ease;
        }
        .delete-btn:hover {
            transform: scale(1.1);
        }
    </style>

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
                        <a class="nav-link active" aria-current="page" href="../dashboard.php"> <i class = "fa fa-bars"></i> &nbsp Dashboard</a>
                    </li>
                </ul>
            <ul class="navbar-nav ms-auto">
                <!-- <li class="nav-item" style="margin-right:40px;">
                    <a class="nav-link active" aria-current="page" href="../dashboard.php"> <i class="fa fa-th-large"></i> &nbsp Dashboard</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="../../logout.php"><i class="fa fa-share"></i> &nbsp Log out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div class="container">
<div class="container1">
    <form action="delete_schedule_staff.php" method="post" class="center-form">
        <div class="container mt-4">
            <h2 class="text-center mb-4">Delete Schedule Staff</h2>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Staff ID</th>
                            <th>Work Shift</th>
                            <th>Day of the Week</th>
                            <th>Decription</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        $connect = mysqli_connect("localhost", "root", "", "hospital");

                        if (!$connect) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        $sql = "SELECT * FROM schedule_staff";
                        $result = mysqli_query($connect, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['staff_id'] . "</td>";
                                echo "<td>" . $row['work_shift'] . "</td>";
                                echo "<td>" . $row['day_of_the_week'] . "</td>";
                                echo "<td>" . $row['decription'] . "</td>";
                                echo '<td>
                                        <form action="delete_schedule_staff.php" method="post">
                                            <input type="hidden" name="delete_id" value="' . $row['id'] . '">
                                            <button type="submit" class="btn btn-danger btn-sm delete-btn" onclick="return confirm(\'Are you sure you want to delete this record?\')">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                      </td>';
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>No records found</td></tr>";
                        }

                        mysqli_close($connect);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        
    </form>
</div>
</div>
</body>

<?php
$connect = mysqli_connect("localhost", "root", "", "hospital");

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST["delete_id"])){
    $delete_id = $_POST['delete_id'];

    $sql = "DELETE FROM schedule_staff WHERE id = '$delete_id'";
    $result = mysqli_query($connect, $sql);

    if($result){
        $error_message = "Successfully deleted!";
    } else {
        $error_message = "Deletion failed!";
    }

    if (!empty($error_message)) {
        echo '<script type="text/javascript">'; 
        echo 'alert("' . $error_message . '");'; 
        echo 'window.location.href = "delete_schedule_staff.php";';
        echo '</script>';
    }
}
?>
