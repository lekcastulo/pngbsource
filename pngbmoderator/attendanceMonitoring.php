<?php
	session_start();
	include 'connection.php';
	include 'function.php';
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






<html>
<head>
	<meta charset="UTF-8">
	<meta name="author" content="PNGB">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/style.css" type="text/css" rel="stylesheet"/>
	<title> PNGB Sales</title>
	<link href="components/bootstrap/dist/css/bootstrap.min.css" type="text/css" rel="stylesheet">
	<link href="assets/vendor/jsgrid-1.5.3/dist/jsgrid.min.css" type="text/css" rel="stylesheet">
	<link href="assets/vendor/jsgrid-1.5.3/dist/jsgrid-theme.min.css" type="text/css" rel="stylesheet">
	<link href="assets/vendor/wvega-timepicker/jquery.timepicker.css" type="text/css" rel="stylesheet">
	<link rel="shortcut icon" type="image/x-icon" href="assets/images/logo.png"/>
	<link href="assets/css/owl.carousel.css" rel="stylesheet">
	<link href="assets/css/owl.theme.default.min.css" rel="stylesheet">
	<link href="assets/css/magnific-popup.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
</head>


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





<body>
<div id="menu-item" class="menu-item hide-menu">
<div class="container">
	<ul>
		<!-- <a href="home.php"><li>home</li></a> -->
                    <a href="salesreport.php"><li>Monitor Sales by Date</li></a>
                    <a href="salesReportCollection.php"><li>Monitor Sales by O.R.</li></a>
                    <a href="ranking.php"><li>Ranking</li></a>
                    <!-- <a href="attendanceMonitoring.php"><li> Attendance Monitoring</li> </a> -->
                    <!-- <a href="attedanceSummary.php"><li> Attendance Summary</li> </a> -->
                    <a href="manageMemberSchedules.php"><li> Manage Schedule</li> </a>
                    <a href="iteminventory.php"><li> Items Overall Summary</li> </a>
                    <a href="inhousereseller.php"><li> Inhouse Reseller</li> </a>


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


  <br>    





 <div class="container">
<div class="row">
  <div class="col-md-6 col-md-offset-3">



	<div class="input-daterange" id="datepicker" >


	   <input type="hidden" name="accountnameid" value="<?php echo $member_id ?>" /> <!-- im not sure if this line of code has a purpose hahahaha -->

		<input type="text" class="input-small" name="date" placeholder="Date" />

		<!-- <input type="text" class="input-small" name="dateTo" placeholder="Date To" /> -->
		<!-- <input type="hidden" name="id" value="<?php echo $member_id ?>" /> -->

		<button name="search" class="btn btn-custom">Filter Date</button>
		

		<br>
		<br>
	</div>
</div>
</div>
</div>

	
	<div id="attendanceMonitoringGrid"></div>
	<br><br>
	<a href="home.php" class="btn btn-success">Back to options </a> <br>




</div>
</div>
</div>


<br>
<br>





<script src="assets/js/jquery-3.1.1.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
<script src="assets/vendor/jsgrid-1.5.3/dist/jsgrid.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/jquery.magnific-popup.js"></script>
<script src="assets/js/script.js"></script>
<script src="assets/js/moment/min/moment.min.js"></script>


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

<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/jquery.magnific-popup.js"></script>
<script src="assets/js/script.js"></script>
<script src="assets/js/moment/min/moment.min.js"></script>



</body>

</html>




<script type="text/javascript">
	$(document).ready(function() {

		// initialized date datepicker with default today value
		$('input[type=text][name=date]').datepicker({
			format: 'yyyy-mm-dd',
			todayBtn: 'linked',
			autoclose: true,
		}).val(moment().format('YYYY-MM-DD'));


		$('button[name=search]').click(function() {
			getAttendanceRecords();
		});

		
		



		function getAttendanceRecords() {
			var date = $('input[type=text][name=date]').val();
			var memberList = [];
			var attendanceList = [];

			$.post('backend/controllers/member.php', { requestType: 'getMembers' }, function(data){
				memberList = JSON.parse(data);

				$.post('backend/controllers/memberTimeRecord.php', { requestType: 'getTimeRecordsByDate', date: date }, function(data){
					attendanceList = JSON.parse(data);
					renderAttendanceData(attendanceList, memberList);
				});
			});

		}
		
		
		
		
		function renderAttendanceData(attendanceList, memberList) {
			// process merge attendanceList with memberList, make sure to show all member time records then show the remaining members with no data
			var memberIdWithAttendanceData = [];
			var processedAttendanceList = [];
			$.each(attendanceList, function(index, attendance) {
				memberIdWithAttendanceData.push(attendance.member_id);
				processedAttendanceList.push(attendance);
			});

			$.each(memberList, function(index, member) {
				if(memberIdWithAttendanceData.indexOf(member.member_id) > -1) {
					// dont show members that has attendance data
				} else {
					processedAttendanceList.push({ id: null, memberScheduleId: null, timeIn: 'Invalid date', timeOut: 'Invalid date', date: '', photoTimeIn: '', photoTimeOut: '', memberName: member.firstname+' '+member.secondname });
				}
			});

			
			// initialize jsgrid
			$('#attendanceMonitoringGrid').jsGrid({
				width: '100%',
				editing: false,
				sorting: true,
				data: processedAttendanceList,
				fields: [
					{ title: 'Name', name: 'memberName', type: 'text' },
					{ title: 'Time In', name: 'timeIn', type: 'text' },
					{ title: 'Time Out', name: 'timeOut', type: 'text' },
				],
				rowRenderer: rowRenderer,
			});
		}





		function rowRenderer(item) {
			var row = $('<tr></tr>');
			var cellMemberName = $('<td class="jsgrid-cell">'+item.memberName+'</td>');
			var cellTimeIn = '';
			var cellTimeOut = '';
			var timeIn = moment(item.timeIn).format('MMM DD, YYYY hh:mm A');
			var timeOut = moment(item.timeOut).format('MMM DD, YYYY hh:mm A');

			// html for timeIn
			if(timeIn == 'Invalid date') {
				cellTimeIn = $('<td class="jsgrid-cell text-center">No Data</td>');
			} else {
				cellTimeIn = $('<td class="jsgrid-cell attendanceThumbnail">'+timeIn+'<br><img src="pngbsales/photos/'+item.photoTimeIn+'" /></td>');
			}

			// html for timeOut
			if(timeOut == 'Invalid date') {
				cellTimeOut = $('<td class="jsgrid-cell text-center">No Data</td>');
			} else {
				cellTimeOut = $('<td class="jsgrid-cell attendanceThumbnail">'+timeOut+'<br><img src="pngbsales/photos/'+item.photoTimeOut+'" /></td>');
			}
			
			return $(row).append(cellMemberName).append(cellTimeIn).append(cellTimeOut);
		}
		
		
		
		
		
		
		// run these function on page load
		getAttendanceRecords();
	});
</script>