<?php
class M_bank extends CI_Model {
 
  public function __construct(){
    parent::__construct();
  		$this->load->model("m_stringlib");  		
	}	
	function add_bank ($data) {
		$this->db->insert('bank', $data);
	}
	function update_bank($data, $id) {
		$this->db->where('id', $id);
		$this->db->update('bank', $data);
	}
	function get_all_bank(){
		$g_list = array();
		$this->db->order_by("bank_name", "asc"); 
		$query = $this->db->get('bank');
		
		if ($query->num_rows() > 0) {
			$g_list = $query->result();
		}
		return $g_list;

	}
	function get_bank_by_id($id){
		$clam = new stdClass();
		$this->db->where('id', $id); 
		$query = $this->db->get('bank');
		
		if ($query->num_rows() > 0) {
			$clam = $query->result();
			$clam = $clam[0];

		}
		return $clam;

	}

	function delete_bank($id) {
		$this->db->where('id', $id);
		$this->db->delete('bank'); 
	}

	
}