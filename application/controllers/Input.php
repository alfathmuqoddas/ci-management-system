<?php
class Input extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('input_model');
		$this->load->model('Ion_auth_model');
		$this->load->model('manager_model');
		$this->load->model('developer_model');
		$this->load->model('amgr_model');
		$this->load->helper(array('form','url','url_helper'));

		// controller protection only admin and user_biasa can access
		if (!$this->ion_auth->in_group('user_biasa') && !$this->ion_auth->is_admin())
		{
			redirect('/', 'refresh');
		}

	}

	public function index()
	{

		$data['input'] = $this->input_model->get_input();
		$data['title'] = 'User Input';

		$this->load->view('templates/header', $data);
		$this->load->view('input/index', $data);
		$this->load->view('templates/footer');
	}

	public function view($slug = NULL){
		$data['input'] = $this->input_model->get_input($slug);
		$input_id = $data['input']['id'];
		$data['input_manager'] = $this->manager_model->get_manager($input_id);
		$data['input_developer'] = $this->developer_model->get_developer($input_id);
		$data['input_amgr'] = $this->amgr_model->get_amgr($input_id);

		if(empty($data['input'])){
			show_404();
		}

		$data['title'] = $data['input']['no_notin'];

		$this->load->view('templates/header', $data);
		$this->load->view('input/view', $data);
		$this->load->view('templates/footer');
	}

	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Create User Input';

		$this->form_validation->set_rules('jenis', 'Jenis', 'required');
		// $this->form_validation->set_rules('no_notin', 'No Notin', 'required');
		$this->form_validation->set_rules('source_aplikasi', 'Source Aplikasi', 'required');
		$this->form_validation->set_rules('no_notin', 'No Notin', 'required');
		$this->form_validation->set_rules('tanggal_notin', 'Tanggal Notin', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('input/create');
			$this->load->view('templates/footer');
		} else {
			// Upload doc
			$config['upload_path'] = './upload';
			$config['allowed_types'] = '*';
			$config['max_size'] = '4096';

			$this->load->library('upload', $config);

			if(!$this->upload->do_upload()){
				$errors = array('error' => $this->upload->display_errors());
				$file_upload = 'no file uploaded';
			} else {
				$data = array('upload_data' => $this->upload->data());
				$file_upload = $_FILES['userfile']['name'];
			}

			$this->input_model->set_input($file_upload);

			$this->session->set_flashdata('post_created', 'Your input has been created');


			redirect('input');
		}
	}

	public function edit($slug){
		// Check login
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}

		$data['input'] = $this->input_model->get_input($slug);

		// // Check user
		// if($this->session->userdata('user_id') != $this->post_model->get_posts($slug)['user_id']){
		// 	redirect('posts');
		// }

		if(empty($data['input'])){
			show_404();
		}

		$data['title'] = 'Edit Post';

		$this->load->view('templates/header');
		$this->load->view('input/edit', $data);
		$this->load->view('templates/footer');
	}

	// public function update(){
	// 	// // Check login
	// 	// if(!$this->session->userdata('logged_in')){
	// 	// 	redirect('users/login');
	// 	// }
	// 	$this->input_model->update_input();
	// 	// Set message
	// 	$this->session->set_flashdata('post_updated', 'Your input has been updated');
	// 	redirect('input');
	// }

	public function delete($id){

		$this->input_model->delete_input($id);
		$this->session->set_flashdata('post_deleted', 'Your input has been deleted');
		redirect('input');
	}
}