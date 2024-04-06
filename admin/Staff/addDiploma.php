<?php
    require_once('../../classes/Dbh.php');
    session_start();
    if(isset($_POST['addDiplomaSubmit']))  {
        $db = new Dbh();
        $staffID = $db->select('staffs', 'ID', array("ID" => $_POST['SID']));
        if(!$staffID) {
            $_SESSION['alert_message'] = 'There is no staff with ID '.$_POST['SID'];
            header('location:addStaff_func.php');
        }
        $dipID = $db->select('diploma', 'DIPID', array('DIPID'=> $_POST['DIPID'], 'SID'=>$_POST['SID']));
        if(!$dipID) {
            $items = array(
                "DIPID"=> $_POST['DIPID'],
                "SID"=> $_POST['SID'],
                "college"=> $_POST['college'],
                "nation"=> $_POST['nation'],
                "gYear"=> $_POST["gYear"],
                "major"=> $_POST["major"],
                "specializedField"=> $_POST["specializedField"],
                "programType"=> $_POST["programType"],
                "honor"=> $_POST["honor"],
            );
            $db->insert("diploma", $items);
            $_SESSION['alert_message'] = 'Add diploma sucessfully!';
            header('location:addStaff_func.php');
        } else {
            $_SESSION['alert_message'] = 'There is already a diploma with ID '.$_POST['DIPID']. " of staff ".$_POST['SID'];
            header('location:addStaff_func.php');
        }
    }