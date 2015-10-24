<?php
class M_category extends CI_Model {
 
  public function __construct(){
    parent::__construct();
  		$this->load->model("m_stringlib");  		
	}	
	function add_category ($data) {
		$this->db->insert('category', $data);
	}
	function add_sub_category ($data) {
		$this->db->insert('sub_category', $data);
	}
	function update_category($data, $id) {
		$this->db->where('id', $id);
		$this->db->update('category', $data);
	}
	function update_sub_category($data, $id) {
		$this->db->where('id', $id);
		$this->db->update('sub_category', $data);
	}
	function get_all_category($get_sub=false){
		$g_list = array();
		$this->db->order_by("name", "asc"); 
		$query = $this->db->get('category');
		
		if ($query->num_rows() > 0) {
			$g_list = $query->result();
			if ($get_sub) {
				foreach ($g_list as $key => $value) {
					$g_list[$key]->sub_cat=$this->get_all_sub_category_by_parent($value->id,false);
				}
			}
		}
		return $g_list;

	}
	function get_all_sub_category(){
		$g_list = array();
		$this->db->order_by("name", "asc"); 
		$query = $this->db->get('sub_category');
		
		if ($query->num_rows() > 0) {
			$g_list = $query->result();
			foreach ($g_list as $key => $value) {
				$g_list[$key]->parent_name=$this->get_category_by_id($value->parent_category)->name;
			}
		}
		return $g_list;

	}
	function get_all_sub_category_by_parent($id,$get_parent=true){
		$g_list = array();
		$this->db->order_by("name", "asc"); 
		$this->db->where('parent_category', $id);
		$query = $this->db->get('sub_category');
		
		if ($query->num_rows() > 0) {
			$g_list = $query->result();
			if ($get_parent) {
				foreach ($g_list as $key => $value) {
					$g_list[$key]->parent_name=$this->get_category_by_id($value->parent_category)->name;
				}
			}
			
		}
		return $g_list;

	}
	function get_category_by_id($id){
		$clam = new stdClass();
		$this->db->where('id', $id); 
		$query = $this->db->get('category');
		
		if ($query->num_rows() > 0) {
			$clam = $query->result();
			$clam = $clam[0];

		}
		return $clam;

	}
	function get_sub_category_by_id($id){
		$clam = new stdClass();
		$this->db->where('id', $id); 
		$query = $this->db->get('sub_category');
		
		if ($query->num_rows() > 0) {
			$clam = $query->result();
			$clam = $clam[0];
			$clam->parent_name=$this->get_category_by_id($clam->parent_category)->name;
		}
		return $clam;

	}

	function delete_sub_category($id) {
		$this->db->where('id', $id);
		$this->db->delete('sub_category'); 
	}
	function delete_sub_category_by_parent($id) {
		$this->db->where('parent_category', $id);
		$this->db->delete('sub_category'); 
	}
	function delete_category($id) {
		$this->delete_sub_category_by_parent($id);
		$this->db->where('id', $id);
		$this->db->delete('category'); 
	}

	
}