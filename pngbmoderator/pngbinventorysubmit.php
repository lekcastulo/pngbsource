<?php

                session_start();
                include("connection.php"); // connect to the database
                include("function.php");

				$date = $_POST['date'];
				$member_id = $_POST['accountnameid'];
				$itemOption = $_POST['itemOption'];
				$itemid = $_POST['itemid'];
				$grams = $_POST['grams'];

				// echo $date.'<br>';
				// echo $accountnameid.'<br>';
				// echo $itemOption.'<br>';
				// echo $itemType.'<br>';
				// echo $grams.'<br>';
	
                
                $result = mysqli_query($connection,"SELECT * FROM `items` WHERE id = '$itemid'");
                while($row = mysqli_fetch_array($result)) {
                 $itemtype  =  $row['itemtype']; 
                 $itemvalue  =  $row['value']; 
                }

		if ($itemOption == 'Input') {
                        $result = mysqli_query($connection,"INSERT INTO  item_inventory (id, DATE, itemtype, INPUT, item_id) VALUES ('$member_id','$date','$itemtype','$grams','$itemid')");
            	}				

            	if ($itemOption == 'Output') {
                        $result = mysqli_query($connection,"INSERT INTO  item_inventory (id, DATE, itemtype, output, item_id) VALUES ('$member_id','$date','$itemtype','$grams','$itemid')");
               	}
                
                if ($result) {
                    $_SESSION["success_message"] = "Record has been saved successfully!" ;
                }
                
             
                if (isset($member_id)) {
                        header("location:iteminventory.php?member_id=".$member_id);
                } else {
                	header("location:iteminventory.php");
                }
 				die;

            	// echo $connection;
             

?>