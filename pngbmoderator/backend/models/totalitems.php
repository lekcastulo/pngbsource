
	<?php

		class totalItems {		

				public function totalInput(){
				require '../../connection.php';
					

						$query = mysqli_query($connection, "
						SELECT items.id, item_inventory.itemtype, SUM(item_inventory.input) AS INPUT, SUM(item_inventory.output) AS OUTPUT, SUM(item_inventory.input - item_inventory.output) AS totaloutput
						FROM item_inventory
						LEFT JOIN items ON items.itemtype = item_inventory.itemtype
						GROUP BY item_inventory.itemtype ASC");
										

				


					
					$results = array();

					while ($q = mysqli_fetch_array($query)){
						$result = new stdClass;
						$result->item_id = $q['id'];
						$result->itemtype = $q['itemtype'];
						$result->input = $q['INPUT'];
						$result->output = $q['OUTPUT'];
						$result->totaloutput = $q['totaloutput'];

						$results[] = $result;

					}
						return $results;


				}

				public function totalgrams($itemid){
				require '../../connection.php';

					

					$query = mysqli_query($connection, "
						SELECT   item_type,SUM(grams) AS totalgrams 
						FROM sales_report
						WHERE item_id = '$itemid' 
						GROUP BY item_type
						ORDER BY item_type
						");
					
					
					$results = array();

					// echo date('Y-m', strtotime('2017-06-17'));

					while ($q = mysqli_fetch_array($query)){
						$result = new stdClass;
		
						$result->item_type = $q['item_type'];
						$result->totalgrams = $q['totalgrams'];
	
						$results[] = $result;

					}
						return $results;


				}	

	}



	?>