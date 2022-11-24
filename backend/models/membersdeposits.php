
	<?php
				
		class memberDeposits {		
		
				public function all($member_id, $dateFrom, $dateTo, $action){
					require '../../connection.php';
					
					$dontcheckdate = false;

					if ($dateFrom == '') {
						$dontcheckdate = true;
					}

					if ($dateTo == '') {
						$dontcheckdate = true;		
					}
					$add_where = '';

					if ($action == 'filterbymember') {
						$add_where = " AND member_deposits.member_id = '$member_id'";	
					}

					if ($dontcheckdate) {
					    $querys = "SELECT member_deposits.*, CONCAT(member.firstname, '',member.secondname) AS member_name
						FROM member_deposits LEFT JOIN member ON (member_deposits.member_id = member.member_id)
						WHERE member_deposits.deleted=0 $add_where 
						ORDER BY member_deposits.deposit_date DESC";
					} else {
						$querys = "SELECT member_deposits.*, CONCAT(member.firstname, ' ',member.secondname) AS member_name
						FROM member_deposits LEFT JOIN member ON (member_deposits.member_id = member.member_id)
						WHERE member_deposits.deleted=0 $add_where AND DATE(member_deposits.deposit_date) BETWEEN '$dateFrom' AND '$dateTo'
						ORDER BY member_deposits.deposit_date DESC";
					}
					

					$query = mysqli_query($connection, $querys);


					
					$results = array();
					$total = 0;
					$deposits = array();

					while ($q = mysqli_fetch_array($query, MYSQLI_ASSOC)){
						$deposits[] = $q;
						$total = $total + $q['deposit_amount']; 
					}
					$results['totaldeposits'] = $total;
					$results['deposits'] = $deposits;
					return $results;

				}		

				public function updateDeposit($args) {
					require '../../connection.php';

					if ($args['request_type'] == 'delete') {
						$id = $args['deposit_id'];
						$query = "UPDATE member_deposits set deleted = 1 WHERE id=$id";
						$query = mysqli_query($connection, $query);
					}

					if ($args['request_type'] == 'update') {
						print_r($args);
						$id = $args['deposit_id'];
						$deposit_amount = str_replace(",","",$args['deposit_amount']);
						$deposit_date = $args['deposit_date'];
						$deposit_note = $args['deposit_note'];

						echo $query = "UPDATE member_deposits set deposit_amount='$deposit_amount', deposit_date='$deposit_date',deposit_note='$deposit_note', date_modified=NOW() WHERE id=$id";
						$query = mysqli_query($connection, $query);
					}

				}
		}
	?>