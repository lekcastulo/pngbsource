<?php
	require '../models/overallsales.php';

	


	if($_POST['type'] == 'overallsales'){

		$totalSalesInventory = new totalSalesInventory;

			$id = $_POST['id'];
			$dateFrom = $_POST['dateFrom'];
			$dateTo = $_POST['dateTo'];
			$itemType = $_POST['itemType'];
				

		echo json_encode($totalSalesInventory->allSales($id, $dateFrom, $dateTo, $itemType));


	}
	if($_POST['type'] == 'allSalesCollection'){

		$totalSalesInventory = new totalSalesInventory;

			$id = $_POST['id'];
			$orFrom = $_POST['orFrom'];
			$orTo = $_POST['orTo'];
			$itemType = $_POST['itemType'];
				

		echo json_encode($totalSalesInventory->allSalesCollection($id, $orFrom, $orTo, $itemType));


	}




?>