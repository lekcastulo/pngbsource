<?php

class MemberTimeRecord {

	
	
	
	public function getTimeRecordsByDateRange($dateFrom) {
		session_start();
		include '../../connection.php';
		include '../../function.php';

		$attendanceQuery = mysqli_query($connection, "
			SELECT *
			FROM member_time_records AS a
			JOIN member AS b ON b.member_id = a.member_id
			WHERE date = '$dateFrom'
			ORDER BY a.timeIn ASC, b.secondname
		");

		$attendanceList = mysqli_fetch_all($attendanceQuery, MYSQLI_ASSOC);

		return $attendanceList;
	}
	
	
	
}













