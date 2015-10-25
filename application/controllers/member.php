<?php
defined('BASEPATH') OR exit('No direct script access allowed');
function add($x, $y) { 
		$redat['val']=$x + $y; 
		$redat['operator']="บวก";
		return $redat;
	}
	function subtract($x, $y) {
	 $redat['val']=$x - $y; 
		$redat['operator']="ลบ";
		return $redat;
	}

	function multiply($x, $y) {
	 $redat['val']=$x * $y; 
		$redat['operator']="คูณ";
		return $redat;
	
	}
	function divide($x, $y) {
	 $redat['val']=$x / $y; 
		$redat['operator']="หาร";
		return $redat;
	}


class Member extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_member');		
		$this->load->model('m_time');
		$this->load->model('m_cart');
		$this->load->model('m_product');
		$this->user_data=null;
		$id=$this->uri->segment(2,'');
		$prem_flag=$id!="register"&&$id!="login"&&$id!="check_valid_reg"&&$id!="additem_to_cart";
		if ($this->session->userdata('username')) {
			$user_data=$this->m_member->get_user_by_login_name($this->session->userdata('username'));
			if (isset($user_data->username)) {
				$this->user_data=$user_data;
			}else{
				
				if ($prem_flag) {
					redirect('member/login');
				}
				
			}
		}else{
			if ($prem_flag) {
					redirect('member/login');
				}
		}
		$this->operators = array('add', 'subtract', 'multiply');
	}
	public function index()
	{
		$data_head['user_data']=$this->user_data;
		$this->load->view('v_header',$data_head);
		$this->load->view('member/v_profile');
		$this->load->view('v_footer');
	}
	public function login()
	{
		if (isset($_POST['username'])) {
			$user_data=$this->m_member->get_user($_POST['username'],$_POST['password']);
			//echo $_POST['login_name']." asdasd ".$_POST['password'];
			if (isset($user_data->username)) {
				$this->session->set_userdata('username', $user_data->username);
				$data2 = array(
	               'last_access' => time()
	            );

				$this->db->where('username', $user_data->username);
				$this->db->update('member', $data2); 
				redirect('member');

			}else{			
				$data['error_msg2']='Please login with your username and password';
				$data_head['user_data']=$this->user_data;
				$this->load->view('v_header',$data_head);
				$this->load->view('member/v_login',$data);
				$this->load->view('v_footer');
				$this->session->sess_destroy();
			}			
		}else{
			$data_head['user_data']=$this->user_data;
			$this->load->view('v_header',$data_head);
			$this->load->view('member/v_login');
			$this->load->view('v_footer');
		}
		
	}
	public function register()
	{	
		if (isset($_POST['username'])) {
			$data = array(
				'username' => $_POST['username'], 
				'password' => md5($_POST['password']), 
				'firstname' => $_POST['firstname'], 
				'lastname' => $_POST['lastname'], 
				'email' => $_POST['email'], 
				'phone' => $_POST['phone'], 
				);
			$this->m_member->add_member($data);
			redirect('member/login');
		}else{
			$x=rand(1,100);
			$y=rand(1,100);
			$result = call_user_func_array($this->operators[array_rand($this->operators)], array($x, $y));
			$this->session->set_userdata('capcha', $result['val']);
			$data['cap_res']=$result;
			$data['x']=$x;
			$data['y']=$y;
			$data_head['user_data']=$this->user_data;
			$this->load->view('v_header',$data_head);
			$this->load->view('member/v_register',$data);
			$this->load->view('v_footer');
		}
	}

	public function logout()
	{		
		$this->session->set_userdata('username', '');
		$this->session->sess_destroy();
		redirect('main');
	}

	////////////////////////////////////////ajax region /////////////////////////////
	public function additem_to_cart()
	{	
		header('Content-Type: application/json');
		$json = array();
		$json['flag']="fail";
		if (isset($this->user_data->username)) {
			$product=$this->m_product->get_product_by_id($_POST['product_id']);
			if (isset($product->product_name)) {
				$dat = array(
					'username' => $this->user_data->username, 
					'product_id' => $_POST['product_id'], 
					);
				$this->m_cart->add_item($dat);

				$json['flag']="OK";
				$json['product_name']=$product->product_name;
			}else{
				$json['flag']="ไม่มี Product นี้อยู่";
			}
		}
			

		echo json_encode($json);
	}

	public function check_valid_reg()
	{	
		header('Content-Type: application/json');
		$json = array();
		$username=preg_match('/^[A-Za-z0-9_]+$/', $_POST['username']);
		if ($username==1) {
			
			$member=$this->m_member->get_user_by_login_name($_POST['username']);
			if (isset($member->username)) {
				$json['username']="username already in use";
			}else{
				$json['username']="OK";
			}
		}else{
			$json['username']="invalid username";
		}

		$password=preg_match('/^[A-Za-z0-9_]+$/', $_POST['password']);
		if ($password==1) {
			
			if ($_POST['password']!=$_POST['confirm_password']) {
				$json['password']="Password and confirm password must be same";
			}else{
				$json['password']="OK";
			}
		}else{
			$json['password']="invalid Password";
		}

		if ($_POST['firstname']!="") {
			$json['firstname']="OK";
		}else{
			$json['firstname']="Require";
		}
		if ($_POST['lastname']!="") {
			$json['lastname']="OK";
		}else{
			$json['lastname']="Require";
		}

		if ($_POST['capcha']=="".$this->session->userdata('capcha')) {
			$json['capcha']="OK";
		}else{
			$json['capcha']="invalid capcha ";
		}


		$phone=preg_match('/^[0-9]+$/', $_POST['phone']);
		if ($phone==1) {
			$json['phone']="OK";
		}else{
			$json['phone']="invalid Phone number";
		}
		$email=preg_match('/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/', $_POST['email']);
		if ($email==1) {
			$json['email']="OK";
		}else{
			$json['email']="invalid E-mail";
		}
		
		echo json_encode($json);
	}
	


//...
 
}
