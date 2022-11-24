 
 
 
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
        
<center> <a href="timeInOut.php" class="btn btn-danger"> Time In/Out </a><br><br>

<a href="attendanceMonitoring.php" class="btn btn-danger"> Verify Attendance </a>
 </center>
<br>

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

              <?php echo "<h2><font color='brown'> Today is <br><b>" . date(" \n l jS F Y") . "</b></font></h2><br>"; ?>

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

                <div class="form-group">
                  <label for="email">Customer Name:</label><br>
                  <input type="text" class="form-control" name="customername" required>
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
               
              <?php
                           
                           $result = mysqli_query($connection,"SELECT official_receipt FROM `sales_report` where official_receipt  and id = $member_id and date between '2018-1-2' and '2019-12-31'  ORDER BY `sales_report`.`official_receipt` desc LIMIT 1
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



<a class="btn btn-primary" href="salesreport.php"> Review Your Sales (By Date)</a> <br><br>
<a class="btn btn-primary" href="salesReportCollection.php"> Review Your Sales (By Official Receipt)</a> <br>


<br>
<br>



<div class="postInventory">
    <div class="col-md-4 col-md-offset-4">

   <h4>Item Price</h4>

  <p><font color=" #483D8B"> 
     10kDiamond    = <b>    1600  </b><br>
     14k_Regular   =   <b>    1800 </b><br>
     14k_Sale     =  <b> 1750</b> <br>
     14k_Diamond   =  <b>      2050</b> <br>
     18k_Special   =   <b>    2100 </b><br>
     18k_Cartier = <b>  2150 </b><br>
     18k_Sale/Chinese  =  <b>  2000</b> <br>
  18k_Regular     =   <b>  2100  </b><br>
  18k_Diamond     =   <b>  2300  </b><br>
     21k_Regular    =  <b>   2300 </b> <br>
    24k_Chinese     =  <b>  2500 </b> <br>
    Spdia(5000)     =  <b>       5000 </b> <br>
 Spdia(20000)     =  <b>       20000 </b> <br>
    Custom(2500)     =   <b>     2500  </b><br>
    Spdia(10000)     =   <b>    10000 </b><br><br>
   Russian_1950      =  <b>  1950 </b><br><br>

    </font> </p>
 
    <h4> Total Input Items</h4>
                <table class="table text-centered">
                <thead>
                  <tr style="text-align: center; color: orange;">
                    
                    <th>Item Type</th>
                <!--     <th>Input</th>
                    <th>Output</th> -->
                    <th> Total Input </th>
                    <th> Total Output </th>
                    <th> Total Grams Sold </th>
                    <th> Total Remaining </th>

                  </tr>
                </thead>
                <tbody name="totalInventory">
                </tbody>
              </table>

        <a href="summaryItemInventory.php" class="btn btn-success">View Input/Output Summary </a> <br></center>


    </div>
</div>

 <br>
<center> 

      


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


