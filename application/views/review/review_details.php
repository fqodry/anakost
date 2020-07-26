<!-- SLIDER HEAD -->
	<!-- CONTENT HERE -->
	<div class="container">
		<div class="section">
			<div class="row">
				<div class="col s12 m3">
					<div style="padding: 10px 10px; border:1px solid #eee;">
						<div class="carousel center-align" style="height:250px;">
							<?php foreach($item_images as $key=>$image): ?>
							<a href="#" class="carousel-item">
								<img src="assets/images/items/<?php echo $image->fileimage; ?>" alt="<?php echo $image->filename; ?>">
							</a>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
				<div class="col s12 m6">
					<div class="row">
						<div class="col s12 m12">
							<p class="judul-section" style="font-size: 24px"><?php echo $item->item_name; ?></p>
						</div>
						<div class="col s12 m8">
							<div id="any-cover">
								<table class="table-item-details">
									<tr class="tr-bottomline">
										<td class="td-details"><i class="material-icons tiny">visibility</i>&nbsp;<strong>Lihat</strong></td>
										<td class="td-details"><?php echo $item_details->seen; ?></td>
										<td class="td-details"><i class="material-icons tiny">shopping_basket</i>&nbsp;<strong>Berat</strong></td>
										<td class="td-details right-align"><?php echo $item_details->weight."gr"; ?></td>
									</tr>
									<tr>
										<td class="td-details"><i class="material-icons tiny">shopping_cart</i>&nbsp;<strong>Terjual</strong></td>
										<td class="td-details"><?php echo $item_details->sold; ?></td>
										<td class="td-details"><i class="material-icons tiny">star</i>&nbsp;<strong>Kondisi</strong></td>
										<td class="td-details right-align"><?php echo ($item_details->condition == 'new') ? ucwords('baru') : ucwords('bekas'); ?></td>
									</tr>
								</table>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col s12 m12">
							<p class="judul-section">Deskripsi Produk</p>
							<p><?php echo $item_details->description; ?></p>
						</div>
					</div>
				</div>
				<div class="col s12 m3">
					<div class="row">
						<div class="col s12 m12">
							<div id="price-cover">
								<p class="item-price"><?php echo "Rp ".number_format($item_details->price,0,',','.'); ?></p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col s12 m12 center-align">
							<a href="#" class="waves-effect waves-light btn-large red" style="width: 100%;"><i class="fa fa-cart-plus"></i>&nbsp;&nbsp;Beli</a>
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

	<!-- HOT ITEMS MODALS -->
	<div class="modal modal-fixed-footer" id="hotItemDetails">
		<div class="modal-content" id="hotItemContent">
			<!-- get content via ajax -->
			<h4>Oops! Something Went Wrong...</h4>
		</div>
		<div class="modal-footer">
			<a href="#" class="modal-action modal-close waves-effect waves-yellow btn-flat">Close</a>
		</div>
	</div>

	<!-- FOOTER SECTION -->
	<footer class="page-footer grey darken-4">
		<div class="container-fluid">
			<div class="row">
				<div class="col s10 m10 offset-s1 offset-m1">
					<div class="col s6 m6">
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
					<div class="col s4 m4 right">
						<h5 class="white-text">Anakost</h5>
						<ul>
							<li><a href="" class="grey-text text-lighten-3">Home</a></li>
							<li><a href="info" class="grey-text text-lighten-3">Info</a></li>
							<li><a href="services" class="grey-text text-lighten-3">Services</a></li>
							<li><a href="cari-kost" class="grey-text text-lighten-3">Cari Kost</a></li>
							<li><a href="contact-us" class="grey-text text-lighten-3">Contact Us</a></li>
							<li><a href="career" class="grey-text text-lighten-3">Career</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div id="search_divider">
				<div class="divider"></div>
			</div>
		</div>
		<div class="footer-copyright center-align">
			<div class="container-fluid">
				<div class="row">
					<div class="col s10 m10 offset-s1 offset-m1">
						<div class="left">
							<a href="https://facebook.com/mfqodry" target="_blank"><img src="assets/images/fb-icon-wh-128.png" alt="fb icon" class="responsive-img" width="24"></a>&nbsp;&nbsp;
							<a href="https://twitter.com/frmnqdr" target="_blank"><img src="assets/images/twitter-icon-wh-128.png" alt="twitter icon" class="responsive-img" width="24"></a>&nbsp;&nbsp;
							<a href="https://www.instagram.com/frmnqdr/" target="_blank"><img src="assets/images/instagram-icon-wh-128.png" alt="instagram icon" class="responsive-img" width="24"></a>
						</div>
						<small>&copy; 2016 - <?php echo date('Y'); ?> Copyright Anakost.id</small>
						<small class="right">Site by:&nbsp;<a href="http://mbing.web.id" class="grey-text text-lighten-4 right" target="_blank">frmnqdr</a></small>
					</div>
				</div>
			</div>
		</div>
	</footer>

	<script src="assets/js/jquery211.min.js"></script>
	<script src="assets/materialize/js/materialize.min.js"></script>
	<script src="assets/owlcarousel/owl.carousel.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/additional-methods.min.js"></script>
	<script>
		// define base url var
		var base_url = "<?php echo base_url(); ?>";

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

			// carousel
			$('.carousel').carousel({
				indicators:true,
				dist:0
			});
			$('.owl-carousel').owlCarousel({
				center:true,
				stagePadding:150,
				loop:true,
				margin:10,
				responsiveClass:true,
				responsive:{
			   	0:{
			   		items:1,
			   		nav:true
			      },
			   	600:{
			      	items:2,
			      	nav:true
			     	},
			      1000:{
			      	items:4,
			      	nav:false
			   	}
			   }
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
</body>
</html>