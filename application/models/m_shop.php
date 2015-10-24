<?php
class M_shop extends CI_Model {
 
  public function __construct(){
    parent::__construct();
  		$this->load->model("m_stringlib");  		
	}	
	function generate_id()
	{
		$isuniq    = FALSE;
		$clam_id = '';
		do
		{
			$temp_id = $this->m_stringlib->uniqueAlphaNum10();
			$query = $this->db->get_where('shop', array('id' => $temp_id));
			if ($query->num_rows() == 0)
			{
				$clam_id = $temp_id;
				$isuniq    = TRUE;
			}
		}
		while(!$isuniq);
	
		return $clam_id;
	}
	function add_shop ($data) {
		$this->db->insert('shop', $data);
	}
	function update_clam($data, $id) {
		$this->db->where('id', $id);
		$this->db->update('shop', $data);
	}
	function get_all_shop(){
		$g_list = array();
		$this->db->order_by("publish_time", "desc"); 
		$query = $this->db->get('shop');
		
		if ($query->num_rows() > 0) {
			$g_list = $query->result();
		}
		return $g_list;

	}









	
	function get_clam_by_status($status){
		$g_list = array();
		if ($status!='all') {
			$this->db->where('status', $status); 
		}	
		$this->db->order_by("inform_date", "desc"); 
		$this->db->join('company', 'clam.insurance_company_id = company.id', 'left'); 
		$query = $this->db->get('clam');
		
		if ($query->num_rows() > 0) {
			$g_list = $query->result();
		}
		return $g_list;

	}
	function get_clam_by_id($clam_id){
		$clam = new stdClass();
		$this->db->where('clam_id', $clam_id); 
		$this->db->join('company', 'clam.insurance_company_id = company.id', 'left');
		$query = $this->db->get('clam');
		
		if ($query->num_rows() > 0) {
			$clam = $query->result();
			$clam = $clam[0];
		}
		return $clam;

	}
	function get_clam_damage_by_id($clam_id){
		$g_list = array();
		$g_list2 = array();
		$query = $this->db->get_where('clam_damage', array('clam_id' => $clam_id));
		
		if ($query->num_rows() > 0) {
			$g_list = $query->result();
		}
		foreach ($g_list as $key => $value) {
			$g_list2[$value->damage_target]=$value;
		}
		return $g_list2;
		
	}
	function delete_clam_damage ($clam_id) {
		$this->db->where('clam_id', $clam_id);
		$this->db->delete('clam_damage'); 
	}

	
}