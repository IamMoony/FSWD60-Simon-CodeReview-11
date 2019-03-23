<?php
require_once 'db_connect.php';

if($_POST){
    $itemname = $_POST['itemname'];
    $itemtype = $_POST['itemtype'];
    $itemdescr = $_POST['itemdescr'];
    $itemweb = $_POST['itemweb'];
    $itemloc = $_POST['itemloc'];

    $sql = "INSERT INTO places (placeID, placeName, placeType, placeDescr, placeWebAddress, fk_locationID) 
    VALUES (NULL,'$itemname', '$itemtype', '$itemdescr', '$itemweb', '$itemloc')";
    if($conn->query($sql) === TRUE){
     echo "<h1>New record created.</h1>";
     echo "<a href='../create_place.php'><button type='button'>Back</button></a>";
     echo "<a href='../admin.php'><button type='button'>Home</button></a>";
 } else {
     echo "<h1>Record creation error for: </h1>" . 
     "<p>" . $sql . "</p>" . ' ' . mysqli_error($conn);
 }
 mysqli_close($conn);
}

?>