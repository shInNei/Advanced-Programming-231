<?php
$connect = mysqli_connect("localhost", "root", "", "hospital");

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

$doctorID = $_POST['doctorID'];

$sql = "SELECT fname, lname FROM staffs WHERE ID = '$doctorID'";
$result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result) > 0) {

    $row = mysqli_fetch_assoc($result);

    echo $row['fname'] . " " . $row['lname'];
} else {
    echo "Doctor Not Found";
}
mysqli_close($connect);
?>
