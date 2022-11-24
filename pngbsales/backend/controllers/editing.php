<?php
	require '../models/editing.php';
	require '../../connection.php';

	
	if($_POST['type'] == 'editingCustomer'){

		$editingInventory = new editingInventory;

		echo json_encode($editingInventory->editingCustomer());


	}

	// if($_POST['type'] == 'editingCustomerRequest'){

	// 	$editingInventory = new editingInventory;

	// 		$member = $_POST['member'];
	// 		$or = $_POST['or'];
	// 		$approval = $_POST['approval'];
	// 		$customer = $_POST['customer'];
	// 		$adminreason = $_POST['adminreason'];
	// 		$requestno = $_POST['requestno'];

	// 	echo json_encode($editingInventory->editingCustomerRequest ($member, $or, $approval, $customer, $adminreason, $requestno));

    //       // To Update sales_report

	// 	if ($approval == 'Approved'){

	// 		$query = mysqli_query($connection, "
	// 		UPDATE `script2`.`sales_report` SET `customer_name`='$customer' WHERE `id`='$member' and `official_receipt` = '$or'");
	
	// 	}


	// }

	if($_POST['type'] == 'editingGrams'){

		$editingInventory = new editingInventory;

		echo json_encode($editingInventory->editingGrams());


	}
	
	
	if($_POST['type'] == 'editingsellingprice'){

		$editingInventory = new editingInventory;

		echo json_encode($editingInventory->editingsellingprice());


	}

	if($_POST['type'] == 'editingitemtype'){

		$editingInventory = new editingInventory;

		echo json_encode($editingInventory->editingitemtype());


	}


	if($_POST['type'] == 'editingshippingfee'){

		$editingInventory = new editingInventory;

		echo json_encode($editingInventory->editingshippingfee());


	}


?>
