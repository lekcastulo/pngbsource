 
 
 
  <?php

              session_start();
               include("connection.php"); // connect to the database
                include("function.php");
              
             
            
              ?>
      <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

	  <html xmlns="http://www.w3.org/1999/xhtml">
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

          <!-- <?php echo date('Y-m-d'); ?> -->
        




<!-- ADD REPORT -->
        <div class="container" style=" background-color: #f0f0f0; text-align: center; padding: 10px;">
          <div class="row">
            <div class="col-md-12">
              <h3><b>Add Sale/s</b></h3>

              <br>


              <form class="form-inline" action="http://sales2017.pngbweb.com/send.php" method="POST">


              <label for="date">Select Date</label><br>
              <div class="input-group date" data-provide="datepicker" >
                  <input type="text" class="form-control" name="date" required>
                  <div class="input-group-addon">
                      <span class="glyphicon glyphicon-th"></span>
                  </div>
              </div><br><br>

                <div class="form-group">
                  <label for="email">Customer Name:</label><br>
                  <input type="text" class="form-control" name="customername" required>
                </div>

                <div class="form-group">
                  <label for="email">Or #:</label><br>
                  <input type="number" class="form-control" name="officialreceipt" required >
                </div>

                <div class="form-group">
                <label for="email">Item Type</label><br>
                <select class="selectpicker show-menu-arrow form-control" name="itemtype">
                  <option>10kDia(1400)</option>
                  <option>14k_Reg(1700)</option>
                  <option>14k_Sale(1550)</option>
                  <option>14k_Dia(2000)</option>
                  <option>18k_Reg(1950)</option>
                  <option>18k_Sp(2000)</option>
                  <option>18k_Dia(2150)</option>
                  <option>18k_Sale(1850)</option>
                  <option>21k_Reg(2200)</option>
                  <option>21k_Sale(2100)</option>
                  <option>24k_Chi(2350)</option>
                  <option>Spdia(5000)</option>
                  <option>Custom(2500)</option>
                </select>
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

                <br>
                <br>
                <button type="submit" onclick="myFunction()" class="btn btn-success" value="login" name="sum">Add Sale</button>
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



<a class="btn btn-primary" href="salesreport.php"> Review Your Sales </a> 


<br>
<br>



<div class="postInventory">
    <div class="col-md-4 col-md-offset-4">

 
    <h4> Items Onhand</h4>
                <table class="table text-centered">
                <thead>
                  <tr style="text-align: center; color: orange;">
                    
                    <th>Item Type</th>
                <!--     <th>Input</th>
                    <th>Output</th> -->
                    <th> Input Items </th>

                  </tr>
                </thead>
                <tbody name="totalInventory">
                </tbody>
              </table>
              <a href="#" class="btn btn-success">View Summary </a></center>

        <br>
        <br>
    </div>
</div>


<center> 
<div class="postInventory">

    <div class="col-md-4 col-md-offset-4">
    <br>
    <br>
    <h4> Items Sold</h4>
                <table class="table text-centered">
                <thead>
                  <tr style="text-align: center; color: orange;">
                    
                    <th>Item Type</th>
                    <th>Total Grams Sold</th>

                  </tr>
                </thead>
             
                <tbody name="totalGrams" style="text-align: center;">

                </tbody>
              </table>
             <a href="#" class="btn btn-success">View Summary </a>

        <br>
        <br>
    </div>
</div>
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

            <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
            <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
            <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
            <script>
                $('.input-group.date').datepicker({
                    format: "yyyy-mm-dd",
                    startDate: "2017-06-01",
                    endDate: "2020-01-01",
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
                    endDate: "2020-01-01",
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
