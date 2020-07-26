<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('User_details_model');
		$this->load->model('Userpoints_model');
		$this->load->model('M_role_model');
		$this->load->model('Log_program_model');

		$this->load->helper('codekiddies');
	}

	public function index() {
		$this->loginProcess();
	}

	function loginProcess() {
		// load library Bcrypt and Form Validation
		$this->load->library(array('bcrypt','form_validation'));
		$this->load->helper('security');

		// set rules for validation
		$rules = array(
			array(
				'field'	=> 'username',
				'label'	=> 'Username',
				'rules'	=> 'trim|required|xss_clean'
			),
			array(
				'field'	=> 'userpassword',
				'label'	=> 'Password',
				'rules'	=> 'trim|required|min_length[8]|xss_clean'
			)
		);
		$this->form_validation->set_rules($rules);
		$this->form_validation->set_message('min_length', 'Your password must be at least 8 characters long');

		// check if validation run, then check password
		if($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['loggedIn'])) {
				redirect(base_url() . 'home');
			} else {
				// set flashdata
				$flash_msg = array(
					'msg'		=> validation_errors(),
					'type'	=> "red darken-1"
				);
				$this->session->set_flashdata('handler_msg',$flash_msg);

				redirect(base_url().'home');
			}
		} else {
			$username = $this->input->post('username');
			$userpwd = $this->input->post('userpassword');
			$user = $this->User_model->get_single(array('email' => $username));

			//check input password with password stored on DB, if true go on (set session data, set userdata, redirect to member page) else if false go to login form with error notif 'Invalid email or password'
			if($this->bcrypt->check_password($userpwd,$user->bcr_pwd) == TRUE && $user->is_avail == 'Y')
			{
				// if(isset($_POST['g-recaptcha-response'])) {
				// 	$recaptcha = $_POST['g-recaptcha-response'];
				// 	$secret_key = '6LchlyMTAAAAAEwdyG6SuSBiqSMb4QY_SlD_FbeK';
				// 	$ip = $_SERVER['REMOTE_ADDR'];
				// 	$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret_key."&response=".$recaptcha."&remoteip=".$ip);
				// 	$responseKeys = json_decode($response,true);
				// 	if(intval($responseKeys["success"]) !== 1) {
				// 		// set flashdata
				// 		$flash_msg = array(
				// 			'msg'		=> "Login Failed, wrong captcha",
				// 			'type'	=> "red darken-1"
				// 		);
				// 		$this->session->set_flashdata('handler_msg',$flash_msg);

				// 		redirect(base_url().'home');
				// 	}
				// } else {
				// 	// set flashdata
				// 	$flash_msg = array(
				// 		'msg'		=> "Login failed, please input captcha!",
				// 		'type'	=> "red darken-1"
				// 	);
				// 	$this->session->set_flashdata('handler_msg',$flash_msg);
				// 	redirect(base_url().'home');
				// }

				$session_data = array(
					'user_id'	=> $user->user_id,
					'username'	=> $user->username,
					'email'		=> $user->email,
					'role'		=> $user->role,
					'avail'		=> $user->is_avail
				);
				// add user data in session
				$this->session->set_userdata('loggedIn',$session_data);

				redirect(base_url().'home');
			} elseif(!empty($user) && $user->is_avail == 'N') {
				// set flashdata
				$flash_msg = array(
					'msg'		=> "Please check your email for confirmation",
					'type'	=> "red darken-1"
				);
				$this->session->set_flashdata('handler_msg',$flash_msg);
				redirect(base_url().'home');
			} else {
				// set flashdata
				$flash_msg = array(
					'msg'		=> "Error: Invalid Username or Password",
					'type'	=> "red darken-1"
				);
				$this->session->set_flashdata('handler_msg',$flash_msg);
				redirect(base_url().'home');
			}
		}
	}

	// Login Handler using FB Login
	function fbLoginHandler() {
		$email = $_POST['email'];
		$nama = $_POST['nama'];
		// check email if already registered
		$user = $this->User_model->get_single(array('email'=>$email));
		if(empty($user)) {
			// register user first then login

		} else {
			// user has registered -> auto login (set session data and login)
			if(!empty($user) && $user->is_avail == 'Y') {
				$session_data = array(
					'user_id'	=> $user->user_id,
					'username'	=> $user->username,
					'email'		=> $user->email,
					'role'		=> $user->role,
					'avail'		=> $user->is_avail
				);
				// add user data in session
				$this->session->set_userdata('loggedIn',$session_data);

				echo json_encode("login status.... OK");
			} elseif(!empty($user) && $user->is_avail == 'N') {
				// set flashdata
				$flash_msg = array(
					'msg'		=> "Please check your email for confirmation",
					'type'	=> "red darken-1"
				);
				$this->session->set_flashdata('handler_msg',$flash_msg);
				redirect(base_url().'home');
			}
		}
	}

	function logout()
	{
		$loggedIn = $this->session->userdata('loggedIn');

		// add log data
		$this->log_program(array('userid'=>'system','activity'=>'User ' . $loggedIn['user_id'] . ' has successfully logout.'));

		// removing session data
		$sess_array = array(
			'username'	=> ''
		);
		$this->session->unset_userdata('loggedIn',$sess_array);

		// clear current session
		// $this->session->sess_destroy();

		redirect(base_url());
	}

	function register() {
		if(isset($this->session->userdata['loggedIn'])) {
			redirect(base_url().'home');
		} else {
			$data['title'] = 'Info Kost Semarang, Cari Kos Kosan Semarang, Rumah Kost di Semarang - Anakost.id';

			// form action
			$data['form_login'] = base_url() . 'login/loginProcess';
			$data['form_register'] = base_url().'login/registerProcess';

			$this->load->view('layouts/head_2',$data);
			$this->load->view('login/register',$data);
		}
	}

	function registerProcess() {
		// load bcrypt lib
		$this->load->library('bcrypt');
		// define user input
		$firstname = ucwords($this->input->post('firstname'));
		$lastname = ucwords($this->input->post('lastname'));
		$fullname = $firstname . ' ' . $lastname;
		$email = $this->input->post('useremail');
		$password = $this->input->post('userpassword');
		// $repassword = $this->input->post('userrepassword');
		$role = $this->M_role_model->get_single(array('sname'=>'mbr'));

		if(!empty($firstname) && !empty($lastname) && !empty($email)) {
			// Google Recaptcha Response
			if(isset($_POST['g-recaptcha-response'])) {
				$recaptcha = $_POST['g-recaptcha-response'];
				$secret_key = '6LchlyMTAAAAAEwdyG6SuSBiqSMb4QY_SlD_FbeK';
				$ip = $_SERVER['REMOTE_ADDR'];
				$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret_key."&response=".$recaptcha."&remoteip=".$ip);
				$responseKeys = json_decode($response,true);
				if(intval($responseKeys["success"]) !== 1) {
					// set flashdata
					$flash_msg = array(
						'msg'		=> "Register Failed, wrong captcha",
						'type'	=> "red darken-1"
					);
					$this->session->set_flashdata('handler_msg',$flash_msg);

					redirect(base_url().'home');
				}
			} else {
				// set flashdata
				$flash_msg = array(
					'msg'		=> "Register failed, please input captcha!",
					'type'	=> "red darken-1"
				);
				$this->session->set_flashdata('handler_msg',$flash_msg);
				redirect(base_url().'home');
			}

			// set user ID
			$sel_maxid = $this->User_model->maxId();
			$maxid = $sel_maxid->id +1;
			$userid = 'UK' . str_pad($maxid, 4, '0', STR_PAD_LEFT);
			$data = array(
				'user_id'=>$userid,
				'email'=>$email,
				'bcr_pwd'=>$this->bcrypt->hash_password($password),
				'role'=>$role->sname
			);
			$register = $this->User_model->registration($data);

			if($register == FALSE) {
				// set flashdata X redirect to frontpage X show errors
				$flash_msg = array(
					'msg'		=> "Registration failed email already exist",
					'type'	=> "red darken-1"
				);
				$this->session->set_flashdata('handler_msg',$flash_msg);

				// record log
				$logdata = array(
					'userid'=>'system',
					'activity'=>'Failed to register user, email '.$email.' already exist'
				);
				$this->Log_program_model->add($logdata);

				redirect(base_url().'home');
			} else {
				// set data user details
				$details = array(
					'user_id'=>$userid,
					'firstname'=>$firstname,
					'lastname'=>$lastname,
					'fullname'=>$fullname,
					'email'=>$email
				);
				if(empty($this->User_details_model->get_single(array('user_id'=>$userid)))) {
					$this->User_details_model->add($details);
				} else {
					$this->User_details_model->edit(array('user_id'=>$userid),$details);
				}

				// set userpoints
				$points = array(
					'user_id'=>$userid,
					'userpoints'=>'0'
				);
				if(empty($this->Userpoints_model->get_single(array('user_id'=>$userid)))) {
					$this->Userpoints_model->add($points);
				} else {
					$this->Userpoints_model->edit(array('user_id'=>$userid),$points);
				}

				// send email confirmation
				$this->load->library('email');
				$this->email->set_newline("\r\n");
				$this->email->from($this->config->item('general_sender'),'Anakost.id');
				$this->email->to($email);
				$this->email->subject("User Confirmation");
				$confirmLink = base_url()."login/userConfirmation/".sha1($userid);
				// $confirmLink = "http://anakost.mbing.web.id/login/userConfirmation/".md5($userid.'akost'.$email);
				$this->email->message('
					<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
					<html xmlns="http://www.w3.org/1999/xhtml">
						<head>
							<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
							<title>User Confirmation</title>
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
																<b>Hello '.ucwords($fullname).', Thank You For Register at Anakost.id!</b>
															</td>
														</tr>
														<tr>
															<td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial,sans-serif; font-size: 16px; line-height: 20px;">
																The registration process is almost done. You have to confirmation first before using your account at anakost.id by clicking this button bellow:
															</td>
														</tr>
														<tr>
															<td align="center" style="padding: 20px 0 30px 0;">
																<a href="'.$confirmLink.'" target="_blank"><img src="http://cdn.mbing.web.id/media/gif/confirm-button.gif" alt="Button Confirm" width="60%" height="40%" /></a>
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
																<a href="#" style="color: #ffffff;"><font color="#ffffff">Unsubscribe</font></a> to this newsletter instantly
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
						'activity' => '[Register Page] email send successful to '.$guestEmail
					);
					$this->Log_program_model->add($logdata);
				} else {
					// record log
					$logdata = array(
						'userid' => 'system',
						'activity' => '[Register Page] failed to send email to '.$guestEmail
					);
					$this->Log_program_model->add($logdata);
				}

				// set flashdata X redirect to frontpage X show errors
				$flash_msg = array(
					'msg'		=> "Registration success",
					'type'	=> "green lighten-1"
				);
				$this->session->set_flashdata('handler_msg',$flash_msg);

				// record log
				$logdata = array(
					'userid'=>'system',
					'activity'=>'Register user '.$userid.' ('.$email.') with role '.$role->rolename
				);
				$this->Log_program_model->add($logdata);
				
				redirect(base_url().'home');
			}
		} else {
			// set flashdata X redirect to frontpage X show errors
			$flash_msg = array(
				'msg'		=> "Form not filled properly",
				'type'	=> "red darken-1"
			);
			$this->session->set_flashdata('handler_msg',$flash_msg);

			// record log
			$logdata = array(
				'userid'=>'system',
				'activity'=>'Form not filled properly'
			);
			$this->Log_program_model->add($logdata);
			
			redirect(base_url().'home');
		}
	}

	function forgotPassword() {
		if(isset($this->session->userdata['loggedIn'])) {
			redirect(base_url().'home');
		} else {
			$data['title'] = 'Anakost.id - Password Reset';

			// form action
			$data['form_forgot'] = base_url().'login/forgotPasswordProcess';

			$this->load->view('layouts/head_2',$data);
			$this->load->view('login/forgotPassword',$data);
		}
	}

	function forgotPasswordProcess() {
		$this->load->model('Reset_password_model');
		$useremail = $this->input->post('useremail');
		// check if user email is exist/user is active
		$user = $this->User_model->get_single(array('email'=>$useremail,'is_avail'=>'Y'));
		if(isset($user)) {
			// create reset link
			$today = date("Y-m-d H:i:s");
			$tomorrow = date("Y-m-d H:i:s", strtotime($today . ' +1 day'));
			$hashlink = sha1($useremail."x".$user->user_id."y".strtotime($today));
			$reset_link = base_url() . "login/recover/".$hashlink;

			// insert hash details to database
			$link = $this->Reset_password_model->get_single(array('user_id'=>$user->user_id,'email'=>$user->email));

			$data=array(
				'user_id'=>$user->user_id,
				'email'=>$user->email,
				'hash'=>$hashlink,
				'is_used'=>0,
				'link_created_at'=>$today,
				'link_expired_at'=>$tomorrow
			);
			if(empty($link)) {
				$this->Reset_password_model->add($data);
			} else {
				if(strtotime($today)) {
					
				}
			}

			$flash_msg = array(
				'msg'	=> "We have sent you an email for recover your account.",
				'type'	=> "green lighten-1"
			);
			$this->session->set_flashdata('handler_msg',$flash_msg);
			redirect(base_url().'home');
		} else {
			$flash_msg = array(
				'msg'		=> "Email is not existed",
				'type'	=> "red darken-1"
			);
			$this->session->set_flashdata('handler_msg',$flash_msg);
			redirect(base_url().'home');
		}

		// if any, send email to the owner to give reset link
	}

	function userConfirmation($code) {
		$auth = $this->User_model->checkShaUser($code);
		if($auth !== FALSE) {
			// change is_avail to 'Y'
			$is_avail = array('is_avail'=>'Y');
			$this->User_model->edit(array('user_id'=>$auth->user_id,'is_avail'=>'N'),$is_avail);

			// record log
			$logdata = array(
				'userid'=>'system',
				'activity'=>'User Confirmation for '.$auth->email.' successful.'
			);
			$this->Log_program_model->add($logdata);

			// set flashdata X redirect to frontpage X show errors
			$flash_msg = array(
				'msg'		=> "Confirmation Successful! You can login now",
				'type'	=> "green lighten-1"
			);
			$this->session->set_flashdata('handler_msg',$flash_msg);

			redirect(base_url().'home');
		} else {
			?>
			<script>
				alert("Sorry, invalid confirmation link. Please try again.");
				location.href = '<?php echo base_url(); ?>';
			</script>
			<?php 
		}
	}

	function log_program($logdata=array()) {
		$this->Log_program_model->add($logdata);
	}
}
