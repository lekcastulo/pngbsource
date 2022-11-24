
	<?php

		class overallsalescollection {		

					


				public function salesFilterInventoryCollection($id, $orFrom, $orTo, $itemType){
					require '../../connection.php';

					

					if ($itemType == 'All') {

						$query = mysqli_query($connection, "
						SELECT *
						FROM sales_report
						WHERE id IN ('$id') AND official_receipt BETWEEN '$orFrom' AND '$orTo'
						ORDER BY official_receipt ASC");
					}
				

					else {
					$query = mysqli_query($connection, "
						SELECT *
						FROM sales_report
						WHERE id IN ('$id') AND  official_receipt between '$orFrom' and '$orTo' AND item_type = '$itemType'
						ORDER BY official_receipt asc");
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

				public function totalSalesFilterInventoryCollection($id, $orFrom, $orTo, $itemType){
					require '../../connection.php';

					
					// $itemType = '18k_Reg(1950)';

					if ($itemType == 'All') {

						$query = mysqli_query($connection, "
						SELECT  DATE as DATE, item_value, id,SUM(grams) AS totalgrams, item_type, SUM(item_value) AS totalvalue, 
						SUM(selling_price) AS totalsellingprice, SUM(item_value * grams) AS expectedprice
						FROM sales_report
						WHERE id IN ('$id') AND official_receipt BETWEEN '$orFrom' AND '$orTo' 
						GROUP BY item_type
						ORDER BY official_receipt ASC");
					}
					
					else {

						$query = mysqli_query($connection, "
						SELECT  DATE, item_value, id,SUM(grams) AS totalgrams, item_type, SUM(item_value) AS totalvalue, 
						SUM(selling_price) AS totalsellingprice, SUM(item_value * grams) AS expectedprice
						FROM sales_report
						WHERE id IN ('$id') AND official_receipt BETWEEN '$orFrom' AND '$orTo' AND item_type = '$itemType'
						GROUP BY item_type
						ORDER BY official_receipt ASC

						");
					}
				


					
					$results = array();

					while ($q = mysqli_fetch_array($query)){
						$result = new stdClass;
						$result->date = date("F j, Y",strtotime($q['DATE']));
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

		
				public function allSalesCollection($id, $orFrom, $orTo, $itemType){
					require '../../connection.php';

					
					
					// $itemType = 'All';

						if ($itemType == 'All'){
							$query = mysqli_query($connection, "
							SELECT DATE,id, SUM(selling_price) AS total_sales 
							FROM sales_report
							WHERE id = $id AND official_receipt BETWEEN '$orFrom' AND '$orTo'
							");
						}

						else {
							$query = mysqli_query($connection, "
							SELECT official_receipt, item_type, DATE,id, SUM(selling_price) AS total_sales 
							FROM sales_report
							WHERE id = $id AND official_receipt BETWEEN '$orFrom' AND '$orTo' AND item_type = '$itemType'
							");
						}

						
				
						
					
					
					$results = array();

					while ($q = mysqli_fetch_array($query)){
						$result = new stdClass;
						$result->total_sales = $q['total_sales'];
						$results[] = $result;

					}
						return $results;

				}		
		}
	?>