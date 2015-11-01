<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->load->model('m_admin');
		$this->load->model('m_time');
		$this->load->model('m_bank');
		$this->load->model('m_order');
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
		$data['order_list']=$this->m_order->get_all_order();
		$data_head['head_name']="Admin Panel";
		$data_head['link_head']=site_url('admin');
		$this->load->view('v_header_admin',$data_head);
		$this->load->view('admin/v_order_list',$data);
		$this->load->view('v_footer',$data_foot);
	}

	public function order_detail(){

		$id=$this->uri->segment(4,'');
		$data_head['user_data']=$this->user_data;
		
		$data['order']=$this->m_order->get_order_by_id($id);

		$data_head['head_name']="Admin Panel";
		$data_head['link_head']=site_url('admin');
		$this->load->view('v_header_admin',$data_head);
		$this->load->view('admin/v_order_detail',$data);
		$this->load->view('v_footer');
	}

	public function receive(){
		$id=$this->uri->segment(4,'');
		$data_head['user_data']=$this->user_data;
		
		$order=$this->m_order->get_order_by_id($id);
		if ($order->paid=="y") {
			$data= array(
						'paid' => "r",
						);
					$this->m_order->update_order($data,$id);
		}else if($order->paid=="r"){
			$data= array(
						'paid' => "y",
						);
					$this->m_order->update_order($data,$id);
		}
		redirect('admin/order/order_detail/'.$id);
	}

	public function send(){
		$id=$this->uri->segment(4,'');
		$data_head['user_data']=$this->user_data;
		
		$order=$this->m_order->get_order_by_id($id);
		if ($order->send=="n") {
			$data= array(
						'send' => "y",
						);
					$this->m_order->update_order($data,$id);
		}else if($order->send=="y"){
			$data= array(
						'send' => "n",
						);
					$this->m_order->update_order($data,$id);
		}
		redirect('admin/order/order_detail/'.$id);
	}
	public function delete_order(){
		$id=$this->uri->segment(4,'');
		$this->m_order->delete_order($id);
		redirect('admin/order');
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */