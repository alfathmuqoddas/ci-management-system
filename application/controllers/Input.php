<?php
class Input extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('input_model');
		$this->load->model('manager_model');
		$this->load->helper('url_helper');
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

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('input/create');
			$this->load->view('templates/footer');
		}
		else
		{
			$this->input_model->set_input();
			redirect('input');
		}
	}

	public function delete($id){

		$this->input_model->delete_input($id);
		redirect('input');
	}
}