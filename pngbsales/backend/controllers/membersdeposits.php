<?php
	require '../models/membersdeposits.php';
	require '../models/member.php';

			if (isset($_GET['requestType'])) {
				if ($_GET['requestType'] == 'getMembers') {
					$memberClass = new Member;
					echo json_encode($memberClass->getMembers());
				} else if ($_GET['requestType'] == 'deleteDeposit') {
					$memberDeposits = new memberDeposits;
					$args = array('request_type' => 'delete', 'deposit_id' => $_POST['deposit_id']);
					$memberDeposits->updateDeposit($args);
				} else if ($_GET['requestType'] == 'updateDeposit') {
					$memberDeposits = new memberDeposits;
					$args = $_POST;
					$args['request_type'] = 'update';
					$memberDeposits->updateDeposit($args);
				}
			} else {
				$memberDeposits = new memberDeposits;
				//default value
				$login_type = 'sales';
				$action = 'filterbymember';
				$member_id = $_POST['member_id'];
				$dateFrom = $_POST['dateFrom'];
				$dateTo = $_POST['dateTo'];
				if (isset($_POST['login_type'])) {
				$login_type = $_POST['login_type'];
				}

				/* AUDITOR */
				if ($login_type == 'auditor') {
					if ( $member_id == 29 || $member_id == 108 || $member_id == 0) {
						$action = 'all';
					}
				}

				/* MODERATOR */
				if ($login_type == 'moderator') {
					if ( $member_id == 29 || $member_id == 76 || $member_id == 0) {
						$action = 'all';
					}
				}

				/* MODERATOR */
				if ($login_type == 'admin') {
					if ( $member_id == 28 || $member_id == 0) {
						$action = 'all';
					}
				}
		
				echo json_encode($memberDeposits->all($member_id, $dateFrom, $dateTo, $action));
			
			}

?>