<html>
	<body>
		<?php
			$title = "First PHP Program";
			//single line comment
			/*
			 * multi-line comment
			*/
		?>
		<h1><?php echo "<p>Hi World! - $title</p>";?></h1>
		<?php 
			echo "<br />Name is ".$_GET['name']."<br />";
			//echo phpversion();
			//phpinfo();
			var_dump($_REQUEST);
		?>

	</body>
</html>
`23