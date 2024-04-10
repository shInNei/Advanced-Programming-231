<?php
    require_once('../../classes/Dbh.php');
    session_start();
    $DB = new Dbh();
    $findContract = $DB->select("contract", "ContractID", array("ContractID" => $_POST["ContractID"]));
    if(!$findContract) {
        $_SESSION['alert_message'] = 'ContractID invalid!';
        header('location:addStaff_func.php');
    } else {
        $item = array (
            "ContractID" => $_POST['ContractID'],
            "exDate" => $_POST['exDate'],
            "salary" => $_POST['salary'],
            "director" => $_POST['director'],
            "dPosition" => $_POST['dPosition'],
            "position" =>$_POST['position'],
            "assure" => $_POST['assure'],
            "form" => $_POST['form']
        );
        $DB->updateContract("contract", $item);
        $_SESSION['alert_message'] = 'Update successfully!';
        header('location:addStaff_func.php');
    }