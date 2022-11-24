   <?php

              session_start();
               include("connection.php"); // connect to the database
                include("function.php");
              
             
            
              ?>

    <html xmlns="http://www.w3.org/1999/xhtml">
      <head>
    <meta charset="UTF-8">
    <meta name="author" content="PNGB">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" type="text/css" rel="stylesheet"/>
    <title> PNGB Sales - Remaining Grams</title>
    <link href="components/bootstrap/dist/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="components/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/index.css"/>
   </head>

         <body>

    <style type="text/css">
      body {
    background-image: url("http://www.powerpointhintergrund.com/uploads/2017/05/free-strass-vector-gold-glitter-texture-on-black-background--7.jpeg");
    width: 100%;
}

    </style>

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
<?php  
 $members_q = mysqli_query($connection,"SELECT * FROM `member` WHERE 1");
  
?>
        <div class="container" style=" background-color: #f0f0f0; text-align: center; padding: 10px;">


          <div class="row">
            <div class="col-md-12">
              <h3><b>Remaining Grams</b></h3>



             <div class="container">
            <div class="row">
              <!--<div class="col-md-6 col-md-offset-3">


                <div class="form-group">
                <label for="accountname">Account Name</label><br>
                <select class="selectpicker show-menu-arrow form-control" id="accountnameid" name="accountnameid">
                  <?php  
                  //$members_q = mysqli_query($connection,"SELECT * FROM `member` WHERE 1");
                 // while($row = mysqli_fetch_array($members_q)) { 
                                
                  ?>
                    <!-- <option value="<?php echo $row['member_id']; ?>"><?php echo $row['firstname']; ?> <?php echo $row['secondname']; ?></option>--> 
                  <?php //} ?>
                <!--</select>
                </div>           -->
                
                <!--<div class="input-daterange" id="datepicker" >


                   <label for="email">Date Range</label><br>
                   <input type="hidden" name="id" value="<?php echo $member_id ?>" />

                    <input type="text" class="input-small" name="dateFrom" placeholder="Date From" />
                    <span class="add-on" style="vertical-align: top;height:20px"> - </span>

                    <input type="text" class="input-small" name="dateTo" placeholder="Date To" />
                    <input type="hidden" name="id" value="<?php echo $member_id ?>" />
            
                    <br>
                    <br>
                    <button type="submit" class="btn btn-custom" value="login" name="sum">Filter Date</button>
                    

                    <br>
                    <br>
                </div>     -->
            </div>
            </div>
            </div>

            <div class="col-md-4 col-md-offset-4">

              <h3 name="memberID"> </h3>
              <table class="table">
                <thead style="color: orange;">
                  <tr style="text-align: center;">
                    <th>Name</th>
                    <th>Remaining Grams</th>
                
                  </tr>
                </thead>
                <tbody name="itemsSummary">
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





            </div>


           </div>
          </div>
        </div>


<!-- back button -->
        <div class="container" style=" background-color: #f0f0f0; text-align: center; padding: 10px;">
          <div class="row">
            <div class="col-md-12">
              <a class="btn btn-success" href="home.php"> Back to Home Page </a>

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

  <!--           <script type="text/javascript">
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
<!-- 
            <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
            <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script> -->
            <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
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

	<script type="text/javascript" src="js/total.js </script>"
        <!-- Load jQuery and bootstrap datepicker scripts -->
        <!-- <script src="js/jquery-1.9.1.min.js"></script> -->
        <!-- <script src="js/bootstrap-datepicker.js"></script> -->
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
        </script>
	 <script type="text/javascript" src="js/total.js"></script>
        <script type="text/javascript" src="remaininggrams.js"></script>
	   <!-- <script type="text/javascript" src="js/totalitems.js"></script> -->
           </body>
        
   </html>

