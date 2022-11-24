<?php
	require '../models/inhousereseller.php';


 	if($_POST['type'] == 'inhousereselling'){
		$inhouseReseller = new inhouseReseller;

			// $id = $_POST['id'];
			// $dateFrom = $_POST['dateFrom'];
			// $dateTo = $_POST['dateTo'];
			// $itemType = $_POST['itemType'];
			   $limit = $_POST['limit'];

		echo json_encode($inhouseReseller->resellerTotal($limit));
	}


?>