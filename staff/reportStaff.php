<?php
require_once("../classes/Dbh.php");
session_start();
if(isset($_POST['reportSubmit'])) { 
    $db = new Dbh();
    if(!isset($_SESSION['userid'])) {
        $_SESSION['alert_message'] = "Error with ID";
        header('location:profile.php');
    } else {
        $item = array (
            "SID" => $_SESSION['userid'],
            "subject" => $_POST['subject'],
            "message" => $_POST['content']
        );
        $db->insert('report', $item);
        $_SESSION['alert_message'] = "Send successfully!";
        header('location:profile.php');
    }
}
