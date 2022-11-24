
              <?php 

session_start();
 include("connection.php"); // connect to the database
 include("function.php");


 $member_id=$_SESSION["logged"];
 $date = $_POST['date'];
 $itemid = $_POST['itemid'];
 $orNumber = $_POST['orNumber'];
 $reason = $_POST['reason'];
 $status = 'Pending Request';
            


 $result = mysqli_query($connection,"SELECT * FROM `items` WHERE id = '$itemid'");
 while($row = mysqli_fetch_array($result)) {
  $itemtype  =  $row['itemtype']; 
  $itemvalue  =  $row['value']; 
 }
              

 $result = mysqli_query($connection,"SELECT * from `script3`.`sales_report` where id = '$member_id' and official_receipt = '$orNumber'");
 while($row = mysqli_fetch_array($result)) {
  $ordate  =  $row['date']; 
  $existingitemtype = $row['item_type'];
 }


//  test
//  echo $member_id. "<br>";
//  echo $date. "<br>";
//  echo $itemid. "<br>";
//  echo $itemtype. "<br>";
//  echo $itemvalue. "<br>";
//  echo $orNumber. "<br>";
//  echo $reason. "<br>";


$result = mysqli_query($connection, "INSERT INTO `script3`.`edit_changeitemtype` (`member_id`, `or_number`, `date`, `or_date` ,`changeitem`,`reason` ,`itemid`,`itemvalue` , `existing_itemtype` , `status`, `request_status`) VALUES ('$member_id', '$orNumber', '$date', '$ordate' , '$itemtype', '$reason' ,'$itemid','$itemvalue', '$existingitemtype', 'For Edit', 'Not Seen Yet')");





//  if ($or == '') {
//      $or = '0';
//  }


//  $result = mysqli_query($connection,"INSERT INTO sales_report (id, DATE, customer_name,item_type,item_value,official_receipt,grams,selling_price, item_id)
                                    //  VALUES ('$member_id', '$date','$customerName','$itemtype','$itemvalue','$or','$grams','$sellingprice', $itemid )");

//    $result = mysqli_query($connection,"INSERT INTO item_type(DATE,14k_Regular,14k_Sale,18k_Regular,18k_Sale,18k_Special,18k_Chinese,21k_Regular,21k_Sale,21k_Chinese)
                                     // VALUES ('2017-06-13', '1700','1500','1950','1850','2000','1850','2200','2100','2300')");

    if ($result) {
    $_SESSION["success_message"] = "Record has been saved successfully!" ;
}



    header("location:editing.php");
    die;

?>
