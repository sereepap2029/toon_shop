<?php
class M_order extends CI_Model {
 
  public function __construct(){
    parent::__construct();
  		$this->load->model("m_stringlib");
		$this->load->model("m_product");  		  		
	}	
	function generate_id()
	{
		$isuniq    = FALSE;
		$clam_id = '';
		do
		{
			$temp_id = $this->m_stringlib->uniqueAlphaNum10();
			$query = $this->db->get_where('member_order', array('id' => $temp_id));
			if ($query->num_rows() == 0)
			{
				$clam_id = $temp_id;
				$isuniq    = TRUE;
			}
		}
		while(!$isuniq);
	
		return $clam_id;
	}
	function add_order ($data) {
		$this->db->insert('member_order', $data);
	}
	function add_order_item ($data) {
		$this->db->insert('member_order_item', $data);
	}
	function update_order($data, $id) {
		$this->db->where('id', $id);
		$this->db->update('member_order', $data);
	}
	function get_all_order_by_usn($usn){
		$g_list = array();
			$this->db->where('member_usn', $usn);		
		$query = $this->db->get('member_order');

		if ($query->num_rows() > 0) {
			$g_list = $query->result();
		}
		return $g_list;

	}
	function get_all_order(){
		$g_list = array();
		$this->db->order_by("time", "desc"); 	
		$query = $this->db->get('member_order');

		if ($query->num_rows() > 0) {
			$g_list = $query->result();
		}
		return $g_list;

	}
	function get_order_item_by_order_id($id){
		$g_list = array();
			$this->db->where('order_id', $id);		
		$query = $this->db->get('member_order_item');

		if ($query->num_rows() > 0) {
			$g_list = $query->result();
		}
		return $g_list;

	}
	function get_order_by_id($id){
		$clam = new stdClass();
		$this->db->where('id', $id); 
		$query = $this->db->get('member_order');
		
		if ($query->num_rows() > 0) {
			$clam = $query->result();
			$clam = $clam[0];
			$clam->item_list=$this->get_order_item_by_order_id($clam->id);
			foreach ($clam->item_list as $key => $value) {
				$clam->item_list[$key]->detail=$this->m_product->get_product_by_id($value->product_id);
			}
		}
		return $clam;

	}
	function delete_order($id) {
		$this->db->where('id', $id);
		$this->db->delete('member_order'); 
	}

	
}