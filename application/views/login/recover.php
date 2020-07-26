	<div class="container">
		<div class="section">
			<div class="row">
				<p class="center-align" id="register-text">
					<strong>Reset Your Password</strong><br>
				</p>
				<form action="<?php echo $form_recover; ?>" method="post" class="col s12 m6 offset-m3" id="formValidate">
					<div class="row">
						<div class="input-field col s12 m12">
							<input type="password" name="reset_password" id="reset_password" class="validate">
							<label for="reset_password">New Password</label>
						</div>
						<div class="input-field col s12 m12">
							<input type="password" name="reset_repassword" id="reset_repassword" class="validate">
							<label for="reset_repassword">Retype New Password</label>
						</div>
						<div class="input-field col s12 m12">
							<button class="btn waves-effect waves-light col s12 m12 float-right" type="submit" name="submit">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- MODALS -->
	<div class="modal modal-fixed-footer" id="login">
		<div class="modal-content">
			<p class="center-align" id="login-text">
				<img src="assets/images/anakost-logo2-black.png" alt="Anakost Logo Black" width="120"><br>
				Cari kost-kostan di sekitar Semarang makin mudah dengan Anakost
			</p>
			<div class="row">
				<form action="login/loginProcess" class="col s12 m10 offset-m1" method="post">
					<div class="row">
						<div class="input-field col s12">
							<i class="material-icons prefix">email</i>
							<input type="text" class="validate" name="username" id="username" required>
							<label for="username" data-error="Invalid email format" data-success="ok">Username/Email</label>
						</div>
						<div class="input-field col s12">
							<i class="material-icons prefix">lock</i>
							<input type="password" class="validate" name="userpassword" id="password" required>
							<label for="userpassword" data-error="Minimal 8 character length" data-success="ok">Password</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<button class="btn waves-effect waves-light col s12" type="submit" name="submit">Log In</button>
						</div>
						<div class="input-field col s12">
							<a href="login/register" class="btn amber waves-effect waves-light col s12">Sign Up</a>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="modal-footer">
			<a href="#!" class="modal-action modal-close waves-effect waves-yellow btn-flat">Forgot Password ?</a>
		</div>
	</div>

	<script src="assets/js/jquery211.min.js"></script>
	<script src="assets/materialize/js/materialize.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/additional-methods.min.js"></script>
	<script>
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
					useremail: {
						required: true,
						email: true
					},
				},
				messages: {
					useremail: {
						required: "Please enter your email that is registered in Anakost.id",
						email: "Invalid email format (example@example.com)"
					},
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
</body>
</html>