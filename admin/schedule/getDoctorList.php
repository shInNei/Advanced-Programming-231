<?php
$connect = mysqli_connect("localhost", "root", "", "hospital");

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

$department = $_POST['department'];

$sql = "SELECT ID FROM staffs WHERE prof = '$department' AND task = 'Doctor'";
$result = mysqli_query($connect, $sql);

echo "<option value='select_id'>Select ID</option>";
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value='" . $row['ID'] . "'>" . $row['ID'] . "</option>";
    }
} else {
    echo "<option value=''>No Doctors Found</option>";
}

mysqli_close($connect);
?>
