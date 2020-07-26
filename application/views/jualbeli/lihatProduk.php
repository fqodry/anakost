<!-- SLIDER HEAD -->
	<div class="container-fluid">
		<div class="section">
			<div class="row">
				<!-- kolom menu -->
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
								<li><a href="review">Lihat Review Saya</a></li>
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
				<!-- kolom isi -->
				<div class="col s12 m8">
					<!-- section promo dan search kategori -->
					<div class="section">
						<div class="col s12 m6">
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
					<!-- section tabel list produk -->
					<div class="section">
						<div class="col s12 m12">
							<p class="judul-section">Produk Saya</p>
							<table class="bordered" id="tabelProduk">
								<tbody>
							<?php
								if(empty($all_my_items)) {
									echo "tidak ada produk.";
								} else {
									foreach($all_my_items as $item) {
										$item_detail = $this->Items_detail->get_single(array('item_id'=>$item->item_id));
										$item_image = $this->Items_images->get_single(array('item_id'=>$item->item_id));
										$item_cat = $this->M_item_category_model->get_single(array('cat_sname'=>$item->item_category));
										if($item->item_stock == 0) {$item_stock = "Stok Kosong";} else {$item_stock = "Tersedia";}
										if(empty($item_image)) {
											$fotoproduk = 'itemimage.png';
										} else {
											$fotoproduk = $item_image->fileimage;
										}
										if(strtolower($item_detail->condition) == 'used'){
											$item_condition = 'Bekas';
										} else {
											$item_condition = 'Baru';
										}
										echo '
											<tr>
												<td width="30%">
													<div class="col s3">
														<img src="assets/images/items/'.$fotoproduk.'" alt="user profile image" class="responsive-img">
													</div>
													<div class="col s9" style="font-size:14px;">
														<a href="#modalDetails">'.$item->item_name.'</a> - <em style="font-size:12px;">'.$item_condition.'</em>
													</div>
													<div class="col s12">
														<span style="font-size:12px;">'.$item_cat->cat_name.'</span>
													</div>
												</td>
												<td width="30%">
													<div class="col s12">
														'.$item->item_id.'
													</div>
													<div class="col">
														Rp '.number_format($item_detail->price,0,",",".").'
													</div>
												</td>
												<td width="20%">
													<div class="col s12">
														'.$item_stock.'
													</div>
												</td>
												<td width="20%">
													<div class="col s12" style="font-size:14px;">
														<a href="" class="tooltipped" data-position="top" data-delay="50" data-tooltip="Ubah Produk"><i class="material-icons tiny">mode_edit</i>&nbsp;Ubah</a><br>
														<a href="" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Hapus Produk"><i class="material-icons tiny">delete</i>&nbsp;Hapus</a>
													</div>
												</td>
											</tr>
										';
									}
								}
							?>
								</tbody>
							</table>
						</div>
						<div id="modalDetails" class="modal modal-fixed-footer">
							<div class="modal-content" id="modalItems">
								<h4>Modal Header</h4>
								<div id="isiModalItems"></div>
							</div>
							<div class="modal-footer">
								<a class="modal-action modal-close waves-effect waves-light btn-flat">Close</a>
							</div>
						</div>
					</div>
				</div>
			</div>
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

	<style>
		.select-wrapper input.select-dropdown {
			font-size: 0.8rem;
		}
	</style>
	<script src="assets/js/jquery211.min.js"></script>
	<script src="assets/materialize/js/materialize.min.js"></script>
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
			// tooltip
			$('.tooltipped').tooltip({delay: 50});

			// modal details
			$('#modalDetails').modal({
				dismissible: false,
				opacity: .5,
				inDuration: 300,
				outDuration: 200,
				ready: function(modal, trigger) {
					alert("Ready");
					$.ajax({
						url: base_url + 'jualbeli/jx',
						dataType: 'html',
						success: function(result) {
							
						}
					});
				},
				complete: function() {
					$('#isiModalItems').empty();
				}
			});
		});
	</script>
</body>
</html>