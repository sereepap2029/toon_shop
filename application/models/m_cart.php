<?php
class M_cart extends CI_Model {
 
  public function __construct(){
    parent::__construct();
  		$this->load->model("m_stringlib");
		$this->load->model("m_product");  		  		
	}	
	function add_item ($data) {
		$this->db->insert('item_cart', $data);
	}
	function update_item($data, $id) {
		$this->db->where('id', $id);
		$this->db->update('item_cart', $data);
	}
	function get_all_item_by_usn($usn){
		$g_list = array();
			$this->db->where('username', $usn);		
		$query = $this->db->get('item_cart');

		if ($query->num_rows() > 0) {
			$g_list = $query->result();
			foreach ($g_list as $key => $value) {
				$g_list[$key]->detail=$this->m_product->get_product_by_id($value->product_id);
				$g_list[$key]->detail->photo=$this->m_product->get_all_photo($value->product_id);
			}
		}
		return $g_list;

	}
	function get_item_by_id($id){
		$clam = new stdClass();
		$this->db->where('id', $id); 
		$query = $this->db->get('item_cart');
		
		if ($query->num_rows() > 0) {
			$clam = $query->result();
			$clam = $clam[0];
		}
		return $clam;

	}
	function delete_item($id) {
		$this->db->where('id', $id);
		$this->db->delete('item_cart'); 
	}
	function delete_item_by_usn($usn) {
		 $this->db->where('username', $usn);
		$this->db->delete('item_cart'); 
	}

	
}