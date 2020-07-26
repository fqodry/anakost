<!-- SLIDER HEAD -->
	<!-- FB JS SDK -->
	<div id="fb-root"></div>
	<script>
		var base_url = "<?php echo base_url(); ?>";

		// function statusChangeCallback(response) {
		// 	console.log('statusChangeCallback');
		// 	console.log(response);

		// 	if(response.status === 'connected') {
		// 		hasConnected();
		// 	} else {
		// 		// document.getElementById('status').innerHTML = 'Please log ' + 'into this app.';
		// 		document.getElementById('status').innerHTML = 'not connected';
		// 	}
		// }

		// function checkLoginState() {
		// 	FB.getLoginStatus(function(response) {
		// 		statusChangeCallback(response);
		// 	});
		// }

		// window.fbAsyncInit = function() {
		// 	FB.init({
		// 		appId		: '1922547971290169',
		// 		cookie	: true,
		// 		xfbml		: true,
		// 		version	: 'v2.9'
		// 	});

		// 	FB.getLoginStatus(function(response) {
		// 		statusChangeCallback(response);
		// 	});
		// };

		// // load the SDK Asynchronously
		// (function(d, s, id) {
		// 	var js, fjs = d.getElementsByTagName(s)[0];
		// 	if (d.getElementById(id)) return;
		// 	js = d.createElement(s); js.id = id;
		// 	js.src = "//connect.facebook.net/en_US/sdk.js";
		// 	fjs.parentNode.insertBefore(js, fjs);
		// }(document, 'script', 'facebook-jssdk'));

		// function hasConnected() {
		// 	console.log('Welcome! Fetching your information.... ');
		// 	FB.api('/me',{fields:'first_name,last_name,name,email,education'}, function(response) {
		// 		console.log(response);
		// 		$.ajax({
		// 			'url': base_url + 'login/fbLoginHandler/',
		// 			'data': {
		// 				email: response.email,
		// 				nama: response.name
		// 			},
		// 			'dataType': 'json',
		// 			'type': 'post',
		// 			'success': function(result) {
		// 				console.log(result);

		// 				setTimeout(function() {
		// 					window.location = base_url + "home";
		// 				}, 1500);
		// 			}
		// 		});
		// 	});
		// }

		// function fbLogout() {
		// 	FB.logout(function(response) {
		// 		console.log("Facebook has logout.... ");
		// 		console.log(response);
		// 	});
		// }
	</script>
	
	<div class="slider">
		<ul class="slides">
			<li>
				<img src="assets/images/home1.jpg" alt="on google play store" class="responsive-img">
				<div class="caption left-align">
					<!-- <h4 class="white-text text-darken-2">Image 1</h4> -->
				</div>
			</li>
			<li>
				<img src="assets/images/home2.jpg" alt="kasira ads 1" class="responsive-img">
				<div class="caption left-align">
					<!-- <h4 class="white-text text-darken-2">Image 2</h4> -->
				</div>
			</li>
			<li>
				<img src="assets/images/home3.jpg" alt="empty home image 1" class="responsive-img">
				<div class="caption left-align">
					<!-- <h4 class="white-text text-darken-2">Image 3</h4> -->
				</div>
			</li>
		</ul>
	</div>

	<!-- CONTENT HERE -->
	<div class="container">
		<div class="section">
			<div class="row">
				<div class="col s12 m4">
					<div class="icon-block center">
						<i class="large material-icons">room</i>
						<h5 class="center">EASY TO FIND</h5>
						<p class="light">Easy to book, just select the properties and click Order Now!</p>
					</div>
				</div>
				<div class="col s12 m4">
					<div class="icon-block center">
						<i class="large material-icons">verified_user</i>
						<h5 class="center">TRUSTED</h5>
						<p class="light">Verified property, equipped with location maps, and photo galleries.</p>
					</div>
				</div>
				<div class="col s12 m4">
					<div class="icon-block center">
						<i class="large material-icons">redeem</i>
						<h5 class="center">ONLINE PAYMENTS</h5>
						<p class="light">Online payments, anytime, safe, and practical.</p>
					</div>
				</div>
			</div>
		</div>

		<div class="divider"></div>

		<div class="section">
			<div class="row">
				<div class="col s12 m6" id="#find">
					<a href="cari-kost" class="waves-effect waves-light btn-large col s12 m12">CARI KOST-KOSTAN</a>
				</div>
				<div class="col s12 m6">
					<a href="offer" class="waves-effect waves-light btn-large col s12 m12 grey lighten-1 white-text">DAFTARKAN KOSTAN</a>
				</div>
			</div>
			<div class="row">
				<div class="col s12 m10 offset-m1">
					<form action="<?php echo $form_search; ?>" class="col s12 m12" method="post" id="formSearch">
						<div class="row">
							<div class="input-field col s6 m4">
								<h5>Saya mencari</h5>
							</div>
							<div class="input-field col s3 m3">
								<input type="checkbox" name="pil_kost" id="pil_kost">
								<label for="pil_kost">Kost</label>
							</div>
							<div class="input-field col s3 m3">
								<input type="checkbox" name="pil_apartment" id="pil_apartment">
								<label for="pil_apartment">Apartment</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s4 m3">
								<h5>di daerah</h5>
							</div>
							<div class="input-field col s3 m3">
								<select name="pil_daerah" id="pil_daerah">
									<option value="" disabled selected>Pilih daerah</option>
									<option value="semarang">Semarang</option>
								</select>
								<label for="pil_daerah">Daerah</label>
							</div>
							<div class="input-field col s3 m4">
								<h5>dengan luas kamar</h5>
							</div>
							<div class="input-field col s2 m2">
								<select name="pil_luas" id="pil_luas">
									<option value="" disabled selected>Pilih luas</option>
									<option value="l6">< 6 m2</option>
									<option value="6">6 m2</option>
									<option value="8">8 m2</option>
									<option value="10">10 m2</option>
									<option value="12">12 m2</option>
									<option value="m12">> 12 m2</option>
								</select>
								<label for="pil_luas">Luas Kamar</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s4 m4">
								<h5>dengan biaya/bln</h5>
							</div>
							<div class="input-field col s3 m2">
								<input type="checkbox" name="pil_harga_1" id="pil_harga_1">
								<label for="pil_harga_1">< IDR 500k</label>
							</div>
							<div class="input-field col s3 m3">
								<input type="checkbox" name="pil_harga_2" id="pil_harga_2">
								<label for="pil_harga_2">IDR 500k-1000k</label>
							</div>
							<div class="input-field col s3 m3">
								<input type="checkbox" name="pil_harga_3" id="pil_harga_3">
								<label for="pil_harga_3">> IDR 1000k</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s8 m8 offset-s2 offset-m2 center-align">
								<button class="btn-large waves-effect waves-light amber col s12 m12" type="submit" name="submit">Search</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="divider"></div>

		<div class="section">
			<div class="row">
				<div class="col s12 m12">
					<h4 class="center-align">Kota Tujuan</h4>
				</div>
				<div class="col s12 m4">
					<div class="icon-block center">
						<a href="javascript:void()"><img src="assets/images/jabodetabek.jpg" alt="single jabodetabek img" class="responsive-img" id="image-test"></a>
					</div>
				</div>
				<div class="col s12 m4">
					<div class="icon-block center">
						<a href="javascript:void()"><img src="assets/images/semarang.jpg" alt="single semarang img" class="responsive-img" id="image-test"></a>
					</div>
				</div>
				<div class="col s12 m4">
					<div class="icon-block center">
						<a href="javascript:void()"><img src="assets/images/bandung.jpg" alt="single bandung img" class="responsive-img" id="image-test"></a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- LOGIN MODALS -->
	<div class="modal modal-fixed-footer" id="login">
		<div class="modal-content">
			<p class="center-align" id="login-text">
				<img src="assets/images/anakost-logo2-black.png" alt="Anakost Logo Black" width="120"><br>
				Cari kost-kostan di sekitar Semarang makin mudah dengan Anakost
			</p>
			<div class="row">
				<form action="<?php echo $form_login; ?>" class="col s12 m8 l6 offset-m2 offset-l3" method="post" id="formLogin">
					<div class="row">
						<div class="input-field col s12 m12 l12">
							<i class="material-icons prefix">email</i>
							<input type="email" class="validate" name="username" id="username" required autofocus="autofocus">
							<label for="username" data-error="" data-success="ok">Username (Email)</label>
						</div>
						<div class="input-field col s12 m12 l12">
							<i class="material-icons prefix">lock</i>
							<input type="password" class="validate" name="userpassword" id="password" required>
							<label for="userpassword" data-error="" data-success="ok">Password</label>
						</div>
						<!-- <div class="input-field col s12 m12 l12">
							<div id="myLoginRecaptcha"></div>
						</div> -->
					</div>
					<div class="row">
						<div class="input-field col s12 m12 l12">
							<button class="btn waves-effect waves-light col s12" type="submit" name="submit">Log In</button>
						</div>
						<div class="input-field col s12 m12 l12">
							<a href="login/register" class="btn amber waves-effect waves-light col s12">Sign Up</a>
						</div>
						<div class="input-field col s12 m12 l12" align="center">
							<div class="fb-login-button" data-scope="public_profile,email,user_about_me" data-width="250" data-max-rows="1" data-size="large" data-button-type="login_with" data-show-faces="false" data-auto-logout-link="true" data-use-continue-as="true" onlogin="checkLoginState()"></div>

							<div id="status"></div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="modal-footer">
			<a href="forgot" class="modal-action modal-close waves-effect waves-yellow btn-flat">Forgot Password ?</a>
		</div>
	</div>

	<!-- FOOTER SECTION -->
	<footer class="page-footer grey darken-4">
		<div class="container-fluid">
			<div class="row">
				<div class="col s10 m10 offset-s1 offset-m1">
					<div class="col s12 m6 l6">
						<h5 class="white-text">Office</h5>
						<p class="grey-text text-lighten-4">
							Jalan Mahkota I No.28<br>
							Kel. Tugu, Cimanggis<br>
							Depok, 16451<br>
							<br>
							Telp. 0857-1005-4474<br>
							Email. <a href="mailto:hello@anakost.id?Subject=Hello%20Anakost" target="_top" class="grey-text text-lighten-4">hello@anakost.id</a>
						</p>
					</div>
					<div class="col s4 m4 l4 right hide-on-small-only">
						<h5 class="white-text">Anakost</h5>
						<ul>
							<li><a href="" class="grey-text text-lighten-3">Jual Beli</a></li>
							<li><a href="review" class="grey-text text-lighten-3">Review</a></li>
							<li><a href="about" class="grey-text text-lighten-3">About</a></li>
							<li><a href="contact-us" class="grey-text text-lighten-3">Contact Us</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div id="search_divider">
				<div class="divider"></div>
			</div>
		</div>
		<div class="footer-copyright center-align">
			<div class="row" style="width: 100%;">
				<div class="col s10 m10 l10 offset-s1 offset-m1 offset-l1">
					<div class="left hide-on-small-only">
						<a href="https://facebook.com/mfqodry" target="_blank"><img src="assets/images/fb-icon-wh-128.png" alt="fb icon" class="responsive-img" width="24"></a>&nbsp;&nbsp;
						<a href="https://twitter.com/frmnqdr" target="_blank"><img src="assets/images/twitter-icon-wh-128.png" alt="twitter icon" class="responsive-img" width="24"></a>&nbsp;&nbsp;
						<a href="https://www.instagram.com/frmnqdr/" target="_blank"><img src="assets/images/instagram-icon-wh-128.png" alt="instagram icon" class="responsive-img" width="24"></a>
					</div>
					<div class="right hide-on-small-only">
						<small class="right">Site by:&nbsp;<a href="http://mbing.web.id" class="grey-text text-lighten-4 right" target="_blank">frmnqdr</a></small>
					</div>
					<div class="center">
						<small>&copy; 2016 - <?php echo date('Y'); ?> Copyright Anakost.id</small>
					</div>
					<!-- <div class="left">
						<a href="https://facebook.com/mfqodry" target="_blank"><img src="assets/images/fb-icon-wh-128.png" alt="fb icon" class="responsive-img" width="24"></a>&nbsp;&nbsp;
						<a href="https://twitter.com/frmnqdr" target="_blank"><img src="assets/images/twitter-icon-wh-128.png" alt="twitter icon" class="responsive-img" width="24"></a>&nbsp;&nbsp;
						<a href="https://www.instagram.com/frmnqdr/" target="_blank"><img src="assets/images/instagram-icon-wh-128.png" alt="instagram icon" class="responsive-img" width="24"></a>
					</div>
					<small>&copy; 2016 - <?php //echo date('Y'); ?> Copyright Anakost.id</small>
					<small class="right">Site by:&nbsp;<a href="http://mbing.web.id" class="grey-text text-lighten-4 right" target="_blank">frmnqdr</a></small> -->
				</div>
			</div>
		</div>
	</footer>

	<script src="assets/js/jquery211.min.js"></script>
	<script src="assets/materialize/js/materialize.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/additional-methods.min.js"></script>
	<script>
		// define base url var
		var base_url = "<?php echo base_url(); ?>";
		// Google Recaptcha Settings
		var verifyCallback = function(response) {
			alert(response);
		};
		var onloadCallback = function() {
			grecaptcha.render('myLoginRecaptcha', {
				'sitekey'	: '6LchlyMTAAAAAHLD2cRSdo5B6_yzAwU_LjQDlX1m',
				'theme'		: 'dark',
				'size'		: 'normal'
			});
		};

		$(document).ready(function() {
			// side navigation settings
			$(".button-collapse").sideNav({
				menuWidth: 240,
				edge: 'left',
				closeOnClick: true,
				draggable: true
			});
			// slider settings
			$('.slider').slider({
				indicators:true,
				height: 450,
				interval: 3000
			});
			// materialize modal settings
			$('.modal').modal();
			// materialize select settings
			$('select').material_select();
			// custom alert message for home
			$('#alert_close').click(function() {
				$('#alert_box').fadeOut("slow",function(){
					
				});
			});

			// jQuery Validate settings for formLogin
			$('#formLogin').validate({
				rules: {
					username: {
						required: true,
						email: true
					},
					userpassword: {
						required: true,
						minlength: 8
					}
				},
				messages: {
					username: {
						required: "Please enter your Username/Email",
						email: "Invalid email format (ex@example.com)"
					},
					userpassword: {
						required: "Please enter your Password",
						minlength: "Password at least 8 characters"
					}
				},
				errorElement: "small",
				errorPlacement: function(error,element) {
					var placement = $(element).data('error');
					if(placement) {
						$(placement).append(error);
					} else {
						error.insertAfter(element);
					}
				}
			});
		});
	</script>
	<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
</body>
</html>