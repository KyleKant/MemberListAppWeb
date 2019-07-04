<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function getdata(){
		$this->load->model('memberlist_php_model');
		$dl = $this->memberlist_php_model->getdata();
		$dl = json_encode($dl);
		echo $dl;
	}
	public function updatedata(){
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$age = $this->input->post('age');
		$facebook = $this->input->post('facebook');
		$numberphone = $this->input->post('numberphone');

		$this->load->model('memberlist_php_model');
		echo $this->memberlist_php_model->updateByID($id, $name, $age, $facebook, $numberphone);
	}
}
