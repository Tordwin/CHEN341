<?php
    //Lab 1.4
    //Name: Edwin Chen
    echo "<h1>Question 4</h1>";

    //Question 4A
    $array = [
        [1,2,3,4,5],
        [6,7,8,9,10],
        [11,12,13]
    ];

    //Question 4B
    echo "<h2>Question 4B</h2>";
    for ($i = 0; $i < count($array); $i++) {
        for ($j = 0; $j < count($array[$i]); $j++) {
            if ($array[$i][$j] == 8) {
                echo "Print out the element with value of 8 [$i][$j]: {$array[$i][$j]}";
            }
        }
    }

    //Question 4C
    $array[2][] = 14; 
    $array[] =[15,16,17];
    $array[] = 18;

    //Question 4D
    echo "<h2>Question 4d</h2>";
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            foreach ($value as $key2 => $value2) {
                echo "[$key][$key2]: $value2 <br />";
            }
        } else {
            echo "[$key]: $value <br />";
        }
    }

    //Question 4E
    echo "<h2>Question 4e</h2>";
    for ($i = 0; $i < count($array); $i++) {
        if (is_array($array[$i])) {
            for ($j = 0; $j < count($array[$i]); $j++) {
                echo "[$i][$j]: {$array[$i][$j]} <br />";
            }
        } else {
            echo "[$i]: {$array[$i]} <br />";
        }
    }

    //Question 4F
    $array2 = [
        "name" => [
            "first" => "Edwin",
            "last" => "Chen"
        ],

        "address" => [
            "street" => "123 Main St",
            "city" => "Rochester",
            "state" => "NY",
            "zip" => "14623"
        ]
    ];

    //Question 4G
    echo "<h2>Question 4g</h2>";
    foreach ($array2 as $key => $value) {
        foreach ($value as $key2 => $value2) {
            echo "[$key][$key2]: $value2 <br />";
        }
    }

    //Question 4H
    $array2["name"]["middle"]="none";
    $array2["name"][] = ["my"=>"name"];
    $array2["name"][] = 25;
    $array2[] = [1,2,3,4,5];
    $array2[][] = ["testing"=>"yes"];

    // Question 4I
    echo "<h2>Question 4i</h2>";
    foreach ($array2 as $key => $value) {
        if (is_array($value)) {
            foreach ($value as $key2 => $value2) {
                if (is_array($value2)) {
                    foreach ($value2 as $key3 => $value3) {
                        echo "[$key][$key2][$key3]: $value3 <br />";
                    }
                } else {
                    echo "[$key][$key2]: $value2 <br />";
                }
            }
        } else {
            echo "[$key]: $value <br />";
        }
    }   
?>