<?php
    //Lab 1.3
    //Name: Edwin Chen
    echo "<h1>Question 3</h1>";

    //Question 3A
    $array_q3 = array(87,75,93,95);

    //Question 3B & 3C
    unset($array_q3[1]);
    $array_q3_total = 0;
    $average_array_q3 = 0;

    //Question 3D
    foreach ($array_q3 as $values) {
		$array_q3_total += $values;
	}
    $average_array_q3 = $array_q3_total / count($array_q3);

    //Question 3E
    echo "<p>Average test score is $average_array_q3.</p>";
?>