<?php
	class Developer_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function create_developer($input_id){
			$data = array(
				'input_id' => $input_id,
				'tanggal_update' => $this->input->post('tanggal_update'),
				'progress' => $this->input->post('progress'),
				'keterangan' => $this->input->post('keterangan'),
				'status_progress' => $this->input->post('status_progress'),
				'tanggal_realisasi' => $this->input->post('tanggal_realisasi'),
				'response' =>'1'
			);

			return $this->db->insert('developer_input', $data);
		}

		public function update_developer(){
			$data = array(
				'input_id' => $input_id,
				'tanggal_update' => $this->input->post('tanggal_update'),
				'progress' => $this->input->post('progress'),
				'keterangan' => $this->input->post('keterangan'),
				'status_progress' => $this->input->post('status_progress'),
				'tanggal_realisasi' => $this->input->post('tanggal_realisasi'),
				'response' =>'1'
			);
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('developer_input', $data);
		}

		public function get_developer($input_id){
			$query = $this->db->get_where('developer_input', array('input_id' => $input_id));
			return $query->result_array();
		}

		public function delete_developer($id) {
			$this->db->where('id', $id);
			$this->db->delete('developer_input');
			return true;
		}
	}