<?php

require_once 'db_connect.php';

if($_POST){
	$id = $_POST['id'];
	$itemname = mysqli_real_escape_string($conn, $_POST['itemname']);
	$itemtel = mysqli_real_escape_string($conn, $_POST['itemtel']);
	$itemdescr = mysqli_real_escape_string($conn, $_POST['itemdescr']);
	$itemtype = mysqli_real_escape_string($conn, $_POST['itemtype']);
	$itemweb = mysqli_real_escape_string($conn, $_POST['itemweb']);
	$itemloc = mysqli_real_escape_string($conn, $_POST['itemloc']);
	$sql = "UPDATE restaurants SET restaurantName = '$itemname', restaurantTel = '$itemtel', restaurantDescr = '$itemdescr', restaurantType = '$itemtype', restaurantWebAddress = '$itemweb', fk_locationID = '$itemloc' WHERE restaurantID = {$id}";

	if($conn->query($sql) === TRUE){
		echo "<p>Updated successfully</p>";
		echo "<a href='../admin.php'><button>Home</button></a>";
	} else {
		echo "<p>Error while updating record : </p>" . $conn->error;
	}
}
?>