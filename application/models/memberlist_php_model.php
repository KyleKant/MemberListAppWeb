<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class memberlist_php_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function getData(){
		$this->db->select('*');
		$dl = $this->db->get('memberlisttable');
		$dl = $dl->result_array();
		return $dl;
	}
	public function updateByID($id, $name, $age, $facebook, $numberphone){
		$dl = array(
			'id' => $id,
			'name' => $name,
			'age' => $age,
			'facebook' => $facebook,
			'numberphone' => $numberphone
		);
		$this->db->where('id', $id);
		$this->db->update('memberlisttable', $dl);
		if($this->db->affected_rows() > 0){
			echo "Success";
		}
		else {
			echo "Fail";
		}
	}
}

/* End of file memberlist_php_model.php */
/* Location: ./application/models/memberlist_php_model.php */