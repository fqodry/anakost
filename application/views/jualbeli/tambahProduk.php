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
					<!-- section tambah produk -->
					<div class="section">
						<div class="col s12">
							<?php echo form_open_multipart($form_tambah, array('class'=>'col s8','id'=>'tambahForm')); ?>
								<div class="row">
									<input type="hidden" name="hid_item_id" id="hid_item_id" value="<?php echo ($item_id)?$item_id : ''; ?>" readonly>
									<div class="input-field col s12">
										<p class="judul-section">Foto Produk</p>
										<br>
									</div>
									<div class="file-field input-field">
										<div class="btn">
											<span>Files</span>
											<input type="file" name="fotoproduk[]" id="fotoproduk" multiple>
										</div>
										<div class="file-path-wrapper">
											<input type="text" class="file-path validate" name="fotoprodukname" placeholder="Upload one or more photos">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12">
										<p class="judul-section">Detail Produk</p>
									</div>
									<div class="input-field col s12">
										<input type="text" name="namaproduk" id="namaproduk">
										<label for="namaproduk">Nama Produk</label>
										<small><em>*Nama produk maksimum <strong>70</strong> karakter.</em></small>
									</div>
									<div class="input-field col s5">
										<select name="pilkategori" id="pilkategori">
											<option value="" disabled selected>Pilih Kategori</option>
											<?php
												foreach($sel_kategori as $kategori) {
													echo '<option value="'.$kategori->cat_sname.'">'.$kategori->cat_name.'</option>';
												}
											?>
										</select>
									</div>
									<div class="input-field col s5" id="divSubKategori"></div>
									<div class="input-field col s8">
										<input type="text" name="hargaproduk" id="hargaproduk">
										<label for="hargaproduk">Harga (IDR)</label>
									</div>
									<div class="input-field col s4">
										<input type="text" name="beratproduk" id="beratproduk">
										<label for="beratproduk">Berat (gr)</label>
									</div>
									<div class="input-field col s5">
										<select name="stokproduk" id="stokproduk">
											<option value="" disabled selected>Pilih Status</option>
											<option value="1">Stok Tersedia</option>
											<option value="0">Stok Kosong</option>
										</select>
										<label for="stokproduk">Status</label>
									</div>
									<div class="col s12">
										<p class="judul-section">Kondisi Barang</p>
										<input type="radio" class="with-gap" name="kondisiproduk" id="kondisiprodukbaru" value="new" checked>
										<label for="kondisiprodukbaru">Baru</label>
										&emsp;
										<input type="radio" class="with-gap" name="kondisiproduk" id="kondisiprodukbekas" value="used">
										<label for="kondisiprodukbekas">Bekas</label>
									</div>
								</div>

								<div class="row">
									<div class="input-field col s12">
										<p class="judul-section">Deskripsi Produk</p>
									</div>
									<div class="input-field col s12">
										<textarea class="materialize-textarea" name="deskripsiproduk" id="deskripsiproduk" data-length="1000"></textarea>
										<label for="deskripsiproduk">Deskripsi</label>
										<small><em>*Deskripsi Produk maksimum <strong>1000</strong> karakter.</em></small>
									</div>
								</div>

								<div class="row">
									<div class="input-field col s6">
										<a class="btn waves-effect waves-light col s12 grey darken-3" href="<?php echo base_url('jualbeli'); ?>">Batal</a>
									</div>
									<div class="input-field col s6">
										<button class="btn waves-effect waves-light col s12" type="submit" name="submit">Simpan</button>
									</div>
								</div>
							<?php echo form_close(); ?>
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
			// textarea counter
			$('textarea#deskripsiproduk').characterCounter();
		});

		// on pilkategori change do something
		$('select#pilkategori').on("change",function() {
			var kategori_id = $(this).val();
			var getUrl = '<?php echo $url_category; ?>' + '/' + kategori_id;
			$.ajax({
				type: 'GET',
				url: getUrl,
				data: $(this).serialize(),
				success: function(data, textStatus, jqXHR) {
					$('#divSubKategori').html(data);
					$('#pilsubkategori').material_select();
				},
				failed: function(data) {
					alert('Ajax Request Failed');
				}
			});
		});

		// form validation
		$('form#tambahForm').validate({
			rules: {
				hid_item_id: { required: true },
				fotoprodukname: { required: true },
				namaproduk: { required: true, minlength: 5, maxlength: 70 },
				pilkategori: { required:  true },
				pilsubkategori: { required: true },
				hargaproduk: { required: true, number: true },
				beratproduk: { required: true, number: true },
				stokproduk: { required: true },
				kondisiproduk: { required: true },
				deskripsiproduk: { required: true, minlength: 15, maxlength: 1000 }
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

		// $('#hargaproduk').keyup(function() {
		// 	// change input value
		// 	var val = $(this).val();
		// 	$.ajax({
		// 		url: base_url + 'jualbeli/jxHargaFormat/' + val,
		// 		type: "post",
		// 		success: function(result) {
		// 			document.getElementById('hargaproduk').value = result;
		// 		}
		// 	})
		// });

		function isNumeric(n) {
			return !isNaN(parseFloat(n)) && isFinite(n);
		}

		function numberWithCommas(x) {
			return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		}

		function goLihatProduk() {
			alert('wow');
			window.location = base_url + 'akost/jualbeli';
		}
	</script>
</body>
</html>