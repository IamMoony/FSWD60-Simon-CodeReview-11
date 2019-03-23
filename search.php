<?php require_once 'actions/db_connect.php';
session_start();
if(isset($_SESSION["user"]) == ""){
	header("Location: login.php");
	exit;
}
$res = mysqli_query($conn, "SELECT * FROM user WHERE userID =".$_SESSION['user']);
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
			<li><a href="index.php">Home</a></li>
			<li><a href="restaurant.php">Restaurants</a></li>
			<li><a href="event.php">Events</a></li>
			<li><a href="search.php">Search</a></li>
			<li><a href="">Your logged in as: <?php echo $userRow['userName']; ?></a></li>
			<li><a href="logout.php?logout">Sign Out</a></li>
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
		<div class="row row-wrapper">
			<div class="col-lg-12 col-md-6 col-sm-12 location-heading">
				<hr>
				<h2>Search</h2>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12"">
				 <form id="test">
        <div class="navbar-form" role="search">
                    <div style="width: 60%;" >
                    <input id="search" style="width: 50%;"  type="text" name="search" placeholder="Type To Search" value='' />  <i class="glyphicon glyphicon-search"></i>
                    </div>
            </div>
        </form>
            <hr>
            </div>
            <div id="content" class="row">
              
            </div>
        </div>
            <script>
// Variable to hold request
var request;
// Bind to the submit event of our form
$("#test").keyup(function(event){
   // Prevent default posting of form - put here to work in case of errors
   event.preventDefault();
   // Abort any pending request
   if (request) {
       request.abort();
   }
   // setup some local variables
   var $form = $(this);
   // Let's select and cache all the fields
   var $inputs = $form.find("input, select, button, textarea");//JULAN - always name all to be safe
   // Serialize the data in the form
   var serializedData = $form.serialize();
   // Let's disable the inputs for the duration of the Ajax request.
   // Note: we disable elements AFTER the form data has been serialized.
   // Disabled form elements will not be serialized.
   $inputs.prop("disabled", true);
   // Fire off the request to /form.php ->JULAN or the php file you are working on
   request = $.ajax({
       url: "actions/a_search.php",
       type: "post",
       data: serializedData
   });
   // Callback handler that will be called on success
   request.done(function (response, textStatus, jqXHR){
       // Log a message to the console
        document.getElementById("content").innerHTML=response;
     });
   // Callback handler that will be called on failure
   request.fail(function (jqXHR, textStatus, errorThrown){
       // Log the error to the console
       /*console.error(
           "The following error occurred: "+
           textStatus, errorThrown,jqXHR
       );*/
   });
   // Callback handler that will be called regardless
   // if the request failed or succeeded
   request.always(function () {
       // Reenable the inputs
       $inputs.prop("disabled", false);
   });
});
</script>
				
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