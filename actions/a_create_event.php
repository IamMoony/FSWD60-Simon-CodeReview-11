<?php
require_once 'db_connect.php';

if($_POST){
    $itemname = $_POST['itemname'];
    $itemprice = $_POST['itemprice'];
    $itemdate = $_POST['itemdate'];
    $itemtime = $_POST['itemtime'];
    $itemweb = $_POST['itemweb'];
    $itemloc = $_POST['itemloc'];

    $sql = "INSERT INTO events (eventID, eventName, eventPrice, eventDate, eventTime, eventWebAddress, fk_locationID) 
    VALUES (NULL, '$itemname', '$itemprice', '$itemdate', '$itemtime', '$itemweb', '$itemloc')";
    if($conn->query($sql) === TRUE){
     echo "<h1>New record created.</h1>";
     echo "<a href='../create_event.php'><button type='button'>Back</button></a>";
     echo "<a href='../admin.php'><button type='button'>Home</button></a>";
 } else {
     echo "<h1>Record creation error for: </h1>" . 
     "<p>" . $sql . "</p>" . ' ' . mysqli_error($conn);
 }
 mysqli_close($conn);
}

?>