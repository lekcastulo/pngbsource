<?php
	require '../models/priceupdate.php';

	


	if($_POST['type'] == 'prices'){

		$priceUpdateInventory = new priceUpdateInventory;

			// $id = $_POST['id'];
			// $dateFrom = $_POST['dateFrom'];
			// $dateTo = $_POST['dateTo'];
			// $itemType = $_POST['itemType'];
				

		echo json_encode($priceUpdateInventory->priceUpdate());

	}

	if($_POST['type'] == 'updateEdit'){

		$priceUpdateInventory = new priceUpdateInventory;

			$id = $_POST['id'];
			$value = $_POST['value'];
			// $dateTo = $_POST['dateTo'];
			// $itemType = $_POST['itemType'];
				

		echo json_encode($priceUpdateInventory->editPrice($id, $value));

	}

	// if($_POST['type'] == 'updateEdit'){



	// }
	





?>
