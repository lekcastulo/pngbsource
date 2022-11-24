 
 
 
  <?php

        session_start();
        include("connection.php"); // connect to the database
        include("function.php");



?>


<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
<meta name="author" content="PNGB">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/style.css" type="text/css" rel="stylesheet"/>
<title> PNGB Sales</title>
<link href="components/bootstrap/dist/css/bootstrap.min.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="components/jquery/dist/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="css/index.css"/>







</head>

<body>



<div class="logo" style="padding-top: 20px;padding-bottom: 20px; background-color: #000;">

<div class="container">



<div class="row">


<div class="col-md-12" style="color: #fff; margin-top: 0px;"> <img src="images/logo.png"> 

<div class="userName pull-right" style="color: yellow; margin-top: 0px;">
       
       <?php


           /* select the names of the login from the database */
              
               $member_id=$_SESSION["logged"];		

               if ($member_id == ''){
                   header("location:index.php");
                   die;
               }

               $result = mysqli_query($connection,"SELECT * FROM `member` WHERE `member_id`='$member_id' LIMIT 1");

               echo "<table border='0px' id='profile_name'>
               ";

               while($row = mysqli_fetch_array($result))
          {
               echo "<tr>";

               
               echo "<td> Welcome " . $row['secondname'] .",". $row['firstname'] ." !</td >";
              

               
               echo "</tr>";
          }
               echo "</table>";
     
          
          ?>      
<a href="logout.php"> Logout </a>


</div>
</div>
</div>
</div></div>

<!-- <?php echo date('Y-m-d'); ?> -->


<div class="container" style=" background-color: #f0f0f0; text-align: center; padding: 10px;">
          <div class="row">
            <div class="col-md-12">
              <?php if (isset($_SESSION["success_message"])) { ?>
                    <div class="alert alert-success">
                        <strong>Success!</strong> <?php echo $_SESSION["success_message"]; ?>
                    </div>
             <?php 
                  unset($_SESSION['success_message']);
             } ?>

             </div>
           </div>
</div>

<center><h2> EDIT REQUEST</h2>

<br>


<!-- Customer Request -->

        <div class="row">
         
                <h3 style="color: blue;"> Edit Customer Name </h3> <br>
                <form class="form-inline" action="/editcustomer.php" method="POST">
                    <input type="hidden" name="date" value="<?php echo date("Y-m-d") ?>" />
                    <input type="hidden" name="id" value="<?php echo $member_id ?>" />
                    <label> Type the right Customer name </label><br>
                    <input type="text" placeholder="Type Customer Name" class="form-control" name="customerName" require> <br><br>
                    <label> Input OR Number</label><br>
                    <input type="number"  placeholder="Input OR Number" class="form-control" name="orNumber" require> <br><br>
                    <label> Reason Why We Grant Your Request</label><br>
                    <input type="text" placeholder="Type your Reason" class="form-control" name="reason" require> <br><br>

                    <button type="submit" class="btn btn-success" value="login" name="sum" onclick="return confirm('Are you sure that your input is correct? if Correct click OK. if not Click Cancel');">Submit Request</button>
                </form>
                
                  <a href="editcheckcustomer.php" class="btn btn-warning"> Check Request </a>
     
        </div> 


<!-- Gram/s change request -->

<br>


<div class="row">
         
         <h3 style="color: orange;"> Change Gram/s </h3> <br>
         <form class="form-inline" action="/editgram.php" method="POST">
                    <input type="hidden" name="date" value="<?php echo date("Y-m-d") ?>" />
                    <input type="hidden" name="id" value="<?php echo $member_id ?>" />
                    <label> Type the right Grams/s</label><br>
                    <input type="number" placeholder="Type Gram/s" class="form-control" name="grams" require> <br><br>
                    <label> Input OR Number</label><br>
                    <input type="number"  placeholder="Input OR Number" class="form-control" name="orNumber" require> <br><br>
                    <label> Reason Why We Grant Your Request</label><br>
                    <input type="text" placeholder="Type your Reason" class="form-control" name="reason" require> <br><br>

                    <button type="submit" class="btn btn-success" value="login" name="sum" onclick="return confirm('Are you sure that your input is correct? if Correct click OK. if not Click Cancel');">Submit Request</button>
                </form>

                <a href="editcheckgram.php" class="btn btn-warning"> Check Request </a>


 </div>

 <!-- Gram/s change request -->

<br>


<div class="row">
         
<h3 style="color: red;"> Change Selling Price </h3> <br>
         <form class="form-inline" action="/editsellingprice.php" method="POST">
                    <input type="hidden" name="date" value="<?php echo date("Y-m-d") ?>" />
                    <input type="hidden" name="id" value="<?php echo $member_id ?>" />
                    <label> Type the right Selling Price</label><br>
                    <input type="number" placeholder="Type Selling Price" class="form-control" name="sellingprice" require> <br><br>
                    <label> Input OR Number</label><br>
                    <input type="number"  placeholder="Input OR Number" class="form-control" name="orNumber" require> <br><br>
                    <label> Reason Why We Grant Your Request</label><br>
                    <input type="text" placeholder="Type your Reason" class="form-control" name="reason" require> <br><br>

                    <button type="submit" class="btn btn-success" value="login" name="sum" onclick="return confirm('Are you sure that your input is correct? if Correct click OK. if not Click Cancel');">Submit Request</button>
                </form>

                <a href="editchecksellingprice.php" class="btn btn-warning"> Check Request </a>

             
 </div>



  <!-- Itemtype change request -->

<br>
<?php  $items_q = mysqli_query($connection,"SELECT * FROM `items` WHERE 1 ORDER BY itemtype ASC"); ?>

<div class="row">
         
         <h3 style="color: green;"> Change Itemtype </h3> <br>
         <form class="form-inline" action="/edititemtype.php" method="POST">
         <input type="hidden" name="date" value="<?php echo date("Y-m-d") ?>" />
                    <input type="hidden" name="id" value="<?php echo $member_id ?>" />         
             <label> Choose the Right Item type </label><br>
             <select class="selectpicker show-menu-arrow form-control"  id="itemid" name="itemid">
          
                 <?php while($row = mysqli_fetch_array($items_q)) { ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['itemtype']; ?></option>
                 <?php  } ?>
              
                </select><br>
                <label> Input OR Number</label><br>
                    <input type="number"  placeholder="Input OR Number" class="form-control" name="orNumber" require> <br><br>
                
             <label> Reason Why We Grant Your Request</label><br>
             <input type="text" placeholder="Type your Reason" class="form-control" name="reason"> <br><br>

             <button type="submit" class="btn btn-success" value="login" name="sum" onclick="return confirm('Are you sure that your input is correct? if Correct click OK. if not Click Cancel');">Submit Request</button>
         
         </form>

         <a href="editcheckitemtype.php" class="btn btn-warning"> Check Request </a>


 </div>

 <br>
 <br> 
 <br>
 <a class="btn btn-danger" href="home.php"> Back to Home</a>
</center>

<style type="text/css">
  /* centered columns styles */
  .row-centered {
    text-align:center;
  }
  .col-centered {
    display:inline-block;
    float:none;
    /* reset the text-align */
    text-align:left;
    /* inline-block space fix */
    margin-right:-4px;
  }


  .btn-custom {
  background-color: hsl(45, 85%, 35%) !important;
  background-repeat: repeat-x;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#efc23d", endColorstr="#a57f0d");
  background-image: -khtml-gradient(linear, left top, left bottom, from(#efc23d), to(#a57f0d));
  background-image: -moz-linear-gradient(top, #efc23d, #a57f0d);
  background-image: -ms-linear-gradient(top, #efc23d, #a57f0d);
  background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #efc23d), color-stop(100%, #a57f0d));
  background-image: -webkit-linear-gradient(top, #efc23d, #a57f0d);
  background-image: -o-linear-gradient(top, #efc23d, #a57f0d);
  background-image: linear-gradient(#efc23d, #a57f0d);
  border-color: #a57f0d #a57f0d hsl(45, 85%, 29%);
  color: #fff !important;
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.39);
  -webkit-font-smoothing: antialiased;
  } 
</style>


<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script>
  $('.input-group.date').datepicker({
      format: "yyyy-mm-dd",
      startDate: "2017-06-01",
      endDate: "2022-01-01",
      todayBtn: "linked",
      autoclose: true,
      todayHighlight: true
  });
</script>


<!-- Load jQuery and bootstrap datepicker scripts -->
<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
  // When the document is ready
  $(document).ready(function () {
    
    $('.input-daterange').datepicker({
        format: "yyyy-mm-dd",
        startDate: "2017-06-01",
        endDate: "2022-01-01",
        todayBtn: "linked",
        autoclose: true,
        todayHighlight: true
    });

  });
</script> 

<!-- <script type="text/javascript" src="js/salesList.js"></script> -->
<!-- <script type="text/javascript" src="js/totalSales.js"></script> -->
<script type="text/javascript" src="js/getinventory.js"></script>

</body>

</html>



