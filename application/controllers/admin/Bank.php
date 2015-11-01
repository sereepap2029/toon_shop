<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bank extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->load->model('m_admin');
		$this->load->model('m_time');
		$this->load->model('m_bank');
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

	public function index(){

		$data_foot['table']="yes";
		$data_head['user_data']=$this->user_data;
		$data['bank']=$this->m_bank->get_all_bank();
		$data_head['head_name']="Admin Panel";
		$data_head['link_head']=site_url('admin');
		$this->load->view('v_header_admin',$data_head);
		$this->load->view('admin/v_bank_list',$data);
		$this->load->view('v_footer',$data_foot);
	}

	public function bank_add(){

		$data_head['user_data']=$this->user_data;
		$data['A']="0";
		if (isset($_POST['bank_name'])) {	
				if($_POST['bank_name']==""){
					$data['err_msg']="กรุณากรอก ธนาคาร";
					$data_head['head_name']="Admin Panel";
					$data_head['link_head']=site_url('admin');

					$this->load->view('v_header_admin',$data_head);
					$this->load->view('admin/v_bank_add',$data);
					$this->load->view('v_footer');
				}else{
					$data= array(
						'bank_name' => $_POST['bank_name'],
						'account_number' => $_POST['account_number'],
						'account_name' => $_POST['account_name'],
						);
					$this->m_bank->add_bank($data);

					redirect('admin/bank');
				}
		}else{
			$data_head['head_name']="Admin Panel";
			$data_head['link_head']=site_url('admin');
			$this->load->view('v_header_admin',$data_head);
			$this->load->view('admin/v_bank_add',$data);
			$this->load->view('v_footer');
		}
	}
	public function bank_edit(){
		$id=$this->uri->segment(4,'');
		$data_head['user_data']=$this->user_data;
		
		$data['bank']=$this->m_bank->get_bank_by_id($id);
		$data['edit']="yes";
		if (isset($_POST['bank_name'])) {
			if ($_POST['bank_name']=="") {

					$data['err_msg']="กรุณากรอก ธนาคาร";
					$data_head['head_name']="Admin Panel";
					$data_head['link_head']=site_url('admin');

					$this->load->view('v_header_admin',$data_head);
					$this->load->view('admin/v_bank_add',$data);
					$this->load->view('v_footer');
				}else{
					$data= array(
						'bank_name' => $_POST['bank_name'],
						'account_number' => $_POST['account_number'],
						'account_name' => $_POST['account_name'],
						);
					$this->m_bank->update_bank($data,$id);

					redirect('admin/bank');
				}
				
					
				
		}else{
			$data_head['head_name']="Admin Panel";
			$data_head['link_head']=site_url('admin');
			$this->load->view('v_header_admin',$data_head);
			$this->load->view('admin/v_bank_add',$data);
			$this->load->view('v_footer');
		}
	}
	public function delete_bank(){
		$id=$this->uri->segment(4,'');
		$this->m_bank->delete_bank($id);
		redirect('admin/bank');
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */