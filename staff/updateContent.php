<?php
    require_once('../classes/Dbh.php');
    session_start();
    if(isset($_POST["updateSubmit"])) {
        $DB = new Dbh();
        $DB->updateProfile('staffs', $_POST['attri'], $_POST['updatecontent'], $_SESSION['SID']);
        if(strcmp($_POST['attri'], "staffPassword") == 0) {
            $_SESSION['password'] = $_POST['updatecontent'];
        }
        $_SESSION['alert_message'] = 'Update successfully!';
        header('location:profile.php');
    }