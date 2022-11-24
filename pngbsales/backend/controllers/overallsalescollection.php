<?php
	require '../models/overallsalescollection.php';

	


	if($_POST['type'] == 'overallsalescollection'){

		$overallsalescollection = new overallsalescollection;

			$id = $_POST['id'];
			$orFrom = $_POST['orFrom'];
			$orTo = $_POST['orTo'];
			$itemType = $_POST['itemType'];

		echo json_encode($overallsalescollection->salesFilterInventoryCollection($id, $orFrom, $orTo, $itemType));


	}


	if($_POST['type'] == 'totaloverallsalescollection'){

		$overallsalescollection = new overallsalescollection;

			$id = $_POST['id'];
			$orFrom = $_POST['orFrom'];
			$orTo = $_POST['orTo'];
			$itemType = $_POST['itemType'];

		echo json_encode($overallsalescollection->totalSalesFilterInventoryCollection($id, $orFrom, $orTo, $itemType));


	}	


	if($_POST['type'] == 'allsalescollection'){

		$overallsalescollection = new overallsalescollection;

			$id = $_POST['id'];
			$orFrom = $_POST['orFrom'];
			$orTo = $_POST['orTo'];
			$itemType = $_POST['itemType'];

		echo json_encode($overallsalescollection->allsalescollection($id, $orFrom, $orTo, $itemType));


	}





?>