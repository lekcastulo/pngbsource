 


 
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
                    <a href="deposits.php"><li>Deposits Transactions</li> </a>
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
        <br>

 

<!-- ADD REPORT -->
<?php 

/* GET MEMBERS */ 
$members_q = mysqli_query($connection,"select ir_name from ir_name");


?>
        <div class="container" style=" background-color: #fff; text-align: center; padding: 10px;">
          <div class="row">
            <div class="col-md-12">        

               
 

  
    <div class="col-md-4 col-md-offset-4">

    <h4> IR Sales Inventory</h4>


<center>                

  <div class="container">
    <div class="row"> 
      <div class="col-md-4">

 <h5 style="color: purple";><b>Filter IR by Date</b></h5>


 <div class="form-group">
                <label for="accountname">IR Account Name</label><br>
                <select class="selectpicker show-menu-arrow form-control" id="accountnameid" name="accountnameid">
                  <?php  while($row = mysqli_fetch_array($members_q)) { 
                       
                  ?>
                     <option value="<?php echo $row['ir_name']; ?>"><?php echo $row['ir_name']; ?> </option> 
                  <?php } ?>
                 
                </select>
                </div>

  <div class="form-group">
    <label for="email">Date From</label>
    <input   class="input-group date form-control" data-provide="datepicker" name="dateFrom" required>
     <label for="email">Date To</label><br>
    <input   class="input-group date form-control" data-provide="datepicker" name="dateTo" required>
  </div>
  <button type="submit" class="btn btn-info" value="login" name="datef">Check Total Sales</button>


  </div>
 </div>
</div>
<br><br>
<h4> Grams Sold</h4>
<h3 name="totalgrams" style="color:blue" > </h3>
<br><br>

</center>
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
            }

            } </style>

  

<!--             $("#datepicker").datepicker( {
    format: "mm-yyyy",
    viewMode: "months", 
    minViewMode: "months"
}); -->



            <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
             <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
            <!-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script> -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>



        <!-- Load jQuery and bootstrap datepicker scripts -->
<!--         <script src="js/jquery-1.9.1.min.js"></script>
        <script src="js/bootstrap-datepicker.js"></script> -->


   <!--      <script type="text/javascript" src="js/salesList.js"></script>
        <script type="text/javascript" src="js/totalSales.js"></script> -->
        <script type="text/javascript" src="js/irsales.js"></script>
        <!-- <script type="text/javascript" src="js/getinventory.js"></script> -->

           <footer class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <p> Copyright <span class="fa fa-diamond"></span> 2017 <a href="https://www.facebook.com/teampngb/?ref=br_rs">PNGB</a></p>
                        </div>
                    </div>
                </div>
            </footer>


        

        <!-- <script src="assets/js/jquery-3.1.1.js"></script> -->
        <!-- <script src="assets/js/bootstrap.min.js"></script> -->
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="https://use.fontawesome.com/55b73bf748.js"></script>
        <script src="assets/js/jquery.magnific-popup.js"></script>
        <script src="assets/js/script.js"></script>

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



        

           </body>
        
   </html>
