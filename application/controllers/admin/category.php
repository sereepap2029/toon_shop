<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->load->model('m_admin');
		$this->load->model('m_time');
		$this->load->model('m_category');
		if ($this->session->userdata('username')) {
			$user_data=$this->m_user->get_user_by_login_name($this->session->userdata('username'));
			if (isset($user_data->username) && ($user_data->role=="admin"||$user_data->role=="sadmin")) {
				$this->user_data=$user_data;
			}else{
				redirect('admin/login');
			}
		}else{
			redirect('admin/login');
		}
	}

	public function main_category(){

		$data_foot['table']="yes";
		$data_head['user_data']=$this->user_data;
		$data['categorys']=$this->m_category->get_all_category();
		$data_head['head_name']="Admin Panel";
		$data_head['link_head']=site_url('admin');
		$this->load->view('v_header_admin',$data_head);
		$this->load->view('admin/v_category_list',$data);
		$this->load->view('v_footer',$data_foot);
	}
	public function sub_category(){

		$data_foot['table']="yes";
		$data_head['user_data']=$this->user_data;
		$data['categorys']=$this->m_category->get_all_sub_category();
		$data_head['head_name']="Admin Panel";
		$data_head['link_head']=site_url('admin');
		$this->load->view('v_header_admin',$data_head);
		$this->load->view('admin/v_sub_category_list',$data);
		$this->load->view('v_footer',$data_foot);
	}

	public function category_add(){

		$data_head['user_data']=$this->user_data;
		$data['A']="0";
		if (isset($_POST['name'])) {	
				if($_POST['name']==""){
					$data['err_msg']="กรุณากรอก Category Name";
					$data_head['head_name']="Admin Panel";
					$data_head['link_head']=site_url('admin');

					$this->load->view('v_header_admin',$data_head);
					$this->load->view('admin/v_category_add',$data);
					$this->load->view('v_footer');
				}else{
					$data= array(
						'name' => $_POST['name'],
						);
					$this->m_category->add_category($data);

					redirect('admin/category/main_category');
				}
		}else{
			$data_head['head_name']="Admin Panel";
			$data_head['link_head']=site_url('admin');
			$this->load->view('v_header_admin',$data_head);
			$this->load->view('admin/v_category_add',$data);
			$this->load->view('v_footer');
		}
	}
	public function sub_category_add(){

		$data_head['user_data']=$this->user_data;
		$data['A']="0";
		$data['categorys']=$this->m_category->get_all_category();
		if (isset($_POST['name'])) {	
				if($_POST['name']==""){
					$data['err_msg']="กรุณากรอก Category Name";
					$data_head['head_name']="Admin Panel";
					$data_head['link_head']=site_url('admin');

					$this->load->view('v_header_admin',$data_head);
					$this->load->view('admin/v_sub_category_add',$data);
					$this->load->view('v_footer');
				}else if($_POST['parent_category']=="no"){
					$data['err_msg']="กรุณาเลือก Main/Parent Category";
					$data_head['head_name']="Admin Panel";
					$data_head['link_head']=site_url('admin');

					$this->load->view('v_header_admin',$data_head);
					$this->load->view('admin/v_sub_category_add',$data);
					$this->load->view('v_footer');
				}else{
					$data= array(
						'name' => $_POST['name'],
						'parent_category' => $_POST['parent_category'],
						);
					$this->m_category->add_sub_category($data);

					redirect('admin/category/sub_category');
				}
		}else{
			$data_head['head_name']="Admin Panel";
			$data_head['link_head']=site_url('admin');
			$this->load->view('v_header_admin',$data_head);
			$this->load->view('admin/v_sub_category_add',$data);
			$this->load->view('v_footer');
		}
	}
	public function category_edit(){
		$id=$this->uri->segment(4,'');
		$data_head['user_data']=$this->user_data;
		
		$data['category']=$this->m_category->get_category_by_id($id);
		$data['edit']="yes";
		if (isset($_POST['name'])) {
			if ($_POST['name']=="") {

					$data['err_msg']="กรุณากรอก Category Name";
					$data_head['head_name']="Admin Panel";
					$data_head['link_head']=site_url('admin');

					$this->load->view('v_header_admin',$data_head);
					$this->load->view('admin/v_category_add',$data);
					$this->load->view('v_footer');
				}else{
					$data= array(
						'name' => $_POST['name'],
						);
					$this->m_category->update_category($data,$id);

					redirect('admin/category/main_category');
				}
				
					
				
		}else{
			$data_head['head_name']="Admin Panel";
			$data_head['link_head']=site_url('admin');
			$this->load->view('v_header_admin',$data_head);
			$this->load->view('admin/v_category_add',$data);
			$this->load->view('v_footer');
		}
	}
	public function sub_category_edit(){
		$id=$this->uri->segment(4,'');
		$data_head['user_data']=$this->user_data;
		$data['categorys']=$this->m_category->get_all_category();
		$data['sub_category']=$this->m_category->get_sub_category_by_id($id);
		$data['edit']="yes";
		if (isset($_POST['name'])) {
			if($_POST['name']==""){
					$data['err_msg']="กรุณากรอก Category Name";
					$data_head['head_name']="Admin Panel";
					$data_head['link_head']=site_url('admin');

					$this->load->view('v_header_admin',$data_head);
					$this->load->view('admin/v_sub_category_add',$data);
					$this->load->view('v_footer');
				}else if($_POST['parent_category']=="no"){
					$data['err_msg']="กรุณาเลือก Main/Parent Category";
					$data_head['head_name']="Admin Panel";
					$data_head['link_head']=site_url('admin');

					$this->load->view('v_header_admin',$data_head);
					$this->load->view('admin/v_sub_category_add',$data);
					$this->load->view('v_footer');
				}else{
					$data= array(
						'name' => $_POST['name'],
						'parent_category' => $_POST['parent_category'],
						);
					$this->m_category->update_sub_category($data,$id);

					redirect('admin/category/sub_category');
				}
				
					
				
		}else{
			$data_head['head_name']="Admin Panel";
			$data_head['link_head']=site_url('admin');
			$this->load->view('v_header_admin',$data_head);
			$this->load->view('admin/v_sub_category_add',$data);
			$this->load->view('v_footer');
		}
	}
	public function delete_category(){
		$id=$this->uri->segment(4,'');
		$this->m_category->delete_category($id);
		redirect('admin/category/main_category');
	}

	public function delete_sub_category(){
		$id=$this->uri->segment(4,'');
		$this->m_category->delete_sub_category($id);
		redirect('admin/category/sub_category');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */