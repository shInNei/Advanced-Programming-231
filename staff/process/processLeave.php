<?php
session_start();
require_once(__DIR__ . '/../../classes/control/StaffControl.php');

if (isset($_POST['leaveSubmit'])) {
    $sControl = new StaffControl();

    if (isset($_POST['sIdSelector']) && $_POST['sIdSelector'] === 'on') {
        $sid = $_POST['staffID'];

        $checkID = $sControl->searchByID($sid, array("1"), true, false);

        if (!$checkID) {
            $_SESSION['msg'] = "The staff ID is invalid";
            header("location:../leaveRegister.php");
            exit;
        }
    } else {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $role = $_POST['fname'];
        $sDate = $_POST['sDate'];
        $checkID = $sControl->searchIDStandard($fname, $lname, $email, $role, $sDate);
        if (!$checkID) {
            $_SESSION['msg'] = "The given Info is incorrect";
            header("location:../leaveRegister.php");
            exit;
        }
        $sid = $checkID['ID'];
    }

    if (isset($_SESSION['msg'])) unset($_SESSION['sLeave_sID_msg']);

    $alDay = $sControl->searchByID($sid, array("annualLeaveDay"));

    $leaveType = $_POST['leaveType'];
    $fromDate = $_POST['fromDate'];
    $duration = $_POST['leaveDuration'];
    if ($leaveType === "al") {
        if ($alDay < $duration) {
            $_SESSION['msg'] = "Not enough annual leave days";
            header("location:../leaveRegister.php");
            exit;
        } else {
            // $sControl->takeleave($sid);
            $endDate = date('Y-m-d', strtotime("$fromDate + $duration days"));
        }
    } else {
        $endDate = date('Y-m-d', strtotime("$fromDate + 1 days"));
    }

    $regLeaveItems = array(
        'staffID' => $sid,
        'startDate' => $fromDate,
        'endDate' => $endDate,
        'leaveType' => $leaveType,
        'reason' => $_POST['reason']
    );
    $sControl->addLeaveRequest($regLeaveItems);
}
header("location:../leaveRegister.php");