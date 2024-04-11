<?php
    require_once('../../classes/Dbh.php');
    session_start();
    if(isset($_POST['addContractSubmit'])) {
        $db = new Dbh();
        $staffID = $db->select('staffs', 'ID', array("ID" => $_POST['SID']));
        if(!$staffID) {
            $_SESSION['alert_message'] = 'There is no staff with ID '.$_POST['SID'];
            header('location:addStaff_func.php');
        }
        $CCCD = $db->select('contract', 'CCCD', array("CCCD" => $_POST["CCCD"]));
        $sID = $db->select('contract', 'SID', array("SID" => $_POST["SID"]));
        if(!$CCCD && !$sID) {
            $item = array(
                "SID"=> $_POST["SID"],
                "exDate"=> $_POST["exDate"],
                "salary"=> $_POST["salary"],
                "hospital"=> $_POST["hospital"],
                "hospitaladdress"=> $_POST["hospitaladdress"],
                "director"=> $_POST["director"],
                "dPosition"=> $_POST["dPosition"],
                "position"=> $_POST["position"],
                "CCCD"=> $_POST["CCCD"],
                "assure"=> $_POST["assure"],
                "form"=> $_POST["form"],
                "address"=> $_POST["address"],
            );
            $db->insert("contract", $item);
            $_SESSION['alert_message'] = "Add contract sucessfully!";
            header('location:addStaff_func.php');
        } else {
            $_SESSION['alert_message'] = 'There is already a contract with Identification '.$_POST["CCCD"].' or Staff ID '.$_POST["SID"];
            header('location:addStaff_func.php');
        }
    }