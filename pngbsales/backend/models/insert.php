<?php
	
		require_once '../../connection.php';

			$region = $_POST['region'];
			$location = $_POST['location'];
			$place = $_POST['place'];
			$zipcode = $_POST['zipcode'];


			

			$query = mysqli_query($conn, "INSERT INTO zipcode (id,region,place,location,zipcode)
				VALUES (NULL,'$region','$place','$location','$zipcode')");
			 
			  echo '<script language="javascript">';
			  echo 'alery(successfully Inserted)';  //not showing an alert box.
			  echo '</script>';

		
			


				// sleep(5);
				echo 'Succestfully Inserted';
				header("Location: ../../insert.php");
				die();

?>