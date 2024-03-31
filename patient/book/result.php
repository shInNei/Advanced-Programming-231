<?php

$spec = "none";
$doctor = "none";
$adate = "none";
$atime = "none";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['spec']) && !empty($_POST['spec'])) {
        $spec = $_POST['spec'];
    }
    if (isset($_POST['doctor']) && !empty($_POST['doctor'])) {
        $doctor = $_POST['$doctor'];
    }
    if (isset($_POST['adate']) && !empty($_POST['adate'])) {
        $adate = $_POST['adate'];
    }
    if (isset($_POST['atime']) && !empty($_POST['atime'])) {
        $atime = $_POST['atime'];
    }
}

?>
