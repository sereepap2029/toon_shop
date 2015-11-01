<?php
class M_province extends CI_Model {
 
  public function __construct(){
    parent::__construct();
  		$this->load->model("m_stringlib");  		
	}		
	function get_all_province(){
		$g_list = array();
		$this->db->order_by("name", "asc"); 
		$query = $this->db->get('province');
		
		if ($query->num_rows() > 0) {
			$g_list = $query->result();
		}
		return $g_list;

	}
	
}