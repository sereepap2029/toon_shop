<?php
class M_user extends CI_Model {
 
  public function __construct(){
    parent::__construct();
  		$this->load->model("m_stringlib");  		
	}	
	function get_user ($login_name,$password) {
		$business = new stdClass();
		$query = $this->db->get_where('user', array('username' => $login_name,'password' => $password));
		
		if ($query->num_rows() > 0) {
			$business = $query->result();
			$business = $business[0];
		}
		return $business;
	}
	function get_user_by_login_name ($login_name) {
		$business = new stdClass();
		$query = $this->db->get_where('user', array('username' => $login_name));
		
		if ($query->num_rows() > 0) {
			$business = $query->result();
			$business = $business[0];
		}
		return $business;
	}

	function get_all_clam_user(){
		$g_list = array();
		$this->db->select('username, firstname, lastname');
		$this->db->where('role', 'clamer');
		$query = $this->db->get('user');
		
		if ($query->num_rows() > 0) {
			$g_list = $query->result();
		}
		return $g_list;

	}
	
}