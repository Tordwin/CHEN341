<?php
    require_once('DB.class.php');
    $db = new DB();
    echo $db->getAllPeopleAsTable();
    //echo $db->insert("John", "Doe", "Random");
    echo $db->update(['id=>17','nick=>JD']);
    echo $db->getAllPeopleAsTable();
?>