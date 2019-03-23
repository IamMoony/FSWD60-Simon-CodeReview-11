<?php require_once 'actions/db_connect.php';
session_start();
if(isset($_SESSION["admin"]) == ""){
	header("Location: login.php");
	exit;
}
$res = mysqli_query($conn, "SELECT * FROM user WHERE userID =".$_SESSION['admin']);
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html>

<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
	<!-- Navbar Start -->
	<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
		<ul class="nav navbar-nav">
			<li><a href="admin.php">Home</a></li>
			<li><a href="">Your logged in as: <?php echo $userRow['userName']; ?></a></li>
			<li><a href="logout.php?logout">Sign Out</a></li>
		</ul>
	</nav>
	<!-- Navbar End -->
	<!-- Hero Start -->
	<div>
		<h1>Administrator Panel</h1>
	</div>
	<!-- Hero End -->
	<!-- Container Start -->
	<div class="container">
		<!-- Container Nav Start -->
		<nav class="navbar navbar-default navbar-cont">
			<ul class="nav nav-pills nav-stacked">
				<li><a href="create_place.php">Add Place</a></li>
				<li><a href="create_restaurant.php">Add Restaurant</a></li>
				<li><a href="create_event.php">Add Event</a></li>
				<li><a href="create_event.php">Add Location</a></li>
			</ul>
		</nav>
		<!-- Container Nav End -->

		<!-- Maincontent Start -->
		<div class="row row-wrapper">
			<div class="col-lg-12 col-md-6 col-sm-12 location-heading">
				<hr>
				<h2>Places</h2>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12" id="places">
				<p hidden></p>
				<?php
				$sql = "SELECT places.placeID, places.placeName, places.placeType, places.placeWebAddress, places.placeDescr, location.locationAddress, location.locationZIPCode, location.locationCity, location.locationImage
				FROM places
				INNER JOIN location ON places.fk_locationID = location.locationID;";

				$result = mysqli_query($conn, $sql);
				$rows = $result->fetch_all(MYSQLI_ASSOC);
// Fetch Data
				foreach($rows as $val) {
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
					<a class="btn btn-danger" href="update_place.php?id='.$val["placeID"].'">Edit</a>
					<a class="btn btn-danger" href="delete_place.php?id='.$val["placeID"].'">Delete</a>
					</div>
					</div>';
				}
				// echo "</div>";
				?>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 location-heading">
				<hr>
				<h2>Restaurants</h2>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12" id="restaurants">
				<p hidden></p>
				<?php
				$sql = "SELECT restaurants.restaurantID, restaurants.restaurantName, restaurants.restaurantTel, restaurants.restaurantDescr, restaurants.restaurantType, restaurants.restaurantWebAddress, location.locationZIPCode, location.locationCity, location.locationImage
				FROM restaurants
				INNER JOIN location ON restaurants.fk_locationID = location.locationID;";

				$result = mysqli_query($conn, $sql);
				$rows = $result->fetch_all(MYSQLI_ASSOC);
// Fetch Data
				foreach($rows as $val) {
					echo '<div class="media col-lg-3 col-md-6 col-sm-12">
					<div class="media-left d-none d-sm-block">
					<hr>
					<a href='.$val["restaurantWebAddress"].'>
					<img class="media-object" src='.$val["locationImage"].'>
					</a>
					<hr>
					</div>
					<div class="media-body col-lg-12 col-md-1 col-sm-12">
					<h4 class="media-heading media-text">.'.$val["restaurantName"] .'</h4>
					<p><b>City:</b>'. $val["locationCity"] .'</p>
					<p><b>ZIP-Code:</b>'. $val["locationZIPCode"] .'</p>
					<p><b>Address:</b> <br>'. $val["locationAddress"] .'</p>
					<p><b>Tel.:</b>'. $val["restaurantTel"] .'</p>
					<p><b>Type: </b>'. $val["restaurantType"] .'</p>
					<p><b>Website: </b><a href='.$val["restaurantWebAddress"].'$</a>'.$val["restaurantName"].'</p>
					<hr>
					<a class="btn btn-danger" href="update_restaurant.php?id='.$val["restaurantID"].'">Edit</a>
					<a class="btn btn-danger" href="delete_restaurant.php?id='.$val["restaurantID"].'">Delete</a>
					</div>
					</div>';
				}
				// echo "</div>";
				?>

			</div>
			<hr>
			<div class="col-lg-12 col-md-12 col-sm-12 location-heading">
				<hr>
				<h2>Events</h2>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12" id="events">
				<p hidden></p>
				<?php
				$sql = "SELECT events.eventID, events.eventName, events.eventPrice, events.eventDate, events.eventTime, events.eventWebAddress, location.locationZIPCode, location.locationCity, location.locationImage
				FROM events
				INNER JOIN location ON events.fk_locationID = location.locationID;";

				$result = mysqli_query($conn, $sql);
				$rows = $result->fetch_all(MYSQLI_ASSOC);
// Fetch Data
				foreach($rows as $val) {
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
					<hr>
					<a class="btn btn-danger" href="update_event.php?id='.$val["eventID"].'">Edit</a>
					<a class="btn btn-danger" href="delete_event.php?id='.$val["eventID"].'">Delete</a>
					</div>
					</div>';
				}
				// echo "</div>";
				?>
			</div>
		</div>
	</div>
	<hr>
	<!-- Maincontent End -->
	<!-- Footer -->
	<footer class="page-footer font-small blue pt-4">
		<!-- Footer Links -->
		<div class="container-fluid text-center text-md-left">
			<!-- Grid row -->
			<div class="row">
				<!-- Grid column -->
				<div class="col-md-6 mt-md-0 mt-3">
					<!-- Content -->
					<h5 class="text-uppercase"><a href="https://www.codefactory.wien"><i>Everybody Can Code</i></h5>
						<img class="cf-logo" src="img/cf-logo.png" alt="CodeFactory">
					</div>
					<!-- Grid column -->
					<hr class="clearfix w-100 d-md-none pb-3">
					<!-- Grid column -->
					<div class="col-md-3 mb-md-0 mb-3">
						<!-- Links -->
						<h5 class="text-uppercase">Menu</h5>
						<ul class="list-unstyled">
							<li>
								<a href="#!">Home</a>
							</li>
							<li>
								<a href="#!">About</a>
							</li>
							<li>
								<a href="#!">Blog</a>
							</li>
							<li>
								<a href="#!">Legal Info</a>
							</li>
						</ul>
					</div>
					<!-- Grid column -->
				</div>
				<!-- Grid row -->
			</div>
			<!-- Footer Links -->
			<!-- Copyright -->
			<div class="footer-copyright text-center py-3">© 2018 Copyright:
				<br>Simon Blaha - CodeFactory 2019
				<a href="https://mdbootstrap.com/education/bootstrap/">& MDBootstrap.com</a>
			</div>
			<!-- Copyright -->
		</footer>
		<!-- Footer -->




		<!-- <script type="text/javascript" src="js/script.js"></script> -->
	</body>

	</html>