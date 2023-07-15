<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('user_model');
	}

	public function save()
	{
		return $this->response($this->user_model->save());
	}

	public function update($id)
	{
		$data = $this->get_input();
		return $this->response($this->user_model->update($id, $data));
	}

	public function get_all(){
		return $this->response($this->user_model->get()); 
	}

	public function get($id){
		return $this->response($this->user_model->get(array('id' => $id)));
	}

	public function delete($id){
		return $this->response($this->user_model->delete($id));
	}

	public function response($data){
		$this->output
		->set_content_type('application/json')
		->set_status_header('200')
		->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
	}

	public function get_input(){
		return json_decode(file_get_contents('php://input'));
	}
}
