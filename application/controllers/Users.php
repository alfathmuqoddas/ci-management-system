<?php
	class Users extends CI_Controller{
		public function __construct() {
			parent::__construct();
			$this->load->add_package_path(APPPATH.'third_party/ion_auth');
			$this->load->library('ion_auth');
		}
		// Register user
		public function register(){
			$data['title'] = 'Sign Up';

			$this->form_validation->set_rules('firstname', 'First Name', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/register', $data);
				$this->load->view('templates/footer');

				$this->session->set_flashdata('login_failed', 'Register failed');
			} else {
				// // Encrypt password
				// $enc_password = md5($this->input->post('password'));
				// $this->user_model->register($enc_password);
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$email = $this->input->post('email');
				$additional_data = array(
							'first_name' => $this->input->post('firstname'),
							'last_name' => $this->input->post('lastname'),
							);
				$group = $this->input->post('group'); // Sets user to admin.

				$this->ion_auth->register($username, $password, $email, $additional_data, $group);

				// Set message
				$this->session->set_flashdata('user_registered', 'You are now registered and can log in');

				redirect('/');
			}
		}

		// Log in user
		public function login(){
			$data['title'] = 'Sign In';

			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if($this->form_validation->run() === FALSE) {
				$this->load->view('templates/header');
				$this->load->view('users/login', $data);
				$this->load->view('templates/footer');

				$this->session->set_flashdata('login_failed', 'Log in failed');

			} else {

				$identity = $this->input->post('username');
				$password = $this->input->post('password');
				$remember = TRUE; // remember the user
				$this->ion_auth->login($identity, $password, $remember);

				if ($this->ion_auth->logged_in()) {
				$this->session->set_flashdata('user_loggedin', 'You are now logged in');
				redirect('/');
				} else {
				$this->session->set_flashdata('login_failed', 'Login failed');
				redirect('users/login');
				}
			}

			// $this->form_validation->set_rules('username', 'Username', 'required');
			// $this->form_validation->set_rules('password', 'Password', 'required');

			// if($this->form_validation->run() === FALSE){
			// 	$this->load->view('templates/header');
			// 	$this->load->view('users/login', $data);
			// 	$this->load->view('templates/footer');
			// } else {
				
			// 	// Get username
			// 	$username = $this->input->post('username');
			// 	// Get and encrypt the password
			// 	$password = md5($this->input->post('password'));

			// 	// Login user
			// 	$user_id = $this->user_model->login($username, $password);

			// 	if($user_id){
			// 		// Create session
			// 		$user_data = array(
			// 			'user_id' => $user_id,
			// 			'username' => $username,
			// 			'logged_in' => true
			// 		);

			// 		$this->session->set_userdata($user_data);

			// 		// Set message
			// 		$this->session->set_flashdata('user_loggedin', 'You are now logged in');

			// 		redirect('/');
			// 	} else {
			// 		// Set message
			// 		$this->session->set_flashdata('login_failed', 'Login is invalid');

			// 		redirect('users/login');
			// 	}		
			// }
		}

		// Log user out
		public function logout(){
			// Unset user data
			$this->ion_auth->logout();

			// Set message
			$this->session->set_flashdata('user_loggedout', 'You are now logged out');

			redirect('/');
		}

		// Check if username exists
		public function check_username_exists($username){
			$this->form_validation->set_message('check_username_exists', 'That username is taken. Please choose a different one');
			if($this->user_model->check_username_exists($username)){
				return true;
			} else {
				return false;
			}
		}

		// Check if email exists
		public function check_email_exists($email){
			$this->form_validation->set_message('check_email_exists', 'That email is taken. Please choose a different one');
			if($this->user_model->check_email_exists($email)){
				return true;
			} else {
				return false;
			}
		}
	}