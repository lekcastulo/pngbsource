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

<!-- <body> -->




<!-- <div class="userName pull-right" style="color: yellow; margin-top: 0px;"> -->

<?php
	$member_id=$_SESSION["logged"];	

	if ($member_id == ''){
		header("location:index.php");
		die;
	}

	if ($member_id != '28'){
		die; 
	}
?>		







<!-- <a href="logout.php"> Logout </a> -->


<body>
<div id="menu-item" class="menu-item hide-menu">
            <div class="container">
                <ul>
                    <!-- <a href="home.php"><li>home</li></a> -->
                    <a href="iteminventory.php"><li>Item Inventory</li></a>
                    <a href="salesreport.php"><li>Monitor Sales by Date</li></a>
                    <a href="salesReportCollection.php"><li>Monitor Sales by O.R.</li></a>
                    <a href="edit.php"><li>Edit Sales</li></a>
                    <a href="inhousereseller.php"><li>Customer I.R. Tracker</li></a>
                    <a href="totalitems.php"><li>Total Items</li></a>
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
	 



	<h3><b>Member Schedules</b></h3>


	<br>	

	<div id="memberScheduleGrid"></div>

	<br><br>
 
<br><br>
<a href="home.php" class="btn btn-success">Back to options </a> <br>







</div>
</div>
</div>


<br>
<br>








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
<script src="assets/vendor/jsgrid-1.5.3/dist/jsgrid.js"></script>
<script src="assets/vendor/wvega-timepicker/jquery.timepicker.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/jquery.magnific-popup.js"></script>
<script src="assets/js/script.js"></script>
<script src="assets/js/moment/min/moment.min.js"></script>



</body>

</html>




<script type="text/javascript">
	$(document).ready(function() {

		$('button[name=search]').click(function() {
			getActiveSchedules();
		});



		function getActiveSchedules() {
			var scheduleList = [];

			$.post('backend/controllers/memberSchedule.php', { requestType: 'getAllActiveSchedules' }, function(data){
				scheduleList = JSON.parse(data);
				renderScheduleListData(scheduleList);
			});

		}
		
		
		
		
		function renderScheduleListData(scheduleList) {
			$('#memberScheduleGrid').jsGrid({
				width: '100%',
				editing: true,
				sorting: true,
				data: scheduleList,
				fields: [
					{ title: 'Name', name: 'memberName', type: 'text' },
					{ title: 'Start Time', name: 'startTime', type: 'text' },
					{ title: 'End Time', name: 'endTime', type: 'text' },
					{ type: 'control', deleteButton: false },
				],
				onItemUpdated: function(data) {
					updateMemberSchedule(data.item);
				},
				editRowRenderer: editRowRenderer,
			});
		}





		function updateMemberSchedule(newScheduleData) {
			$.post('backend/controllers/memberSchedule.php', { requestType: 'updateMemberSchedule', newScheduleData: newScheduleData }, function(data){
				console.log(data);
				alert('New schedule was saved successfully!');
				getActiveSchedules(); /* refresh schedule grid */
			});
		}




		function editRowRenderer(item) {
			var grid = this;
			var memberName = item.memberName;
			var startTimePicker = $('<input readonly>').val(item.startTime).timepicker({ timeFormat:'H:mm', scrollbar:true });
			var endTimePicker = $('<input readonly>').val(item.endTime).timepicker({ timeFormat:'H:mm', scrollbar:true });
			var updateButton = $('<input>').attr('type', 'button').addClass('jsgrid-button jsgrid-update-button');
			var cancelButton = $('<input>').attr('type', 'button').addClass('jsgrid-button jsgrid-cancel-button');

			updateButton.on('click', function() {
				grid.updateItem(item, { startTime: startTimePicker.val(), endTime: endTimePicker.val() });
			});

			cancelButton.on('click', function() {
				grid.cancelEdit();
			});

			var markup = $('<tr></tr>');
			markup.append('<td class="jsgrid-cell">'+item.memberName+'</td>');
			markup.append($('<td class="jsgrid-cell"></td>').append(startTimePicker));
			markup.append($('<td class="jsgrid-cell"></td>').append(endTimePicker));
			markup.append($('<td class="jsgrid-cell"></td>').append(updateButton).append(cancelButton));

			return markup;
		}
		
		
		
		
		
		// run these function on page load
		getActiveSchedules();
	});
</script>