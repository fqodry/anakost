	<div class="container">
		<div class="section">
			<div class="row">
				<p class="center-align" id="register-text">
					<strong>Sign Up for free with Facebook or email</strong><br>
				</p>
				<form action="<?php echo $form_register; ?>" method="post" class="col s12 m8 offset-m2" id="formValidate">
					<div class="row">
						<div class="input-field col s12 m6">
							<input type="text" name="firstname" id="firstname">
							<label for="firstname">First Name</label>
						</div>
						<div class="input-field col s12 m6">
							<input type="text" name="lastname" id="lastname">
							<label for="lastname">Last Name</label>
						</div>
						<div class="input-field col s12 m12">
							<input type="email" name="useremail" id="useremail" class="validate">
							<label for="useremail">Email</label>
						</div>
						<div class="input-field col s12 m12">
							<input type="password" name="userpassword" id="userpassword">
							<label for="userpassword">Password</label>
						</div>
						<!-- <div class="input-field col s12 m12">
							<input type="password" name="userrepassword" id="userrepassword">
							<label for="userrepassword">Retype Password</label>
						</div> -->
						<div class="input-field col s12 m12 l12">
							<div id="myLoginRecaptcha"></div>
						</div>
						<div class="input-field col s12 m12">
							<button class="btn btn-large waves-effect waves-light col s12 m12 float-right" type="submit" name="submit">Sign Up</button>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12 m12">
							<p class="center-align">By signing up, I agree to Anakost's <a href="javascript:;">Term of Service</a> and <a href="javascript:;">Privacy Policy</a>.</p>
						</div>
					</div>
				</form>
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

	<script src="assets/js/jquery211.min.js"></script>
	<script src="assets/materialize/js/materialize.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/additional-methods.min.js"></script>
	<script>
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
			$('.button-collapse').sideNav({
				menuWidth: 240,
				edge: 'left',
				closeOnClick: true,
				draggable: true
			});
			$('.modal').modal();

			$('#formValidate').validate({
				rules: {
					firstname: {
						required: true,
						minlength: 2
					},
					lastname: {
						required: true,
						minlength: 3
					},
					useremail: {
						required: true,
						email: true
					},
					userpassword: {
						required: true,
						minlength: 8
					}
					// userrepassword: {
					// 	required: true,
					// 	minlength: 8,
					// 	equalTo: "#userpassword"
					// }
				},
				messages: {
					firstname: {
						required: "Please enter your First Name",
						minlength: "Please enter at least 2 characters"
					},
					lastname: {
						required: "Please enter your Last Name",
						minlength: "Please enter at least 3 characters"
					},
					useremail: {
						required: "Please enter your email address",
						email: "Invalid email format (example@example.com)"
					},
					userpassword: {
						required: "Please enter your password",
						minlength: "Password must be at least 8 alphabetical/numerical characters"
					}
					// userrepassword: {
					// 	required: "Please enter your password again",
					// 	minlength: "Password must be at least 8 alphabetical/numerical characters",
					// 	equalTo: "Password didn't match"
					// }
				},
				errorElement: 'em',
				errorPlacement: function(error, element) {
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