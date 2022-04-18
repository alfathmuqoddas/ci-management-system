<?php
	class Developer extends CI_Controller{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('input_model');
			$this->load->model('manager_model');
			$this->load->model('developer_model');
			$this->load->model('amgr_model');
			$this->load->helper('url_helper');
		}

		public function index()
		{
			$data['input'] = $this->input_model->get_input();
			$data['title'] = 'Developer Input';

			$this->load->view('templates/header', $data);
			$this->load->view('developer/index', $data);
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
			$this->load->view('developer/view', $data);
			$this->load->view('templates/footer');
		}

		public function create($input_id){
			$slug = $this->input->post('slug');
            $data['input'] = $this->input_model->get_input($slug);

			$this->form_validation->set_rules('progress', 'Progress', 'required');
			$this->form_validation->set_rules('status_progress', 'Status Progress', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('developer/view', $data);
				$this->load->view('templates/footer');
			} else {
				$this->developer_model->create_developer($input_id);
				$this->session->set_flashdata('post_created', 'Developer input has been created');
				redirect('developer');
			}
		}

		public function edit($slug){
			// // Check login
			// if(!$this->session->userdata('logged_in')){
			// 	redirect('users/login');
			// }
			$data['input'] = $this->input_model->get_input($slug);
			$input_id = $data['input']['id'];
			$data['input_developer'] = $this->developer_model->get_developer($input_id);

			// // Check user
			// if($this->session->userdata('user_id') != $this->post_model->get_posts($slug)['user_id']){
			// 	redirect('posts');
			// }

			if(empty($data['input_developer'])){
				show_404();
			}

			$data['title'] = 'Edit Developer Input';

			$this->load->view('templates/header');
			$this->load->view('developer/edit', $data);
			$this->load->view('templates/footer');
		}

		public function update(){
			// // Check login
			// if(!$this->session->userdata('logged_in')){
			// 	redirect('users/login');
			// }

			$this->developer_model->update_developer();

			// Set message
			$this->session->set_flashdata('post_updated', 'Your post has been updated');

			redirect('developer');
		}

		public function delete($id){
			$this->developer_model->delete_developer($id);
			$this->session->set_flashdata('post_deleted', 'Developer input has been Recorded');
			redirect('developer');
		}
	}