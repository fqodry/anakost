<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_item_category_model');
		$this->load->model('User_details_model');
		$this->load->model('Items_model');
		$this->load->model('Items_detail');
		$this->load->model('Items_images');
		$this->load->model('Contactus_model');
		$this->load->model('Log_program_model');
		$this->load->helper(array('codekiddies'));
	}

	public function index()
	{
		$this->homeView();
	}

	function homeView()
	{
		if(isset($this->session->userdata['loggedIn'])) {
			$data['loggedIn'] = $this->session->userdata['loggedIn'];

			// additional data
			$data['sel_kategori'] = $this->M_item_category_model->get_all(array('is_avail'=>'Y'));
			$data['recent_items'] = $this->Items_model->get_all(array('item_stock >'=>0),4);
			$data['hot_items'] = $this->Items_model->get_all(array('is_hotitem'=>'Y'),4);
			$data['user_details'] = $this->User_details_model->get_single(array('user_id'=>$data['loggedIn']['user_id']));

			$data['title'] = 'Info Kost Semarang, Cari Kos Kosan Semarang, Rumah Kost di Semarang - Anakost.id';
			$data['form_login'] = base_url() . 'login/loginProcess';
			$data['form_cari_simple'] = base_url() . 'search-produk';

			$this->load->view('layouts/head_2',$data);
			$this->load->view('home/home_2_session',$data);
		} else {
			// additional data
			$data['sel_kategori'] = $this->M_item_category_model->get_all(array('is_avail'=>'Y'));
			$data['recent_items'] = $this->Items_model->get_all(array('item_stock >'=>0),4);
			$data['hot_items'] = $this->Items_model->get_all(array('is_hotitem'=>'Y'),4);

			$data['title'] = 'Info Kost Semarang, Cari Kos Kosan Semarang, Rumah Kost di Semarang - Anakost.id';
			$data['form_login'] = base_url() . 'login/loginProcess';
			$data['form_cari_simple'] = base_url() . 'search-produk';

			$this->load->view('layouts/head_2',$data);
			$this->load->view('home/home_2',$data);
		}
	}

	// modul search kost details
	function cariKost() {
		if(isset($this->session->userdata['loggedIn'])) {
			$data['loggedIn'] = $this->session->userdata['loggedIn'];

			// additional data
			

			$data['title'] = 'Info Kost Semarang, Cari Kos Kosan Semarang, Rumah Kost di Semarang - Anakost.id';
			$data['form_login'] = base_url() . 'login/loginProcess';
			$data['form_search'] = base_url() . 'home/searchKost';

			$this->load->view('layouts/head_2',$data);
			$this->load->view('home/cari_kost',$data);
		} else {
			// additional data
			

			$data['title'] = 'Info Kost Semarang, Cari Kos Kosan Semarang, Rumah Kost di Semarang - Anakost.id';
			$data['form_login'] = base_url() . 'login/loginProcess';
			$data['form_search'] = base_url() . 'home/searchKost';

			$this->load->view('layouts/head_2',$data);
			$this->load->view('home/cari_kost',$data);
		}
	}

	// modul daftar kost
	function registerKost() {
		if(isset($this->session->userdata['loggedIn'])) {
			$data['loggedIn'] = $this->session->userdata['loggedIn'];

			// additional data
			

			$data['title'] = 'Info Kost Semarang, Cari Kos Kosan Semarang, Rumah Kost di Semarang - Anakost.id';
			$data['form_login'] = base_url() . 'login/loginProcess';
			$data['form_search'] = base_url() . 'home/searchKost';

			$this->load->view('layouts/head_2',$data);
			$this->load->view('home/cari_kost',$data);
		} else {
			// set flashdata
			$flash_msg = array(
				'msg'		=> "You have to login first",
				'type'	=> "red darken-1"
			);
			$this->session->set_flashdata('handler_msg',$flash_msg);
			redirect(base_url().'home');
		}
	}

	function searchKost() {
		// search for Kost/Apartment function here
		
	}

	function contactUs() {
		if(isset($this->session->userdata['loggedIn'])) {
			$data['loggedIn'] = $this->session->userdata['loggedIn'];

			// additional data
			$data['user_details'] = $this->User_details_model->get_single(array('user_id'=>$data['loggedIn']['user_id']));

			$data['title'] = 'Info Kost Semarang, Cari Kos Kosan Semarang, Rumah Kost di Semarang - Anakost.id';
			$data['form_login'] = base_url() . 'login/loginProcess';
			$data['form_contact'] = base_url(). 'home/contactProcess';


			$this->load->view('layouts/head_2',$data);
			$this->load->view('home/contact_us',$data);
		} else {
			// additional data
			

			$data['title'] = 'Info Kost Semarang, Cari Kos Kosan Semarang, Rumah Kost di Semarang - Anakost.id';
			$data['form_login'] = base_url() . 'login/loginProcess';
			$data['form_contact'] = base_url(). 'home/contactProcess';

			$this->load->view('layouts/head_2',$data);
			$this->load->view('home/contact_us',$data);
		}
	}

	function contactProcess() {
		if($this->input->post('submit') == 'submitContact') {
			$guestName = $this->input->post('guestName');
			$guestEmail = $this->input->post('guestEmail');
			if(!empty($this->input->post('guestPhone'))) {
				$guestPhone = "62".$this->input->post('guestPhone');
			} else {
				$guestPhone = "62";
			}
			$guestMessage = $this->input->post('guestMessage');
			$dataContact = array(
				'guest_email'	=> $guestEmail,
				'guest_name'	=> $guestName,
				'guest_phone'	=> $guestPhone,
				'messages'		=> $guestMessage
			);
			$this->Contactus_model->add($dataContact);

			// send email to recipients
			$this->load->library('email');
			$this->email->set_newline("\r\n");
			$this->email->from($this->config->item('general_sender'),'Anakost.id');
			$this->email->to($guestEmail);
			$this->email->subject("Thank you for contacting us");
			$this->email->message('
				<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
				<html xmlns="http://www.w3.org/1999/xhtml">
					<head>
						<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
						<title>Thank You For Contacting Us</title>
						<meta name="viewport" content="width=device-width, initial-scale=1.0" />
					</head>
					<body style="margin:0; padding:0;">
						<table border="0" cellpadding="0" cellspacing="0" width="100%">
							<tr>
								<td style="padding: 20px 0 30px 0;">
									<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse; border: 1px solid #cccccc;">
										<tr>
											<td align="center" bgcolor="#2bbbad" style="padding: 40px 0 30px 0;">
												<img src="http://cdn.mbing.web.id/media/png/anakost-logo2-white.png" alt="Anakost.id Black Logo" width="260" height="70" style="display: block;" />
											</td>
										</tr>
										<tr>
											<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
												<table border="0" cellpadding="0" cellspacing="0" width="100%">
													<tr>
														<td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
															<b>Thank You For Getting In Touch!</b>
														</td>
													</tr>
													<tr>
														<td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial,sans-serif; font-size: 16px; line-height: 20px;">
															We appreciate you contacting us. We try to respond as soon as possible, so one of our Customer Service colleagues will get back to you within a few hours. <br/>

															Have a great day ahead!
														</td>
													</tr>
													<tr>
														<td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial,sans-serif; font-size: 24px;">
															<b>Anakost.id</b>
														</td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td bgcolor="#333" style="padding: 30px 30px 30px 30px;">
												<table border="0" cellpadding="0" cellspacing="0" width="100%">
													<tr>
														<td width="75%" style="color: #ffffff; font-family: Arial,sans-serif; font-size: 14px;">
															&reg; Anakost.id, Jakarta 2017<br/>
															
														</td>
														<td align="right">
															<table border="0" cellpadding="0" cellspacing="0">
																<tr>
																	<td>
																		<a href="https://twitter.com/frmnqdr" target="_blank">
																			<img src="http://cdn.mbing.web.id/media/png/twitter-icon-wh-128.png" alt="tw icon" width="25" height="25" />
																		</a>
																	</td>
																	<td style="font-size: 0; line-height: 0;" width="5">&nbsp;</td>
																	<td>
																		<a href="https://web.facebook.com/mfqodry" target="_blank">
																			<img src="http://cdn.mbing.web.id/media/png/fb-icon-wh-128.png" alt="fb icon" width="25" height="25" />
																		</a>
																	</td>
																	<td style="font-size: 0; line-height: 0;" width="5">&nbsp;</td>
																	<td>
																		<a href="https://www.instagram.com/frmnqdr/" target="_blank">
																			<img src="http://cdn.mbing.web.id/media/png/instagram-icon-wh-128.png" alt="ig icon" width="25" height="25" />
																		</a>
																	</td>
																</tr>
															</table>
														</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</body>
				</html>
			');
			if($this->email->send()) {
				// record log
				$logdata = array(
					'userid' => 'system',
					'activity' => '[contact us] email send successful to '.$guestEmail
				);
				$this->Log_program_model->add($logdata);
			} else {
				// record log
				$logdata = array(
					'userid' => 'system',
					'activity' => '[contact us] failed to send email to '.$guestEmail
				);
				$this->Log_program_model->add($logdata);
			}

			// record log
			$logdata = array(
				'userid' => 'system',
				'activity' => $guestEmail . ' is success to fill contact us form'
			);
			$this->Log_program_model->add($logdata);

			// set flashdata
			$flash_msg = array(
				'msg'		=> "Thank you for contacting us!",
				'type'	=> "green lighten-1"
			);
			$this->session->set_flashdata('handler_msg',$flash_msg);
			redirect(base_url().'home');
		} else {
			// record log
			$logdata = array(
				'userid' => 'system',
				'activity' => 'Failed to fill contact us form: Unauthorized submit value.'
			);
			$this->Log_program_model->add($logdata);

			// set flashdata
			$flash_msg = array(
				'msg'		=> "Error: Unauthorized submit value",
				'type'	=> "red darken-1"
			);
			$this->session->set_flashdata('handler_msg',$flash_msg);
			redirect(base_url().'home');
		}
	}

	function about() {
		$data['title'] = 'Info Kost Semarang, Cari Kos Kosan Semarang, Rumah Kost di Semarang - Anakost.id';
		$data['form_login'] = base_url() . 'login/loginProcess';
		$data['form_search'] = base_url() . 'home/searchKost';

		$this->load->view('layouts/head_2',$data);
		$this->load->view('home/about_us',$data);
	}

	function viewItem($id) {
		// additional data
		$item = $this->Items_model->get_single(array('id'=>$id));
		$data['item'] = $item;
		$data['item_details'] = $this->Items_detail->get_single(array('item_id'=>$item->item_id));
		$data['item_images'] = $this->Items_images->get_all(array('item_id'=>$item->item_id));

		$data['title'] = 'Info Kost Semarang, Cari Kos Kosan Semarang, Rumah Kost di Semarang - Anakost.id';
		$data['form_login'] = base_url() . 'login/loginProcess';
		$data['form_search'] = base_url() . 'home/searchKost';

		$this->load->view('layouts/head_2',$data);
		$this->load->view('home/view_item',$data);
	}

	function jxGetItemDetails() {
		$item_id = $_POST['item_id'];
		$item = $this->Items_model->get_single(array('item_id'=>$item_id));
		$item_details = $this->Items_detail->get_single(array('item_id'=>$item_id));
		$item_images = $this->Items_images->get_all(array('item_id'=>$item_id));
		$content = '
			<h4>'.$item->item_name.'</h4>

		';
		echo $content;
	}

	function testaja($x) {
		// $result = array();
		// for($i = $l; $i <= $r; $i++) {
		// 	if($i%2) {
		//    	$result[] = $i;
		//    }
		// }
		// return $result;
		$y = 100 + $x;
		return $y;
	}
}
