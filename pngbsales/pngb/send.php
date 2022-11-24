
              <?php 

               session_start();
                include("connection.php"); // connect to the database
                include("function.php");
               
      
                $member_id=$_SESSION["logged"];
                $date = $_POST['date'];
                $customerName = $_POST['customername'];
                $or = $_POST['officialreceipt'];
                $itemtype = $_POST['itemtype'];
                $grams = $_POST['grams'];
                $sellingprice = $_POST['sellingprice'];
               
                if ($itemtype == '10kDia(1400)') {
                    $itemvalue = '1400';
                } 
                if ($itemtype == '14k_Reg(1700)') {
                	$itemvalue = '1700';
                }                
                if ($itemtype == '14k_Sale(1550)') {
                    $itemvalue = '1500';
                }                
                if ($itemtype == '14k_Dia(2000)') {
                	$itemvalue = '2000';
                }                
                if ($itemtype == '18k_Reg(1950)') {
                	$itemvalue = '1950';
                }                
                if ($itemtype == '18k_Sp(2000)') {
                	$itemvalue = '2000';
                } 
                if ($itemtype == '18k_Dia(2150)') {
                    $itemvalue = '2150';
                }                 
                if ($itemtype == '18k_Sale(1850)') {
                	$itemvalue = '1850';
                }                
                if ($itemtype == '21k_Reg(2200)') {
                	$itemvalue = '2200';
                }                
                if ($itemtype == '21k_Sale(2100)') {
                	$itemvalue = '2100';
                }
                if ($itemtype == '21k_Chi(2300)') {
                	$itemvalue = '2300';
                }
                if ($itemtype == '24k_Chi(2350)') {
                    $itemvalue = '2350';
                }
                if ($itemtype == 'Spdia(5000)') {
                    $itemvalue = '5000';
                }
                if ($itemtype == 'Custom(2500)') {
                    $itemvalue = '2500';
                }
              	echo $member_id. "<br>";
                echo $date. "<br>";
                echo $customerName. "<br>";
                echo $itemtype. "<br>";
                echo $or. "<br>";
                echo $grams. "<br>";
                echo $sellingprice. "<br>";

                if ($or == '') {
                	$or = '0';
                }


                $result = mysqli_query($connection,"INSERT INTO sales_report (id, DATE, customer_name,item_type,item_value,official_receipt,grams,selling_price)
													VALUES ('$member_id', '$date','$customerName','$itemtype','$itemvalue','$or','$grams','$sellingprice' )");

             //    $result = mysqli_query($connection,"INSERT INTO item_type(DATE,14k_Regular,14k_Sale,18k_Regular,18k_Sale,18k_Special,18k_Chinese,21k_Regular,21k_Sale,21k_Chinese)
													// VALUES ('2017-06-13', '1700','1500','1950','1850','2000','1850','2200','2100','2300')");




                  header("location:home.php");
 				  die;

              ?>