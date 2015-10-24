<?php
class M_product extends CI_Model {
 
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
			$query = $this->db->get_where('product', array('product_id' => $temp_id));
			if ($query->num_rows() == 0)
			{
				$clam_id = $temp_id;
				$isuniq    = TRUE;
			}
		}
		while(!$isuniq);
	
		return $clam_id;
	}
	function generate_id_photo()
	{
		$isuniq    = FALSE;
		$clam_id = '';
		do
		{
			$temp_id = $this->m_stringlib->uniqueAlphaNum10();
			$query = $this->db->get_where('product_photo', array('id' => $temp_id));
			if ($query->num_rows() == 0)
			{
				$clam_id = $temp_id;
				$isuniq    = TRUE;
			}
		}
		while(!$isuniq);
	
		return $clam_id;
	}
	function add_product ($data) {
		$this->db->insert('product', $data);
	}
	function add_product_photo ($data) {
		$this->db->insert('product_photo', $data);
	}
	function update_product($data, $id) {
		$this->db->where('product_id', $id);
		$this->db->update('product', $data);
	}
	function update_product_photo($data, $id) {
		$this->db->where('id', $id);
		$this->db->update('product_photo', $data);
	}
	function get_all_product(){
		$g_list = array();
		$this->db->order_by("product_name", "asc"); 
		$query = $this->db->get('product');
		
		if ($query->num_rows() > 0) {
			$g_list = $query->result();
			foreach ($g_list as $key => $value) {
				$g_list[$key]->photo=$this->get_all_photo($value->product_id);
				$g_list[$key]->combine_cat=$value->sub_cat."__".$value->main_cat;
			}
		}
		return $g_list;

	}
	function get_all_photo($product_id){
		$g_list = array();
		$this->db->order_by("sort_order", "asc"); 
		$this->db->where('product_id', $product_id);
		$query = $this->db->get('product_photo');
		
		if ($query->num_rows() > 0) {
			$g_list = $query->result();
			
		}
		return $g_list;

	}
	function get_product_by_id($id){
		$clam = new stdClass();
		$this->db->where('product_id', $id); 
		$query = $this->db->get('product');
		
		if ($query->num_rows() > 0) {
			$clam = $query->result();
			$clam = $clam[0];
			$clam->photo=$this->get_all_photo($clam->product_id);
		}
		return $clam;

	}
	function get_photo_by_id($id){
		$clam = new stdClass();
		$this->db->where('id', $id); 
		$query = $this->db->get('product_photo');
		
		if ($query->num_rows() > 0) {
			$clam = $query->result();
			$clam = $clam[0];
		}
		return $clam;

	}

	function delete_image($id) {
		$photo=$this->get_photo_by_id($id);
		unlink("./media/product_photo/".$photo->product_id."/".$photo->filename);
		$this->db->where('id', $id);
		$this->db->delete('product_photo'); 
	}
	function delete_product($id) {
		$photo=$this->get_all_photo($id);
		foreach ($photo as $key => $value) {
		 	$this->delete_image($value->id);
		 } 
		 $this->db->where('product_id', $id);
		$this->db->delete('product'); 
	}

	
}