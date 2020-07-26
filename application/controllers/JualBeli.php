<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jualbeli extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('M_item_category_model');
		$this->load->model('M_item_subcategory_model');
		$this->load->model('User_details_model');
		$this->load->model('Items_model');
		$this->load->model('Items_detail');
		$this->load->model('Items_images');
		$this->load->model('Contactus_model');
		$this->load->model('Log_program_model');
		$this->load->helper(array('codekiddies','form'));
	}

	public function index() {
		$this->jualBeliView();
	}

	function jualBeliView() {
		if(isset($this->session->userdata['loggedIn'])) {
			$data['loggedIn'] = $this->session->userdata['loggedIn'];
			$loggedIn = $data['loggedIn'];

			// additional data
			$data['sel_kategori'] = $this->M_item_category_model->get_all(array('is_avail'=>'Y'));
			$data['all_my_items'] = $this->Items_model->get_all(array('seller_id'=>$loggedIn['user_id']));
			// print_r($data['all_items']);
			$data['user_details'] = $this->User_details_model->get_single(array('user_id'=>$data['loggedIn']['user_id']));

			$data['title'] = 'Info Kost Semarang, Cari Kos Kosan Semarang, Rumah Kost di Semarang - Anakost.id';
			$data['form_cari_simple'] = base_url() . 'search-produk';

			$this->load->view('layouts/head_2',$data);
			$this->load->view('jualbeli/lihatProduk',$data);
		} else {
			redirect(base_url().'home');
		}
	}

	function tambahProduk() {
		if(isset($this->session->userdata['loggedIn'])) {
			$data['loggedIn'] = $this->session->userdata['loggedIn'];
			$this->load->model('Temp_item_id_model');

			// additional data
			$data['sel_kategori'] = $this->M_item_category_model->get_all(array('is_avail'=>'Y'));
			$data['user_details'] = $this->User_details_model->get_single(array('user_id'=>$data['loggedIn']['user_id']));
			
			// get Max ID
			$maxId = $this->Items_model->maxId();
			$idnow = $maxId->maxid+1;
			if(strlen($idnow) == 1) {
				$id = '0'.$idnow;
			} else {
				$id = $idnow;
			}
			$item_id = 'ITM'.$id;
			$data['item_id'] = $item_id;

			// set temp item_id
			$tempId = $this->Temp_item_id_model->get_single(array('temp_itemid'=>$item_id));
			if(empty($tempId)) {
				$this->Temp_item_id_model->add(array('temp_itemid'=>$item_id, 'is_used'=>0));
			} else {
				if($tempId->is_used == 0) {
					$this->Temp_item_id_model->edit(array('temp_itemid'=>$item_id), array('set_at'=>date('Y-m-d H:i:s')));
				}
			}

			$data['title'] = 'Info Kost Semarang, Cari Kos Kosan Semarang, Rumah Kost di Semarang - Anakost.id';
			$data['form_cari_simple'] = base_url() . 'search-produk';
			$data['form_tambah'] = base_url() . 'jualbeli/tambahProdukHandler';
			$data['url_category'] = base_url() . 'jualbeli/jxGetSubcategory';

			$this->load->view('layouts/head_2',$data);
			$this->load->view('jualbeli/tambahProduk',$data);
		} else {
			redirect(base_url().'home');
		}
	}

	function tambahProdukHandler() {
		$this->load->model('Temp_item_id_model');
		$loggedIn = $this->session->userdata('loggedIn');
		$item_id = $this->input->post('hid_item_id');
		$fotoproduknames = $this->input->post('fotoprodukname');
		$ex_fotoproduknames = explode(",", $fotoproduknames);

		$data = array(
			'seller_id'			=> $loggedIn['user_id'],
			'item_id'			=> $item_id,
			'item_name'			=> ucwords($this->input->post('namaproduk')),
			'item_category'	=> $this->input->post('pilkategori'),
			'item_subcategory'=> $this->input->post('pilsubkategori'),
			'item_stock'		=> $this->input->post('stokproduk')
		);
		$data_details = array(
			'item_id'		=> $item_id,
			'price'			=> $this->input->post('hargaproduk'),
			'weight'			=> $this->input->post('beratproduk'),
			'condition'		=> $this->input->post('kondisiproduk'),
			'description'	=> $this->input->post('deskripsiproduk')
		);

		// insert data
		$this->Items_model->add($data);

		// insert data details
		$this->Items_detail->add($data_details);

		// insert data images
		foreach($ex_fotoproduknames as $key=>$fotoprodukname) {
			if($key == 0) {
				$file_id = '';
			} else {
				$file_id = $key;
			}
			$file_ext = substr(str_replace(' ', '', $fotoprodukname), -3);
			$file_name = 'apic_'.$item_id.'_'.$file_id;
			$data_images = array(
				'item_id'	=> $item_id,
				'filename'	=> $file_name,
				'fileext'	=> $file_ext,
				'fileimage'	=> $file_name.'.'.$file_ext
			);
			$this->Items_images->add($data_images);
		}

		// upload images
		$config['upload_path'] = './assets/images/items/';
		$config['file_name'] = 'apic_'.$item_id.'_';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 500;
		// $config['max_width'] = 1024;
		// $config['max_height'] = 768;
		$config['remove_spaces'] = TRUE;

		$this->upload->initialize($config);

		// multi upload class from libraris MY_Upload
		if(!$this->upload->do_multi_upload('fotoproduk')) {
			// failed upload message
			$flash_msg = array(
				'msg'		=> "Failed to upload images: ".$this->upload->display_errors(),
				'type'	=> "red darken-1"
			);
			$this->session->set_flashdata('handler_msg',$flash_msg);
			redirect(base_url().'jualbeli');
		} else {
			$item_images = $this->Items_images->get_all(array('item_id'=>$item_id));
			foreach($item_images as $key=>$item_image) {
				if($key == 0) {
					$config['image_library'] = 'gd2';
					$config['source_image'] = 'assets/images/items/'.$item_image->fileimage;
					$config['create_thumb'] = TRUE;
					$config['new_image'] = './assets/images/items/thumbnails/';
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
						redirect(base_url().'jualbeli/tambah');
					}
				}
			}
		}

		// edit temp id to used
		$this->Temp_item_id_model->edit(array('temp_itemid'=>$item_id),array('is_used'=>1,'set_at'=>date('Y-m-d H:i:s')));

		// success message
		$flash_msg = array(
			'msg'		=> "Berhasil Tambah Produk.",
			'type'	=> "green lighten-1"
		);
		$this->session->set_flashdata('handler_msg',$flash_msg);
		redirect(base_url().'jualbeli');
	}

	function jxGetSubcategory($cat_id) {
		$subcategory = $this->M_item_subcategory_model->get_all(array('cat_sname'=>$cat_id));
		echo '
			<select name="pilsubkategori" id="pilsubkategori">
				<option value="" disabled selected>Pilih Sub Kategori</option>';
		if($subcategory) {
			foreach($subcategory as $sub) {
				echo '<option value="'.$sub->subcat_sname.'">'.$sub->subcat_name.'</option>';
			}
		}
		echo'
			</select>
		';
	}

	function jxHargaFormat($value) {
		if(!is_numeric($value)) {
			echo "Please enter number format only";
		} else {
			echo number_format($value);
		}
	}

	
}