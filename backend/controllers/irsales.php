<?php

	require '../models/irsales.php';


	
	if($_POST['type'] == 'getirsales') {
        $irSold = new irsalesinventory;
        
        $dateFrom = $_POST['dateFrom'];
        $dateTo = $_POST['dateTo'];
        $accountname = $_POST['accountname'];
		echo json_encode($irSold->irsales($dateFrom, $dateTo, $accountname));
	}