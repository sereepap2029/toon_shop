<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->load->model('m_admin');
		$this->load->model('m_time');
		$this->load->model('m_shop');
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

	public function admin_list(){

		$data_foot['table']="yes";
		$data_head['user_data']=$this->user_data;
		$data['admins']=$this->m_admin->get_admin();
		$data_head['head_name']="Admin Panel";
		$data_head['link_head']=site_url('admin');
		$this->load->view('v_header_admin',$data_head);
		$this->load->view('admin/v_admin_list',$data);
		$this->load->view('v_footer',$data_foot);
	}

	public function admin_add(){

		$data_head['user_data']=$this->user_data;
		$data['A']="0";
		if (isset($_POST['username'])) {
				$isdup=$this->m_admin->check_admin_username($_POST['username']);	
				if ($_POST['password']!=$_POST['confirm_password']) {

					$data['err_msg']="กรุณากรอกรหัสผ่านให้ตรงกัน";
					$data_head['head_name']="Admin Panel";
					$data_head['link_head']=site_url('admin');

					$this->load->view('v_header_admin',$data_head);
					$this->load->view('admin/v_admin_add',$data);
					$this->load->view('v_footer');
				}else if($_POST['username']==""){
					$data['err_msg']="กรุณากรอก username";
					$data_head['head_name']="Admin Panel";
					$data_head['link_head']=site_url('admin');

					$this->load->view('v_header_admin',$data_head);
					$this->load->view('admin/v_admin_add',$data);
					$this->load->view('v_footer');
				}else if(!$isdup){
					$data['err_msg']="username ".$_POST['username']." ถูกใช้ไปแล้ว";
					$data_head['head_name']="Admin Panel";
					$data_head['link_head']=site_url('admin');

					$this->load->view('v_header_admin',$data_head);
					$this->load->view('admin/v_admin_add',$data);
					$this->load->view('v_footer');
				}else{
					$data= array(
						'username' => $_POST['username'],
						'firstname' => $_POST['firstname'],
						'lastname' => $_POST['lastname'],
						'phone' => $_POST['phone'],
						'password' => $_POST['password'],
						'role' => $_POST['role'],
						'company' => $_POST['company'],
						);
					$this->m_admin->add_admin($data);

					redirect('admin/account/admin_list');
				}
		}else{
			$data_head['head_name']="Admin Panel";
			$data_head['link_head']=site_url('admin');
			$this->load->view('v_header_admin',$data_head);
			$this->load->view('admin/v_admin_add',$data);
			$this->load->view('v_footer');
		}
	}
	public function admin_edit(){
		$id=$this->uri->segment(4,'');
		$data_head['user_data']=$this->user_data;
		
		$data['admin']=$this->m_admin->get_admin_by_username($id);
		$data['edit']="yes";
		if (isset($_POST['firstname'])) {
			if ($_POST['password']!=$_POST['confirm_password']) {

					$data['err_msg']="กรุณากรอกรหัสผ่านให้ตรงกัน";
					$data_head['head_name']="Admin Panel";
					$data_head['link_head']=site_url('admin');

					$this->load->view('v_header_admin',$data_head);
					$this->load->view('admin/v_admin_add',$data);
					$this->load->view('v_footer');
				}else{
					$data= array(
						'firstname' => $_POST['firstname'],
						'lastname' => $_POST['lastname'],
						'phone' => $_POST['phone'],
						'password' => $_POST['password'],
						'role' => $_POST['role'],
						'company' => $_POST['company'],
						);
					$this->m_admin->update_admin($data,$id);

					redirect('admin/account/admin_list');
				}
				
					
				
		}else{
			$data_head['head_name']="Admin Panel";
			$data_head['link_head']=site_url('admin');
			$this->load->view('v_header_admin',$data_head);
			$this->load->view('admin/v_admin_add',$data);
			$this->load->view('v_footer');
		}
	}
	public function delete_admin(){
		$this->load->model('m_admin');
		$id=$this->uri->segment(4,'');
		$this->m_admin->delete_admin($id);
		redirect('admin/account/admin_list');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */