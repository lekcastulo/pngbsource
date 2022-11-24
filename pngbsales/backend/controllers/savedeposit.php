<?php
	require '../../connection.php';
	include '../../function.php';
	/* SAVE IMAGE */
	$remote_img_domain = 'https://uploads2020.pngbweb.com/uploads/';
	$filename_db_save = $remote_img_domain.'no_image.png';
	if (isset($_FILES['deposit_image'])) {
		if ($_FILES["deposit_image"]["error"] == UPLOAD_ERR_OK)
		{
			$filename = upload_image($_FILES);
			$filename_db_save = $remote_img_domain.$filename;
		}
	}


	/* SAVE OTHER DATA */
	$member_id = $_POST['member_id'];
 	$date_ = $_POST['deposit_date'];
	$amount = $_POST['deposit_amount'];
	$image = $filename_db_save;
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
	
	function upload_image($_files) {
	    if ( isset($_files['deposit_image']) ) {
		
			$curl = curl_init();
			$cfile = new CURLfile($_files['deposit_image']['tmp_name'], $_files['deposit_image']['type'], $_files['deposit_image']['name']);

			$data = array('deposit_image' => $cfile);

			curl_setopt($curl, CURLOPT_URL, 'https://uploads2020.pngbweb.com/upload.php');
			curl_setopt($curl, CURLOPT_TIMEOUT, 30);
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
			$response = curl_exec($curl);
			curl_close ($curl);
			return $response;
			
		   }
	}

	
