<?php

                session_start();
                include("connection.php"); // connect to the database
                include("function.php");

				$trans = $_POST['trans'];
				

				// echo $date.'<br>';
				// echo $accountnameid.'<br>';
				// echo $itemOption.'<br>';
				// echo $itemType.'<br>';
				// echo $grams.'<br>';
	
                
            

                $result = mysqli_query($connection,"DELETE FROM `item_inventory` WHERE transaction_number = $trans");
  
                if ($result) {
                    $_SESSION["success_message"] = "Record has been saved successfully!" ;
                }
                
             
             
                header("location:iteminventory.php");
                

 				die;

            	// echo $connection;
             

?>
