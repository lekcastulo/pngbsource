<?php

		class deliveriesInventory {


				public function filterDeliveries($deliveredby, $dateFrom, $dateTo){
				require '../../connection.php';


				// $from = date("F j, Y",strtotime($dateFrom));
				// $to = date("F j, Y",strotime($dateTo));
				

						$query = mysqli_query($connection, "
						SELECT *
						FROM shipping
						Where deliveredby = '$deliveredby'
						
						
						");
					
					
					$results = array();

					// echo date('Y-m', strtotime('2017-06-17'));

					while ($q = mysqli_fetch_array($query)){
						$result = new stdClass;
						$result->id = $q['id'];
						$result->ae = $q['ae'];
						$result->date = $q['date'];
						$result->deliveredstarted = $q['deliveredstarted'];
						$result->datedelivered = $q['datedelivered'];
						// $result->date = date("F j, Y",strtotime($q['date']));
						$result->deliveredby = $q['deliveredby'];
						$result->customer = $q['customer'];
						$result->carat = $q['carat'];
						$result->grams = $q['grams'];
						$result->amount = $q['amount'];
						$result->shippingfee = $q['shippingfee'];
						$result->address = $q['address'];
						$result->paymentmethod = $q['paymentmethod'];
						$result->status = $q['status'];
						$result->remarks = $q['remarks'];

						$results[] = $result;

					}
						return $results;


				}				

				public function updatedeliveries($id, $remarks, $status){
					require '../../connection.php';
	
	
					// $from = date("F j, Y",strtotime($dateFrom));
					// $to = date("F j, Y",strotime($dateTo));
					
	
							$query = mysqli_query($connection, "
								UPDATE shipping
								SET	remarks = '$remarks', status = '$status'
								WHERE id = '$id'
							
							
							");
						
					
							return $results;
	
	
					}				
	


	}




?>


