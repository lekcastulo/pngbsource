 
 
 
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
    <title> PNGB Shipping</title>
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
                            
                             $name = $row['firstname'];
                             
                             echo "</tr>";
                        }
                             echo "</table>";
                        

                             
                        
						?>      
            <a href="logout.php"> Logout </a>


              </div>
            </div>
          </div>
        </div></div>

          <center><h2> Shipping Details </h2></center>

          <!-- <?php echo date('Y-m-d'); ?> -->
        
<!-- <center> <a href="timeInOut.php" class="btn btn-danger"> Time In/Out </a><br><br>

<a href="attendanceMonitoring.php" class="btn btn-danger"> Verify Attendance </a>
 </center>
<br> -->

<?php 
                           

                             $result = mysqli_query($connection,"SELECT * FROM `items` WHERE 1 ORDER BY itemtype ASC");

                             

                             

                             
?>
<!-- ADD REPORT -->
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
             
           

              <?php echo "<h2><font color='brown'> Today is <br><b>" . date(" \n l jS F Y") . "</b></font></h2><br>"; ?>

              <!-- <br> -->


     
     
     
     
     
     
     
              <form class="form-inline" action="/send.php" method="POST">

              <?php
                date_default_timezone_set('Asia/Manila');

                ?>


              <?php $timezone = date('h:i:s a', time()); 
               ?>

                  <input type="hidden" name="date" value="<?php echo date("Y-m-d") ?>" />
                
                  <input type="hidden" name="deliveredstarted" value="<?php echo $timezone; ?>" />

                  <input type="hidden"  name="deliveredby" value="<?php echo $name; ?>">
              
                <div class="form-group">
                  <label for="ae">AE Name</label><br>
                  <input type="text" class="form-control" name="ae" required>
                </div>

                <div class="form-group">
                  <label for="">Customer Name</label><br>
                  <input type="text" class="form-control" name="customer" required>
                </div>

                <div class="form-group">
                    <label for="email">Item Type</label><br>
                    <select class="selectpicker show-menu-arrow form-control" name="itemid">
                    <?php while($row = mysqli_fetch_array($result)) { ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['itemtype']; ?></option>
                  <?php 
                  
                    } 

                  ?>
                      
                    </select>
                </div>

                <div class="form-group">
                  <label for="email">Grams</label><br>
                  <input type="number" step="0.01" class="form-control" name="grams" required>
                </div>

                <div class="form-group">
                  <label for="amount">Amount</label><br>
                  <input type="number" step="0.01" class="form-control" name="amount" required>
                </div>

                <div class="form-group">
                  <label for="amount">Shipping Fee</label><br>
                  <input type="number" step="0.01" class="form-control" name="shippingfee" required>
                </div>


                <div class="form-group">
                  <label for="">Customer Address</label><br>
                  <input type="text" class="form-control" name="address" required>
                </div>


                <div class="form-group">
                  <label for="Payment Method">Payment Method</label><br>                     
                       <select class="selectpicker show-menu-arrow form-control" name="method">
                       <option value="Cash On Delivery"  selected>Cash On Delivery</option>
                       <option value="Bank Deposits">Bank Deposits</option>
                       <option value="Remittance">Remittance</option>
                       </select>
                </div>

                <input type="hidden"  name="status" value="To Ship">

                <div class="form-group">
                  <label for="">Remarks</label><br>
                  <input type="text" class="form-control" name="remarks" required>
                </div>

                <br>
                <br>

                <button type="submit" class="btn btn-success" value="login" name="sum" onclick="return confirm('Are you sure that your input is correct? if Correct click OK. if not Click Cancel');">Add Delivery</button>
              </form>


<script>
function myFunction() {
    var txt;

  alert('Sales Succestfully Added');
}
</script>




           </div>
          </div>
        </div>

        
        <br>
        <br>




           </div>
          </div>
        </div>


<center> 



<a class="btn btn-primary" href="salesreport.php"> Check / Update Deliveries</a> <br><br>
<!-- <a class="btn btn-primary" href="editing.php"> Update Delivery Status</a> <br><br/> -->



<br>
<br>



 <br>

      
              

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
            } </style>

<!--             <script type="text/javascript">
              $('.datepicker').datepicker({
                  format: 'mm/dd/yyyy',
                  startDate: '-3d'
              });
            </script> -->

<!--             $("#datepicker").datepicker( {
    format: "mm-yyyy",
    viewMode: "months", 
    minViewMode: "months"
}); -->

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
<!--         <script src="js/jquery-1.9.1.min.js"></script>
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
        </script> -->

        <!-- <script type="text/javascript" src="js/salesList.js"></script> -->
        <!-- <script type="text/javascript" src="js/totalSales.js"></script> -->
        <script type="text/javascript" src="js/deliveries.js"></script>

           </body>
        
   </html>



