<?php

	require '../models/memberTimeRecord.php';


	
	if($_POST['requestType'] == 'getTimeRecordsByDateRange') {
		$memberTimeRecordClass = new MemberTimeRecord;

		$dateFrom = isset($_POST['dateFrom']) ? $_POST['dateFrom'] : '';
		// $dateTo = isset($_POST['dateTo']) ? $_POST['dateTo'] : '';

		echo json_encode($memberTimeRecordClass->getTimeRecordsByDateRange($dateFrom));
	}
