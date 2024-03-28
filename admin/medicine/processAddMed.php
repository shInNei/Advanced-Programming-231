<?php
session_start();

require_once('../../classes/Med.php');
require_once('../../classes/Dbh.php');
$db = new Dbh();
if (isset($_POST['addMedSubmit'])) {
    $med = new Med($_POST['medName'], $_POST['medMani'], $_POST['medPrice'], $_POST['medType'], $_POST['medUsage'], $_POST['medQuantity'], $_POST['medManuDate'], $_POST['medExpireDate']);

    $items = $med->attributeMapToDb();

    echo "med items: " . var_dump($items) . '<br>';
    $row = $db->select('medicines','*',$items);

    echo "retrieve from database: ".var_dump($row) . "<br>";

    if ($row) {
        $db->updateAmount('medicines',array('quantity' => $med->getQuantity()),array('ID'=> $row['ID']));
    } else {
        //generate ID
        $id = uniqid(mb_substr($med->getName(), 0, 3));
        $items['ID'] = $id;
        $items['quantity'] = $med->getQuantity();
        echo var_dump($items) . "<br>";

        $db->insert('medicines', $items);
    }
    header('location:addMed.php');
}
