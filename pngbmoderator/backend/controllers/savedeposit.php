<?php
	require '../../connection.php';
	include '../../function.php';
	/* SAVE IMAGE */
	$new_name_file = 'no_image.png';
	if (isset($_FILES['deposit_image'])) {
		if ($_FILES["deposit_image"]["error"] == UPLOAD_ERR_OK)
		{
			$file = $_FILES["deposit_image"]["tmp_name"];
			$new_name_file = bin2hex(strtotime("now")).'.'.pathinfo($_FILES["deposit_image"]['name'], PATHINFO_EXTENSION);
			move_uploaded_file( $file, $_SERVER['DOCUMENT_ROOT']. "uploads/" . $new_name_file);
		}
	}


	/* SAVE OTHER DATA */
	$member_id = $_POST['member_id'];
 	$date_ = $_POST['deposit_date'];
	$amount = $_POST['deposit_amount'];
	$image = $new_name_file;
	$note = $_POST['deposit_note'];


	$query = mysqli_query($connection, "INSERT INTO member_deposits (id,member_id,deposit_image,deposit_amount,deposit_date,deposit_note)
				VALUES (NULL,$member_id,'$image',$amount,'$date_','$note')");
	
	$message = array();

	if ($query) {
		$message = array('type' => 'success', 'message' => 'Deposit entry created!');	
	} else {
		$message = array('type' => 'error', 'message' => 'Error saving!');	
	}
	
	echo json_encode($message);