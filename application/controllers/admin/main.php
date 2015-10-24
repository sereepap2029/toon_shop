<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

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

	public function index()
	{
		$this->load->view('admin/v_admin_login');
	}

	
	public function logout()
	{		
		$this->session->set_userdata('username', '');
		$this->session->sess_destroy();
		redirect('admin/login');
	}
	//-----------------------------------------------   SHOP -----------------------------------------------
	public function shop_list(){

		$data_foot['table']="yes";
		$data_head['user_data']=$this->user_data;
		$data['shops']=$this->m_shop->get_all_shop();
		$data_head['head_name']="Admin Panel";
		$data_head['link_head']=site_url('admin');
		$this->load->view('v_header_admin',$data_head);
		$this->load->view('admin/v_shop_list',$data);
		$this->load->view('v_footer',$data_foot);
	}


	public function shop_add(){

		$data_head['user_data']=$this->user_data;
		$data_view['A']="0";
				
		if (isset($_POST['name'])) {
				$shop_id=$this->m_shop->generate_id();
				$data= array(
						'id'=> $shop_id,
						'name' => $_POST['name'],
						'short_des' => $_POST['short_des'],
						'rating' => $_POST['rating'],
						'publish_time' => $this->m_time->datepicker_to_unix($_POST['publish_time']) ,
						'content' => $_POST['content'],
						);
				$filename=$_POST['file_path'];
			      $pos = strpos($filename, "old_file_picture__");
			      if ($pos === false&&$filename!="") {
			        //echo "in here 1 ";
			        $ext=explode(".", $filename);
			        $new_ext=$ext[count($ext)-1];
			        $new_filename=$shop_id."_cover_photo.".$new_ext;
			        $file = './media/temp/'.$filename;
			        $newfile = './media/shop_cover/'.$new_filename;

			        if (!copy($file, $newfile)) {
			            echo "failed to copy $file...\n".$file." to ".$newfile;
			            @unlink("./media/temp/".$filename);
			            @unlink("./media/temp/thumbnail/".$filename);
			        }else{
			        	$data['photo']=$new_filename;			        	
			            @unlink("./media/temp/".$filename);
			            @unlink("./media/temp/thumbnail/".$filename);
			        }
			      }
			    
					
					$this->m_shop->add_shop($data);

					redirect('admin/shop_list');
				
		}else{
			$data_head['head_name']="Admin Panel";
			$data_head['link_head']=site_url('admin');
			$this->load->view('v_header_admin',$data_head);
			$this->load->view('admin/v_shop_add',$data_view);
			$this->load->view('v_footer');
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */