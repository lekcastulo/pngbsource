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







<!-- SALES REPORT -->
        <div class="container" style=" background-color: #f0f0f0; text-align: center; padding: 10px;">


          <div class="row">
            <div class="col-md-12">
              <h3><b>Sales Monitoring</b></h3>



             <div class="container">
            <div class="row">

                <div class="form-group">
                <label for="email">Item Type</label><br>
                <select class="selectpicker show-menu-arrow input-small" name="itemtype" id="itemType">
                  <option>All</option>
                  <?php 
                  $items_q = mysqli_query($connection,"SELECT * FROM `items` WHERE 1");
                        while($row = mysqli_fetch_array($items_q)) { ?>
                        <option class="<?php echo $row['itemtype']; ?> " value="<?php echo $row['id']; ?>"><?php echo $row['itemtype']; ?></option>
                 <?php  } ?>
                </select>
                </div>

                
                <div class="input-daterange" id="datepicker" >
                   <label for="email">Date Range</label><br>
                    <input type="text" class="input-small" name="dateFrom" placeholder="Date From" />
                    <span class="add-on" style="vertical-align: top;height:20px"> - </span>

                    <input type="text" class="input-small" name="dateTo" placeholder="Date To" />
                    <input type="hidden" name="id" value="<?php echo $member_id ?>" />
            
                    <br>
                    <br>
                    <button type="submit" class="btn btn-custom" value="login" name="sum">Filter Date</button>
                    


                </div>
            </div>
            </div>


              <table class="table" ">
                <thead>
                  <tr style="text-align: center;">
                    <th>Date</th>
                    <!-- <th>Transaction No</th> -->
                    
		    <th>Contact Number:</th>
	            <th>Customer Name</th>
                    
                    <th>OR #</th>
                    <th>Item Type</th>
                    <!-- <th>Item Value/ Gram</th> -->
                    <th>Gram/s Sold</th>
                    <th>Expected Price</th>
                    <th>Selling Price</th>                  
                    <th>Sales Profit</th>
		    <!-- <th>Shipping Fee</th> -->
                    <th>Discount / Shortage</th>
                  </tr>
                </thead>
                <tbody name="metroData">
                </tbody>
              </table>

              <div class="col-md-12">
              <table class="table">
                <thead>
                  <tr style="text-align: center; color: orange;">
                    
                    <th>Date</th>
                    <th>Item Type</th>
                    <th>Total Grams Sold</th>
                    <th>Total Sales</th>
                
                    <th>Discount / Shortage</th>
                  </tr>
                </thead>
                <tbody name="totalSales">
                </tbody>
              </table>
              </div>

              <br> 
              <center>

              <h3 name=totalprofit> </h3> 
		<h3 name=totalshipping> </h3> 
              <h3 name=overallsales> </h3> 
              </center>
           </div>
          </div>
        </div>


<!-- back button -->
        <div class="container" style=" background-color: #f0f0f0; text-align: center; padding: 10px;">
          <div class="row">
            <div class="col-md-12">
              <a class="btn btn-success" href="home.php"> Back to Add Sales </a>

           </div>
          </div>
        </div>

        
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

            <script type="text/javascript">
              $('.datepicker').datepicker({
                  format: 'mm/dd/yyyy',
                  startDate: '-3d'
              });
            </script>

<!--             $("#datepicker").datepicker( {
    format: "mm-yyyy",
    viewMode: "months", 
    minViewMode: "months"
}); -->

            <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
            <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
            <script>
                $('.input-group.date').datepicker({
                    format: "yyyy-mm-dd",
                    startDate: "2017-06-01",
                    endDate: "2025-01-01",
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
                    endDate: "2025-01-01",
                    todayBtn: "linked",
                    autoclose: true,
                    todayHighlight: true
                });
            
            });
        </script>

        <script type="text/javascript" src="js/salesList.js"></script>
        <script type="text/javascript" src="js/totalSales.js"></script>
	<script type="text/javascript" src="js/shippingfee.js"></script>
           </body>
        
   </html>
