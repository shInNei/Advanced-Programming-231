<?php
//$con = mysqli_connect("localhost", "root", "", "hospital");
$con = mysqli_connect("localhost", "id22104051_hospital", "Abc@123@", "id22104051_hospital");
if(isset($_POST['ctSubmit'])) {
    $name = $_POST['ctName'];
    $email = $_POST['ctEmail'];
    $contact = $_POST['ctPhone'];
    $message = $_POST['ctMsg'];

    $query = "insert into contact(name,email,contact,message) values('$name','$email','$contact','$message');";
    $result = mysqli_query($con, $query);

    if($result)
    {
    	echo '<script type="text/javascript">'; 
		  echo 'alert("Message sent successfully!");'; 
		  echo 'window.location.href = "contact.html";';
		  echo '</script>';
    }
}