
	<?php

		class totalSalesInventory {		

				public function TotalInventory($id, $dateFrom, $dateTo, $itemType){
				require '../../connection.php';
					
				$date = date('Y-m-d');

					if ($itemType == 'All') {

						$query = mysqli_query($connection, "
						SELECT  date, item_value, id,SUM(grams) AS totalgrams, item_type, SUM(item_value) AS totalvalue, 
						SUM(selling_price) AS totalsellingprice, SUM(item_value * grams) AS expectedprice
						FROM sales_report
						WHERE id IN ('$id') and date = '$date'
						GROUP BY item_type
						ORDER BY DATE DESC");
					}
					
					else {

						$query = mysqli_query($connection, "
						SELECT  date, item_value, id,SUM(grams) AS totalgrams, item_type, SUM(item_value) AS totalvalue, 
						SUM(selling_price) AS totalsellingprice, SUM(item_value * grams) AS expectedprice
						FROM sales_report
						WHERE id IN ('$id') AND item_id IN ('$itemType') and date = '$date'
						GROUP BY item_type
						ORDER BY DATE DESC

						");
					}
				


					
					$results = array();

					while ($q = mysqli_fetch_array($query)){
						$result = new stdClass;
						$result->date = date("F j, Y",strtotime($q['date']));
						$result->totalgrams = $q['totalgrams'];
						$result->item_type = $q['item_type'];
						$result->item_value = $q['item_value'];
						$result->totalvalue = $q['totalvalue'];
						$result->totalsellingprice = $q['totalsellingprice'];
						$result->expectedprice = $q['expectedprice'];

						$results[] = $result;

					}
						return $results;


				}


	}

	?>