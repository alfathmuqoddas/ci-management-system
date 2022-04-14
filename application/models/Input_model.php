<?php

class Input_model extends CI_Model {
	public function __construct()
	{
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

	public function set_input($file_upload)
	{
		$data = array(
			'jenis' => $this->input->post('jenis'),
			'no_notin' => $this->input->post('no_notin'),
			'no_user_request' => $this->input->post('no_user_request'),
			'short_desc' => $this->input->post('short_desc'),
			'source_aplikasi' => $this->input->post('source_aplikasi'),
			'tanggal_notin' => $this->input->post('tanggal_notin'),
			'user_id' => $this->session->userdata('user_id'),
			'dokumen' => $file_upload
		);

		return $this->db->insert('user_input', $data);
	}

	public function delete_input($id){
		$this->db->where('id', $id);
		$this->db->delete('user_input');
		return true;
	}
}