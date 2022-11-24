
              <?php 

session_start();
 include("connection.php"); // connect to the database
 include("function.php");


 $member_id=$_SESSION["logged"];
 $date = $_POST['date'];
 $sellingprice = $_POST['sellingprice'];
 $orNumber = $_POST['orNumber'];
 $reason = $_POST['reason'];
 $status = 'Pending Request';
            
 $result = mysqli_query($connection,"SELECT * from `script3`.`sales_report` where id = '$member_id' and official_receipt = '$orNumber'");
 while($row = mysqli_fetch_array($result)) {
  $ordate  =  $row['date']; 
  $existingsellingprice = $row['selling_price'];
 }

              

//  echo $member_id. "<br>";
//  echo $date. "<br>";
//  echo $sellingprice. "<br>";
//  echo $orNumber. "<br>";
//  echo $reason. "<br>";


$result = mysqli_query($connection, "INSERT INTO `script3`.`edit_sellingprice` (`member_id`, `or_number`, `date`, `or_date` , `sellingprice`, `existing_sellingprice` ,`reason` , `status`, `request_status`) VALUES ('$member_id', '$orNumber', '$date', '$ordate','$sellingprice', '$existingsellingprice' ,'$reason' ,'For Edit', 'Not Seen Yet')");





    if ($result) {
    $_SESSION["success_message"] = "Record has been saved successfully!" ;
}



    header("location:editing.php");
    die;

?>
