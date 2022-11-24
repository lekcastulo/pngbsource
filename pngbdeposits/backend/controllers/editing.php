<?php
	require '../models/editing.php';
	require '../../connection.php';

	
	if($_POST['type'] == 'editingCustomer'){

		$editingInventory = new editingInventory;

		echo json_encode($editingInventory->editingCustomer());


	}

	if($_POST['type'] == 'editingCustomerRequest'){

		$editingInventory = new editingInventory;

			$member = $_POST['member'];
			$or = $_POST['or'];
			$approval = $_POST['approval'];
			$customer = $_POST['customer'];
			$adminreason = $_POST['adminreason'];
			$requestno = $_POST['requestno'];

		echo json_encode($editingInventory->editingCustomerRequest ($member, $or, $approval, $customer, $adminreason, $requestno));

         // To Update sales_report

		if ($approval == 'Approved'){

			$query = mysqli_query($connection, "
			UPDATE `script2`.`sales_report` SET `customer_name`='$customer' WHERE `id`='$member' and `official_receipt` = '$or'");
	
		}


	}

	if($_POST['type'] == 'backtrackCustomers'){

		$editingInventory = new editingInventory;

		echo json_encode($editingInventory->backtrackCustomers());


	}

	if($_POST['type'] == 'editingGrams'){

		$editingInventory = new editingInventory;

		echo json_encode($editingInventory->editingGrams());


	}

	if($_POST['type'] == 'editingGramsRequest'){

		$editingInventory = new editingInventory;

			$member = $_POST['member'];
			$or = $_POST['or'];
			$approval = $_POST['approval'];
			$grams = $_POST['grams'];
			$adminreason = $_POST['adminreason'];
			$requestno = $_POST['requestno'];

		echo json_encode($editingInventory->editingGramsRequest ($member, $or, $approval, $grams, $adminreason, $requestno));

         // To Update sales_report

		if ($approval == 'Approved'){

			$query = mysqli_query($connection, "
			UPDATE `script2`.`sales_report` SET `grams`='$grams' WHERE `id`='$member' and `official_receipt` = '$or'");
	
		}


	}

	if($_POST['type'] == 'backtrackGrams'){

		$editingInventory = new editingInventory;

		echo json_encode($editingInventory->backtrackGrams());


	}

	if($_POST['type'] == 'editingSellingprice'){

		$editingInventory = new editingInventory;

		echo json_encode($editingInventory->editingSellingprice());
	}

	if($_POST['type'] == 'editingSellingpriceRequest'){

		$editingInventory = new editingInventory;

			$member = $_POST['member'];
			$or = $_POST['or'];
			$approval = $_POST['approval'];
			$sellingprice = $_POST['sellingprice'];
			$adminreason = $_POST['adminreason'];
			$requestno = $_POST['requestno'];

		echo json_encode($editingInventory->editingSellingpriceRequest ($member, $or, $approval, $sellingprice, $adminreason, $requestno));

         // To Update sales_report


		if ($approval == 'Approved'){

			$query = mysqli_query($connection, "
			UPDATE `script2`.`sales_report` SET `selling_price`='$sellingprice' WHERE `id`='$member' and `official_receipt` = '$or'");
	
		}


	}

	if($_POST['type'] == 'backtrackSellingprice'){

		$editingInventory = new editingInventory;

		echo json_encode($editingInventory->backtrackSellingprice());


	}

	if($_POST['type'] == 'editingItemType'){

		$editingInventory = new editingInventory;

		echo json_encode($editingInventory->editingItemType());
	}

	if($_POST['type'] == 'editingItemTypeRequest'){

		$editingInventory = new editingInventory;

		$member = $_POST['member'];
		$or = $_POST['or'];
		$approval = $_POST['approval'];
		$changeitem = $_POST['changeitem'];
		$itemid = $_POST['itemid'];
		$itemvalue = $_POST['itemvalue'];
		$adminreason = $_POST['adminreason'];
		$requestno = $_POST['requestno'];


		echo json_encode($editingInventory->editingItemTypeRequest($member, $or, $approval, $changeitem, $itemid, $itemvalue, $adminreason, $requestno));

		if ($approval == 'Approved'){

			$query = mysqli_query($connection, "
			UPDATE `script2`.`sales_report` SET `item_id`='$itemid',  `item_type`= '$changeitem', `item_value`= '$itemvalue' WHERE id = '$member' and official_receipt = '$or'	");
	
		}


	}

	if($_POST['type'] == 'backtrackItemType'){

		$editingInventory = new editingInventory;

		echo json_encode($editingInventory->backtrackItemType());
	}
?>