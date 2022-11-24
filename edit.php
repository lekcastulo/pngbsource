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
	 
   <link type="text/css" rel="stylesheet" href="css/jsgrid.css" />
    <link type="text/css" rel="stylesheet" href="css/theme.css" />  
	          <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo.png"/>

        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/bootstrap-theme.min.css" rel="stylesheet">

        <link href="assets/css/owl.carousel.css" rel="stylesheet">
        <link href="assets/css/owl.theme.default.min.css" rel="stylesheet">

        <link href="assets/css/magnific-popup.css" rel="stylesheet">

        <link href="assets/css/style.css" rel="stylesheet"> 
     </head>
	 
	 
	   
	    

     </head>

         <body>


           <?php
             /* select the names of the login from the database */
                            
                             $member_id=$_SESSION["logged"];    

                             if ($member_id == ''){
                                 header("location:index.php");
                                 die;
                             }

                 if ($member_id != '28'){
                // header("location:index.php");
                die; }
                   
                        
            ?>      







            <!-- <a href="logout.php"> Logout </a> -->
       

    <body>
    <div id="menu-item" class="menu-item hide-menu">
            <div class="container">
                <ul>
                    <a href="home.php"><li>home</li></a>
                    <a href="iteminventory.php"><li>Item Inventory</li></a>
                    <a href="salesreport.php"><li>Monitor Sales by Date</li></a>
                    <a href="salesReportCollection.php"><li>Monitor Sales by O.R.</li></a>
                    <a href="edit.php"><li>Manual Editing</li></a>
                    <a href="editing.php"><li>Auto Editing</li></a>
                    <a href="editbacktrack.php"><li>Edit Backtrack</li></a>
                   
                    <a href="inhousereseller.php"><li>Customer Sales Tracker</li></a>
                    <a href="irsales.php"><li>IR Sales Checker</li></a>
                    <a href="totalitems.php"><li>Total Items</li></a>
                    <a href="prices.php"><li>Prices</li></a>
                    
                    <a href="ranking.php"><li>Ranking</li></a>
                                        <a href="https://www.jibble.io/"><li>  Jibble Attendance </li> </a>



                    <a href="logout.php"><li>Logout</li></a>
                </ul>
            </div>
        </div>

        <div class="main">
            <header class="bg-img header">
                <nav class="navbar navbar-default navbar-vira">
                    <div class="container">
                        <div class="navigation-bar">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="logo">
                                        <a href="home.php"><img src="assets/images/logo.png"></a>
                                    </div>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <div class="menu m">
                                        <a href="#"><span class="ion-navicon _ion-android-menu"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>







<!-- SALES REPORT -->
        <div class="container" style=" background-color: #fff; text-align: center; padding: 10px;">


          <div class="row">
            <div class="col-md-12">
              <h3><b>Sales Monitoring</b></h3>



             <div class="container">
            <div class="row">
            
              <center>
              <div class="form-group">
                <label for="accountname">Account Name</label><br>
                <select class="selectpicker show-menu-arrow" id="accountnameid" name="accountnameid" width="300" style="width:250px;">
                <?php  
                  $members_q = mysqli_query($connection,"SELECT * FROM `member` WHERE 1 ORDER BY firstname ASC");
                  while($row = mysqli_fetch_array($members_q)) { 
                                
                  ?>
                     <option value="<?php echo $row['member_id']; ?>"><?php echo $row['firstname']; ?> <?php echo $row['secondname']; ?></option> 
                  <?php } ?>
                </select>
                </div>



                <div class="form-group">
                <label for="email">Item Type</label><br>
                <select class="selectpicker show-menu-arrow input-small" name="itemtype" id="itemType">
                  <option>All</option>
                  <?php 
                  $items_q = mysqli_query($connection,"SELECT * FROM `items` WHERE 1 ORDER BY itemtype ASC");
                        while($row = mysqli_fetch_array($items_q)) { ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['itemtype']; ?></option>
                 <?php  } ?>
                </select>
                </div>

                
                
                   <label for="email">Official Receipt Range</label><br>
                    <input type="text" class="input-small" name="orFrom" placeholder="O.R. no. From" />
                   

                    <input type="text" class="input-small" name="orTo" placeholder="O.R. no. To" />
                    <input type="hidden" name="id" value="<?php echo $member_id ?>" />
            
                    <br>
                    <br>
                    <button type="submit" class="btn btn-custom" value="login" name="sum">Filter OR</button>
                    


        
            </div>
            </div>

                  <div class="jsGrid"></div>
           <!--    <table class="table" ">
                <thead>
                  <tr style="text-align: center;">
                    <th>Date</th>
                    <th>Customer Name</th>
                    <th>OR #</th>
                    <th>Item Type</th>
                    <th>Gram/s Sold</th>
                    <th>Expected Price</th>
                    <th>Selling Price</th>                  
                    <th>Your 20% Sales Profit</th>
                    <th>Transaction  Status / Shortage</th>
                  </tr>
                </thead>
                <tbody name="metroData">
                </tbody>
              </table> -->
              <br>
              <div class="col-md-12">
              <br>

              <button type="submit" class="btn btn-danger" value="login" name="sum">Recompute</button>
              <br>
              <br>

              <table class="table">
                <thead>
                  <tr style="text-align: center; color: orange;">
                    
                    <th>Date</th>
                    <th>Item Type</th>
                    <th>Total Grams Sold</th>
                    <th>Total Sales</th>
                    <!-- <th>20% Sales Profit</th> -->
                    <th>Status / Shortage</th>
                  </tr>
                </thead>
                <tbody name="totalSales">
                </tbody>
              </table>
              </div>

              <br> 
              <center>


              <h3 name=overallsales> </h3> 
              </center>
           </div>
          </div>
        </div>


<!-- back button -->
        <div class="container" style=" background-color: #fff; text-align: center; padding: 10px;">
          <div class="row">
            <div class="col-md-12">
              <a class="btn btn-success" href="home.php"> Back to Options</a>

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
        <script src="js/jquery-1.9.1.min.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="dist/jsgrid.js"></script>
             <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
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
        </script>


            <footer class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <p> Copyright <span class="fa fa-diamond"></span> 2017 <a href="https://www.facebook.com/teampngb/?ref=br_rs">PNGB</a></p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>

        <!-- <script src="assets/js/jquery-3.1.1.js"></script> -->
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="https://use.fontawesome.com/55b73bf748.js"></script>
        <script src="assets/js/jquery.magnific-popup.js"></script>
        <script src="assets/js/script.js"></script>



        <!-- <script type="text/javascript" src="js/salesList.js"></script> -->
        <script type="text/javascript" src="js/totalSalesCollection.js"></script> 

           </body>
        
   </html>
