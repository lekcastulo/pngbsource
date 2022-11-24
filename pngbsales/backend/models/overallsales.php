
	<?php

		class totalSalesInventory {		

					
		
				public function allSales($id, $dateFrom, $dateTo, $itemType){
				require '../../connection.php';
					
				$date = date('Y-m-d');

						if ($itemType == 'All'){
							$query = mysqli_query($connection, "
							SELECT DATE,id, SUM(selling_price) AS total_sales 
							FROM sales_report
							WHERE id = $id and date = '$date'
							");
						}

						else {
							$query = mysqli_query($connection, "
							SELECT official_receipt, item_type, DATE,id, SUM(selling_price) AS total_sales 
							FROM sales_report
							WHERE id = $id and date = '$date' AND item_type = '$itemType'
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