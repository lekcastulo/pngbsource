<?php

	require '../models/memberTimeRecord.php';


	
	if($_POST['requestType'] == 'getTimeRecordsByDate') {
		$memberTimeRecordClass = new MemberTimeRecord;

		$date = isset($_POST['date']) ? $_POST['date'] : '';
		echo json_encode($memberTimeRecordClass->getTimeRecordsByDate($date));
	}




	if($_POST['requestType'] == 'getTimeRecordsWithComputationByDateRange') {
		$memberTimeRecordClass = new MemberTimeRecord;

		$dateFrom = isset($_POST['dateFrom']) ? $_POST['dateFrom'] : '';
		$dateTo = isset($_POST['dateTo']) ? $_POST['dateTo'] : '';
		echo json_encode($memberTimeRecordClass->getTimeRecordsWithComputationByDateRange($dateFrom, $dateTo));
	}