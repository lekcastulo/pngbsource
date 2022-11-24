<?php
	require '../models/charts.php';


 	if($_POST['type'] == 'sales'){
		$charts = new charts;

			// $id = $_POST['id'];
			// $dateFrom = $_POST['dateFrom'];
			// $dateTo = $_POST['dateTo'];
			// $itemType = $_POST['itemType'];
			   // $limit = $_POST['limit'];

		echo json_encode($charts->dailySales());
	}


?>