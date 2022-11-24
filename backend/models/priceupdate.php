<?php

		class priceUpdateInventory {


            public function priceUpdate(){
                require '../../connection.php';

				
					$query = mysqli_query($connection, "
					select * from items group by itemtype asc");
	
					
					$results = array();

					// echo date('Y-m', strtotime('2017-06-17'));

					while ($q = mysqli_fetch_array($query)){
						$result = new stdClass;
						$result->id = $q['id'];
						$result->itemtype = $q['itemtype'];
						$result->value= $q['value'];


						$results[] = $result;

					}
						return $results;


								
		

            }


            
            public function editPrice($id, $value){
                require '../../connection.php';

				
					$query = mysqli_query($connection, "
					update items set value = $value where id = '$id'");
	
					
					// $results = array();

					// // echo date('Y-m', strtotime('2017-06-17'));

					// while ($q = mysqli_fetch_array($query)){
					// 	$result = new stdClass;
					// 	$result->id = $q['id'];
					// 	$result->itemtype = $q['itemtype'];
					// 	$result->value= $q['value'];


					// 	$results[] = $result;

					// }
					// 	return $results;


								
		

            }
				// return echo $Date;
	    }




?>



