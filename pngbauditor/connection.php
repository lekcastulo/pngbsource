<?php
	//  $connection = mysqli_connect("pngbwebdb.c411g24lxfjd.ap-southeast-1.rds.amazonaws.com:3306", "ezelteq", "si3ru90Cs5bWED9U", "script2");
	 $connection = mysqli_connect("localhost", "root", "si3ru90Cs5bWED9U", "script3");
	if (mysqli_connect_errno()) {
		echo "failed to connect to mysql" . mysqli_connect_errno();
	}


	$db_select = mysqli_select_db($connection, "script3");
	if (!$db_select) {
		die("Database selection failed: " . mysqli_connect_error());
	}

	mysqli_set_charset($connection ,'utf8');
?>
