<?php
    include 'lab3_3.php';
    $britishPerson = new BritishPerson("Albert", "Mansel");
    $britishPerson->height = 155;
    $britishPerson->weight = 65;
    echo $britishPerson->convertBMI();
?>