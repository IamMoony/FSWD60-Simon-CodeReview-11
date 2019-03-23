<?php require_once 'actions/db_connect.php';?>
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
			<li><a href="">Home</a></li>
			<li><a href="">About</a></li>
			<li><a href="">Contact</a></li>
		</ul>
	</nav>
	<!-- Navbar End -->
	<!-- Hero Start -->
	<div class="jumbotron">
		<h1>Welcome to My Travel Blog</h1>
		<p>Find all the information you need about the best destinations, restaurants and events on the planet!</p>
		<p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
	</div>
	<!-- Hero End -->
	<!-- Container Start -->
	<div class="container">
		<!-- Container Nav Start -->
		<nav class="navbar navbar-default navbar-cont">
			<ul class="nav nav-pills nav-stacked">
				<li><a href="#places">Places</a></li>
				<li><a href="#restaurants">Restaurants</a></li>
				<li><a href="#events">Events</a></li>
			</ul>
		</nav>
		<!-- Container Nav End -->

		<!-- Maincontent Start -->
		
		<div class="col-lg-12 col-md-12 col-sm-12 location-heading">
			<hr>
			<h2>Events</h2>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12" id="events">
			<p hidden></p>
			<?php
			$sql = "SELECT events.eventName, events.eventPrice, events.eventDate, events.eventTime, events.eventWebAddress, location.locationZIPCode, location.locationCity, location.locationImage
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
				</div>
				</div>';
			}
				// echo "</div>";
			?>
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