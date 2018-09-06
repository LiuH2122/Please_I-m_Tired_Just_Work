 <!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<title>Events</title>
<link href="css/index.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-4.0.0.css" rel="stylesheet" type="text/css">
<link href="css/events.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="css/theme.fonts.css">

<!-- global css -->
<link rel="stylesheet" href="css/global-style.css">
	
<link rel="stylesheet" href="css/owl.carousel.min.css">

<!--nice select css-->
<link rel="stylesheet" href="css/nice-select.css">

<!--venobox css-->
<link rel="stylesheet" href="css/venobox.css">

<!--venobox css-->
<link rel="stylesheet" href="css/slick.css">

<!-- global css -->
<link rel="stylesheet" href="css/global-style.css">
<link rel="stylesheet" href="css/asset/modal.css">
<link rel="stylesheet" href="css/asset/signup.css">
    <!-- style css -->
<link rel="stylesheet" href="css/asset/alert.css">

<link rel="stylesheet" href="css/shortcode-style.css">
<link rel="stylesheet" href="css/asset/parallax.css">
<link rel="stylesheet" href="css/asset/footer.css">
<link rel="stylesheet" href="css/asset/introBox.css">
<link rel="stylesheet" href="css/asset/buttons.css">
	
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/index.js"></script>
	<script src="js/navscroll.js"></script>
	<script src="js/bootstrap-4.0.0.js"></script>
	<script src="js/popper.min.js"></script>
	<style>
/*
		body{
			background-image: url("../img/bg.png");
			background-size:cover;
			background-attachment: fixed;

			
		}
		*/
		.navtext-color{
			font-size:18px;
		}
		.border_behavior{
			margin-top:27px;						

		}
		@media (max-width: 992px) {
			.border_behavior{
				margin-top:0px;						

			}
		}

	
	</style>
	</head>

<nav class="navbar navbar-expand-lg navbar-light fixed-top" style = "box-shadow: 0 17px 25px -22px black; background-color:#2babe2">
  <a class="navbar-brand" href="index.html"><span class= "logo"><img src="img/MHSKeyClub-white.png" width= "150";></span></a>
  <button class="navbar-toggler " style = "border-style:none;" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
	
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto">
	<div class="nav-item mr-auto">
		
        <a class="nav-link" href="#"></a>
      </div>
      <li class="nav-item active">
        <a class="nav-link navtext-color" href="index.html">Home <span class="sr-only">(current)</span></a>
		</li>
      <li class="nav-item">
        <a class="nav-link navtext-color" href="html/html/events.html">Events</a>
      </li>
	<li class="nav-item">
        <a class="nav-link navtext-color" href="#">Uhhhh</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle navtext-color" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown link
        </a>
        <div class="dropdown-menu navtext-color" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item navtext-color" href="#">Action</a>
          <a class="dropdown-item navtext-color" href="#">Another action</a>
          <a class="dropdown-item navtext-color" href="#">Something else here</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<body>
	

<div class="container mt-5 pt-5">
	<div class = "row" >
		<div class = "col-lg-3" >
			<h1>Events</h1>

		</div>
		<div class = "col-lg-9	border_behavior">
					<img src = "img/Template_KeyClub_Red-scribble-pencil-graphic.jpg.jpg" alt = "scribble" style = "width:100%;height:auto">

			</div>
	</div>
	<p class = "mt-4">	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante nisl, commodo sed odio vitae, tempor dictum sapien. Donec vitae tellus vel sapien varius hendrerit. Suspendisse non sagittis lectus. Cras vitae tristique erat, sit amet iaculis ante. </p>
	<hr>
	<div class="row mt-5">
	  <div class="col-sm-6">
		<div class="card">
		<img class="card-img-top" src="img/kcpics/IMG_9202.jpg" alt="Card image cap">

		  <div class="card-body">
			<h5 class="card-title">Previous Events</h5>
			<p class="card-text">Check out pictures from previous Key Club events.</p>
			<a href="#" class="btn btn-primary">Go Now</a>
		  </div>
		</div>
	  </div>
	  <div class="col-sm-6">
		<div class="card">
		  <img class="card-img-top" src="img/kcpics/IMG_5922.JPG" alt="Card image cap">

		  <div class="card-body">
			<h5 class="card-title">Sign Up</h5>
			<p class="card-text">Sign up for an event that you would like to attend.</p>
			<a href="#" class="btn btn-primary">Go Now</a>
		  </div>
		</div>
	  </div>
</div>
	<br>

	<br>
	<table class="table ">
	  <thead class = "thead-dark">
		<tr>
		  <th scope="col">#</th>
		  <th scope="col">Event</th>
		  <th scope="col">Date</th>
		  <th scope="col">Time</th>
		</tr>
	  </thead>
	<tbody>
		<?php
		include 'connection.php';
		mysqli_select_db($conn,"keyclubdatabase");

		$sql = "SELECT id, Event, Date, Time FROM events";

		$result = $conn-> query($sql);

		if($result-> num_rows > 0){
			while ($row = $result-> fetch_assoc()){
				echo "<tr><th scope = 'row'>". $row["id"]. "</th><th scope='row'>". $row['Event']. "</th><th scope='row'>". $row['Date']. "</th><th scope='row'>". $row['Time']. "</th></tr>";
			}
		}
		mysqli_close($conn);
	?>
	  
	  </tbody>
	</table>

	<button class = "float-right clean-button" data-toggle="modal" data-target=".ABmodal_slideRight">Sign Up</button>
<!--	 <li><a href="#" data-toggle="modal" data-target=".ABmodal_slideRight">Slide right</a></li>-->
	</div>
	 <div class="modal fade ABmodal_transition ABmodal_slideRight ABmodal_common" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close align_center_center" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>

                <!--content start-->
                <div class="signup_form_common signup_form4 register bg_color_ff">
                    <div class="form_header text-center">
                        <h4 class="fw_700 text-uppercase color_ff">Event Sign Up</h4>
                    </div>

                    <form action="eventSignUp.php" method="post">
						<div class="input_group password">
                            <input type="number" name="enumber" placeholder="Event Number">
                        </div>
                        <div class="input_group fname">
                            <input type="text" name="fname" placeholder="First Name">
                        </div>

                        <div class="input_group lname">
                            <input type="text" name="lname" placeholder="Last Name">
                        </div>
						<div class="input_group code">
                            <input type="number" name="code" placeholder="Member Code">
                        </div>




                        <button type="submit" class="transition_3s text-uppercase mt_20">Sign Up Now</button>

                    </form>
                </div>
                <!--content end-->

            </div>
        </div>
    </div>
</body>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>

    <!--bootstrap min js-->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-4.0.0.js"></script>

    <!--owl carousel js-->
	<script type="text/javascript" src="js/index.js"></script>
	<script type="text/javascript" src="js/navscroll.js"></script>
	
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>

    <!--nice select js-->
    <script type="text/javascript" src="js/jquery.nice-select.min.js"></script>

    <!--venobox js-->
    <script type="text/javascript" src="js/venobox.min.js"></script>

    <!--counterup js-->
    <script type="text/javascript" src="js/jquery.counterup.min.js"></script>

    <!--waypoints js-->
    <script type="text/javascript" src="js/waypoints.min.js"></script>

    <!--venobox js-->
    <script type="text/javascript" src="js/slick.js"></script>

    <!--down count js-->
    <script type="text/javascript" src="js/jquery.downCount.js"></script>

    <!--background video js-->
    <script type="text/javascript" src="js/jquery.vide.js"></script>

    <!--parallax js-->
    <script type="text/javascript" src="js/parallax.js"></script>

    <!-- all jQuary activation code here and always it will be bottom of all script tag -->
    <script type="text/javascript" src="js/shortcode-main.js"></script><strong></strong>
</html>
