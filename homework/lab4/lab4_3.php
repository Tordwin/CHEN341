<?php
    require_once('PDO.DB.class.php');
    $db = new DB();
    echo "<h1>People Database</h1>";
    echo $db->getAllObjects();
?>