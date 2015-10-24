<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->load->model('m_admin');
		$this->load->model('m_time');
		$this->load->model('m_product');
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

	public function index(){

		$data_foot['table']="yes";
		$data['category']=$this->m_category->get_all_category(true);
		$data_head['user_data']=$this->user_data;		
		$data_head['head_name']="Admin Panel";
		$data_head['link_head']=site_url('admin');
		$this->load->view('v_header_admin',$data_head);
		$this->load->view('admin/v_product_list',$data);
		$this->load->view('v_footer',$data_foot);
	}

	public function product_add(){

		$data_head['user_data']=$this->user_data;
		$data['A']="0";
		$data['category']=$this->m_category->get_all_category(true);
		if (isset($_POST['product_name'])) {	
				if($_POST['product_name']==""){
					$data['err_msg']="กรุณากรอก Product Name";
					$data_head['head_name']="Admin Panel";
					$data_head['link_head']=site_url('admin');

					$this->load->view('v_header_admin',$data_head);
					$this->load->view('admin/v_product_add',$data);
					$this->load->view('v_footer');
				}else if($_POST['real_price']==""){
					$data['err_msg']="กรุณากรอก ราคาจริง";
					$data_head['head_name']="Admin Panel";
					$data_head['link_head']=site_url('admin');

					$this->load->view('v_header_admin',$data_head);
					$this->load->view('admin/v_product_add',$data);
					$this->load->view('v_footer');
				}else if($_POST['category']=="no"){
					$data['err_msg']="กรุณาเลือก category";
					$data_head['head_name']="Admin Panel";
					$data_head['link_head']=site_url('admin');

					$this->load->view('v_header_admin',$data_head);
					$this->load->view('admin/v_product_add',$data);
					$this->load->view('v_footer');
				}else{
					$product_id=$this->m_product->generate_id();
					if (!isset($_POST['in_stock'])) {
						$_POST['in_stock']="n";
					}
					$cat=explode("__", $_POST['category']);
					$data= array(
						'product_id' => $product_id,
						'product_name' => $_POST['product_name'],
						'sub_des' => $_POST['sub_des'],
						'des' => $_POST['des'],
						'real_price' => (float)$_POST['real_price'],
						'sale_price' => (float)$_POST['sale_price'],
						'sale_percent' => (float)$_POST['sale_percent'],
						'in_stock' => $_POST['in_stock'],
						'main_cat' => $cat[1],
						'sub_cat' => $cat[0],
						);
					$this->m_product->add_product($data);
					$sort_order=0;
					foreach ($_POST['file_path'] as $key => $value) {
						$photo_id=$this->m_product->generate_id_photo();
						$sort_order+=1;
						$filename=$value;
					      $pos = strpos($filename, "old_file_picture__");
					      if ($pos === false&&$filename!="") {
					        //echo "in here 1 ";
					        $ext=explode(".", $filename);
					        $new_ext=$ext[count($ext)-1];
					        $new_filename=$product_id."_".$photo_id.".".$new_ext;
					        $file = './media/temp/'.$filename;
					        $newfile = './media/product_photo/'.$product_id."/".$new_filename;
					        if (!is_dir('./media/product_photo/'.$product_id)) {
					        	mkdir('./media/product_photo/'.$product_id);
					        }
					        if (!copy($file, $newfile)) {
					            echo "failed to copy $file...\n".$file." to ".$newfile;
					            @unlink("./media/temp/".$filename);
					            @unlink("./media/temp/thumbnail/".$filename);
					        }else{
					        	$data_photo= array(
									'id' => $photo_id,
									'filename' => $new_filename,
									'sort_order' => $sort_order,
									'product_id' => $product_id,
									);			  
								$this->m_product->add_product_photo($data_photo);	      	
					            @unlink("./media/temp/".$filename);
					            @unlink("./media/temp/thumbnail/".$filename);
					        }
					      }
					}

					redirect('admin/product');
				}
		}else{
			$data_head['head_name']="Admin Panel";
			$data_head['link_head']=site_url('admin');
			$this->load->view('v_header_admin',$data_head);
			$this->load->view('admin/v_product_add',$data);
			$this->load->view('v_footer');
		}
	}
	public function product_edit(){
		$data['category']=$this->m_category->get_all_category(true);
		$data_head['user_data']=$this->user_data;
		$data['edit']="yes";
		$product_id=$this->uri->segment(4,'');
		$data['product']=$this->m_product->get_product_by_id($product_id);
		if (isset($_POST['product_name'])) {	
				if($_POST['product_name']==""){
					$data['err_msg']="กรุณากรอก Product Name";
					$data_head['head_name']="Admin Panel";
					$data_head['link_head']=site_url('admin');

					$this->load->view('v_header_admin',$data_head);
					$this->load->view('admin/v_product_add',$data);
					$this->load->view('v_footer');
				}else if($_POST['real_price']==""){
					$data['err_msg']="กรุณากรอก ราคาจริง";
					$data_head['head_name']="Admin Panel";
					$data_head['link_head']=site_url('admin');

					$this->load->view('v_header_admin',$data_head);
					$this->load->view('admin/v_product_add',$data);
					$this->load->view('v_footer');
				}else if($_POST['category']=="no"){
					$data['err_msg']="กรุณาเลือก category";
					$data_head['head_name']="Admin Panel";
					$data_head['link_head']=site_url('admin');

					$this->load->view('v_header_admin',$data_head);
					$this->load->view('admin/v_product_add',$data);
					$this->load->view('v_footer');
				}else{
					if (!isset($_POST['in_stock'])) {
						$_POST['in_stock']="n";
					}
					$cat=explode("__", $_POST['category']);
					print_r($cat);
					$data= array(
						'product_id' => $product_id,
						'product_name' => $_POST['product_name'],
						'sub_des' => $_POST['sub_des'],
						'des' => $_POST['des'],
						'real_price' => (float)$_POST['real_price'],
						'sale_price' => (float)$_POST['sale_price'],
						'sale_percent' => (float)$_POST['sale_percent'],
						'in_stock' => $_POST['in_stock'],
						'main_cat' => $cat[1],
						'sub_cat' => $cat[0],
						);
					$this->m_product->update_product($data,$product_id);
					$sort_order=0;
					foreach ($_POST['file_path'] as $key => $value) {
						$photo_id=$this->m_product->generate_id_photo();
						$sort_order+=1;
						$filename=$value;
					      $pos = strpos($filename, "old_file_picture__");
					      if ($pos === false&&$filename!="") {
					        //echo "in here 1 ";
					        $ext=explode(".", $filename);
					        $new_ext=$ext[count($ext)-1];
					        $new_filename=$product_id."_".$photo_id.".".$new_ext;
					        $file = './media/temp/'.$filename;
					        $newfile = './media/product_photo/'.$product_id."/".$new_filename;
					        if (!is_dir('./media/product_photo/'.$product_id)) {
					        	mkdir('./media/product_photo/'.$product_id);
					        }
					        if (!copy($file, $newfile)) {
					            echo "failed to copy $file...\n".$file." to ".$newfile;
					            @unlink("./media/temp/".$filename);
					            @unlink("./media/temp/thumbnail/".$filename);
					        }else{
					        	$data_photo= array(
									'id' => $photo_id,
									'filename' => $new_filename,
									'sort_order' => $sort_order,
									'product_id' => $product_id,
									);			  
								$this->m_product->add_product_photo($data_photo);	      	
					            @unlink("./media/temp/".$filename);
					            @unlink("./media/temp/thumbnail/".$filename);
					        }
					      }else if($pos !== false&&$filename!=""){
					      	$ext=explode("__", $filename);
					      	$data_photo= array(
									'sort_order' => $sort_order,
									);			  
								$this->m_product->update_product_photo($data_photo,$ext[1]);	 
					      }
					}

					redirect('admin/product');
				}
		}else{
			$data_head['head_name']="Admin Panel";
			$data_head['link_head']=site_url('admin');
			$this->load->view('v_header_admin',$data_head);
			$this->load->view('admin/v_product_add',$data);
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
	///////////////////////////////////////////////////////////////////// AJAX region /////////////////////////////////////////////
	public function ang_get_product_list(){
		header('Content-Type: application/json');
		$json = array();
		$json['products']=$this->m_product->get_all_product();
		echo json_encode($json);
	}
	public function ajax_img_hold(){
		?>
		<div class="img_hold">
            <img src="<?=$_POST['file_path']?>" class="span10 file_tmp" alt="<?=$_POST['alt']?>">
            <input type="hidden" class="file_path" name="file_path[]" value="<?=$_POST['file']?>">
            <button type="button" class="btn btn-success del_tmp"><i class="icon-remove icon-white"></i></button>
        </div>
		<?
	}
	public function del_tmp_img(){
		unlink("./media/temp/".$_POST['file']);
	}
	public function del_real_img(){
		$this->m_product->delete_image($_POST['id']);
	}
	public function del_product(){
		$this->m_product->delete_product($_POST['id']);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */