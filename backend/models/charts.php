
	<?php

		class charts {		

					
		
				public function dailySales(){
				require '../../connection.php';
				
							 // $query = mysqli_query($connection, "
							 // SELECT date, SUM(selling_price) AS sales FROM sales_report
							 // GROUP BY date
							 // ");
					
							$query = mysqli_query($connection, "
                                                        SELECT date, SUM( selling_price ) AS sales
                                                        FROM sales_report
                                                        GROUP BY date_format( date, '%Y-%m' )
                                                        ");


					$results = array();

					// $output .= '<td><b><font color="blue">'.number_format((float)$item->input, 2, '.', '').'</font></b></td>';

					while ($q = mysqli_fetch_array($query)){
						$result = new stdClass;
						$result->date = date("Y M d", strtotime($q['date']));
						$result->sales = number_format((float)$q['sales'], 2, '.', '');
						$results[] = $result;

					}
						return $results;


				}		
		}
	?>

