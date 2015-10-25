<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_member');		
		$this->load->model('m_time');
		$this->load->model('m_shop');
		$this->load->model('m_category');
		$this->load->model('m_product');
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
		$data['category']=$this->m_category->get_all_category(true);
		$num_cat=count($data['category']);
		$tar_cat=rand(0,$num_cat-1);
		$data['product']=$this->m_product->get_all_product($data['category'][$tar_cat]->id);
		if (isset($this->user_data)) {
			$data['userdata']=$this->user_data;
		}
		$data['main_cat']=$data['category'][$tar_cat]->id;
		$data['sub_cat']="all";
		$data_head['user_data']=$this->user_data;
		$this->load->view('v_header',$data_head);
		$this->load->view('v_shop',$data);
		$this->load->view('v_footer');
	}
	public function product_detail()
	{	
		$data['category']=$this->m_category->get_all_category(true);
		$num_cat=count($data['category']);
		$tar_cat=rand(0,$num_cat-1);
		$data['product']=$this->m_product->get_all_product($data['category'][$tar_cat]->id);
		if (isset($this->user_data)) {
			$data['userdata']=$this->user_data;
		}
		
		$data_head['user_data']=$this->user_data;
		$this->load->view('v_header',$data_head);
		$this->load->view('v_shop',$data);
		$this->load->view('v_footer');
	}
	////////////////////////////////////// angular ajax //////////////////////////////////////////
	public function ang_get_product_list(){
		header('Content-Type: application/json');
		$json = array();
		if (isset($_POST['main_cat'])) {
			$json['products']=$this->m_product->get_all_product($_POST['main_cat'],$_POST['sub_cat']);
		}else{
			$postdata = file_get_contents("php://input");
 			$request = json_decode($postdata);
 			$json['products']=$this->m_product->get_all_product($request->main_cat,$request->sub_cat);
		}
		
		echo json_encode($json);
	}
}
