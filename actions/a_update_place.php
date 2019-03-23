<?php

require_once 'db_connect.php';

if($_POST){
	$id = $_POST['id'];
	$itemname = mysqli_real_escape_string($conn, $_POST['itemname']);
	$itemtype = mysqli_real_escape_string($conn, $_POST['itemtype']);
	$itemdescr = mysqli_real_escape_string($conn, $_POST['itemdescr']);
	$itemweb = mysqli_real_escape_string($conn, $_POST['itemweb']);
	$itemloc = mysqli_real_escape_string($conn, $_POST['itemloc']);
	$sql = "UPDATE places SET placeName = '$itemname', placeType = '$itemtype', placeDescr = '$itemdescr', placeWebAddress = '$itemweb', fk_locationID = '$itemloc'WHERE placeID = {$id}";

	if($conn->query($sql) === TRUE){
		echo "<p>Updated successfully</p>";
		echo "<a href='../admin.php'><button>Home</button></a>";
	} else {
		echo "<p>Error while updating record : </p>" . $conn->error;
	}
}
?>