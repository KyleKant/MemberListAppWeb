<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class member extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('memberdata');
	}

}

/* End of file member.php */
/* Location: ./application/controllers/member.php */