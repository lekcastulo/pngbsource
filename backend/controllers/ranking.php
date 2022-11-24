<?php
	require '../models/ranking.php';


	if($_POST['type'] == 'ranking'){
		$totalRanking = new totalRanking;

			// $id = $_POST['id'];
			$dateFrom = $_POST['dateFrom'];
			$dateTo = $_POST['dateTo'];
			// $itemType = $_POST['itemType'];
				

		echo json_encode($totalRanking->ranking($dateFrom, $dateTo));


	}	

	if($_POST['type'] == 'salesTotal'){
		$totalRanking = new totalRanking;

			// $id = $_POST['id'];
			$dateFrom = $_POST['dateFrom'];
			$dateTo = $_POST['dateTo'];
			// $itemType = $_POST['itemType'];
				

		echo json_encode($totalRanking->totalSales($dateFrom, $dateTo));


	}

	if($_POST['type'] == 'totalTransaction'){
		$totalRanking = new totalRanking;

			// $id = $_POST['id'];
			$dateFrom = $_POST['dateFrom'];
			$dateTo = $_POST['dateTo'];
			// $itemType = $_POST['itemType'];
				

		echo json_encode($totalRanking->totalTransaction($dateFrom, $dateTo));


	}	



        if($_POST['type'] == 'totalGrams'){
                $totalRanking = new totalRanking;

                        // $id = $_POST['id'];
                        $dateFrom = $_POST['dateFrom'];
                        $dateTo = $_POST['dateTo'];
                        // $itemType = $_POST['itemType'];


                echo json_encode($totalRanking->totalGrams($dateFrom, $dateTo));


        }



	if($_POST['type'] == 'soldItem'){
		$totalRanking = new totalRanking;

			// $id = $_POST['id'];
			$dateFrom = $_POST['dateFrom'];
			$dateTo = $_POST['dateTo'];
			// $itemType = $_POST['itemType'];
				

		echo json_encode($totalRanking->itemsSold($dateFrom, $dateTo));


	}




?>
