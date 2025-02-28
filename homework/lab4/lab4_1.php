<?php
    require_once('DB.class.php');
    $db = new DB();
    echo "<h1>People Database</h1>";
    echo $db->getAllPeopleAsTable();
?>