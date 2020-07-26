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
	<link rel="stylesheet" href="assets/materialize/css/materialize.min.css" media="screen,projection">
	<link rel="stylesheet" href="assets/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/akost.css" media="screen,projection">
</head>
<body>
	<!-- error handler -->
	<?php
		$flash_message = $this->session->flashdata('handler_msg');
		if( ! empty($flash_message) )
		{
			echo '
				<div class="row" id="alert_box">
					<div class="col s12 m12">
						<div class="card '.$flash_message["type"].'">
							<div class="row">
								<div class="col s12 m10">
									<div class="card-content white-text">
										<span>'.$flash_message["msg"].'</span>
									</div>
								</div>
								<div class="col s12 m2">
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
	<nav class="grey darken-4" role="navigation" id="home-section">
		<div class="nav-wrapper container">
			<a href="" class="brand-logo" id="headLogo"><img src="assets/images/anakost-logo2-white.png" alt="Anakost Logo" height="31"></a>
			<!-- <a href="" class="brand-logo">Logo</a> -->
			<ul class="navi right hide-on-med-and-down">
				<li><a href="">Home</a></li>
				<li><a href="info">Info</a></li>
				<li><a href="services">Services</a></li>
				<li><a href="home/contactUs">Contact Us</a></li>
				<?php 
					if(isset($loggedIn)) {
						// echo '<li><small><em>Hello, '.$loggedIn["email"].'</em></small></li>';
						echo '<li><a href="login/logout" class="waves-effect waves-light btn red darken-1">Logout</a></li>';
					} else {
						echo '<li><a href="#login" class="waves-effect waves-light btn">Log In</a></li>';
					}
				?>
			</ul>
			<ul id="nav-mobile" class="navi side-nav">
				<li><a href="">Home</a></li>
				<li><a href="#info-section">Info</a></li>
				<li><a href="#services-section">Services</a></li>
				<li><a href="#contact-section">Contact Us</a></li>
				<?php 
					if(isset($loggedIn)) {
						// echo '';
						echo '<li><a href="login/logout" class="waves-effect waves-light btn red darken-1">Logout</a></li>';
					} else {
						echo '<li><a href="#login" class="waves-effect waves-light btn">Log In</a></li>';
					}
				?>
			</ul>
			<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
		</div>
	</nav>

	<!-- CONTENT -->
	<!-- FIXED ACTION BUTTON -->
	<div class="fixed-action-btn">
		<a class="btn-floating btn-large waves-effect waves-light aqua darken-2"><i class="large material-icons">mode_edit</i></a>
		<ul>
			<li><a href="#home-section" class="btn-floating red"><i class="material-icons">home</i></a></li>
			<li><a href="#" data-activates="nav-mobile" class="button-collapse btn-floating blue"><i class="material-icons">menu</i></a></li>
		</ul>
	</div>