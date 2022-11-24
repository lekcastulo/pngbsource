
              <?php 

               session_start();
                include("connection.php"); // connect to the database
                include("function.php");
               
      
                $member_id=$_SESSION["logged"];
                $ae = $_POST['ae'];
                $date = $_POST['date'];
                $deliveredstarted = $_POST['deliveredstarted'];
                $deliveredby = $_POST['deliveredby'];               
                $customer = $_POST['customer'];
                $itemid = $_POST['itemid'];
                $grams = $_POST['grams'];
                $amount = $_POST['amount'];
                $shippingfee = $_POST['shippingfee'];
                $address = $_POST['address'];
                $method = $_POST['method'];
                $status = $_POST['status'];
                $remarks = $_POST['remarks'];

                           

                $result = mysqli_query($connection,"SELECT * FROM `items` WHERE id = '$itemid'");
                while($row = mysqli_fetch_array($result)) {
                 $itemtype  =  $row['itemtype']; 
                 $itemvalue  =  $row['value']; 
                }

                             
                // echo $member_id. "<br>";
                // echo $ae. "<br>";
                // echo $date. "<br>";
                // echo $deliveredby. "<br>";          
                // echo  $customer. "<br>";
                // echo $itemtype. "<br>";
                // echo $grams. "<br>";
                // echo  $amount. "<br>";
                // echo  $shippingfee. "<br>";
                // echo  $address. "<br>"; 
                // echo $method. "<br>";
                // echo $status. "<br>";
                // echo $remarks. "<br>";


                          $result = mysqli_query($connection,"INSERT INTO shipping 
                          (ae, date, deliveredstarted, deliveredby, customer, carat, grams, amount, shippingfee, address,  paymentmethod, status, remarks)
													VALUES ('$ae', '$date', '$deliveredstarted','$deliveredby','$customer','$itemtype','$grams','$amount', '$shippingfee', '$address', '$method', '$status', '$remarks' )");

                // if ($or == '') {
                // 	$or = '0';
                // }


                // $result = mysqli_query($connection,"INSERT INTO sales_report (id, DATE, customer_name,item_type,item_value,official_receipt,grams,selling_price, item_id)
								// 					VALUES ('$member_id', '$date','$customerName','$itemtype','$itemvalue','$or','$grams','$sellingprice', $itemid )");

             //    $result = mysqli_query($connection,"INSERT INTO item_type(DATE,14k_Regular,14k_Sale,18k_Regular,18k_Sale,18k_Special,18k_Chinese,21k_Regular,21k_Sale,21k_Chinese)
													// VALUES ('2017-06-13', '1700','1500','1950','1850','2000','1850','2200','2100','2300')");

                 if ($result) {
                    $_SESSION["success_message"] = "Record has been saved successfully!" ;
                }
                


                  header("location:home.php");
 				  die;

              ?>