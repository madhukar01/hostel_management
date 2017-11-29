<?php
session_start();
if(isset($_SESSION["usn"]))
{
	header("Location: dashboard.php");
	die();
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>PES Boys Hostel</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/home/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/home/css/main.css" />
		<link rel="stylesheet" href="assets/home/css/preloader.css" />
		<link rel="stylesheet" href="assets/home/css/normalize.css" />

		<!--[if lte IE 9]><link rel="stylesheet" href="assets/home/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/home/css/ie8.css" /><![endif]-->
	</head>
	<body>
	<div id="loader-wrapper">
    <div id="loader"></div>
 
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
 	</div>

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header" class="alt">
						<h1><a href="index.php">PES Boys Hostel</a></h1>
						<nav>
							<a href="#menu">Menu</a>
						</nav>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<div class="inner">
							<h2>Menu</h2>
							<ul class="links">
								<li><a href="index.php">Home</a></li>
								<li><a href="#">Facilities</a></li>
								<li><a href="#">Rules and Regulations</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><button id="login_button">Log In</button></li>
								<hr/>
								<li><button id="signup_button" onclick="location.href='register.php';">Join Hostel</button></li>
								<!--onclick="document.getElementById('login').style.display='block'"-->
							</ul>
							<a href="#" class="close">Close</a>
						</div>
					</nav>
					<!--Login form-->
					<div id="login" class="modal">
						<form class="modal-content animate" id="login_form" >
							<div class="imgcontainer">
							<img src="images/pes.ico" alt="pes_logo" class="avatar">
						  </div>
						  <div class="container">
						  	<div id="user_radio" style="display: block; color: black;">
									<label style="display: inline-block; padding:2px;">Student<input type="radio" name="user_type" value="student" checked/></label>
									<label style="display: inline-block; padding:2px;">Parent<input type="radio" name="user_type" value="parent" /></label>
									<label style="display: inline-block; padding:2px;">Staff<input type="radio" name="user_type" value="staff" /></label>
									<label style="display: inline-block; padding:2px;">Doctor<input type="radio" name="user_type" value="doctor" /></label>
									<label style="display: inline-block; padding:2px;">Admin<input type="radio" name="user_type" value="admin" /></label>
							</div>
							<input type="text" placeholder="Enter Username" name="usn" id="username" aria-describedby="usernameHelp" required >
							<font color='white'><small id="usernameHelp" class="form-text text-muted"></small></font>
							<input type="password" placeholder="Enter Password" name="password" id="password" aria-describedby="loginHelp" required> 
							<font color='white'><small id="loginHelp" class="form-text text-muted"></small></font><p>
							<button class="button small" id="submit_button">Login</button>
							<button class="button small cancelbtn" type="button" onclick="document.getElementById('login').style.display='none'">Cancel</button>
							
						</div>
						</form>
					  </div>
					  
				<!-- Banner -->
					<section id="banner">
						<div class="inner">
							<div class="logo"><img src="images/pesu1.png"></div>
							<h2>PES Boys Hostel</h2>
							<p>Accomodation for PES University Students</p>
							<button id="signup_button" onclick="location.href='register.php';">Join Hostel</button>
						</div>
					</section>

				<!-- Wrapper -->
					<section id="wrapper">

						<!-- One -->
							<section id="one" class="wrapper spotlight style1">
								<div class="inner">
									<a href="#" class="image"><img src="images/room_home.png" alt="" /></a>
									<div class="content">
										<h2 class="major">Room sharing at your convenience</h2>
										<p>At PES Hostel, you get to choose from a large set of Single or Multi sharing rooms.<br>
											All rooms consist of study table and are well furnished with wardrobes and cot.
										</p>
										<a href="#" class="special">Learn more</a>
									</div>
								</div>
							</section>

						<!-- Two -->
							<section id="two" class="wrapper alt spotlight style2">
								<div class="inner">
									<a href="#" class="image"><img src="images/food_home.png" alt="" /></a>
									<div class="content">
										<h2 class="major">Food of your choice</h2>
										<p>PES Hostel provides 3 types of food facilities to the students.<br>
											Hostelites can choose between South Indian Mess or North Indian Mess or Food Court according to their taste.</p>
										<a href="#" class="special">Learn more</a>
									</div>
								</div>
							</section>

						<!-- Three -->
							<section id="three" class="wrapper spotlight style3">
								<div class="inner">
									<a href="#" class="image"><img src="images/laundry_home.png" alt="" /></a>
									<div class="content">
										<h2 class="major">Laundry on Demand</h2>
										<p>The hostel has a laundry facility inside the building for the students.<br>
											Students can use this at a nominal fee. </p>
										<a href="#" class="special">Learn more</a>
									</div>
								</div>
							</section>
						
						<!-- Four -->
							<section id="four" class="wrapper alt style1">
								<div class="inner">
									<h2 class="major">Other facilities</h2>
									<p>PES Boys hostel is situated in the PES University campus. Hostelites will therefore have the advantage of
										deriving the benefit of the various facilities available on PES Uniersity such as: sports, gymnasium, campus store,
										campus mart, banking, travel booking, on going live projects in various departments / CORI / CCBD centre and can participate
										in various National and International seminars / conferences /events keeps happening round the year etc. 
									</p>
									<section class="features">
										<article>
											<a href="#" class="image"><img src="images/pic04.jpg" alt="" /></a>
											<h3 class="major">Clinical Facility</h3>
											<p>A clinic is situated inside the hostel, doctor will be available between 4 PM and 7 PM from Monday to Saturday.</p>
										</article>
										<article>
											<a href="#" class="image"><img src="images/pic05.jpg" alt="" /></a>
											<h3 class="major">Professional counseling</h3>
											<p>Professional counselor will be available at the hostel for career guidance / academic / non-academic related issues.</p>
										</article>
										<article>
											<a href="#" class="image"><img src="images/pic06.jpg" alt="" /></a>
											<h3 class="major">Common Multipurpose Lounge</h3>
											<p>Situated at the cellar area having Library secion, Discussion cubicles, Internet center, Saloon and indoor games.</p>
										</article>
										<article>
											<a href="#" class="image"><img src="images/pic07.jpg" alt="" /></a>
											<h3 class="major">Tuck shop and Cloak room</h3>
											<p>A tuck shop in the hostel mess area and the cloak room facility to keep luggage at the end of academic year when going on vacation.</p>
										</article>
									</section>
								</div>
							</section>

					</section>

				<!-- Footer -->

			</div>

		<!-- Scripts -->
			<script src="assets/home/js/skel.min.js"></script>
			<script src="assets/home/js/jquery.min.js"></script>
			<script src="assets/home/js/jquery.scrollex.min.js"></script>
			<script src="assets/home/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/home/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/home/js/main.js"></script>
			<script src="assets/home/js/login.js"></script>
			<script src="assets/home/js/preloader.js"></script>
			<script src="assets/home/js/modernizr.min.js"></script>
	</body>
</html>