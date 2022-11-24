<?php
	require '../models/totalsales.php';

	


	if($_POST['type'] == 'totalSales'){

		$totalSalesInventory = new totalSalesInventory;

		$id = $_POST['id'];
		$dateFrom = $_POST['dateFrom'];
		$dateTo = $_POST['dateTo'];
		$itemType = $_POST['itemType'];
				

		echo json_encode($totalSalesInventory->TotalInventory($id, $dateFrom, $dateTo, $itemType));


	}




?>