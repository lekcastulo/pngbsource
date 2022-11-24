<?php
	require '../models/getinventory.php';

	


	if($_POST['type'] == 'itemInventory'){

		$itemsInventory = new itemsInventory;

		$id = $_POST['id'];
		// $dateFrom = $_POST['dateFrom'];
		// $dateTo = $_POST['dateTo'];
		// $itemType = $_POST['itemType'];
				

		echo json_encode($itemsInventory->itemsFilterInventory($id));


	}

	if($_POST['type'] == 'itemGrams'){

		$itemsInventory = new itemsInventory;

		$id = $_POST['id'];
		// $dateFrom = $_POST['dateFrom'];
		// $dateTo = $_POST['dateTo'];
		// $itemType = $_POST['itemType'];
				

		echo json_encode($itemsInventory->totalgrams($id));


	}



?>