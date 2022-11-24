
	<?php

		class inhouseReseller {		

					
		
				public function resellerTotal($limit){
				require '../../connection.php';
				

						
							$query = mysqli_query($connection, "
								SELECT customer_name,  COUNT(selling_price) AS transactions, SUM(selling_price) AS total_buys 
								FROM sales_report 
								GROUP BY customer_name
								ORDER BY transactions DESC
								LIMIT $limit
							");
					
			
					$results = array();

					while ($q = mysqli_fetch_array($query)){
						$result = new stdClass;
						$result->customer_name = $q['customer_name'];
						$result->transactions = $q['transactions'];
						$result->total_buys = $q['total_buys'];

						$results[] = $result;

					}
						return $results;


				}		
		}
	?>