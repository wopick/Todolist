<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Todo extends CI_Controller {
	public function __construct (){
		parent::__construct();
		$this->load->model('todolist_model');
	}

	public function index (){
		$data['todo'] = $this->todolist_model->get_todo();

        $data['title'] = 'To Do List Archive';

        $this->load->view('templates/header', $data);
        $this->load->view('todo/index', $data);
        $this->load->view('templates/footer');

	}

	public function view ($id=NULL){
		$data['todo_list'] = $this->todolist_model->get_todo($id);

		if(empty($data['todo_list'])){
			show_404();
		}
        $data['title'] = 'To Do List Archive';
		$data['aktivitas'] = $data['todo_list']['aktivitas'];
		$this->load->view('templates/header',$data);
		$this->load->view('todo/view',$data);
		$this->load->view('templates/footer');
	}

	public function create (){
		$this->load->helper('form');
        $this->load->library('form_validation');

		$data['title'] = 'Create a todo list';

		$this->form_validation->set_rules('aktivitas','Aktivitas','required');
		$this->form_validation->set_rules('tanggal','Deadline','required');


		$this -> load -> view ('templates/header',$data);
		if($this->form_validation->run() === FALSE){
			$this -> load -> view ('todo/create');
		}
		else {
	        $this->todolist_model->insert_todo();
	        $this->load->view('action/input_success');			
		}
		$this -> load -> view ('templates/footer');
	}


	public function update ($id=NULL){
		$this->load->helper('form');
        $this->load->library('form_validation');

		$data['title'] = 'Update a todo list';

		$this->form_validation->set_rules('aktivitas','Aktivitas','required');
		$this->form_validation->set_rules('tanggal','Deadline','required');


		$data['todo_list'] = $this->todolist_model->get_todo($id);
		$this -> load -> view ('templates/header',$data);
		if($this->form_validation->run() === FALSE){
			$this-> load -> view ('todo/update');
		}
		else {
	        $this->todolist_model->update_todo($id);
	        $this->load->view('action/update_success');			
		}
		$this -> load -> view ('templates/footer');
	}

	public function status ($id=NULL){

		$data['title'] = 'Update  Status list';
		$data['todo_list'] = $this->todolist_model->get_todo($id);

		$this -> load -> view ('templates/header',$data);
        $this->todolist_model->status_todo($id);
        $this->load->view('action/update_success');			
		$datatabel['todo'] = $this->todolist_model->get_todo();
        $this->load->view('todo/index', $datatabel);
		$this -> load -> view ('templates/footer');
	}


	public function delete ($id=NULL){

		$data['title'] = 'Update  Status list';
		$data['todo_list'] = $this->todolist_model->get_todo($id);

		$this -> load -> view ('templates/header',$data);
        $this->todolist_model->delete_todo($id);
        $this->load->view('action/update_success');			
		$datatabel['todo'] = $this->todolist_model->get_todo();
        $this->load->view('todo/index', $datatabel);
		$this -> load -> view ('templates/footer');
	}

}