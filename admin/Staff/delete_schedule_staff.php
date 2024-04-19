<?php
session_start();

if (!isset($_SESSION['loginad']) || $_SESSION['loginad'] !== true) {
    // Nếu chưa đăng nhập, chuyển hướng về trang index
    header('location: ../../index.php');
    exit;
}

require_once('../../includes/header.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Delete Schedule Staff</title>
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
                <h4><img src="../../assets/imgs/icons.png" alt="ABC-Hospital" width="30"> &nbsp ABC Hospital</h4>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-right">
                    <li class="nav-item" style="margin-right:20px;">
                        <a class="nav-link active" aria-current="page" href="../dashboard.php"><i class="fa fa-bars"></i> &nbsp Dashboard</a>
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
                // Kết nối đến cơ sở dữ liệu
                $connect = mysqli_connect("localhost", "root", "", "hospital");

                if (!$connect) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Truy vấn cơ sở dữ liệu để lấy dữ liệu
                $sql = "SELECT * FROM schedule_staff";
                $result = mysqli_query($connect, $sql);

                if (mysqli_num_rows($result) > 0) {
                    // Lặp qua từng dòng kết quả và hiển thị trong bảng
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['staff_id'] . "</td>";
                        echo "<td>" . $row['work_shift'] . "</td>";
                        echo "<td>" . $row['day_of_the_week'] . "</td>";
                        echo "<td>" . $row['decription'] . "</td>";
                        echo '<td><button type="button" class="btn btn-danger btn-sm delete-btn" data-record-id="' . $row['id'] . '"><i class="fas fa-trash"></i> Delete</button></td>';

                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No records found</td></tr>";
                }

                // Đóng kết nối
                mysqli_close($connect);
                ?>
            </tbody>
        </table>
    </div>
</div>



    <script>
    $(document).ready(function() {
    // Xử lý khi nút Delete được nhấn
    $('.delete-btn').click(function() {
        // Lấy id của bản ghi từ thuộc tính data-record-id của nút Delete
        var recordIdToDelete = $(this).data('record-id');

        // Kiểm tra xem id của bản ghi có tồn tại không
        if (recordIdToDelete) {
            // Hiển thị xác nhận xóa và xác nhận với người dùng
            var isConfirmed = confirm("Are you sure you want to delete?");

            if (isConfirmed) {
                $.ajax({
                    url: 'delete_schedule_staff.php', // Đường dẫn đến file xử lý xóa
                    method: 'POST',
                    data: {
                        record_id_to_delete: recordIdToDelete // Chỉnh sửa tên trường dữ liệu gửi đi thành record_id_to_delete
                    },
                    success: function(response) {
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Xử lý lỗi nếu có
                        console.error(xhr.responseText);
                    }
                });
            }
        } else {
            console.error("Record ID is not provided.");
        }
    });
});

    </script>
</body>
</html>

<?php
// Xác định id của bản ghi cần xóa
if (isset($_POST['record-id'])) {
    $recordIdToDelete = $_POST['record-id'];

    // Kết nối đến cơ sở dữ liệu
    $connect = mysqli_connect("localhost", "root", "", "hospital");

    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Sử dụng câu lệnh prepared statement để tránh SQL injection
    $deleteQuery = "DELETE FROM schedule_staff WHERE id = $recordIdToDelet";
    $stmt = mysqli_prepare($connect, $deleteQuery);
    mysqli_stmt_bind_param($stmt, "i", $recordIdToDelete);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        // Trả về mã thành công nếu xóa thành công
        http_response_code(200);
        echo "Record deleted successfully.";
    } else {
        // Trả về mã lỗi nếu xóa không thành công
        http_response_code(500);
        echo "Error deleting record.";
    }

    // Đóng kết nối và câu lệnh
    mysqli_stmt_close($stmt);
    mysqli_close($connect);
} else {
    // Trả về mã lỗi nếu không có id bản ghi được cung cấp
    http_response_code(400);
    
}
?>