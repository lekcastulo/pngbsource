<?php

		class salesInventory {


				public function salesFilterInventory($itemType, $id, $dateFrom, $dateTo){
				require '../../connection.php';

					if ($itemType == 'All') {

						$query = mysqli_query($connection, "
						SELECT *
						FROM sales_report
						WHERE id IN ('$id') and Date between '$dateFrom' and '$dateTo'
						ORDER BY DATE DESC");
					}

					else {
					$query = mysqli_query($connection, "
						SELECT *
						FROM sales_report
						WHERE id IN ('$id') AND item_type IN ('$itemType') and Date between '$dateFrom' and '$dateTo'
						ORDER BY DATE DESC");
					}
					
					$results = array();

					// echo date('Y-m', strtotime('2017-06-17'));

					while ($q = mysqli_fetch_array($query)){
						$result = new stdClass;
						$result->date = date("F j, Y",strtotime($q['date']));
						$result->transaction_no = $q['transaction_no'];
						$result->customer_name = $q['customer_name'];
						$result->item_type = $q['item_type'];
						$result->item_value = $q['item_value'];
						$result->official_receipt = $q['official_receipt'];
						$result->grams = $q['grams'];
						$result->selling_price = $q['selling_price'];

						$results[] = $result;

					}
						return $results;


				}				


	}




?>

