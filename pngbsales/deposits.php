<?php
session_start();
include("../connection.php"); // connect to the database
include("../function.php");
?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
<meta name="author" content="PNGB">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PNGB Deposits</title>
<link href="css/style.css" type="text/css" rel="stylesheet"/>
<link type="text/css" rel="stylesheet" href="/css/jsgrid.css" />
<link type="text/css" rel="stylesheet" href="/css/theme.css" />  
<link href="/components/bootstrap/dist/css/bootstrap.min.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" type="text/css" media="print" href="/css/print.css" />  

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
<div class="modal fade" id="addDepositModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
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
            <input name="deposit_image" type="file" class="form-control" id="deposit_image" accept="image">
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
        <div class="container" style=" background-color: #f0f0f0; text-align: center; padding: 10px;">
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
                    <label for="email">Date Range: </label>
                    <input type="text" class="input-small" name="dateFrom" placeholder="Date From" />
                    <input type="text" class="input-small" name="dateTo" placeholder="Date To" />
                    <br/>
                    <br/>
                    <button id="filterdate" type="submit" class="btn btn-danger btn-lg"  name="sum">Filter Date</button>&nbsp;
                    <button id="printpage" type="button" class="btn btn-primary btn-lg" name="print"><span class="glyphicon glyphicon-print"></span> Print</button>
             
                </div>

                <input type="hidden" name="member_id" id="member_id" value="<?php echo $member_id ?>" />
                <input type="hidden" id="media_p" value="browseme" />

              
              </div>
            </div>

<div class="container">
          <div class="row">
            <div class="col-md-6" style="margin-top: 30px;">
            <button type="button" class="btn btn-primary btn-sm pull-left" data-toggle="modal" data-target="#addDepositModal" data-whatever="add-modal"><span class="glyphicon glyphicon-plus"></span> Add New</button>
            </div>
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

  
            <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
            <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
            <script type="text/javascript" src="dist/jsgrid.js"></script>
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

                $('#deposit-date').datepicker({
                    format: "yyyy-mm-dd",
                   
                });
            </script>


        <!-- Load jQuery and bootstrap datepicker scripts -->
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

        <script type="text/javascript" src="js/jquery.validate.js"></script>
        <script type="text/javascript" src="js/userDeposits.js"></script>
            

  </body>
   </html>

