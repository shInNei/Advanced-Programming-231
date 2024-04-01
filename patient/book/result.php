<?php
$con = mysqli_connect("localhost", "root", "", "hospital");
if(isset($_POST['ctSubmit'])) {
    $spec = $_POST['spec'];
    $doctor = $_POST['doctor'];
    $adate = $_POST['adate'];
    $atime = $_POST['atime'];

    $query = "";
    $result = mysqli_query($con, $query);

    if($result)
    {
    	echo '<script type="text/javascript">'; 
		  echo 'alert("Message sent successfully!");'; 
		  echo 'window.location.href = "bookapmt_dashboard.php";';
		  echo '</script>';
    }
}