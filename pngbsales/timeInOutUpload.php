<?php

	session_start();
	include 'connection.php'; /* connect to database */
	include 'function.php'; /* im not sure what is this but i think it gets the info of the member that logged in */

	

	if (isset($_POST['base64Image']) && isset($_POST['timeType'])) {
		$memberId = $_SESSION['logged'];
		$targetDirectory = 'photos/';
		$timeType = $_POST['timeType'];
		$generatedFileName = time().'-'.rand(0,10000000).'.png';

		$extractedBase64Image = str_replace('data:image/png;base64,', '', $_POST['base64Image']);
		
		$fileData = base64_decode($extractedBase64Image);
		$dateNow = date('Y-m-d', time());

		file_put_contents($targetDirectory.$generatedFileName, $fileData);

		// rotate image, force portrait
		$imageSize = getimagesize($targetDirectory.$generatedFileName);
		$imageWidth = $imageSize[0];
		$imageHeight = $imageSize[1];
		if($imageWidth >= $imageHeight) {
			$uploadedImage = imagecreatefrompng($targetDirectory.$generatedFileName);
			// rotate and save
			imagepng(
				imagerotate($uploadedImage, -90, 0),
				$targetDirectory.$generatedFileName
			);
		}


		// get active schedule for this member
		$activeScheduleQuery = mysqli_query($connection, "
			SELECT *
			FROM member_schedules
			WHERE member_id = $memberId
			AND isActive = 1
		");

		$result = mysqli_fetch_assoc($activeScheduleQuery);
		$memberScheduleId = $result['id'];
		
		
		// check first if the member has already an attendance record for this day 
		$countQuery = mysqli_query($connection, "
			SELECT COUNT(id) AS count
			FROM member_time_records
			WHERE member_id = $memberId
			AND date = '$dateNow'
		");

		$result = mysqli_fetch_assoc($countQuery);
		$count = $result['count'];

		$query = ''; /* query that we will use for timeIn or timeOut */
		
		if($count > 0 && $timeType == 'timeIn') {
			$query = "
				UPDATE member_time_records
				SET timeIn = NOW(), photoTimeIn = '$generatedFileName'
				WHERE member_id = '$memberId'
				AND date = '$dateNow'
			";
		}

		else if($count > 0 && $timeType == 'timeOut') {
			$query = "
				UPDATE member_time_records
				SET timeOut = NOW(), photoTimeOut = '$generatedFileName'
				WHERE member_id = '$memberId'
				AND date = '$dateNow'
			";
		}

		else if($count == 0 && $timeType == 'timeIn') {
			$query = "
				INSERT INTO member_time_records
				(id, member_id, memberScheduleId, timeIn, date, photoTimeIn)
				VALUES(null, $memberId, $memberScheduleId, NOW(), '$dateNow', '$generatedFileName')
			";
		}

		else if($count == 0 && $timeType == 'timeOut') {
			$query = "
				INSERT INTO member_time_records
				(id, member_id, memberScheduleId, timeOut, date, photoTimeOut)
				VALUES(null, $memberId, $memberScheduleId, NOW(), '$dateNow', '$generatedFileName')
			";
		}

		// execute query
		mysqli_query($connection, $query) or die(mysqli_error($connection));
	}








?>