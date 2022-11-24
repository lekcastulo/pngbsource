
              <?php 

               session_start();
                include("connection.php"); // connect to the database
                include("function.php");
               
				// $date = $_POST['date'];
				// $accountnameid = $_POST['accountnameid'];
				// $itemOption = $_POST['itemOption'];
				// $itemType = $_POST['itemType'];
				// $grams = $_POST['grams'];



				// if ($accountnameid == 'derick yuut'){
				// 	$accountnameid = '13';
				// }




				// echo $date.'<br>';
				// echo $accountnameid.'<br>';
				// echo $itemOption.'<br>';
				// echo $itemType.'<br>';
				// echo $grams.'<br>';


				// if ($itemOption == 'input') {
    //             $result = mysqli_query($connection,"INSERT INTO  item_inventory ('id', DATE, itemtype, INPUT) VALUES ('$accountnameid','$date','$itemType','$grams')");
    //         	}				

    //         	if ($itemOption == 'output') {
    //             $result = mysqli_query($connection,"INSERT INTO  item_inventory ('id', DATE, itemtype, output) VALUES ('$accountnameid','$date','$itemType','$grams')");
    //         	}
            	

            
                $result = mysqli_query($connection,"INSERT INTO  item_inventory ('id', DATE, itemtype, output) VALUES ('17','2017-06-21','Gold','6')");
            	



            	// echo $connection;
             

?>