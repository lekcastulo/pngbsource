<?php

class MemberTimeRecord {

	
	
	
	public function getTimeRecordsByDate($date) {
		session_start();
		include '../../connection.php';
		include '../../function.php';

		$attendanceQuery = mysqli_query($connection, "
			SELECT a.id as id, a.memberScheduleId, b.member_id, a.timeIn, a.timeOut, a.date, a.photoTimeIn, a.photoTimeOut, CONCAT(b.firstname, ' ', b.secondname) AS memberName
			FROM member_time_records AS a
			JOIN member AS b ON b.member_id = a.member_id
			WHERE date = '$date'
			ORDER BY a.timeIn ASC, b.firstname
		");

		// $attendanceList = mysqli_fetch_all($attendanceQuery, MYSQLI_ASSOC);
		$attendanceList = [];
		while($q = mysqli_fetch_array($attendanceQuery)) {
			$attendance = [];
			$attendance['id'] = utf8_encode($q['id']);
			$attendance['memberScheduleId'] = utf8_encode($q['memberScheduleId']);
			$attendance['member_id'] = utf8_encode($q['member_id']);
			$attendance['timeIn'] = utf8_encode($q['timeIn']);
			$attendance['timeOut'] = utf8_encode($q['timeOut']);
			$attendance['date'] = utf8_encode($q['date']);
			$attendance['photoTimeIn'] = utf8_encode($q['photoTimeIn']);
			$attendance['photoTimeOut'] = utf8_encode($q['photoTimeOut']);
			$attendance['memberName'] = utf8_encode($q['memberName']);
			$attendanceList[] = $attendance;
		}

		return $attendanceList;
	}





	public function getTimeRecordsWithComputationByDateRange($dateFrom, $dateTo) {
		session_start();
		include '../../connection.php';
		include '../../function.php';
		
		$attendanceQuery = mysqli_query($connection, "
			SELECT a.id AS memberTimeRecordId, a.member_id AS memberId,
			CONCAT(c.firstname, ' ', c.secondname) AS memberName,
			
			SUM(
				TIME_TO_SEC(
					IF(TIMEDIFF(TIME(a.timeIn), '10:00:00') < 0, 0, TIMEDIFF(TIME(a.timeIn), '10:00:00'))
				) / 60
			) AS totalMinutesLate,
			
			SUM(
				TIME_TO_SEC(
					IF(TIMEDIFF('19:00:00', TIME(a.timeOut)) < 0, 0, TIMEDIFF('19:00:00', TIME(a.timeOut)))
				) / 60
			) AS totalMinutesUnderTime
			
			FROM member_time_records AS a
			JOIN member_schedules AS b ON a.member_id = b.member_id
			JOIN member AS c ON a.member_id = c.member_id AND a.member_id = b.member_id
			WHERE DATE BETWEEN '$dateFrom' AND '$dateTo'
			AND b.isActive = 1
			GROUP BY a.member_id
			ORDER BY memberName ASC
		");

		// $attendanceList = mysqli_fetch_all($attendanceQuery, MYSQLI_ASSOC);
		$attendanceList = [];
		while($q = mysqli_fetch_array($attendanceQuery)) {
			$attendance = [];
			$attendance['memberTimeRecordId'] = utf8_encode($q['memberTimeRecordId']);
			$attendance['memberId'] = utf8_encode($q['memberId']);
			$attendance['memberName'] = utf8_encode($q['memberName']);
			$attendance['totalMinutesLate'] = utf8_encode($q['totalMinutesLate']);
			$attendance['totalMinutesUnderTime'] = utf8_encode($q['totalMinutesUnderTime']);
			$attendanceList[] = $attendance;
		}

		return $attendanceList;
	}
	
	
	
}












