
	<?php

		class totalSalesInventory {		

					
		
				public function allSales($id, $dateFrom, $dateTo, $itemType){
				require '../../connection.php';
				

				// $id = '13';

						if ($itemType == 'All'){
							$query = mysqli_query($connection, "
							SELECT DATE,id, SUM(selling_price) AS total_sales 
							FROM sales_report
							WHERE id = $id AND DATE BETWEEN '$dateFrom' AND '$dateTo'
							");
						}

						else {
							$query = mysqli_query($connection, "
							SELECT official_receipt, item_type, DATE,id, SUM(selling_price) AS total_sales 
							FROM sales_report
							WHERE id = $id AND DATE BETWEEN '$dateFrom' AND '$dateTo' AND item_type = '$itemType'
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