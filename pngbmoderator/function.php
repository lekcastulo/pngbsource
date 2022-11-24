<?php
include("connection.php");
if(isset($_SESSION["SESS_MEMBER_ID"])) {
	$result = mysqli_query($connection, "SELECT member_id FROM `member` WHERE `member_id`='".$_SESSION["SESS_MEMBER_ID"]."' LIMIT 1");

	if(mysqli_num_rows($result)) {
		$row = mysqli_fetch_array($result);
		$_SESSION["logged"] = $row["member_id"];
	}
}
?>