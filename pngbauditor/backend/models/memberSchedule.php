<?php

class MemberSchedule {

	
	
	
	public function getAllActiveSchedules() {
		include '../../connection.php';

		$scheduleQuery = mysqli_query($connection, "
			SELECT b.member_id, CONCAT(b.firstname, ' ', b.secondname) AS memberName, a.id, a.startTime, a.endTime, a.isActive
			FROM member_schedules AS a
			JOIN member AS b
			ON a.member_id = b.member_id
			WHERE a.isActive = 1
			ORDER BY b.firstname
		");

		$activeScheduleList = mysqli_fetch_all($scheduleQuery, MYSQLI_ASSOC);

		return $activeScheduleList;
	}





	// just update the isActive field and then add a new schedule
	public function updateMemberSchedule($newScheduleData) {
		include '../../connection.php';		
		
		$updateScheduleQuery = mysqli_query($connection, "
			UPDATE member_schedules
			SET isActive = 0
			WHERE id = $newScheduleData[id]
		");

		
		$insertNewScheduleQuery = mysqli_query($connection, "
			INSERT INTO member_schedules (id, member_id, startTime, endTime, isActive)
			VALUES(NULL, $newScheduleData[member_id], '$newScheduleData[startTime]', '$newScheduleData[endTime]', 1)		
		");
	}
	
	
	
}












