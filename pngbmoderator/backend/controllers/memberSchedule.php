<?php

	require '../models/memberSchedule.php';


	
	if($_POST['requestType'] == 'getAllActiveSchedules') {
		$memberScheduleClass = new MemberSchedule;
		echo json_encode($memberScheduleClass->getAllActiveSchedules());
	}




	if($_POST['requestType'] == 'updateMemberSchedule') {
		$memberScheduleClass = new MemberSchedule;
		$newScheduleData = $_POST['newScheduleData'];
		echo json_encode($memberScheduleClass->updateMemberSchedule($newScheduleData));
	}