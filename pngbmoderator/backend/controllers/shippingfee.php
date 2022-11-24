<?php
	require '../models/shippingfee.php';

	


	if($_POST['type'] == 'shippingfee'){

		$totalShippingFee = new totalShippingFee;

			$id = $_POST['id'];
			$dateFrom = $_POST['dateFrom'];
			$dateTo = $_POST['dateTo'];
				

		echo json_encode($totalShippingFee->allShipping($id, $dateFrom, $dateTo));


	}


?>
