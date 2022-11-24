<?php
	require '../models/overallsales.php';

	




		$totalSalesInventory = new totalSalesInventory;

			$id = $_POST['id'];
			$dateFrom = $_POST['dateFrom'];
			$dateTo = $_POST['dateTo'];
			$itemType = $_POST['itemType'];
				

		echo json_encode($totalSalesInventory->allSales($id, $dateFrom, $dateTo, $itemType));


	





?>