<?php

class Member {

	
	
	
	public function getMembers() {
		session_start();
		include '../../connection.php';
		include '../../function.php';

		$memberListQuery = mysqli_query($connection, "
			SELECT member_id, firstname, secondname, email, sex
			FROM member
			ORDER BY firstname ASC
		");

		$memberList = mysqli_fetch_all($memberListQuery, MYSQLI_ASSOC);

		$members = [];
		
		foreach($memberList as $member) {
			$members[] = [
				'member_id' => $member['member_id'],
				'firstname' => utf8_encode($member['firstname']),
				'secondname' => utf8_encode($member['secondname']),
				'email' => utf8_encode($member['email']),
				'sex' => $member['sex'],
			];
		}

		return $members;
	}
	
	
	
}
