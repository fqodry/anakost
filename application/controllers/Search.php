<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('codekiddies'));
		$this->load->model('M_item_category_model');
		$this->load->model('Items_model');
		$this->load->model('Items_detail');
		$this->load->model('Items_images');
	}

	public function index() {
		$this->searchView();
	}

	function searchView() {
		if(isset($this->session->userdata['loggedIn'])) {
			$data['loggedIn'] = $this->session->userdata['loggedIn'];

			// additional data
			$data['sel_kategori'] = $this->M_item_category_model->get_all(array('is_avail'=>'Y'));
			$data['hot_items'] = $this->Items_model->get_all(array('is_hotitem'=>'Y'),4);
			$data['search_items'] = $this->Items_model->get_all();

			$data['title'] = 'Info Kost Semarang, Cari Kos Kosan Semarang, Rumah Kost di Semarang - Anakost.id';
			$data['form_login'] = base_url() . 'login/loginProcess';
			$data['form_search'] = base_url() . 'search/searchHandler';

			$this->load->view('layouts/head_2',$data);
			$this->load->view('search/searchView',$data);
		} else {
			// additional data
			$data['sel_kategori'] = $this->M_item_category_model->get_all(array('is_avail'=>'Y'));
			$data['hot_items'] = $this->Items_model->get_all(array('is_hotitem'=>'Y'),4);
			$data['search_items'] = $this->Items_model->get_all();

			$data['title'] = 'Info Kost Semarang, Cari Kos Kosan Semarang, Rumah Kost di Semarang - Anakost.id';
			$data['form_login'] = base_url() . 'login/loginProcess';
			$data['form_search'] = base_url() . 'search/searchHandler';

			$this->load->view('layouts/head_2',$data);
			$this->load->view('search/searchView',$data);
		}
	}

	function cariProdukSimple() {
		$kategori = $this->input->post('kategori');
		$cariproduk = $this->input->post('cariproduk');

		// additional data
		$data['sel_kategori'] = $this->M_item_category_model->get_all(array('is_avail'=>'Y'));
		$data['search_items'] = $this->Items_model->get_all_like(array('item_category'=>$kategori), array('item_name'=>$cariproduk));

		$data['title'] = 'Info Kost Semarang, Cari Kos Kosan Semarang, Rumah Kost di Semarang - Anakost.id';
		$data['form_login'] = base_url() . 'login/loginProcess';
		$data['form_search'] = base_url() . 'search/searchHandler';
		
		$this->load->view('layouts/head_2',$data);
		$this->load->view('search/searchView',$data);
	}
}