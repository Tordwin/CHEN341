<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Array Tester</title>
</head>
<body>
	<?php

		echo "<h1>#1 - Standard indexed array</h1>";
		$array1 = [55,66,77,88];
		$array1[] = 99;
		$array1[0] = 11;

		for ($i=0; $i < count($array1); $i++ ) {
			echo $array1[$i]."<br />";
		}

		$array1b = [];
		$array1b[0] = 1;
		$array1b[2] = 2;
		$array1b[] = 3;
		var_dump($array1b);

		for ($i=0; $i < count($array1b); $i++ ) {
			echo $array1b[$i]."<br />";
		}

		foreach ($array1b as $key => $value ) {
			echo "$key = $value<br />";
		}

		echo "<h1>#2 - Associative array value</h1>";
		$array2 = [
			"RIT" => "https://www.rit.edu",
			"Google" => "https://www.google.com",
			'Yahoo' => "https://www.yahoo.com"
		];

		// $array2[] = "Hello;

		$array2["CNN"] = "https://www.cnn.com";

		// $array2[] = "Goodbye";

		foreach ($array2 as $v ) {
			echo "$v<br />";
		}

		// var_dump($array2);

		// echo "<h1>#3- Associative array value and key</h1>";

		echo "<h1>#4 - Associative array build some links</h1>";

		foreach ($array2 as $k=>$v) {
			echo "<a href='$v'>$k</a><br />";
		}

		echo "<h1>#5 - Nested Asoociative Array - one at a time</h1>";

		$array3 = [
			'colors' => ['red', 'green', 'blue'],
			'shapes' => ['circle', 'square', 'triangle', 'octagon'],
			[1,2,3,4,5],
			'nums' => ["one"=>1, "two"=>2]
		];

		var_dump($array3);

		foreach ($array3['colors'] as $v) {
			echo "$v<br />";
		}

		foreach ($array3['shapes'] as $v){
			echo "$v <br />";
		}

		echo "<h1>#6 - Nested Asoociative Array - nested for loops</h1>";
		foreach ($array3 as $key=>$value) {
			echo "<h2>$key</h2>";
			
			foreach ($value as $v ) {
				echo "$v <br />";
			}
			
			echo "<hr />";	
		}
	?>
</body>
</html>
