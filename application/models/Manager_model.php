<?php
	class Manager_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_input($slug = FALSE)
		{
			if ($slug === FALSE)
			{
				$query = $this->db->get('user_input');
				return $query->result_array();
			}

			$query = $this->db->get_where('user_input', array('id' => $slug));
			return $query->row_array();
		}

		public function create_manager($input_id){
			$yes = 1;
			$data = array(
				'input_id' => $input_id,
				'prioritas' => $this->input->post('prioritas'),
				'tanggal_diskusi_internal' => $this->input->post('tanggal_diskusi_internal'),
				'tanggal_diskusi_owner' => $this->input->post('tanggal_diskusi_owner'),
				'timeline' => $this->input->post('timeline'),
				'start_dev' => $this->input->post('start_dev'),
				'finish_dev' => $this->input->post('finish_dev'),
				// 'jumlah_hari' => $this->input->post('jumlah'),
				'pic_developer' => $this->input->post('pic_developer'),
				'keterangan' => $this->input->post('keterangan'),
				'response' =>'1'
			);

			return $this->db->insert('manager_input', $data);
		}

		public function get_manager($input_id){
			$query = $this->db->get_where('manager_input', array('input_id' => $input_id));
			return $query->result_array();
		}

		public function delete_manager($id){
			$this->db->where('id', $id);
			$this->db->delete('manager_input');
			return true;
		}
	}