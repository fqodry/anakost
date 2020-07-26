<!-- SLIDER HEAD -->
	<div class="container-fluid">
		<div class="section">
			<div class="row">
				<div class="col s12 m2 offset-m1">
					<div class="card">
						<div class="card-content">
							<table>
								<tr>
									<td width="30%"><img src="assets/images/profile.png" alt="user profile image" class="responsive-img"></td>
									<td width="70%" style="font-size: 14px;" class="hide-on-small-only">
										<a href="" class="tooltipped" data-position="top" data-tooltip="<?php echo $user_details->fullname; ?>">
											<?php $namexplode = explode(" ", $user_details->fullname);
											echo $namexplode[0] . " " . $namexplode[1] . "..."; ?><br><small><em>My Profile</em></small>
										</a>
									</td>
									<td width="70%" style="font-size: 17px;" class="hide-on-med-and-up">
										<a href="">
											<?php echo $user_details->fullname; ?><br><small><em>My Profile</em></small>
										</a>
									</td>
								</tr>
							</table>
							<ul style="font-size: 13px">
								<li><a href="" class="tooltipped" data-position="top" data-delay="50" data-tooltip="Anakost Poin"><i class="material-icons tiny">shopping_basket</i>&nbsp;Rp 0</a></li>
							</ul>
							<div class="divider"></div>
							<ul style="font-size: 13px;">
								<p style="font-size: 16px; margin-bottom: 8px;"><strong>Jual Beli</strong></p>
								<li><a href="jualbeli">Lihat Produk</a></li>
								<li><a href="jualbeli/tambah">Tambah Produk</a></li>
							</ul>
							<div class="divider"></div>
							<ul style="font-size: 13px;">
								<p style="font-size: 16px; margin-bottom: 8px;"><strong>Review</strong></p>
								<li><a href="review">Lihat Review</a></li>
								<li><a href="review/tambah">Tulis Review</a></li>
							</ul>
							<!-- <div class="divider"></div>
							<ul style="font-size: 13px;">
								<p style="font-size: 16px; margin-bottom: 8px;"><strong>Kost</strong></p>
								<li><a href="booking">Lihat Daftar Kost</a></li>
								<li><a href="booking/tambah">Tambah Kost</a></li>
							</ul> -->
						</div>
					</div>
				</div>
				<div class="col s12 m4">
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
				<div class="col s12 m4">
					<p class="judul-section">Cari Produk</p>
					<table id="search_table">
						<tbody>
							<tr>
								<td>
									<form class="col s12 m12" action="<?php echo $form_cari_simple ?>" method="post">
										<div class="row">
											<div class="input-field col s4 m4">
												<!-- <i class="material-icons prefix">search</i> -->
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

		<!-- HOT LIST SECTION -->
		<!-- <div class="section">
			<div class="row">
				<div class="col s12 m10 offset-m1">
					<p class="judul-section">Hot Lists <a href="#" class="right judul-section-see">Lihat Semua</a></p>
					<div class="row">
						<div class="col s6 m3">
							<div class="icon-block center hotlist-item">
								<a href="javascript:void()">
									<img src="assets/images/kaos-ff8.jpg" alt="kaos fast furious 8" class="responsive-img" id="image-test">
									<div class="hotlist-item-desc">
										<div class="hotlist-name">Kaos Fast and Furious</div>
										<div class="hotlist-lower"><small>Mulai dari Rp 90rb</small></div>
									</div>
								</a>
							</div>
						</div>
						<div class="col s6 m3">
							<div class="icon-block center hotlist-item">
								<a href="javascript:void()">
									<img src="assets/images/celemek-char.jpg" alt="celemek character" class="responsive-img" id="image-test">
									<div class="hotlist-item-desc">
										<div class="hotlist-name">Celemek Karakter</div>
										<div class="hotlist-lower"><small>Mulai dari Rp 20rb</small></div>
									</div>
								</a>
							</div>
						</div>
						<div class="col s6 m3">
							<div class="icon-block center hotlist-item">
								<a href="javascript:void()">
									<img src="assets/images/botol-asi.jpg" alt="botol asi" class="responsive-img" id="image-test">
									<div class="hotlist-item-desc">
										<div class="hotlist-name">Botol ASI</div>
										<div class="hotlist-lower"><small>Mulai dari Rp 5rb</small></div>
									</div>
								</a>
							</div>
						</div>
						<div class="col s6 m3">
							<div class="icon-block center hotlist-item">
								<a href="javascript:void()">
									<img src="assets/images/kotak-makan.jpg" alt="kotak makan" class="responsive-img" id="image-test">
									<div class="hotlist-item-desc">
										<div class="hotlist-name">Kotak Makan</div>
										<div class="hotlist-lower"><small>Mulai dari Rp 35rb</small></div>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> -->

		<!-- HOT ITEMS SECTION -->
		<div class="section">
			<div class="row">
				<div class="col s12 m10 offset-m1">
					<p class="judul-section">Hot Items <!-- <a href="#" class="right judul-section-see">Lihat Semua</a> --></p>
					<div class="row">
						<?php 
							if(!empty($hot_items)){
								foreach($hot_items as $hot_item) {
									$hot_image = $this->Items_images->get_single(array('item_id'=>$hot_item->item_id));
									$hot_details = $this->Items_detail->get_single(array('item_id'=>$hot_item->item_id));
									echo '
										<div class="col s6 m3">
											<div class="icon-block center hotlist-item">
												<a href="home/viewItem/'.$hot_item->id.'">
													<img src="assets/images/items/'.$hot_image->fileimage.'" alt="'.$hot_item->item_name.'" class="responsive-img" id="image-test" />
													<div class="hotlist-item-desc">
														<div class="hotlist-name">'.$hot_item->item_name.'</div>
														<div class="hotlist-lower"><small>'.format_idr((float)$hot_details->price).'</small></div>
													</div>
												</a>
											</div>
										</div>
									';
								}
							} else {
								echo "Oops there is no hot items.";
							}
						?>
					</div>
				</div>
			</div>
		</div>
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
							<input type="email" class="validate" name="username" id="username" required>
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
					</div>
				</form>
			</div>
		</div>
		<div class="modal-footer">
			<a href="#!" class="modal-action modal-close waves-effect waves-yellow btn-flat">Forgot Password ?</a>
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

	<style>
		.select-wrapper input.select-dropdown {
			font-size: 0.8rem;
		}
	</style>
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
			// tooltip
			$('.tooltipped').tooltip({delay: 50});

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