<?php

		class itemsInventory {


				public function itemsFilterInventory($id){
				require '../../connection.php';

					

					// $query = mysqli_query($connection, "
					// 	SELECT  DATE, member.firstname, member.secondname,  member.member_id, id, itemtype, 
					// 	SUM(input) AS INPUT, SUM(output) AS OUTPUT 
					// 	FROM item_inventory INNER JOIN member
					// 	WHERE member.member_id IN ('$id') AND id IN ('$id')
					// 	GROUP BY itemtype
					// 	ORDER BY itemtype

					// 	");					

					$query = mysqli_query($connection, "
						SELECT  DATE, member.firstname, member.secondname,  member.member_id, item_inventory.id, 
						items.itemtype, items.id as itemid,
						SUM(input) AS INPUT, SUM(output) AS OUTPUT, SUM(input - output) AS totalInput 
						FROM item_inventory 
						INNER JOIN member
						INNER JOIN items ON (items.id) = item_inventory.item_id 
						WHERE member.member_id ='$id' AND item_inventory.id = '$id'
						GROUP BY itemtype
						ORDER BY itemtype;

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
						$result->totalinput = $q['totalInput'];
						$result->itemid = $q['itemid'];
	
						$results[] = $result;

					}
						return $results;


				}	

				public function totalgrams($id, $itemid){
				require '../../connection.php';

					

					$query = mysqli_query($connection, "
						SELECT  id, item_type,SUM(grams) AS totalgrams 
						FROM sales_report
						WHERE item_id = '$itemid' AND id = '$id'
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


				public function itemInventorySummary($id, $dateFrom, $dateTo){
				require '../../connection.php';

					

					$query = mysqli_query($connection, "
						SELECT * FROM item_inventory
						WHERE id IN ('$id') AND DATE BETWEEN '$dateFrom' AND '$dateTo'
						ORDER BY DATE DESC
						");
					
					
					$results = array();

					// echo date('Y-m', strtotime('2017-06-17'));

					while ($q = mysqli_fetch_array($query)){
						$result = new stdClass;
						$result->transactionNumber = $q['transaction_number'];
						$result->date = date("F j, Y",strtotime($q['date']));
						$result->itemtype = $q['itemtype'];
						$result->input = $q['input'];
						$result->output = $q['output'];
	
						$results[] = $result;

					}
						return $results;


				}				


	}




?>

