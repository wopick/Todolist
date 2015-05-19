<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class json_model extends CI_Model {
	
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

} 

?>