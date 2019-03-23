<?php

require_once 'db_connect.php';

if($_POST){
	$id = $_POST['id'];
	$itemname = mysqli_real_escape_string($conn, $_POST['itemname']);
	$itemprice = mysqli_real_escape_string($conn, $_POST['itemprice']);
	$itemdate = mysqli_real_escape_string($conn, $_POST['itemdate']);
	$itemtime = mysqli_real_escape_string($conn, $_POST['itemtime']);
	$itemweb = mysqli_real_escape_string($conn, $_POST['itemweb']);
	$itemloc = mysqli_real_escape_string($conn, $_POST['itemloc']);
	$sql = "UPDATE events SET eventName = '$itemname', eventPrice = '$itemprice', eventDate = '$itemdate', eventTime = '$itemtime', eventWebAddress ='$itemweb', fk_locationID = '$itemloc'WHERE eventID = {$id}";

	if($conn->query($sql) === TRUE){
		echo "<p>Updated successfully</p>";
		echo "<a href='../admin.php'><button>Home</button></a>";
	} else {
		echo "<p>Error while updating record : </p>" . $conn->error;
	}
}
?>