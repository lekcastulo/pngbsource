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



?>