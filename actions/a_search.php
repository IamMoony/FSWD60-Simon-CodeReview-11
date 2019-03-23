<?php 
// You can access the values posted by jQuery.ajax
require_once 'db_connect.php';
// through the global variable $_POST, like this:
$bar = isset($_POST['search']) ? $_POST['search'] : null;//JULAN - references to the 'Name' in the form field and puts it in a var
if(strlen($bar)>0){
  $query1 = "SELECT * FROM restaurants 
  INNER JOIN `location` ON restaurants.fk_locationID = location.locationID
  WHERE restaurantName like '".$bar."%';";

  $result = mysqli_query($conn,$query1);
  if($result->num_rows >0){
   while($val = $result->fetch_assoc()){
    echo '<div class="media col-lg-3 col-md-6 col-sm-12">
    <div class="media-left d-none d-sm-block">
    <hr>
    <a href='.$val["restaurantWebAddress"].'>
    <img class="media-object" src='.$val["locationImage"].'>
    </a>
    <hr>
    </div>
    <div class="media-body col-lg-12 col-md-1 col-sm-12">
    <h4 class="media-heading media-text">'.$val["restaurantName"] .'</h4>
    <p><b>City:</b>'. $val["locationCity"] .'</p>
    <p><b>ZIP-Code:</b>'. $val["locationZIPCode"] .'</p>
    <p><b>Address:</b> <br>'. $val["locationAddress"] .'</p>
    <p><b>Tel.:</b>'. $val["restaurantTel"] .'</p>
    <p><b>Type: </b>'. $val["restaurantType"] .'</p>
    <p><b>Website: </b><a href='.$val["restaurantWebAddress"].'$</a>'.$val["restaurantName"].'</p>
    <hr>
    </div>
    </div>';
  }
}

}
if(strlen($bar)>0){
  $query2 = "SELECT * FROM places 
  INNER JOIN `location` ON places.fk_locationID = location.locationID
  WHERE placeName like '".$bar."%';";

  $result = mysqli_query($conn,$query2);
  if($result->num_rows >0){
   while($val = $result->fetch_assoc()){
    echo '<div class="media col-lg-3 col-md-6 col-sm-12">
          <div class="media-left">
          <hr>
          <img class="media-object d-sm-none d-md-block" src='.$val["locationImage"].'>
          </a>
          <hr>
          </div>
          <div class="media-body col-lg-12 col-md-1 col-sm-12 media-text">
          <h4 class="media-heading media-text">'. $val["placeName"] .'</h4>
          <p><b>City:</b>'. $val["locationCity"] .'</p>
          <p><b>ZIP-Code:</b>'. $val["locationZIPCode"] .'</p>
          <p><b>Address:</b><br>'. $val["locationAddress"] .'</p>
          <hr>
          </div>
          </div>';
  }
}

}
if(strlen($bar)>0){
  $query3 = "SELECT * FROM events 
  INNER JOIN `location` ON events.fk_locationID = location.locationID
  WHERE eventName like '".$bar."%';";

  $result = mysqli_query($conn,$query3);
  if($result->num_rows >0){
   while($val = $result->fetch_assoc()){
   echo '<div class="media col-lg-3 col-md-6 col-sm-12">
          <div class="media-left ">
          <hr>
          <a href="#">
          <img class="media-object" src='.$val["locationImage"].'>
          </a>
          <hr>
          </div>
          <div class="media-body col-lg-12 col-md-1 col-sm-12">
          <h4 class="media-heading media-text">'.$val["eventName"].'</h4>
          <p><b>City:</b>'. $val["locationCity"] .'</p>
          <p><b>ZIP-Code:</b>'. $val["locationZIPCode"] .'</p>
          <p><b>Address:</b>'. $val["locationAddress"] .'</p>
          <p><b>Date</b>'. $val["eventDate"] .'</p>
          <p><b>Price:</b>'. $val["eventPrice"] .'</p>
          </div>
          </div>';
  }
}

}
$conn->close();
?>