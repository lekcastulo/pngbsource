<?php

		class salesInventory {


				public function salesFilterInventory($itemType, $id, $dateFrom, $dateTo){
				require '../../connection.php';

					if ($itemType == 'All') {

						$query = mysqli_query($connection, "
						SELECT *
						FROM sales_report
						WHERE id IN ('$id') and Date between '$dateFrom' and '$dateTo'
						ORDER BY official_receipt DESC");
					}

					else {
					$query = mysqli_query($connection, "
						SELECT *
						FROM sales_report
						WHERE id IN ('$id') AND item_id IN ('$itemType') and Date between '$dateFrom' and '$dateTo'
						ORDER BY official_receipt DESC");
					}
					
					$results = array();

					// echo date('Y-m', strtotime('2017-06-17'));

					while ($q = mysqli_fetch_array($query)){
						$result = new stdClass;
						$result->date = date("F j, Y",strtotime($q['date']));
						$result->transaction_no = $q['transaction_no'];
						$result->customer_name = $q['customer_name'];
						$result->contact = $q['contact'];
						$result->payment = $q['payment'];
						$result->ref_no = $q['ref_no'];
						$result->item_type = $q['item_type'];
						$result->item_value = $q['item_value'];
						$result->official_receipt = $q['official_receipt'];
						$result->grams = $q['grams'];
						$result->selling_price = $q['selling_price'];
						$result->sf = $q['sf'];

						$results[] = $result;

					}
						return $results;


				}				


				public function deletedRows($TN){
				require '../../connection.php';

					

						$query = mysqli_query($connection, "
						DELETE FROM `sales_report` WHERE transaction_no = $TN");

				}					


				public function savedRows($TN, $Date, $Customer, $or, $itemType, $grams, $sPrice){
				require '../../connection.php';

					
					$Date = date("Y-m-d",strtotime($Date));

						$query = mysqli_query($connection, "
						UPDATE `sales_report` SET  date = '$Date', customer_name = '$Customer',
						item_type = '$itemType', grams = '$grams', selling_price = '$sPrice', official_receipt = '$or' WHERE transaction_no = '$TN'");

				}				


				// return echo $Date;
	}




?>


