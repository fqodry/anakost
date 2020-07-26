<!-- SLIDER HEAD -->
	<!-- FB JS SDK -->
	<div id="fb-root"></div>
	<script>
		var base_url = "<?php echo base_url(); ?>";

		function statusChangeCallback(response) {
			console.log('statusChangeCallback');
			console.log(response);

			if(response.status === 'connected') {
				hasConnected();
			} else {
				// document.getElementById('status').innerHTML = 'Please log ' + 'into this app.';
				document.getElementById('status').innerHTML = 'not connected';
			}
		}

		function checkLoginState() {
			FB.getLoginStatus(function(response) {
				statusChangeCallback(response);
			});
		}

		window.fbAsyncInit = function() {
			FB.init({
				appId		: '1922547971290169',
				cookie	: true,
				xfbml		: true,
				version	: 'v2.9'
			});

			FB.getLoginStatus(function(response) {
				statusChangeCallback(response);
			});
		};

		// load the SDK Asynchronously
		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_US/sdk.js";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));

		function hasConnected() {
			console.log('Welcome! Fetching your information.... ');
			FB.api('/me',{fields:'first_name,last_name,name,email,education'}, function(response) {
				console.log(response);
				$.ajax({
					'url': base_url + 'login/fbLoginHandler/',
					'data': {
						email: response.email,
						nama: response.name
					},
					'dataType': 'json',
					'type': 'post',
					'success': function(result) {
						console.log(result);

						setTimeout(function() {
							window.location = base_url + "home";
						}, 1500);
					}
				});
			});
		}

		function fbLogout() {
			FB.logout(function(response) {
				console.log("Facebook has logout.... ");
				console.log(response);
			});
		}
	</script>

	<div class="container-fluid">
		<!-- search all section -->
		<div class="section" id="search-all-section">
			<div class="row">
				<form action="<?php echo $form_search; ?>" method="post" id="formSearchProduk">
					<div class="col s12 m12 l12">
						<!-- <h4 style="padding: 150px 0" class="center-align">Oops, this page is still under construction!</h4> -->
						<div class="input-field col s12 m6 offset-m2 l6 offset-l2">
							<input type="text" class="validate" name="search_input" id="search_input" placeholder="Ketik nama produk misal: baju batman/sweater alan walker" required autofocus="autofocus" onkeyup="jxSearchHandler()" />
						</div>
						<div class="input-field col s12 m2 l2">
							<button class="btn waves-effect waves-light col s12" type="submit" name="submit" id="search_btn" value="short">Search</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- advanced search section -->
		<div class="section">
			<div class="row" id="adv-search-row">
				<div class="col s12 m3 l3">
					<ul class="collapsible" data-collapsible="expandable">
						<li>
							<div class="collapsible-header active"><i class="material-icons">apps</i>Kategori</div>
							<div class="collapsible-body" style="padding: 1rem;">
								<p>
									<input class="with-gap" name="sel_kategori" type="radio" id="sel_kategori_all" value="all" checked="checked" onclick="jxSearchHandler()" />
      							<label for="sel_kategori_all">All</label>
								</p>
								<?php foreach($sel_kategori as $kategori){
									// if($kategori->cat_sname == 'oth') {
									// 	$checked = 'checked="checked"';
									// } else {
									// 	$checked = '';
									// }
									echo '
										<p>
											<input class="with-gap" name="sel_kategori" type="radio" id="sel_kategori_'.$kategori->cat_sname.'" value="'.$kategori->cat_sname.'" onclick="jxSearchHandler()" />
		      							<label for="sel_kategori_'.$kategori->cat_sname.'">'.$kategori->cat_name.'</label>
										</p>
									';
								} ?>
							</div>
						</li>
						<li>
							<div class="collapsible-header active"><i class="material-icons">sentiment_very_satisfied</i>Kondisi</div>
							<div class="collapsible-body">
								<p>
									<input class="with-gap" name="sel_kondisi" type="radio" id="sel_kondisi_all" value="all" checked="checked" onclick="jxSearchHandler()"  />
									<label for="sel_kondisi_all">All</label>
								</p>
								<p>
									<input class="with-gap" name="sel_kondisi" type="radio" id="sel_kondisi_new" value="new" onclick="jxSearchHandler()" />
									<label for="sel_kondisi_new">Baru</label>
								</p>
								<p>
									<input class="with-gap" name="sel_kondisi" type="radio" id="sel_kondisi_used" value="used" onclick="jxSearchHandler()" />
									<label for="sel_kondisi_new">Bekas</label>
								</p>
							</div>
						</li>
						<li>
							<div class="collapsible-header active"><i class="material-icons">local_offer</i>Harga</div>
							<div class="collapsible-body">
								<p>
									<input class="with-gap" name="sel_harga" type="radio" id="sel_harga_all" value="all" checked="checked" onclick="jxSearchHandler()" />
									<label for="sel_harga_all">All Price</label>
								</p>
								<p>
									<input class="with-gap" name="sel_harga" type="radio" id="sel_harga_gopek" value="500000" onclick="jxSearchHandler()" />
									<label for="sel_harga_gopek">Rp 0 - 500,000</label>
								</p>
								<p>
									<input class="with-gap" name="sel_harga" type="radio" id="sel_harga_seceng" value="1000000" onclick="jxSearchHandler()" />
									<label for="sel_harga_seceng">Rp 500,000 - 1,000,000</label>
								</p>
								<p>
									<input class="with-gap" name="sel_harga" type="radio" id="sel_harga_cenggo" value="2000000" onclick="jxSearchHandler()" />
									<label for="sel_harga_cenggo">Rp 1,000,000 - 2,000,000</label>
								</p>
								<p>
									<input class="with-gap" name="sel_harga" type="radio" id="sel_harga_duajut" value="9999999" onclick="jxSearchHandler()" />
									<label for="sel_harga_duajut">Rp 2,000,000 +++</label>
								</p>
							</div>
						</li>
					</ul>
				</div>
				<div class="col s12 m9 l9">
					<!-- list items here -->
					<?php 
					if(empty($search_items)) {
						echo 'oops there is no items.';
					} else {
						foreach($search_items as $item) {
							$item_image = $this->Items_images->get_single(array('item_id'=>$item->item_id));
							$item_details = $this->Items_detail->get_single(array('item_id'=>$item->item_id));
							if(empty($item_image)) {
								$image = 'itemimage.png';
							} else {
								$image = $item_image->filename.'_thumb.'.$item_image->fileext;
							}
							echo '
								<div class="col s6 m6 l3">
									<div class="icon-block center search-item">
										<a href="home/viewItem/'.$item->id.'">
											<img src="assets/images/items/thumbnails/'.$image.'" alt="hello" class="responsive-img" id="image-test" />
											<div class="search-item-desc">
												<div class="search-item-name">'.$item->item_name.'</div>
												<div class="search-item-lower"><small>'.format_rupiah((float)$item_details->price).'</small></div>
											</div>
										</a>
									</div>
								</div>
							';
						}
					} ?>
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>
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
			$('.collapsible').collapsible();
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

		function jxSearchHandler() {
			var kategori = $('input[name="sel_kategori"]:checked').val();
			var kondisi = $('input[name="sel_kondisi"]:checked').val();
			var harga = $('input[name="sel_harga"]:checked').val();
			var searchfield = $('input[id="search_input"]').val();
			setTimeout(function(){
				console.log(kategori+" - "+kondisi+" - "+harga+" - "+searchfield);
			},2000);
		}
	</script>
</body>
</html>