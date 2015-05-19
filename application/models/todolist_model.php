<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Todolist_model extends CI_Model {
	
	public function __construct (){
		$this->load->database();
	}

	public function get_todo ($id = FALSE){
		if($id === FALSE){
			$this->db->order_by('tanggal', 'DESC');
			$query = $this->db->get('todo');
			return $query->result_array();
		}
		$query = $this->db->get_where('todo',array('id' => $id));
		return $query -> row_array();
	}

	public function insert_todo (){
		$this->load->helper('url');
		$data = array (
			'aktivitas' => $this->input->post('aktivitas'),
			'deskripsi' => $this->input->post('deskripsi'),
			'tanggal' => $this->input->post('tanggal'),
			'create_at' =>  date('Y-m-d H:i:s')
		);
	    return $this->db->insert('todo', $data);

	}

	public function update_todo ($id){
		$this->load->helper('url');
		$data = array (
			'aktivitas' => $this->input->post('aktivitas'),
			'deskripsi' => $this->input->post('deskripsi'),
			'tanggal' => $this->input->post('tanggal'),
			'update_at' =>  date('Y-m-d H:i:s')
		);
		$this->db->where('id', $id);
		return $this->db->update('todo', $data);

	}

	public function status_todo ($id){
		$this->load->helper('url');

		$data = array (
			'status' => 1,
			'update_at' =>  date('Y-m-d H:i:s')
		);
		$this->db->where('id', $id);
	    return $this->db->update('todo', $data);

	}

	public function delete_todo ($id){
		$this->load->helper('url');

		$this->db->where('id', $id);
	    return $this->db->delete('todo');

	}




} 

?>