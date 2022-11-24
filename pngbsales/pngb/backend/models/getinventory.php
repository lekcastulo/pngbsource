<?php

		class itemsInventory {


				public function itemsFilterInventory($id){
				require '../../connection.php';

					

					$query = mysqli_query($connection, "
						SELECT  DATE, member.firstname, member.secondname,  member.member_id, id, itemtype, 
						SUM(input) AS INPUT, SUM(output) AS OUTPUT 
						FROM item_inventory INNER JOIN member
						WHERE member.member_id IN ('$id') AND id IN ('$id')
						GROUP BY itemtype
						ORDER BY itemtype

						");
					
					
					$results = array();

					// echo date('Y-m', strtotime('2017-06-17'));

					while ($q = mysqli_fetch_array($query)){
						$result = new stdClass;
						$result->date = date("F j, Y",strtotime($q['DATE']));
						$result->memberFirstname = $q['firstname'];
						$result->memberLastname = $q['secondname'];
						$result->memberId = $q['member_id'];
						$result->id = $q['id'];
						$result->itemtype = $q['itemtype'];
						$result->input = $q['INPUT'];
						$result->output = $q['OUTPUT'];
	
						$results[] = $result;

					}
						return $results;


				}	

				public function totalgrams($id){
				require '../../connection.php';

					

					$query = mysqli_query($connection, "
						SELECT  id, item_type,SUM(grams) AS totalgrams 
						FROM sales_report
						WHERE id IN ('$id')
						GROUP BY item_type
						ORDER BY item_type
						");
					
					
					$results = array();

					// echo date('Y-m', strtotime('2017-06-17'));

					while ($q = mysqli_fetch_array($query)){
						$result = new stdClass;
						$result->id = $q['id'];
						$result->item_type = $q['item_type'];
						$result->totalgrams = $q['totalgrams'];
	
						$results[] = $result;

					}
						return $results;


				}				


	}




?>

