<?php
    //Lab 1.2
    //Name: Edwin Chen
    echo "<h1>Question 2</h1>";

    //Question 2A
    $array_q2 = array(87,75,93,95);
    $array_q2_total = 0;
    $average_array_q2 = 0;

    //Question 2B
    foreach ($array_q2 as $values) {
		$array_q2_total += $values;
	}
    $average_array_q2 = $array_q2_total / count($array_q2);

    //Question 2C
    echo "<p>Average test score is $average_array_q2.</p>";
?>