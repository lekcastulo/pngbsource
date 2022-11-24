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
<title>PNGB Deposits</title>
<link href="components/bootstrap/dist/css/bootstrap.min.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/index.css"/>
<link rel="shortcut icon" type="image/x-icon" href="assets/images/logo.png"/>
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/bootstrap-theme.min.css" rel="stylesheet">
<link href="assets/css/owl.carousel.css" rel="stylesheet">
<link href="assets/css/owl.theme.default.min.css" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="/css/jsgrid.css" />
<link type="text/css" rel="stylesheet" href="/css/theme.css" />  
<link href="assets/css/magnific-popup.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet"> 
<link rel="stylesheet" type="text/css" media="print" href="/css/print.css" />  

</head>
<?php
/* select the names of the login from the database */
               $member_id=$_SESSION["logged"];    

               if ($member_id == ''){
                   header("location:index.php");
                   die;
               }

               if (!(($member_id == '29') || ($member_id == '108'))){
             
  // header("location:index.php");
  die; }
       
?>      
<body>
<div id="menu-item" class="menu-item hide-menu">
            <div class="container">
                <ul>
                    <a href="salesreport.php"><li>Home</li></a>
                    <a href="iteminventory.php"><li> Item Inventory</li> </a>
<a href="totalitem.php"><li>Total Items</li> </a>
                    <a href="deposits.php"><li>Deposits Transactions</li> </a>
                    <a href="logout.php"><li>Logout</li></a>
                </ul>
            </div>
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


  <!-- IMAGE POPUP -->

<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-body">
        <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <h4 class="modal-title">Deposit image</h4>
        </div>
            <img src="" class="img-responsive">
        </div>
    </div>
  </div>
</div>


<!-- ADD NEW DEPOSIT ENTRY -->
<div class="modal fade" id="addDepositModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" syle="z-index=2; position: relative;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="addDepositModalLabel">Add New</h4>
      </div>
      <div class="modal-body deposit-modal">
        <form id="addDepositForm" enctype="multipart/form-data">
          <div class="form-group">
            <label for="deposit-amount" class="control-label">Amount:</label>
            <input name="deposit_amount" type="text" class="form-control" id="deposit-amount" required>
          </div>

          <div class="form-group">
            <label for="deposit-date" class="control-label">Date:</label>
            <input name="deposit_date" type="text" class="form-control" id="deposit-date" required>
          </div>

          <div class="form-group">
            <label for="deposit-image" class="control-label">Image:</label>
            <input name="deposit_image" type="file" class="form-control" id="deposit_image" accept="image/*">
          </div>

          <div class="form-group">
            <label for="message-text" class="control-label">Note:</label>
            <textarea class="form-control" id="deposit-note" name="deposit_note"></textarea>
          </div>
        
      </div>
      <div class="modal-footer">
        <input type="hidden" name="member_id" value="<?php echo $_SESSION['logged']; ?>">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- END - ADD NEW DEPOSIT ENTRY -->


<!-- DEPOSIT LIST -->
        <div class="container" style=" background-color: #f0f0f0; text-align: center; padding: 10px; z-index: 3;">
          <div class="row">
            <div class="col-md-12"> 
                <div id="success-message" class="alert fade in alert-dismissible" style="margin-top:18px; display: none;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                    <span></span>
                </div>
            </div>
            <div class="col-md-12">
              <h3><b>Deposits</b></h3>
              <div class="container">
               <div class="row">
                <div class="input-daterange" id="datepicker" >
                    <div class="form-group">
                    <label for="email">Date Range: </label>
                    <input type="text" class="input-small" name="dateFrom" placeholder="Date From" />
                    <input type="text" class="input-small" name="dateTo" placeholder="Date To" />
                    <div>
                    <div class="form-group">
                    <label>Member:</label>
                    <select id="members_filter">
                    </select>
                    </div>
                   
                    <button id="filterdate" type="submit" class="btn btn-danger btn-lg"  name="sum">Filter</button>&nbsp;
                    <button id="printpage" type="button" class="btn btn-primary btn-lg" name="print"><span class="glyphicon glyphicon-print"></span> Print</button>
             
                </div>

                <input type="hidden" name="member_id" id="member_id" value="<?php echo $member_id ?>" />
                <input type="hidden" id="media_p" value="browseme" />

              
              </div>
            </div>

<div class="container">
          <div class="row">
           
          <div class="col-md-12">
            
             <div id="jsGrid" style="margin-top:30px;"><strong>No records found</strong></div>
             
             <div id="totalDeposits" clas="pull-right">
                Total Amount: <span class="totalAmount">0.00</span>
             </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>


<!-- back button -->
          <div class="row" style="z-index:2; clear: left;">
            <div class="col-md-12" style=" margin-top: 20px;">
              <a class="btn btn-success" href="home.php"> Back to Home </a>

           </div>
          </div>

        
        <br>
        <br>
   </div>
  </div>
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
            
            .deposit-modal .form-group {
                text-align: left !important;
            }

            #totalDeposits {
              padding: 15px;
              font-weight: bold;
              text-align: right;
              font-size: 16px;
              text-transform: uppercase;
              background: #ccc;
              display: none;
            }

            .jsgrid-header-cell  {
                text-transform: uppercase;
            }

            input[type="text"], select {
              height: 30px;
            }
            .form-group {
              padding: 10px;
            }



            /*


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

     <!--        <script type="text/javascript">
              $('.datepicker').datepicker({
                  format: 'yyyy-mm-dd',
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
            <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
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
        </div>

        <!-- <script src="assets/js/jquery-3.1.1.js"></script> -->
        <script type="text/javascript" src="dist/jsgrid.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="https://use.fontawesome.com/55b73bf748.js"></script>
        <script src="assets/js/jquery.magnific-popup.js"></script>
        <script src="assets/js/script.js"></script>
         <script type="text/javascript" src="../js/jquery.validate.js"></script>
        <script type="text/javascript" src="js/userDeposits.js"></script>

           </body>
        
   </html>
