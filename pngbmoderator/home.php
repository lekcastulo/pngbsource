 


 
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

                 if (!(($member_id == '29') || ($member_id == '76'))){
                // header("location:index.php");
                 die;
                 }





            ?>
   







            <!-- <a href="logout.php"> Logout </a> -->
       

    <body>
        <div id="menu-item" class="menu-item hide-menu">
            <div class="container">
                <ul>
                
                

                    <a href="salesreport.php"><li>Monitor Sales by Date</li></a>
                    <a href="salesReportCollection.php"><li>Monitor Sales by O.R.</li></a>
                    <a href="ranking.php"><li>Ranking</li></a>
                    <!-- <a href="attendanceMonitoring.php"><li> Attendance Monitoring</li> </a> -->
                    <!-- <a href="attedanceSummary.php"><li> Attendance Summary</li> </a> -->
                    <a href="manageMemberSchedules.php"><li> Manage Schedule</li> </a>
                    <a href="iteminventory.php"><li> Items Overall Summary</li> </a>
                    <a href="inhousereseller.php"><li> Inhouse Reseller</li> </a>
                    <a href="editbacktrack.php"><li> Backtrack Edits</li> </a>
                    <a href="deposits.php"><li> Deposits</li></a>

                    <a href="remaininggrams.php"><li> Remaining Grams </li></a>
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
                <div class="container">
                    <div class="row">
                        <div class="intro-box">
                            <div class="intro">
                                <h1>Monitor Sales</h1>
                                <p>Account Executive Ranking</p>
                                <a class="btn vira-btn" href="ranking.php">Click Here</a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <div id="charts" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

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

        <script src="assets/js/jquery-3.1.1.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="https://use.fontawesome.com/55b73bf748.js"></script>
        <script src="assets/js/jquery.magnific-popup.js"></script>
        <script src="assets/js/script.js"></script>


        <script type="text/javascript" src="js/salesList.js"></script>
        <script type="text/javascript" src="js/totalSales.js"></script>
        <script type="text/javascript" src="js/charts.js"></script>
        <!-- <script type="text/javascript" src="js/ranking.js"></script> -->

        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>

           </body>
        
   </html>


