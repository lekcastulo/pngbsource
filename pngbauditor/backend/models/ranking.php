<?php

		class totalRanking {


				public function ranking($dateFrom, $dateTo){
					require '../../connection.php';

			

							$query = mysqli_query($connection, "
					SELECT member.firstname, DATE, member.member_id AS member, SUM(selling_price) AS Total_Sales
					FROM sales_report
					INNER JOIN member 
					WHERE member.member_id = sales_report.id AND DATE BETWEEN '$dateFrom' AND '$dateTo'
					GROUP BY member.member_id 
					ORDER BY  Total_sales DESC");
						


						
						$results = array();


						// echo date('Y-m-d', strtotime('2017-06-17'));
						while ($q = mysqli_fetch_array($query)){
							$result = new stdClass;
						
							$result->firstname = $q['firstname'];
						
							$result->Total_Sales = $q['Total_Sales'];


							$results[] = $result;

						}
							return $results;


				}						

				public function totalSales($dateFrom, $dateTo){
					require '../../connection.php';

			

						$query = mysqli_query($connection, "
						SELECT sum(selling_price) as total from sales_report
						WHERE DATE BETWEEN '$dateFrom' AND '$dateTo'");
						


						
						$results = array();


						// echo date('Y-m-d', strtotime('2017-06-17'));
						while ($q = mysqli_fetch_array($query)){
							$result = new stdClass;
						
							$result->total = $q['total'];

							$results[] = $result;

						}
							return $results;


				}					


				public function totalTransaction($dateFrom, $dateTo){
					require '../../connection.php';

			

						$query = mysqli_query($connection, "
							SELECT COUNT(transaction_no) AS trans FROM sales_report
							WHERE DATE BETWEEN '$dateFrom' AND '$dateTo'");
						


						
						$results = array();


						// echo date('Y-m-d', strtotime('2017-06-17'));
						while ($q = mysqli_fetch_array($query)){
							$result = new stdClass;
						
							$result->transaction = $q['trans'];

							$results[] = $result;

						}
							return $results;


				}					



				public function itemsSold($dateFrom, $dateTo){
					require '../../connection.php';

			

						$query = mysqli_query($connection, "
							SELECT item_type,  SUM(selling_price) AS total, SUM(grams) AS grams, COUNT(transaction_no) AS transaction FROM sales_report
							WHERE DATE BETWEEN '$dateFrom' AND '$dateTo'
							GROUP BY item_type");
						


						
						$results = array();


						while ($q = mysqli_fetch_array($query)){
							$result = new stdClass;
						
							$result->item_type = $q['item_type'];
							$result->transaction = $q['transaction'];
							$result->grams = $q['grams'];
							$result->total = $q['total'];

							$results[] = $result;

						}
							return $results;


				}				


	}




?>

