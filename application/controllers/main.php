<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_member');		
		$this->load->model('m_time');
		$this->load->model('m_shop');
		$this->user_data=null;
		if ($this->session->userdata('username')) {
			$user_data=$this->m_member->get_user_by_login_name($this->session->userdata('username'));
			if (isset($user_data->username)) {
				$this->user_data=$user_data;
			}
		}
	}
	public function index()
	{
		$data_head['user_data']=$this->user_data;
		$this->load->view('v_header',$data_head);
		$this->load->view('v_footer');
	}
}
