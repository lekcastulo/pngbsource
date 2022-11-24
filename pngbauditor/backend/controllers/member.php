<?php

	require '../models/member.php';


	
	if($_POST['requestType'] == 'getMembers') {
		$memberClass = new Member;
		echo json_encode($memberClass->getMembers());
	}