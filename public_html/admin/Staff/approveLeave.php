<?php
require_once(__DIR__."/../../classes/control/StaffControl.php");
$id = $_GET['id'];
if(isset($id)){
    $sControl = new StaffControl();
    $approve = $sControl->approveLeave($id);
}
header("location:reviewLeave.php");