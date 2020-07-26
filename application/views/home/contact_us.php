	<div class="container-fluid">
		<div class="section">
			<div class="row">
				<div class="col s12 m10 offset-m1">
					<h4 class="center">Contact Us</h4>
					<div class="row">
						<div class="col s12 m8 l6 offset-m2 offset-l3">
							<p>Thank you for visiting Anakost.id! Tell us what you think about Anakost.id, or if you have any questions, feel free to ask us!</p>
							<form action="<?php echo $form_contact; ?>" method="post" class="col s12 m12" id="formContact">
								<div class="row">
									<div class="input-field col s12 m12 l12">
										<input type="text" name="guestName" id="guestName" required>
										<label for="guestName">Your Name</label>
									</div>
									<div class="input-field col s12 m12 l12">
										<input type="email" name="guestEmail" id="guestEmail" required>
										<label for="guestEmail">Your Email</label>
									</div>
									<div class="input-field col s12 m12 l12">
										<span class="prefix" id="phone_prefix">+62</span>
										<input type="text" name="guestPhone" id="guestPhone">
										<label for="guestPhone">Your Phone Number (optional)</label>
									</div>
									<div class="input-field col s12 m12 l12">
										<textarea class="materialize-textarea" name="guestMessage" id="guestMessage" required></textarea>
										<label for="guestMessage">Message</label>
									</div>
									<div class="input-field col s12 m12 l12">
										<button class="btn waves-effect waves-light" type="submit" name="submit" value="submitContact">Submit</button>
									</div>
								</div>
							</form>
						</div>
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
				height: 130,
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
			$('#formContact').validate({
				rules: {
					guestName: {
						required: true
					},
					guestEmail: {
						required: true,
						email: true
					},
					guestMessage: {
						required: true,
						minlength: 10,
						maxlength: 200
					}
				},
				messages: {
					guestName: {
						required: "Please enter your full name"
					},
					guestEmail: {
						required: "Please enter your email address",
						email: "Invalid email format (ex: example@example.com)"
					},
					guestMessage: {
						required: "Please enter your message here",
						minlength: "Please enter at least 10 characters",
						maxlength: "Maximum length are 200 characters"
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