
              <?php 

session_start();
 include("connection.php"); // connect to the database
 include("function.php");


 $member_id=$_SESSION["logged"];
 $date = $_POST['date'];
 $grams = $_POST['grams'];
 $orNumber = $_POST['orNumber'];
 $reason = $_POST['reason'];
 $status = 'Pending Request';
            

              

//  echo $member_id. "<br>";
//  echo $date. "<br>";
//  echo $grams. "<br>";
//  echo $orNumber. "<br>";
//  echo $reason. "<br>";



  
 $result = mysqli_query($connection,"SELECT * from `script3`.`sales_report` where id = '$member_id' and official_receipt = '$orNumber'");
 while($row = mysqli_fetch_array($result)) {
  $ordate  =  $row['date']; 
  $existinggrams = $row['grams'];
 }

//  echo $ordate;


$result = mysqli_query($connection, "INSERT INTO `script3`.`edit_gram` (`member_id`, `or_number`, `date`, `or_date`, `existing_grams` , `grams`,`reason` , `status`, `request_status`) VALUES ('$member_id', '$orNumber', '$date','$ordate', '$existinggrams', '$grams', '$reason' ,'For Edit', 'Not Seen Yet')");

    if ($result) {
    $_SESSION["success_message"] = "Record has been saved successfully!" ;
}



    header("location:editing.php");
    die;

?>
