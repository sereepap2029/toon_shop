<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
	}

	public function index()
	{
		if(isset($_POST['login']) && $_POST['login'] == 'yes' )
		{
			$user_data=$this->m_user->get_user($_POST['username'],$_POST['password']);
			//echo $_POST['login_name']." asdasd ".$_POST['password'];
			if (isset($user_data->username)) {
				$this->session->set_userdata('username', $user_data->username);
				$data2 = array(
	               'last_access' => time()
	            );

				$this->db->where('username', $user_data->username);
				$this->db->update('user', $data2); 
				redirect('admin/account/admin_list');

			}else{			
				$data['error_msg2']='Please login with your username and password';
				$this->load->view('admin/v_admin_login',$data);
				$this->session->sess_destroy();
			}			
		}else{
			$this->session->sess_destroy();
			$this->load->view('admin/v_admin_login');
			
		}	
	}
}