<?php if(session_status() !== PHP_SESSION_ACTIVE) session_start();
require_once("../../classes/Dbh.php");
if(isset($_POST['Delete'])) {
    $db = new Dbh();
    $db->delete("report", array("RID" => $_POST["mailid"]));
    $_SESSION['alert_message'] = 'Delete mail successfully!';
    header('location:mailboxStaff.php');
} else {
    $_SESSION['alert_message'] = 'Error in delete.';
    header('location:mailboxStaff.php');
}
