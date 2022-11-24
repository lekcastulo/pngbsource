   <html>
	
	<head>
		<meta charset="UTF-8">
		<meta name="author" content="PNGB">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- <link href="css/style.css" type="text/css" rel="stylesheet"/> -->
		<title> PNGB Sales</title>
		<link href="components/bootstrap/dist/css/bootstrap.min.css" type="text/css" rel="stylesheet">
		<script type="text/javascript" src="components/jquery/dist/jquery.min.js"></script>

	</head>
   
   <?php
    //Start session
    session_start();	
    //Unset the variables stored in session
    unset($_SESSION['SESS_MEMBER_ID']);
    unset($_SESSION['SESS_FIRST_NAME']);
    unset($_SESSION['SESS_LAST_NAME']);
   
   ?>
 
   	<body style="background-color:#000;">
   	<style type="text/css">
   		body {
    background-image: url("https://www.powerpointhintergrund.com/uploads/2017/05/free-strass-vector-gold-glitter-texture-on-black-background--7.jpeg");
    width: 100%;
}

   	</style>
		<div class="container"> 
		<br>
		<br>
			<center> <img src="images/logo.png"> 
			 <h2 style="color: grey;"> Shipping Reports Portal</h2>

			</center>
			<div class="row row-centered">
			   <div class="col-md-4 col-centered">
				    <div class="formLogin"">
						<form name="loginform" action="loginscript.php" method="post">
								<?php
		              
		        			  if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
		                      echo '<ul class="err">';
		                      foreach($_SESSION['ERRMSG_ARR'] as $msg) {
		                      echo '<li>',$msg,'</li>';
		                      
							    }
		                       echo '</ul>';
		                       
							   unset($_SESSION['ERRMSG_ARR']);
		                       }
		                       
							   ?>
						  <div class="form-group">
						    <label for="exampleInputEmail1">Email</label>
						    <input type="email" class="form-control reg"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
						    <small id="emailHelp" class="form-text text-muted">You'll never share your email or password with anyone else.</small>
						  </div>
						  <div class="form-group">
						    <label for="exampleInputPassword1">Password</label>
						    <input type="password" class="form-control reg" id="exampleInputPassword1" placeholder="Password" name="password">
						  </div>
						  <button type="submit" class="btn btn-custom" value="login" id="sum">Submit</button>
						</form>
					</div>
				</div>
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
		}	</style>
	
	</body>

</html>
