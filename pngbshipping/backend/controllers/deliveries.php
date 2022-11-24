<?php
	require '../models/deliveries.php';

	


	if($_POST['type'] == 'deliveries'){

		$deliveriesInventory = new deliveriesInventory;

		$deliveredby = $_POST['deliveredby'];
		$dateFrom = $_POST['dateFrom'];
		$dateTo = $_POST['dateTo'];
		
				

		echo json_encode($deliveriesInventory->filterDeliveries($deliveredby, $dateFrom, $dateTo));


	}

	if($_POST['type'] == 'updatedeliver'){

		$deliveriesInventory = new deliveriesInventory;

		$remarks = $_POST['remarks'];
		$changestatus = $_POST['changestatus'];
		$id = $_POST['id'];

		date_default_timezone_set('Asia/Manila');
		$datedelivered = date('h:i:s a', time());
		
				

		echo json_encode($deliveriesInventory->updatedeliveries($remarks, $changestatus, $id));


		require '../../connection.php';
	
	
		// $from = date("F j, Y",strtotime($dateFrom));
		// $to = date("F j, Y",strotime($dateTo));
		

				$query = mysqli_query($connection, "
					UPDATE shipping
					SET	remarks = '$remarks', status = '$changestatus' , datedelivered = '$datedelivered'
					WHERE id = '$id'
				
				
				");

		
	}


?>