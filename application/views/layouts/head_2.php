<!DOCTYPE html>
<html lang="en">
<head>
	<!-- metas -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Firman Qodry">
	<meta name="description" content="Aplikasi yang membantu kamu mencari kos kosan di sekitaran Semarang">

	<base href="<?php echo base_url(); ?>">

	<title><?php echo $title; ?></title>

	<!-- favicon -->
	<link rel="icon" type="image/png" href="assets/images/favicon.png">

	<!-- CSS LOAD -->
	<link rel="stylesheet" href="http://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css" media="screen,projection">
	<link rel="stylesheet" href="assets/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/owlcarousel/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="assets/owlcarousel/assets/owl.theme.default.min.css">
	<link rel="stylesheet" href="assets/css/akost.css" media="screen,projection">

	<script>
		$(document).ready(function(){
			$(".dropdown-button").dropdown();
		});
	</script>
</head>
<body>
	<!-- error handler -->
	<?php
		$flash_message = $this->session->flashdata('handler_msg');
		if( ! empty($flash_message) )
		{
			echo '
				<div class="row" id="alert_box">
					<div class="col s12 m12 l12">
						<div class="card '.$flash_message["type"].'">
							<div class="row">
								<div class="col s12 m10 l10">
									<div class="card-content white-text">
										<span>'.$flash_message["msg"].'</span>
									</div>
								</div>
								<div class="col s12 m2 l2">
									<i class="fa fa-times icon_style" id="alert_close" aria-hidden="true"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			';
		}
	?>
	<!-- nav bar -->
	<ul id="user-menus" class="dropdown-content">
		<li><a href="">My Profile</a></li>
		<li><a href="javascript:void()">Settings</a></li>
		<li><a href="login/logout">Logout</a></li>
	</ul>
	<nav class="grey darken-4" role="navigation" id="home-section">
		<div class="nav-wrapper container-fluid">
			<div class="row">
				<div class="col s12 m10 offset-m1">
					<a href="" class="brand-logo" id="headLogo"><img src="assets/images/anakost-logo2-white.png" alt="Anakost Logo" height="31"></a>
					<!-- <a href="" class="brand-logo">Logo</a> -->
					<ul class="navi right hide-on-med-and-down">
						<li><a href="">Jual Beli</a></li>
						<li><a href="review">Review</a></li>
						<!-- <li><a href="cari-kost">Booking</a></li> -->
						<li><a href="about">About</a></li>
						<li><a href="contact-us">Contact Us</a></li>
						<?php 
							if(isset($loggedIn)) {
								if(isset($user_details)){
									echo '<li><a href="javascript:void()" class="dropdown-button" data-activates="user-menus">'.$user_details->firstname.'..<i class="material-icons right">arrow_drop_down</i></a></li>';
								} else {
									echo '<em style="color:red;">oops, null value for user_details</em>';
								}
							} else {
								echo '<li><a href="#login" class="waves-effect waves-light btn">Log In</a></li>';
							}
						?>
					</ul>
					<ul id="nav-mobile" class="navi side-nav">
						<?php if(isset($loggedIn)){ ?>
						<li><div class="user-view">
							<div class="background">
								<img src="assets/images/semarang.jpg">
							</div>
							<a href="javascript:void()"><img class="circle" src="assets/images/profile.png"></a>
							<a href="javascript:void()"><span class="white-text name"><?php echo $user_details->fullname; ?></span></a>
							<a href="javascript:void()"><span class="white-text email"><?php echo $user_details->email; ?></span></a>
						</div></li>
						<?php } ?>
						<li><a href="">Jual Beli</a></li>
						<li><a href="review">Review</a></li>
						<!-- <li><a href="cari-kost">Booking</a></li> -->
						<li><a href="about">About</a></li>
						<li><a href="contact-us">Contact Us</a></li>
						<?php 
							if(isset($loggedIn)) {
								// echo '';
								echo '<li><a href="login/logout" class="waves-effect waves-light btn red darken-1" onclick="fbLogout()">Logout</a></li>';
							} else {
								echo '<li><a href="#login" class="waves-effect waves-light btn">Log In</a></li>';
							}
						?>
					</ul>
					<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
				</div>
			</div>
		</div>
	</nav>

	<!-- CONTENT -->
	<!-- FIXED ACTION BUTTON -->
	<div class="fixed-action-btn hide">
		<a class="btn-floating btn-large waves-effect waves-light aqua darken-2"><i class="large material-icons">mode_edit</i></a>
		<ul>
			<li><a href="#home-section" class="btn-floating red"><i class="material-icons">home</i></a></li>
			<li><a href="#" data-activates="nav-mobile" class="button-collapse btn-floating blue"><i class="material-icons">menu</i></a></li>
		</ul>
	</div>