
              <?php 

session_start();
 include("connection.php"); // connect to the database
 include("function.php");


 $member_id=$_SESSION["logged"];
 $date = $_POST['date'];
 $orNumber = $_POST['orNumber'];
 $sfoption = $_POST['sfoption'];
 $sfamount = $_POST['sfamount'];
 $reference = $_POST['reference'];
 $reason = $_POST['reason'];
 $status = 'Pending Request';
            


 $result = mysqli_query($connection,"SELECT * from `script3`.`sales_report` where id = '$member_id' and official_receipt = '$orNumber'");
 while($row = mysqli_fetch_array($result)) {
  $ordate  =  $row['date']; 
  $existing_sf = $row['payment'];
 }


//  test
 // echo $member_id. "<br>";
 // echo $orNumber. "<br>";
 // echo $date. "<br>";
 // echo $sfoption. "<br>";
 // echo $ordate. "<br>";
 // echo $reason. "<br>";
 // echo $existing_sf. "<br>";
 // echo $sfamount. "<br>";
 // echo $reference. "<br>";


$result = mysqli_query($connection, "INSERT INTO `script3`.`edit_sf` (`member_id`, `OR_number`, `date`, `sf`, `or_date` , `existing_sf` , `reason`, `sfamount`, `reference`, `status`,  `request_status`) VALUES ('$member_id', '$orNumber', '$date', '$sfoption', '$ordate' , '$existing_sf', '$reason' , '$sfamount', '$reference', 'For Edit', 'Not Seen Yet')");



    if ($result) {
    $_SESSION["success_message"] = "Record has been saved successfully!" ;
}



    header("location:editing.php");
    die;

?>

