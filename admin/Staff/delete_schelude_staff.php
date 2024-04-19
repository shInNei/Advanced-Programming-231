<?php
session_start();

if (!isset($_SESSION['loginad']) || $_SESSION['loginad'] !== true) {
    // If not logged in, move to index 
    header('location: ../../index.php');
    exit;
}

require_once('../../includes/header.php');

$connect = mysqli_connect("localhost", "root", "", "hospital");

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}


?>

<link rel="stylesheet" href="../../assets/css/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<style>
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
        /* Thiết kế bảng sáng tạo hơn */
        table.table {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        /* Hiệu ứng cho nút xóa */
        .delete-btn {
            transition: transform 0.3s ease;
        }
        .delete-btn:hover {
            transform: scale(1.1);
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

    <div class="container mt-4"> <!-- Thêm lớp mt-4 để tạo khoảng cách từ navbar -->
    <h2 class="text-center mb-4">Delete Schedule Staff</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Staff ID</th>
                        <th>Work Shift</th>
                        <th>Day of the Week</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // Lấy dữ liệu từ database và hiển thị trong bảng
                        $sql = "SELECT * FROM schedule_staff";
                        $result = mysqli_query($connect, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['staff_id'] . "</td>";
                            echo "<td>" . $row['work_shift'] . "</td>";
                            echo "<td>" . $row['day_of_the_week'] . "</td>";
                            echo "<td>" . $row['decription'] . "</td>";
                            echo '<td><button type="button" class="btn btn-danger btn-sm delete-btn" data-staff-id="' . $row['staff_id'] . '"><i class="fas fa-trash"></i> Delete</button></td>';
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            // Xử lý khi nút Delete được nhấn
            $('.delete-btn').click(function() {
                // Lấy staff_id từ thuộc tính data-staff-id của nút Delete
                var staffIdToDelete = $(this).data('staff-id');

                // Hiển thị xác nhận xóa và xác nhận với người dùng
                var isConfirmed = confirm("Are you sure you want to delete?");

                // Nếu người dùng xác nhận xóa, gửi yêu cầu xóa dữ liệu
                if (isConfirmed) {
                    $.ajax({
                        url: 'delete_schedule_staff.php', // Đường dẫn đến file xử lý xóa
                        method: 'POST',
                        data: { staff_id_to_delete: staffIdToDelete },
                        success: function(response) {
                            // Nếu xóa thành công, làm mới trang để cập nhật bảng
                            location.reload();
                        },
                        error: function(xhr, status, error) {
                            // Xử lý lỗi nếu có
                            console.error(xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>
</body>


