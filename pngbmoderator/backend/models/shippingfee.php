
	<?php

		class totalShippingFee {		

					
		
				public function allShipping($id, $dateFrom, $dateTo){
				require '../../connection.php';

					if ($dateFrom == '' || $dateTo == '') {

						$query = mysqli_query($connection, "


							SELECT  DATE,id, SUM(sf) AS sf_fee
							FROM sales_report
							WHERE id = $id ");
					}

					else {


						$query = mysqli_query($connection, "
							SELECT  DATE,id, SUM(sf) AS sf_fee
							FROM sales_report
							WHERE id = $id AND DATE BETWEEN '$dateFrom' AND '$dateTo'");

						}	
					
					$results = array();

					while ($q = mysqli_fetch_array($query)){
						$result = new stdClass;
						$result->sf_fee = $q['sf_fee'];
						$results[] = $result;

					}
						return $results;


				}		
		}
	?>
