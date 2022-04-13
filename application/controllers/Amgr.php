<?php
class Amgr extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		$this->load->model('input_model');
		$this->load->model('manager_model');
		$this->load->model('developer_model');
        $this->load->model('amgr_model');
		$this->load->helper(array('form','url','url_helper'));
	}

    public function index()
	{
		$data['input'] = $this->input_model->get_input();
		$data['title'] = 'Amgr Input';

		$this->load->view('templates/header', $data);
		$this->load->view('amgr/index', $data);
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
        $this->load->view('amgr/view', $data);
        $this->load->view('templates/footer');
    }

    public function create($input_id){
        $slug = $this->input->post('slug');
        $data['input'] = $this->input_model->get_input($slug);
        $data['input_manager'] = $this->manager_model->get_manager($input_id);
        $data['input_developer'] = $this->developer_model->get_developer($input_id);
        $data['input_amgr'] = $this->amgr_model->get_amgr($input_id);

        $this->form_validation->set_rules('no_dok_uat_int', 'No Dokumen UAT Internal', 'required');
        $this->form_validation->set_rules('hasil_uat_int', 'Hasil UAT', 'required');

        if($this->form_validation->run() === FALSE){
            $this->load->view('templates/header');
            $this->load->view('amgr/view', $data);
            $this->load->view('templates/footer');
        } else {
            $this->amgr_model->create_amgr($input_id);
            redirect('amgr');
        }
    }

    public function delete($id){
        $this->amgr_model->delete_amgr($id);
        redirect('amgr');
    }
}