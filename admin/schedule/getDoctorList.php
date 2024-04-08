<?php
// Kết nối tới cơ sở dữ liệu
$connect = mysqli_connect("localhost", "root", "", "hospital");

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

// Lấy phòng ban từ request POST
$department = $_POST['department'];

// Truy vấn danh sách các bác sĩ dựa trên phòng ban và nhiệm vụ là Doctor
$sql = "SELECT ID FROM staffs WHERE prof = '$department' AND task = 'Doctor'";
$result = mysqli_query($connect, $sql);

// Hiển thị danh sách các bác sĩ dưới dạng các option
echo "<option value='select_id'>Select ID</option>"; // Thêm option mặc định "Select ID"
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value='" . $row['ID'] . "'>" . $row['ID'] . "</option>";
    }
} else {
    echo "<option value=''>No Doctors Found</option>";
}

mysqli_close($connect);
?>
