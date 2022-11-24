
	<?php

		class totals {		

				public function TotalItemInventory($dateFrom, $dateTo){
				require '../../connection.php';
					

			

						$query = mysqli_query($connection, "
						SELECT SUM(input) AS totalinput, SUM(output) AS totaloutput, SUM(input) - SUM(output) AS totals
						FROM item_inventory
						where date between '$dateFrom' and '$dateTo'
						");
				
		
					
					$results = array();

					while ($q = mysqli_fetch_array($query)){
						$result = new stdClass;
						$result->totalinput = $q['totalinput'];
						$result->totaloutput = $q['totaloutput'];
						$result->totals = $q['totals'];

						$results[] = $result;

					}
						return $results;


				}				

				public function totalGrams($dateFrom, $dateTo){
				require '../../connection.php';
					
						$query = mysqli_query($connection, "
						SELECT SUM(grams) AS totalgrams
						FROM sales_report
						where date between '$dateFrom' and '$dateTo'
						");
				        
		
					
					$results = array();

					while ($q = mysqli_fetch_array($query)){
						$result = new stdClass;
						$result->totalgrams = $q['totalgrams'];

						$results[] = $result;

					}
						return $results;


				}


	}



	?>
