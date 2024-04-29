<?php
session_start();
//$con = mysqli_connect("localhost", "root", "", "hospital");
$con = mysqli_connect("localhost", "id22036229_abchospital", "Abc@123@", "id22036229_abchosptital");
if(isset($_POST['ctSubmit'])) {
    $schedule_ID = $_POST['id'];
    
    $patient_ID = $_SESSION['patient_id'];
    $specialization = $_POST['specialization'];
    $appointment_Date = $_POST['adate'];
    $appointment_Time = $_POST['atime'];
    
    $query = "UPDATE schedule SET Specialization = '$specialization', Appointment_Date = '$appointment_Date', Appointment_Time = '$appointment_Time' WHERE Schedule_ID = '$schedule_ID';";
    $result = mysqli_query($con, $query);

    if($result)
    {
    	echo '<script type="text/javascript">'; 
		  echo 'alert("Booking updated successfully!");'; 
		  echo 'window.location.href = "list_sched.php";';
		  echo '</script>';
    }
}