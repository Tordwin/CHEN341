<?php
    include 'lab3_1.php';
    $person = new Person("Edwin", "Chen");
    $person->height = 73;
    $person->weight = 180;
    echo $person->calculateBMI();
?>