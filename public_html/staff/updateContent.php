<?php
    require_once('../classes/Dbh.php');
    session_start();
    if(isset($_POST["updateSubmit"])) {
        $DB = new Dbh();
        if((strcmp($_POST['attri'], "phoneNumber") == 0) && (!ctype_digit($_POST["updatecontent"]) || strlen($_POST["updatecontent"]) < 6 || strlen($_POST["updatecontent"]) > 11)) {
            $_SESSION['alert_message'] = 'Please use valid phone number.';
            header('location:profile.php');
        } else if((strcmp($_POST['attri'], "staffPassword") == 0) && ((strpos($_POST["updatecontent"],'"') !== false) || strlen($_POST["updatecontent"]) > 16)){
            $_SESSION['alert_message'] = "Please match the requested Password format!!";
            header('location:profile.php');
        } else if((strcmp($_POST['attri'], "email") == 0) && !filter_var($_POST["updatecontent"], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['alert_message'] = "Please match the requested Email format!!";
            header('location:profile.php');
        } else {
            $DB->updateProfile('staffs', $_POST['attri'], $_POST['updatecontent'], $_SESSION['SID']);
            if(strcmp($_POST['attri'], "staffPassword") == 0) {
                $_SESSION['password'] = $_POST['updatecontent'];
            }
            $_SESSION['alert_message'] = 'Update successfully!';
            header('location:profile.php');
        }
    }