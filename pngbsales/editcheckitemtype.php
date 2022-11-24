 
 
 
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
<script type="text/javascript" src="components/jquery/dist/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="css/index.css"/>
<link type="text/css" rel="stylesheet" href="css/jsgrid.css" />
<link type="text/css" rel="stylesheet" href="css/theme.css" />  
<link rel="shortcut icon" type="image/x-icon" href="assets/images/logo.png"/>

<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/bootstrap-theme.min.css" rel="stylesheet">

<link href="assets/css/owl.carousel.css" rel="stylesheet">
<link href="assets/css/owl.theme.default.min.css" rel="stylesheet">

<link href="assets/css/magnific-popup.css" rel="stylesheet">

<link href="assets/css/style.css" rel="stylesheet"> 


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











<body>




<!-- SALES REPORT -->
<div class="container" style=" background-color: #fff; text-align: center; padding: 10px;">


<div class="row">
  <div class="col-md-12">
  <br><br>
  <h3><b>Edit REQUEST</b></h3>
  <br> <br>

  <h3 style="color:orange"> Item Type Change Request </h3>


  <div class="container">

<div class="jsGrid"></div>
  <br> 
</div>
</div>
</div>


<!-- back button -->
<div class="container" style=" background-color: #fff; text-align: center; padding: 10px;">
<div class="row">
<div class="col-md-12">
<a class="btn btn-success" href="editing.php"> Back </a>

</div>
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
} 
</style>

<script type="text/javascript">
$('.datepicker').datepicker({
format: 'mm/dd/yyyy',
startDate: '-3d'
});
</script>

<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
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
<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="dist/jsgrid.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
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
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="https://use.fontawesome.com/55b73bf748.js"></script>
<script src="assets/js/jquery.magnific-popup.js"></script>
<script src="assets/js/script.js"></script>



<!-- <script type="text/javascript" src="js/salesList.js"></script> -->
<script type="text/javascript" src="js/editingitemtype.js"></script> 

</body>


</html>



