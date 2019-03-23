<?php
require_once 'db_connect.php';

if($_POST){
    $itemname = $_POST['itemname'];
    $itemtel = $_POST['itemtel'];
    $itemdescr = $_POST['itemdescr'];
    $itemtype = $_POST['itemtype'];
    $itemweb = $_POST['itemweb'];
    $itemloc = $_POST['itemloc'];

    $sql = "INSERT INTO restaurants (restaurantID, restaurantName, restaurantTel, restaurantDescr, restaurantType, restaurantWebAddress, fk_locationID) 
    VALUES (NULL,'$itemname', '$itemtel', '$itemdescr', '$itemtype', '$itemweb', '$itemloc')";
    if($conn->query($sql) === TRUE){
     echo "<h1>New record created.</h1>";
     echo "<a href='../create_restaurant.php'><button type='button'>Back</button></a>";
     echo "<a href='../admin.php'><button type='button'>Home</button></a>";
 } else {
     echo "<h1>Record creation error for: </h1>" . 
     "<p>" . $sql . "</p>" . ' ' . mysqli_error($conn);
 }
 mysqli_close($conn);
}

?>