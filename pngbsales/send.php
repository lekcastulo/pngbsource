
              <?php 

               session_start();
                include("connection.php"); // connect to the database
                include("function.php");
               
      
                $member_id=$_SESSION["logged"];
                $date = $_POST['date'];
                $customerName = $_POST['customername'];
                $or = $_POST['officialreceipt'];
                $itemid = $_POST['itemid'];
                $grams = $_POST['grams'];
                $sellingprice = $_POST['sellingprice'];
                $contact = $_POST['contact'];
		$method = $_POST['method'];
                $reference = $_POST['reference'];                           
                $sf = $_POST['sf'];

                $result = mysqli_query($connection,"SELECT * FROM `items` WHERE id = '$itemid'");
                while($row = mysqli_fetch_array($result)) {
                 $itemtype  =  $row['itemtype']; 
                 $itemvalue  =  $row['value']; 
                }

                             

              	// echo $member_id. "<br>";
                // echo $date. "<br>";
                // echo $customerName. "<br>";
                // echo $itemtype. "<br>";
                // echo $or. "<br>";
                // echo $grams. "<br>";
                // echo $sellingprice. "<br>";

                if ($or == '') {
                	$or = '0';
                }


                $result = mysqli_query($connection,"INSERT INTO sales_report (id, sf, payment, ref_no, DATE, customer_name, contact, item_type,item_value,official_receipt,grams,selling_price, item_id)
													VALUES ('$member_id', '$sf', '$method', '$reference',  '$date','$customerName','$contact', '$itemtype','$itemvalue','$or','$grams','$sellingprice', $itemid )");

             //    $result = mysqli_query($connection,"INSERT INTO item_type(DATE,14k_Regular,14k_Sale,18k_Regular,18k_Sale,18k_Special,18k_Chinese,21k_Regular,21k_Sale,21k_Chinese)
													// VALUES ('2017-06-13', '1700','1500','1950','1850','2000','1850','2200','2100','2300')");

                 if ($result) {
                    $_SESSION["success_message"] = "Record has been saved successfully!" ;
                }
                


                  header("location:home.php");
 				  die;

              ?>
