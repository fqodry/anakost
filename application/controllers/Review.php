<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('codekiddies','form'));
		$this->load->model('M_item_category_model');
		$this->load->model('M_place_category_model');
		$this->load->model('User_details_model');
		$this->load->model('Place_model');
		$this->load->model('Place_images_model');
		$this->load->model('Place_reviews_model');
		$this->load->model('M_city_model');
		$this->load->model('M_pricelevel_model');
	}

	public function index()
	{
		$this->reviewList();
	}

	function reviewList() {
		if (isset($this->session->userdata['loggedIn'])) {
			$data['loggedIn'] = $this->session->userdata['loggedIn'];
			$loggedIn = $data['loggedIn'];

			// additional data
			$data['sel_kategori'] = $this->M_item_category_model->get_all(array('is_avail'=>'Y'));
			$data['recent_reviews'] = $this->Place_reviews_model->get_all(array('is_avail'=>'Y'),6);
			$data['my_reviews'] = $this->Place_reviews_model->get_all(array('user_id'=>$loggedIn['user_id'],'is_avail'=>'Y'),6);
			$data['user_details'] = $this->User_details_model->get_single(array('user_id'=>$data['loggedIn']['user_id']));

			$data['title'] = 'Info Kost Semarang, Cari Kos Kosan Semarang, Rumah Kost di Semarang - Anakost.id';
			$data['form_login'] = base_url() . 'login/loginProcess';
			$data['form_cari_simple'] = base_url() . 'search-produk';

			$this->load->view('layouts/head_2',$data);
			$this->load->view('review/reviewThing',$data);
		} else {
			// additional data
			$data['sel_kategori'] = $this->M_item_category_model->get_all(array('is_avail'=>'Y'));
			$data['recent_reviews'] = $this->Place_reviews_model->get_all(array('is_avail'=>'Y'),6);

			$data['title'] = 'Info Kost Semarang, Cari Kos Kosan Semarang, Rumah Kost di Semarang - Anakost.id';
			$data['form_login'] = base_url() . 'login/loginProcess';
			$data['form_cari_simple'] = base_url() . 'search-produk';

			$this->load->view('layouts/head_2',$data);
			$this->load->view('review/reviewThing',$data);
		}
	}

	function reviewDetails($id) {
		// additional data
		$review = $this->Place_model->get_single(array('id'=>$id));
		$data['review'] = $review;

		$data['title'] = 'Info Kost Semarang, Cari Kos Kosan Semarang, Rumah Kost di Semarang - Anakost.id';
		$data['form_login'] = base_url() . 'login/loginProcess';
		$data['form_cari_simple'] = base_url() . 'search-produk';

		$this->load->view('layouts/head_2',$data);
		$this->load->view('review/review_details',$data);
	}

	function reviewAdd() {
		if (isset($this->session->userdata['loggedIn'])) {
			$data['loggedIn'] = $this->session->userdata['loggedIn'];
			$loggedIn = $data['loggedIn'];

			// additional data
			$data['sel_kategori'] = $this->M_place_category_model->get_all(array('is_avail'=>'Y'));
			$data['user_details'] = $this->User_details_model->get_single(array('user_id'=>$loggedIn['user_id']));
			$data['cities'] = $this->M_city_model->get_all();

			// get Max ID
			$maxId = $this->Place_model->maxId();
			$idnow = $maxId->maxid+1;
			$place_id = 'PLC' . str_pad($idnow, 4, '0', STR_PAD_LEFT);
			$data['place_id'] = $place_id;

			$data['title'] = 'Info Kost Semarang, Cari Kos Kosan Semarang, Rumah Kost di Semarang - Anakost.id';
			$data['form_cari_simple'] = base_url() . 'search-produk';
			$data['form_tambah'] = base_url() . 'review/reviewAddHandler';

			// Init Map For Google Maps
			$data['init_map'] = '
				//default init map
				function initMap() {
					var tempat = {
						lat: -6.254150,
						lng: 106.706460
					};
					var map = new google.maps.Map(document.getElementById("venuemap"), {
						zoom: 15,
						center: tempat
					});
					var marker = new google.maps.Marker({
						position: tempat,
						map: map,
						clickable: true,
						draggable: true,
						animation: google.maps.Animation.BOUNCE
					});
					var geocoder = new google.maps.Geocoder();

					marker.addListener("dragstart", function(event){
						document.getElementById("lokasitempat").innerHTML = "Currently dragging marker . . .";
					});

					marker.addListener("dragend", function(event){
						document.getElementById("lokasitempat").innerHTML = "";
						alert("lat: "+event.latLng.lat().toFixed(10)+", long: "+event.latLng.lng().toFixed(10));
						document.getElementById("latlngtempat").value = event.latLng.lat().toFixed(10) + "," + event.latLng.lng().toFixed(10);
					});

					$("#lokasitempat").on("keyup", function(){
						setTimeout(function(){
							geocodeAddress(geocoder, map);
						},2000);
					});
				}

				//another init map function
				function initAutocomplete() {
					var tempat = {
						lat: -6.254150,
						lng: 106.706460
					};
					var map = new google.maps.Map(document.getElementById("venuemap"), {
						zoom: 15,
						center: tempat,
						mapTypeId: "roadmap"
					});

					// Create the search box and link it to the UI element.
					var input = document.getElementById("searchbox");
					var searchBox = new google.maps.places.SearchBox(input);
					map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

					// Bias the SearchBox results towards current map`s viewport.
					map.addListener("bounds_changed", function() {
						searchBox.setBounds(map.getBounds());
					});

					var markers = [];
					// Listen for the event fired when the user selects a prediction and retrieve
        			// more details for that place.
					searchBox.addListener("places_changed", function(){
						var places = searchBox.getPlaces();

						if(places.length == 0){
							return;
						}

						// Clear out the old markers.
						markers.forEach(function(marker) {
							marker.setMap(null);
						});
						markers = [];

						// For each place, get the icon, name and location.
						var bounds = new google.maps.LatLngBounds();
						places.forEach(function(place){
							if(!place.geometry) {
								console.log("Returned place contains no geometry");
								return;
							}
							var icon = {
								url: place.icon,
								size: new google.maps.Size(71, 71),
								origin: new google.maps.Point(0, 0),
								anchor: new google.maps.Point(17, 34),
								scaledSize: new google.maps.Size(25, 25)
							};

							// Create a marker for each place.
							var marker = new google.maps.Marker({
								map: map,
								icon: icon,
								title: place.name,
								position: place.geometry.location,
								clickable: true,
								draggable: true
							});

							markers.push(marker);

							document.getElementById("latlngtempat").value = place.geometry.location.lat().toFixed(10) + "," + place.geometry.location.lng().toFixed(10);

							marker.addListener("dragend", function(event){
								document.getElementById("latlngtempat").value = event.latLng.lat().toFixed(10) + "," + event.latLng.lng().toFixed(10);
							});

							if(place.geometry.viewport) {
								// Only geocodes have viewport.
								bounds.union(place.geometry.viewport);
							} else {
								bounds.extend(place.geometry.location);
							}

							//update lokasitempat value same with searchbox value
							var searchboxval = input.value;
							if(searchboxval) {
								document.getElementById("lokasitempat").value = searchboxval;
							}
						});
						map.fitBounds(bounds);
					});
				}

				function geocodeAddress(geocoder, resultsMap){
					var address = document.getElementById("lokasitempat").value;
					geocoder.geocode({"address": address}, function(results, status) {
						if(status === "OK") {
							resultsMap.setCenter(results[0].geometry.location);
							var marker = new google.maps.Marker({
								map: resultsMap,
								position: results[0].geometry.location
							});
						} else {
							console.log("Geometry was not successful for the following reason: "+status);
						}
					});
				}
			';

			$this->load->view('layouts/head_2',$data);
			$this->load->view('review/reviewAdd',$data);
		} else {
			redirect(base_url().'home');
		}
	}

	function reviewAddHandler() {
		if (isset($this->session->userdata['loggedIn'])) {
			$loggedIn = $this->session->userdata('loggedIn');
			$fototempatnames = $this->input->post('fototempatname');
			$ex_fototempatnames = explode(",", $fototempatnames);
			$place_id = $this->generatePlaceId();
			$latlng = $this->input->post('latlngtempat');
			$ex_latlng = explode(",", $latlng);
			$data = array(
				'place_id' 		=> (string)$place_id,
				'name'			=> $this->input->post('namatempat'),
				'description'	=> $this->input->post('deskripsitempat'),
				'address'		=> $this->input->post('lokasitempat'),
				'city'			=> $this->input->post('kotatempat'),
				'lat'				=> $ex_latlng[0],
				'long'			=> $ex_latlng[1],
				'pl_cat_id'		=> $this->input->post('pilkategori')
			);
			$data_review = array(
				'place_id'		=> (string)$place_id,
				'user_id'		=> $loggedIn['user_id'],
				'price_level'	=> $this->input->post('pricetempat'),
				'review_title'	=> $this->input->post('reviewtitle'),
				'reviews'		=> $this->input->post('reviewtempat')
			);

			// data place images
			foreach($ex_fototempatnames as $key=>$fototempat) {
				if($key == 0) {
					$file_id = '';
				} else {
					$file_id = $key;
				}
				$file_ext = substr(str_replace(' ', '', $fototempat), -3);
				$file_name = 'apic_'.$place_id.'_'.$file_id;
				$data_images = array(
					'place_id'	=> $place_id,
					'filename'	=> $file_name,
					'fileext'	=> $file_ext,
					'fileimage'	=> $file_name.'.'.$file_ext
				);
				$this->Place_images_model->add($data_images);
			}

			// Insert Place data
			if(!empty($data)) {
				$this->Place_model->add($data);
			}

			// Insert Place review data
			if(!empty($data_review)) {
				$this->Place_reviews_model->add($data_review);
			}

			// upload place images
			$config['upload_path'] = './assets/images/venues/';
			$config['file_name'] = 'apic_'.$place_id.'_';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = 500;
			$config['remove_spaces'] = TRUE;

			$this->upload->initialize($config);

			// multi upload class from libraris MY_Upload
			if(!$this->upload->do_multi_upload('fototempat')) {
				// failed upload message
				$flash_msg = array(
					'msg'		=> "Failed to upload images: ".$this->upload->display_errors(),
					'type'	=> "red darken-1"
				);
				$this->session->set_flashdata('handler_msg',$flash_msg);
				redirect(base_url().'review');
			} else {
				$place_images = $this->Place_images_model->get_all(array('place_id'=>$place_id));
				foreach($place_images as $key=>$place_image) {
					if($key == 0) {
						$config['image_library'] = 'gd2';
						$config['source_image'] = 'assets/images/venues/'.$place_image->fileimage;
						$config['create_thumb'] = TRUE;
						$config['new_image'] = './assets/images/venues/thumbnails/';
						$config['maintain_ratio'] = FALSE;
						$config['width'] = 315;
						$config['height'] = 315;

						$this->load->library('image_lib',$config);

						if(!$this->image_lib->resize()) {
							// failed upload message
							$flash_msg = array(
								'msg'		=> "Failed to resize image: ".$this->image_lib->display_errors(),
								'type'	=> "red darken-1"
							);
							$this->session->set_flashdata('handler_msg',$flash_msg);
							redirect(base_url().'review/tambah');
						}
					}
				}
			}

			// success message
			$flash_msg = array(
				'msg'		=> "Berhasil Tambah Review Venue.",
				'type'	=> "green lighten-1"
			);
			$this->session->set_flashdata('handler_msg',$flash_msg);
			redirect(base_url().'review');
		}
	} // end of function

	function generatePlaceId(){
		// get Max ID
		$maxId = $this->Place_model->maxId();
		$idnow = $maxId->maxid+1;
		$place_id = 'PLC' . str_pad($idnow, 4, '0', STR_PAD_LEFT);
		return $place_id;
	}
}
