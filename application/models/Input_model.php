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
			$this->db->order_by('user_input.tanggal_user_request', 'desc');
			// $this->db->join('manager_input', 'manager_input.input_id = user_input.id');
			$query=$this->db->get('user_input');
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

	// public function update_input(){

	// 	$data = array(
	// 		'jenis' => $this->input->post('jenis'),
	// 		'no_notin' => $this->input->post('no_notin'),
	// 		'no_user_request' => $this->input->post('no_user_request'),
	// 		'short_desc' => $this->input->post('short_desc'),
	// 		'source_aplikasi' => $this->input->post('source_aplikasi'),
	// 		'tanggal_notin' => $this->input->post('tanggal_notin'),
	// 		'user_id' => $this->session->userdata('user_id'),
	// 	);

	// 	$this->db->where('id', $this->input->post('id'));
	// 	return $this->db->update('user_input', $data);
	// }

	public function delete_input($id){
		$file_name = $this->db->select('dokumen')->get_where('user_input', array('id' => $id))->row()->dokumen;
		$cwd = getcwd(); // save the current working directory
		$file_path = $cwd."\\upload\\";
		chdir($file_path);
		unlink($file_name);
		chdir($cwd); // Restore the previous working directory
		$this->db->where('id', $id);
		$this->db->delete('user_input');
		return true;
	}
}