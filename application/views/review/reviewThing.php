<!-- SLIDER HEAD -->
	<div class="container-fluid">
		<div class="section">
			<div class="row">
				<div class="col s12 m4 offset-m1">
					<p class="judul-section">Promo</p>
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
				</div>
				<div class="col s12 m6">
					<p class="judul-section">Cari Produk</p>
					<table id="search_table">
						<tbody>
							<tr>
								<td>
									<form class="col s12 m12" action="<?php echo $form_cari_simple ?>" method="post">
										<div class="row">
											<div class="input-field col s4 m4">
												<i class="material-icons prefix">search</i>
												<select name="kategori" id="kategori">
													<option value="" disabled selected>Kategori</option>
													<?php 
													foreach($sel_kategori as $kategori) {
														echo '<option value="'.$kategori->cat_sname.'">'.$kategori->cat_name.'</option>';
													} ?>
												</select>
											</div>
											<div class="input-field col s5 m5">
												<input type="text" id="cariproduk" name="cariproduk">
												<label for="cariproduk">Cari Produk</label>
											</div>
											<div class="input-field col s3 m3">
												<button class="btn waves-effect waves-light amber col s12 m12" type="submit" name="submit" value="ok">Cari</button>
											</div>
										</div>
									</form>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<!-- special divider for search section -->
			<div id="search_divider">
				<div class="divider"></div>
			</div>
		</div>

		<!-- MY REVIEW SECTION -->
		<?php if(!empty($my_reviews)) { ?>
		<div class="section">
			<div class="row">
				<div class="col s12 m10 offset-m1">
					<p class="judul-section">Review Saya <a href="review/tambah" class="right btn waves-effect waves-light"><i class="material-icons left">add</i>Tambah</a></p>
					<div class="row">
						<?php if(empty($my_reviews)) {
							echo "Oops, there is no review.";
						} else {
							foreach($my_reviews as $review) {
								$review_value = "";
								$place = $this->Place_model->get_single(array('place_id'=>$review->place_id));
								$user = $this->User_details_model->get_single(array('user_id'=>$review->user_id));
								$place_images = $this->Place_images_model->get_single(array('place_id'=>$review->place_id));
								$place_city = $this->M_city_model->get_single(array('citycode'=>$place->city));
								$price_level = $this->M_pricelevel_model->get_single(array('price_level'=>$review->price_level));
								if(empty($place_images)) {
									$recent_place_images = 'itemimage.png';
								} else {
									$recent_place_images = $place_images->filename.'_thumb.'.$place_images->fileext;
								}

								for($i=0; $i < (int)$review->price_level; $i++){
									$review_value .= '<img src="assets/images/dollar-mini.png" alt="price-level" width="22px" />';
								}


								echo '<div class="col s12 m12">
									<div class="card horizontal">
										<div class="card-image">
											<img src="assets/images/venues/thumbnails/'.$recent_place_images.'" alt="" class="responsive-img" />
										</div>
										<div class="card-stacked">
											<div class="card-content">
												<h5>'.$place->name.' - '.$place_city->cityname.'</h5>
												<p style="margin-top: 30px;"><strong><em>'.$review->review_title.'</em></strong></p>
												<p><em>"'.substr($review->reviews, 0).'"</em></p>
												<p style="text-align:right; margin-bottom: 30px;">'.$user->fullname.'</p>
												<a href="javascript:void()"><p style="text-align:right;" title="'.$price_level->notes.'">'.$review_value.'</p></a>
											</div>
										</div>
									</div>
								</div>';
							}
						} ?>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>

		<!-- REVIEW LIST SECTION -->
		<div class="section">
			<div class="row">
				<div class="col s12 m10 offset-m1">
					<p class="judul-section">Review Terbaru <!-- <a href="#" class="right judul-section-see">Lihat Semua</a> --></p>
					<div class="row">
						<?php if(empty($recent_reviews)) {
							echo "Oops, there is no review.";
						} else {
							foreach($recent_reviews as $review) {
								$review_value = "";
								$place = $this->Place_model->get_single(array('place_id'=>$review->place_id));
								$user = $this->User_details_model->get_single(array('user_id'=>$review->user_id));
								$place_images = $this->Place_images_model->get_single(array('place_id'=>$review->place_id));
								$place_city = $this->M_city_model->get_single(array('citycode'=>$place->city));
								$price_level = $this->M_pricelevel_model->get_single(array('price_level'=>$review->price_level));
								if(empty($place_images)) {
									$recent_place_images = 'itemimage.png';
								} else {
									$recent_place_images = $place_images->filename.'_thumb.'.$place_images->fileext;
								}

								for($i=0; $i < (int)$review->price_level; $i++){
									$review_value .= '<img src="assets/images/dollar-mini.png" alt="price-level" width="22px" />';
								}


								echo '<div class="col s12 m12">
									<div class="card horizontal">
										<div class="card-image">
											<img src="assets/images/venues/thumbnails/'.$recent_place_images.'" alt="" class="responsive-img" />
										</div>
										<div class="card-stacked">
											<div class="card-content">
												<h5>'.$place->name.' - '.$place_city->cityname.'</h5>
												<p style="margin-top: 30px;"><strong><em>'.$review->review_title.'</em></strong></p>
												<p><em>"'.substr($review->reviews, 0).'"</em></p>
												<p style="text-align:right; margin-bottom: 30px;">'.$user->fullname.'</p>
												<a href="javascript:void()"><p style="text-align:right;" title="'.$price_level->notes.'">'.$review_value.'</p></a>
											</div>
										</div>
									</div>
								</div>';
							}
						} ?>
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
			$('#hotItemDetails').modal({
				dismissible: false,
				opacity: .9
			});
			// materialize select settings
			$('select').material_select();
			// custom alert message for home
			$('#alert_close').click(function() {
				$('#alert_box').fadeOut("slow",function(){
					
				});
			});

			// carousel
			$('.carousel').carousel();
			$('.owl-carousel').owlCarousel({
				loop: true,
				margin:10,
				nav:true,
				responsive:{
			   	0:{
			   		items:1
			      },
			   	600:{
			      	items:3
			     	},
			      1000:{
			      	items:5
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

			$('.hotItems').on("click",function(e) {
				e.preventDefault();
				var item_id = $(this).parent().data('id');
				$.ajax({
					url: base_url + 'home/jxGetItemDetails',
					type: 'post',
					dataType: 'html',
					data: {
						item_id: item_id
					},
					success: function(result) {
						$('#hotItemContent').html(result);
					},
					error: function() {
						alert("Ajax Request Failed!");
					}
				});
				$('#hotItemDetails').modal('open');
			});
		});
	</script>
</body>
</html>