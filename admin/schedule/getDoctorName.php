<?php
// Kết nối tới cơ sở dữ liệu
$connect = mysqli_connect("localhost", "root", "", "hospital");

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

// Lấy ID của bác sĩ từ request POST
$doctorID = $_POST['doctorID'];

// Truy vấn thông tin của bác sĩ dựa trên ID
$sql = "SELECT fname, lname FROM staffs WHERE ID = '$doctorID'";
$result = mysqli_query($connect, $sql);

// Kiểm tra nếu có kết quả từ truy vấn
if (mysqli_num_rows($result) > 0) {
    // Lấy dữ liệu từ kết quả truy vấn
    $row = mysqli_fetch_assoc($result);
    // Xuất tên của bác sĩ theo thứ tự fname lname
    echo $row['fname'] . " " . $row['lname'];
} else {
    // Nếu không có kết quả, xuất thông báo lỗi
    echo "Doctor Not Found";
}

// Đóng kết nối
mysqli_close($connect);
?>
