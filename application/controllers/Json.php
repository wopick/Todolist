<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Json extends CI_Controller {
	public function __construct (){
		parent::__construct();
		$this->load->model('todolist_model');
		$this->load->model('json_model');
	}

	public function index (){
		$this->load->helper('form');

		$data['todo'] = $this->todolist_model->get_todo();
        $data['title'] = 'Json Todo List';

        $this->load->view('templates/header', $data);

        $this->load->view('json/index', $data);
        $this->load->view('templates/footer');



	}

	public function view ($id=NULL){
		$data['todo_list'] = $this->todolist_model->get_todo($id);

		if(empty($data['todo_list'])){
			show_404();
		}
		$this->load->view('json/view',$data);
	}

	public function all (){
		$data['todo_list'] = $this->todolist_model->get_todo();

		$this->load->view('json/all',$data);
	}

}