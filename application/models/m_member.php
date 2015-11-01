<?php
class M_member extends CI_Model {
 
  public function __construct(){
    parent::__construct();
  		$this->load->model("m_stringlib");  		
	}	
	function get_user ($login_name,$password) {
		$business = new stdClass();
		$query = $this->db->get_where('member', array('username' => $login_name,'password' => md5($password)));
		
		if ($query->num_rows() > 0) {
			$business = $query->result();
			$business = $business[0];
		}
		return $business;
	}
	function get_user_by_login_name ($login_name) {
		$business = new stdClass();
		$query = $this->db->get_where('member', array('username' => $login_name));
		
		if ($query->num_rows() > 0) {
			$business = $query->result();
			$business = $business[0];
		}
		return $business;
	}

	function get_all_member(){
		$g_list = array();
		$this->db->select('username, firstname, lastname');
		$query = $this->db->get('member');
		
		if ($query->num_rows() > 0) {
			$g_list = $query->result();
		}
		return $g_list;

	}
	function add_member ($data) {
		$this->db->insert('member', $data);
	}
	function add_address ($data) {
		$this->db->insert('member_address', $data);
	}
	function update_member($data, $username) {
		$this->db->where('username', $username);
		$this->db->update('member', $data);
	}
	function update_address($data, $id) {
		$this->db->where('id', $id);
		$this->db->update('member_address', $data);
	}
	

	function get_address_by_id ($id) {
		$business = new stdClass();
		$query = $this->db->get_where('member_address', array('id' => $id));
		
		if ($query->num_rows() > 0) {
			$business = $query->result();
			$business = $business[0];
		}
		return $business;
	}
	function get_address_list($username){
		$g_list = array();
		$this->db->where('member_usn', $username);
		$query = $this->db->get('member_address');
		
		if ($query->num_rows() > 0) {
			$g_list = $query->result();
		}
		return $g_list;

	}
	function delete_address($id) {
		$this->db->where('id', $id);
		$this->db->delete('member_address'); 
	}
}