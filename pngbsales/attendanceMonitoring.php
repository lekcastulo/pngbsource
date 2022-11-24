 
 
 
  <?php

              session_start();
               include("connection.php"); // connect to the database
                include("function.php");
              
             
            
              ?>




  <style type="text/css">
  .row-centered {
    text-align:center;
  }

  .col-centered {
    display:inline-block;
    float:none;
    text-align:left;
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
  }

  td.attendanceThumbnail {
    text-align: center;
  }
  
  td.attendanceThumbnail img {
    height: 100px;
  }
</style>


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


<!-- Attendance Reviewer Start here -->

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
   



  <h3><b>Attendance Monitoring</b></h3>
  <!-- <h4 style="color: red;"><b>(Account Executive)</b></h4> -->


  <br>    





 <div class="container">
<div class="row">
  <div class="col-md-6 col-md-offset-3">



  <div class="input-daterange" id="datepicker" >


     <input type="hidden" name="accountnameid" value="<?php echo $member_id ?>" /> <!-- im not sure if this line of code has a purpose hahahaha -->

    <input type="text" class="input-small" name="dateFrom" placeholder="Date" />

    <!-- <input type="text" class="input-small" name="dateTo" placeholder="Date To" /> -->
    <!-- <input type="hidden" name="id" value="<?php echo $member_id ?>" /> -->

    <button name="search" class="btn btn-custom">Filter Date</button>
    

    <br>
    <br>
  </div>
</div>
</div>
</div>
<div class="postInventory">
<div class="col-md-4 col-md-offset-4">


  <table class="table text-centered">
  <thead>
    <tr style="text-align: center; color: orange;">
    
    <th>Name</th>
    <th>Time In</th>
    <th>Time Out</th>


    </tr>
  </thead>
  <tbody name="attendanceList">
  </tbody>
  </table>

 

<a href="home.php" class="btn btn-success">Back to options </a> <br>




</center>
</div>
</div>
</center>




</div>
</div>
</div>


<br>
<br>


<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>

<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="https://use.fontawesome.com/55b73bf748.js"></script>
<script src="assets/js/jquery.magnific-popup.js"></script>
<script src="assets/js/script.js"></script>
<script src="assets/js/moment/min/moment.min.js"></script>





           </body>
        
   </html>


<script type="text/javascript">
  $(document).ready(function() {

    // initialized dateFrom datepicker with default today value
    $('input[type=text][name=dateFrom]').datepicker({
      format: 'yyyy-mm-dd',
      todayBtn: 'linked',
      autoclose: true,
    }).val(moment().format('YYYY-MM-DD'));


    // initialized dateTo datepicker with default today value
    // $('input[type=text][name=dateTo]').datepicker({
    //  format: 'yyyy-mm-dd',
    //  todayBtn: 'linked',
    //  autoclose: true,
    // }).val(moment().format('YYYY-MM-DD'));


    $('button[name=search]').click(function() {
      getAttendanceRecords();
    });

    
    



    function getAttendanceRecords() {
      var dateFrom = $('input[type=text][name=dateFrom]').val();
      // var dateTo = $('input[type=text][name=dateTo]').val();
      var memberList = [];
      var attendanceList = [];

      $.post('backend/controllers/member.php', { requestType: 'getMembers' }, function(data){
        memberList = JSON.parse(data);

        $.post('backend/controllers/memberTimeRecord.php', { requestType: 'getTimeRecordsByDateRange', dateFrom: dateFrom }, function(data){
          attendanceList = JSON.parse(data);
          renderAttendanceData(attendanceList, memberList);
        });
      });

    }
    
    
    
    
    function renderAttendanceData(attendanceList, memberList) {
      var membersWithAttendanceData = [];
      var tbodyMarkUp = '';
      $('tbody[name=attendanceList]').html('');

      
      // plot attendanceList with time data
      // and also generate an array of member_id that has timeIn or timeOut records
      $.each(attendanceList, function(index, attendance) {
        membersWithAttendanceData.push(attendance.member_id);
        var timeIn = moment(attendance.timeIn).format('MMM DD, YYYY hh:mm A');
        var timeOut = moment(attendance.timeOut).format('MMM DD, YYYY hh:mm A');
        var timeInMarkup = '';

        // Time In
        if(timeIn == 'Invalid date') {
          timeInMarkup = '<td>No Data</td>';
        } else  {
          timeInMarkup = '<td class="attendanceThumbnail">'+timeIn+'<br><img src="/photos/'+attendance.photoTimeIn+'" />'+'</td>';
        }

        // Time Out
        if(timeOut == 'Invalid date') {
          timeOutMarkup = '<td>No Data</td>';
        } else  {
          timeOutMarkup = '<td class="attendanceThumbnail">'+timeOut+'<br><img src="/photos/'+attendance.photoTimeOut+'" />'+'</td>';
        }
        
        tbodyMarkUp += '<tr>'
        +         '<td>'+attendance.firstname+' '+attendance.secondname+'</td>'
        +         timeInMarkup
        +         timeOutMarkup
        +       '</tr>';
      });


      $.each(memberList, function(index, member) {
        if(membersWithAttendanceData.indexOf(member.member_id) == -1) {
          tbodyMarkUp += '<tr> <td>'+member.firstname+' '+member.secondname+'</td>  <td>No Data</td>  <td>No Data</td> </tr>';
        }
      });


      

      $('tbody[name=attendanceList]').html(tbodyMarkUp);
    }
    
    
    
    
    
    // run these function on page load
    getAttendanceRecords();
  });
</script>
