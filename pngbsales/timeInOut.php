<?php

	session_start();
	include 'connection.php'; /* connect to database */
	include 'function.php'; /* im not sure what is this but i think it gets the info of the member that logged in */
?>




<style type="text/css">

	body#timeInOut {
		background-color: #424242;
		margin-top: 10vh;
		text-align: center;
		padding: 20px;
	}


	button.pngb-large-btn,
	input[type=submit].pngb-large-btn {
		width: 90%;
		height: 50px;
		max-width: 200px;
	}

	div#loadingOverlay {
		display: none;
		position: fixed;
		top: 0px;
		left: 0px;
		height: 100vh;
		width: 100vw;
		background-color: rgba(0, 0, 0, 0.4);
		color: #FFFFFF;
	}

	div#loadingOverlay #uploadingText {
		text-align: center;
		margin-top: 25vh;
	}

</style>












<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="components/bootstrap/dist/css/bootstrap.min.css">
	<title>PNGB Sales</title>
</head>
<body id="timeInOut">
	
	<div id="loadingOverlay">
		<h2 id="uploadingText">Uploading...</h2>
	</div>

	<!-- logo here -->
	<img src="images/logo.png">

	<br><br>


	<!-- form -->
	<!-- <form name="timeInOutForm" action="timeInOutUpload.php" method="post" enctype="multipart/form-data"> -->
	<form name="timeInOutForm" method="post">
		<input type="file" name="file" accept="image/*" capture="camera" style="display:none;" /> <!-- hidden file input, just trigger this by a button click -->
		<input type="submit" name="submit" value="Submit Form" style="display:none" /> <!-- hidden form submit button -->
		<input type="text" name="timeType" style="display:none" /> <!-- hidden timeType text input, timeIn or timeOut value -->

		
		<!-- displayed buttons that will trigger the hidden file inputs -->
		<button name="timeIn" class="btn btn-success pngb-large-btn">Time In</button>
		<br><br>
		<button name="timeOut" class="btn btn-danger pngb-large-btn">Time Out</button>

		<br><br><br><br>
		<button name="backToHome" class="btn btn-primary pngb-large-btn">Back to Home</button>
		
	</form>
	
	

	<!-- JAVASCRIPT FILES -->
	<script type="text/javascript" src="components/jquery/dist/jquery.min.js"></script>
</body>
</html>








<script type="text/javascript">
(function() {
	$(document).ready(function() {

		// redirect to home page if the user is not using mobile phone
		var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
		if (!isMobile) {
			alert('Time in and time out features are exclusive for phones only!');
			window.location.href = 'home.php';
		}

		// time in button event
		$('button[name=timeIn]').click(function(e) {
			$('input[type=file][name=file]').click();
			$('input[type=text][name=timeType]').val('timeIn');
			return false;
		});
		
		
		// time out button event
		$('button[name=timeOut]').click(function(e) {
			$('input[type=file][name=file]').click();
			$('input[type=text][name=timeType]').val('timeOut');
			return false;
		});


		// go back to home page
		$('button[name=backToHome]').click(function(e) {
			window.location.href = 'home.php';
			return false;
		});


		// abangan natin yung pag "change" nung input[type=file][name=file], meaning magfifire eto once mapalitan ang value nya
		$('input[type=file][name=file]').change(function(e) {

			getBase64Image(this.files[0], function(base64Image) {
				resizeBase64Image(base64Image, 200, null).then(function(response) {
					var timeType = $('input[type=text][name=timeType]').val();
					resizedBase64Image = response[0].src;
					submitForm(timeType, resizedBase64Image);
				});
			});
		});




		function getBase64Image(file, onLoadCallback) {
			var fileReader = new FileReader();
			fileReader.readAsDataURL(file);

			fileReader.onload = function() {
				onLoadCallback(fileReader.result);
			};

			fileReader.onerror = function() {
				alert('An error occured, please try again.');
			};
		}




		function resizeBase64Image(base64Image, width, height) {
			var canvas = document.createElement('canvas');
			var context = canvas.getContext('2d');
			
			var deferred = $.Deferred();
			
			$('<img/>').attr('src', base64Image).load(function() {
				height = (!height) ? (width/this.width) * this.height : height;
				width = (!width) ? (height/this.height) * this.width : width;

				canvas.width = width;
				canvas.height = height;
				// alert(width+' = '+height+' | '+this.width+' = '+this.height);
				context.drawImage(this, 0, 0, width, height); 
				deferred.resolve($('<img/>').attr('src', canvas.toDataURL()));               
			});
			
			return deferred.promise();
		}




		function submitForm(timeType, base64Image) {
			$('div#loadingOverlay').css('display', 'block'); /* show loading overlay */			
			$.post('timeInOutUpload.php', { timeType: timeType, base64Image: base64Image }, function(response) {
				alert('Upload successful!');
				window.location.href = 'home.php';
			});
		}
			
	});
})();
</script>










	






























