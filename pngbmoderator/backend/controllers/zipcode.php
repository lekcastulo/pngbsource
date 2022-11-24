<?php
	require '../models/sales.php';

	


	if($_POST['type'] == 'sales'){

		$salesInventory = new salesInventory;

		$itemType = $_POST['itemType'];
		$id = $_POST['id'];
		$dateFrom = $_POST['dateFrom'];
		$dateTo = $_POST['dateTo'];
				

		echo json_encode($salesInventory->salesFilterInventory($itemType,$id, $dateFrom, $dateTo));


	}

	if($_POST['type'] == 'deleteProject') {

		$salesInventory = new salesInventory;
		
		$TN = $_POST['TN'];

		echo json_encode($salesInventory->deletedRows($TN));

	}	

	if($_POST['type'] == 'saveProject') {

		$salesInventory = new salesInventory;

		$TN = $_POST['TN'];
		$Date = $_POST['Date'];
		$Customer = $_POST['Customer'];
		$or = $_POST['or'];
		$itemType = $_POST['itemType'];
		$grams = $_POST['grams'];
		$sPrice = $_POST['sPrice'];

		echo json_encode($salesInventory->savedRows($TN, $Date, $Customer, $or, $itemType, $grams, $sPrice));

	}



?>