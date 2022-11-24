<?php
	require '../models/editing.php';
	require '../../connection.php';


	if($_POST['type'] == 'backtrackCustomers'){

		$editingInventory = new editingInventory;

		echo json_encode($editingInventory->backtrackCustomers());


	}


	if($_POST['type'] == 'backtrackGrams'){

		$editingInventory = new editingInventory;

		echo json_encode($editingInventory->backtrackGrams());


	}


	if($_POST['type'] == 'backtrackSellingprice'){

		$editingInventory = new editingInventory;

		echo json_encode($editingInventory->backtrackSellingprice());


	}


	if($_POST['type'] == 'backtrackItemType'){

		$editingInventory = new editingInventory;

		echo json_encode($editingInventory->backtrackItemType());
	}
?>