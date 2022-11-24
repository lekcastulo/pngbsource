 


 
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
        <!-- <script type="text/javascript" src="components/jquery/dist/jquery.min.js"></script> -->

        <link rel="stylesheet" type="text/css" href="css/index.css"/>


        <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo.png"/>

        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/bootstrap-theme.min.css" rel="stylesheet">

        <link href="assets/css/owl.carousel.css" rel="stylesheet">
        <link href="assets/css/owl.theme.default.min.css" rel="stylesheet">

        <link href="assets/css/magnific-popup.css" rel="stylesheet">

        <link href="assets/css/style.css" rel="stylesheet"> 
     </head>

         <!-- <body> -->




            <!-- <div class="userName pull-right" style="color: yellow; margin-top: 0px;"> -->
           
           <?php
             /* select the names of the login from the database */
                            
                             $member_id=$_SESSION["logged"];    

                             if ($member_id == ''){
                                 header("location:index.php");
                                 die;
                             }
                             if ($member_id != '108'){
                                echo "You're account is not permitted to access this page <br>" ;
                                echo "<h3 style='color:red;'><a class='btn btn-warning' href='/'>Back to Login </a></h3>";
                              // header("location:index.php");
                              die; }
                        
            ?>      







            <!-- <a href="logout.php"> Logout </a> -->
       

    <body>
    <div id="menu-item" class="menu-item hide-menu">
            <div class="container">
                <ul>
                <a href="salesreport.php"><li>Home</li></a>
                    <a href="iteminventory.php"><li> Item Inventory</li> </a>
                    <a href="deposits.php"><li>Deposits Transactions</li> </a>
                    <a href="totalitem.php"><li>Total Items</li> </a>
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

<!-- ADD REPORT -->
<?php 

/* GET MEMBERS */ 
 $members_q = mysqli_query($connection,"SELECT * FROM `member` WHERE 1 ORDER BY firstname ASC");
 $items_q = mysqli_query($connection,"SELECT * FROM `items` WHERE 1 ORDER BY itemtype ASC");
 


?>
        <div class="container" style=" background-color: #fff; text-align: center; padding: 10px;">
          <div class="row">
            <div class="col-md-12">        
             <?php if (isset($_SESSION["success_message"])) { ?>
                    <div class="alert alert-success">
                        <strong>Success!</strong> <?php echo $_SESSION["success_message"]; ?>
                    </div>
             <?php 
                  unset($_SESSION['success_message']);
             } ?>
               
              <h3><b>Total Items</b></h3>
              <h4 style="color: red;"><b>(Items Inventory)</b></h4>


              <br>    


     
<div class="postInventory">
    <div class="col-md-4 col-md-offset-4">

 
    <h4> Total Input Items</h4>


              <center>                

                <div class="container">
                  <div class="row"> 
                    <div class="col-md-4">

               <h5 style="color: purple";><b>Filter Items by Date</b></h5>

                <div class="form-group">
                  <label for="email">Date From</label>
                  <input   class="input-group date form-control" data-provide="datepicker" name="dateFrom" required>
                   <label for="email">Date To</label><br>
                  <input   class="input-group date form-control" data-provide="datepicker" name="dateTo" required>
                </div>
                <button type="submit" class="btn btn-info" value="login" name="datef">Submit</button>

             
                </div>
               </div>
              </div>

            </center>


                <table class="table text-centered">
                <thead>
                  <tr style="text-align: center; color: orange;">
                    
                    <th>Item Type</th>
                
                    <th> Total Input </th>
                    <th>Total Output</th> 
                    <th> Total Grams Sold </th>
                    <th> Total Remaining </th>

                  </tr>
                </thead>
                <tbody name="totalItems">
                </tbody>                

              </table>                


              <table class="table text-centered">
              <h3> Overall Grams Remaining </h3>
                <thead>
                  <tr style="text-align: center; color: orange;">
                    
                    <th> Total Input </th>
                    <th>Total Output</th> 
                    <th> Total Grams Sold </th>
                    <th> Total Remaining </th>

                  </tr>
                </thead>
            <!--     <tbody name="totalItems">
                </tbody>      -->           

                <tbody name="overAllTotal">
                </tbody>
              </table>

 <!--        <a href="summaryItemInventory.php" class="btn btn-success">View Input/Output Summary </a> <br><br>
        <a href="salesreport.php" class="btn btn-success">View Sales Report by Date</a><br><br>
        <a href="salesReportCollection.php" class="btn btn-success">View Sales Report by O.R.</a><br><br>
         <a href="ranking.php" class="btn btn-success">View Ranking</a><br><br> -->
        <a href="home.php" class="btn btn-success">Back to options</a>




        </center>
    </div>
</div>
</center>



            
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
<!-- 
            <script type="text/javascript">
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
                    endDate: "2020-01-01",
                    todayBtn: "linked",
                    autoclose: true,
                    todayHighlight: true
                });
            </script>


        <!-- Load jQuery and bootstrap datepicker scripts -->
<!--         <script src="js/jquery-1.9.1.min.js"></script>
        <script src="js/bootstrap-datepicker.js"></script> -->
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
      

        <script src="assets/js/jquery-3.1.1.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="https://use.fontawesome.com/55b73bf748.js"></script>
        <script src="assets/js/jquery.magnific-popup.js"></script>
        <script src="assets/js/script.js"></script>
   <!--      <script type="text/javascript" src="js/salesList.js"></script>
        <script type="text/javascript" src="js/totalSales.js"></script> -->
        <!-- <script type="text/javascript" src="js/inventorySummary.js"></script> -->
        <script type="text/javascript" src="js/totalitems.js"></script>
        <script type="text/javascript" src="js/total.js"></script>

           </body>
        
   </html>


