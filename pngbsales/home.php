 
 
 
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

          <center><h2> Sales Report </h2></center>

          <!-- <?php 
                  // echo date('Y-m-d');
                  echo date('Y/m/d H:i:s');  
                  // echo date_format(date,"Y/m/d H:i:s");
          ?> -->

          
        
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
             
              <h3><b>Add Sale/s</b></h3>

              <?php echo "<h2><font color='brown'> Today is <br><b>" . date('Y-m-d') . "</b></font></h2><br>"; ?>

              <!-- <br> -->


              <form class="form-inline" action="/send.php" method="POST">


              <!-- <label for="date">Select Date</label><br> -->
              <!-- <div class="input-group date" data-provide="datepicker" > -->

              <div class="form-group">
                  <input type="hidden" name="date" value="<?php echo date("Y-m-d") ?>" />
                </div>
                 <!--  <div class="input-group-addon">
                      <span class="glyphicon glyphicon-th"></span>
                  </div> -->
              <!-- </div> -->
              <br><br>

                <!-- <div class="form-group">
                  <label for="email">Customer Name:</label><br>
                  <input type="text" class="form-control" name="customername" required>
                </div> -->

		


                <?php 
                           

                           $result = mysqli_query($connection,"SELECT ir_name FROM `ir_name` WHERE status = 'active' ");

                           

                           

                           
?>


<div class="form-group">
<label for="email">Customer Name:</label><br>
<input list="browsers"  class="form-control" name="customername" />
<datalist id="browsers">
<?php while($row = mysqli_fetch_array($result)) { ?>
  <option value="<?php echo $row['ir_name']; ?>"><?php echo $row['ir_name']; ?></option>

  <?php 
              
            } 

           ?>
  
</datalist>

</div>

                <div class="form-group">
                <label for="Payment">Payment Method:</label><br>
                    <select class="form-control" name="method" required>
                      <option value="Cash">Cash</option>
			<option value="CR">CR</option>

                      <option value="BDO 7837">BDO 7837</option>
		      <option value="BDO 4042">BDO 4042</option>
		      <option value="BDO 3822">BDO 3822</option>
		      <option value="BDO 9258" BDO 9258</option>
                       <option value="BDO 0353"> BDO 0353</option>	
                      <option value="BPI">BPI</option>
                      <option value="Robinsons">Robinsons Bank</option>
                      <option value="Security">Security Bank </option>
                      <option value="China">China Bank </option>
		      <option value="Metro">Metro Bank </option>
                      <option value="Metro 2723">Metro Bank 2723</option>
                      <option value="LandBank">Land Bank </option>
                      <option value="PNB">PNB </option>
                      <option value="Union">Union Bank </option>
                      <option value="Gcash">Gcash </option>
                    </select>
                </div>




                <div class="form-group">
                  <label for="reference">Reference #:</label><br>
                  <input type="reference" step="0.01" class="form-control" name="reference" required>
                </div>

   <div class="form-group">
                  <label for="contact">Contact Number:</label><br>
                  <input type="number" step="0.01" class="form-control" name="contact" required>
                </div>


<?php 
                           

                             $result = mysqli_query($connection,"SELECT * FROM `items` WHERE 1 ORDER BY itemtype ASC");

                             

                             

                             
?>



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
               
              <?php
                           
                           $result = mysqli_query($connection,"SELECT official_receipt FROM `sales_report` where official_receipt  and id = $member_id and date between '2018-01-02' and '2022-12-31'  ORDER BY `sales_report`.`official_receipt` desc LIMIT 1
");          
                             while($row = mysqli_fetch_array($result))
                        {                                                               
                             // echo  $row['official_receipt'];
                            
                            $ornum = $row['official_receipt'];

                            // $mynumber = $ornum - $ornum;
                        }                       
                                           
               ?>   

                <?php 
                 if ( empty($ornum) ) $ornum = '10000';

                $i = $ornum ; $i++; ?>

                
                <div class="form-group">
                  <!-- <label for="email">Or #:</label><br> -->
                  <input type="hidden" class="form-control" name="officialreceipt" value ="<?php echo $i; ?>">
                </div>


                <div class="form-group">
                  <label for="email">Gram/s</label><br>
                  <input type="number" step="0.01" class="form-control" name="grams" required>
                </div>
                <input type="hidden" name="id" value="<?php echo $member_id ?>" />
                <div class="form-group">
                  <label for="email">Total Selling Price</label><br>
                  <input type="number" step="0.01" class="form-control" name="sellingprice" required>
                </div>

                <div class="form-group">
                 <!--  <label for="sf">Shipping Fee</label><br> -->
                  <input type="hidden" value="0"  step="0.01" class="form-control" name="sf" required>
                </div>

                <br>
                <br>
                <button type="submit" class="btn btn-success" value="login" name="sum" onclick="return confirm('Are you sure that your input is correct? if Correct click OK. if not Click Cancel');">Add Sale</button>
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



<a class="btn btn-primary" href="salesreport.php"> Review Your Sales (Today)</a> <br><br>
<!-- <a class="btn btn-primary" href="salesReportCollection.php"> Review Your Sales (By Official Receipt)</a> <br><br> -->
<a class="btn btn-primary" href="editing.php"> Edit Request</a> <br><br/>
<a class="btn btn-primary" href="deposits.php"> Deposits</a> <br>


<br>
<br>



<div class="postInventory">
    <div class="col-md-4 col-md-offset-4">

   <h4>Item Price</h4>

<center>
  
  <img src="123.png">
</center>

    </font> </p>
 
<!--     <h4> Total Input Items</h4>
                <table class="table text-centered">
                <thead>
                  <tr style="text-align: center; color: orange;">
                    
                    <th>Item Type</th>
  
                    <th> Total Input </th>
                    <th> Total Output </th>
                    <th> Total Grams Sold </th>
                    <th> Total Remaining </th>

                  </tr>
                </thead>
                <tbody name="totalInventory">
                </tbody>
              </table> -->

        <a href="summaryItemInventory.php" class="btn btn-success">View Input/Output Summary </a> <br></center>


    </div>
</div>

 <br>
<center> 

      
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- new -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-9123581049515102"
     data-ad-slot="7590973732"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

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
            }/*


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
        <script type="text/javascript" src="js/getinventory.js"></script>

           </body>
        
   </html>



