<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "hospital");
if(isset($_POST['ctSubmit'])) {
    $patient_ID = $_SESSION['patient_id'];
    $specialization = $_POST['specialization'];
    $appointment_Date = $_POST['adate'];
    $appointment_Time = $_POST['atime'];
    
    $query = "insert into schedule(Patient_ID,Specialization,Appointment_Date,Appointment_Time) values('$patient_ID','$specialization','$appointment_Date','$appointment_Time');";
    $result = mysqli_query($con, $query);

    if($result)
    {
    	echo '<script type="text/javascript">'; 
		  echo 'alert("Booking successfully!");'; 
		  echo 'window.location.href = "book_2.php";';
		  echo '</script>';
    }
}