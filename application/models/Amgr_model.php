<?php
	class Amgr_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

        public function create_amgr($input_id){
			$data = array(
				'input_id' => $input_id,
				'no_dok_uat_int' => $this->input->post('no_dok_uat_int'),
				'tanggal_uat_int' => $this->input->post('tanggal_uat_int'),
				'hasil_uat_int' => $this->input->post('hasil_uat_int'),
				'status_revisi_int' => $this->input->post('status_revisi_int'),
				'list_revisi_int' => $this->input->post('list_revisi_int'),
				'no_dok_uat_usr' => $this->input->post('no_dok_uat_usr'),
				'tanggal_uat_usr' => $this->input->post('tanggal_uat_usr'),
				'hasil_uat_usr' => $this->input->post('hasil_uat_usr'),
				'status_revisi_usr' => $this->input->post('status_revisi_usr'),
				'list_revisi_usr' => $this->input->post('list_revisi_usr'),
				'response' => '1'
			);

			return $this->db->insert('amgr_input', $data);
		}

        public function get_amgr($input_id){
			$query = $this->db->get_where('amgr_input', array('input_id' => $input_id));
			return $query->result_array();
		}

        public function delete_amgr($id){
			$this->db->where('id', $id);
			$this->db->delete('amgr_input');
			return true;
		}
    }