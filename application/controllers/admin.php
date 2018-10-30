<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_adminlogged_in();
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->helper(array('form', 'url','file','custom_helper'));
		$this->load->database();
		$this->load->model('pathlab_model');
		define('ASSETS', base_url().'assets/');
		define('ASSETS2', base_url().'assets/admin/');
		define('administrator', base_url().'index.php/administrator/');
		define('Adminpath', base_url().'index.php/admin/');
		define('PATH', base_url().'index.php');

		if((($this->router->method) == "ViewOffers")  )
		{
			define('link', 'https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css');
		}
		else{
			define('link', ASSETS2.'css/bootstrap.min.css');	
		}


	}
	public function index()
	{	$data=array();
		$data['page']='admin/login';
		$this->load->view('admin/login',$data);
	}
	public function dashboard()
	{
		// $data['EnqCount']=$this->pathlab_model->getEnqCount();
		// $data['getSliderCount']=$this->pathlab_model->getSliderCount();
		// $data['getOfferCount']=$this->pathlab_model->getOfferCount();
		$data['page']='admin/index';
		$this->load->view('admin/main',$data);
	}
	public function viewUsers()
	{
		$data['page']='admin/viewUsers';
		$data['userlist']=$this->pathlab_model->dbselect("usermaster");
		$this->load->view('admin/main',$data);
	}
	public function ViewOffers()
	{
		$data['page']='admin/ViewOffers';
		$data['offers_list']=$this->pathlab_model->getOffers();
		// $data['username']=$this->session->userdata['admindetails']['username'];
		$this->load->view('admin/main',$data);
	}
	public function viewRests()
	{
		$data['page']='admin/viewRests';
		$data['offers_list']=$this->pathlab_model->getRests();
		// $data['username']=$this->session->userdata['admindetails']['username'];
		$this->load->view('admin/main',$data);
	}
	public function ViewProducts()
	{
		$data['page']='admin/ViewProducts';
		$data['offers_list']=$this->pathlab_model->dbselect("products");
		// $data['username']=$this->session->userdata['admindetails']['username'];
		$this->load->view('admin/main',$data);
	}
	public function viewOrders()
	{
		$data['page']='admin/viewOrders';
		$data['products']=$this->pathlab_model->dbselect("order_master");
		$data['city']=$this->pathlab_model->getCity();
		$data['restaurant']=$this->pathlab_model->getRestaurant();

		$this->load->view('admin/main',$data);
	}

	function populate_rest()
	{
		$id = $this->input->post('city');
		echo(json_encode($this->pathlab_model->getRestaurant($id)));
	}

	public function viewUser(){
		$data= array();
		$data['page']='view_users';
		$users = $this->CEIT_model->getUsers();
		$data['users'] = $users;
		$this->load->view('admin/main',$data);
	}
	public function ViewEnquiry(){
		$data= array();
		$data['page']='admin/ViewEnquiry';
		$ViewEnquiry = $this->pathlab_model->dbselect("enquiry_master");
		$data['ViewEnquiry'] = $ViewEnquiry;
		$this->load->view('admin/main',$data);
	}

	// function SetStatus($tablename,$status,$id)
	// {
	// 	// $tablename=$this->input->post('table');
	// 	// $where=$this->input->post('where');
	// 	// $id=$this->input->post('sid');
	// 	$user_detail = array('status'=> $this->input->post('status'));
	// 	$this->pathlab_model->SetStatus($tablename,$user_detail, $id,$id);
	// }
	function SetStatus()
	{
		$tablename=$this->input->post('table');
		$where=$this->input->post('where');
		$id=$this->input->post('id');
		$user_detail = array('status'=> $this->input->post('status'));
		$this->pathlab_model->SetStatus($tablename,$user_detail, $where,$id);
	}
	function Delete($tablename='', $fieldname='', $indexid=0)
	{
		$this->pathlab_model->deleterecord($tablename, $fieldname, $indexid);
	}

	public function AddRest(){
		$data = array();
		if(isset($_POST['submit']))
		{
			$this->form_validation->set_rules('rest_name', 'restaurant Name', 'trim|required');
			$this->form_validation->set_rules('rest_address', 'restaurant Address', 'trim|required');
			$this->form_validation->set_rules('rest_phone', 'Phone Name', 'trim|required');
			$this->form_validation->set_rules('rest_city', 'City Name', 'trim|required');
			$this->form_validation->set_error_delimiters('<span class="fielderror">', '</span>');
			if($this->form_validation->run() == false) 
			{
				$data['reset'] = false;
			}
			else
			{
				$config['upload_path']   = './assets/admin/rest_logo/'; 
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size']      = 500042; 
				$config['file_name']	= $_FILES['file']['name'];
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('file')) {
					$error = array('error' => $this->upload->display_errors());
				}
				else { 
					$gallery = $this->upload->data(); 
					$offer_detail = array('rest_name'=>$this->input->post('rest_name'),
						'rest_address'=>$this->input->post('rest_address'),
						'rest_phone'=>$this->input->post('rest_phone'),
						'rest_logo'=>$gallery['file_name'],
						'rest_city'=>$this->input->post('rest_city'),'status'=>'False',
						'createdate'=>date('d-m-Y'));
					if($this->pathlab_model->insert('rest_master',$offer_detail))
					{
						$data['success'] = 'One restaurant saved successfully !';
					}
					else
					{
						$data['error']   = 'An error occurred while Adding restaurant, please try again !';
					}
				} 	
			}
		}
		$data['page'] = 'admin/AddRest';
		$this->load->view('admin/main', $data);
	}
	public function addProduct(){
		$data = array();
		if(isset($_POST['submit']))
		{
			$this->form_validation->set_rules('pname', 'Product Name', 'trim|required');
			$this->form_validation->set_rules('pdetail', 'Product description', 'trim|required');
			$this->form_validation->set_rules('price', 'Price', 'trim|required');
			// $this->form_validation->set_rules('offerdetail', 'Offer description', 'trim|required');
			$this->form_validation->set_error_delimiters('<span class="fielderror">', '</span>');
			if($this->form_validation->run() == false) 
			{
				$data['reset'] = false;
			}
			else
			{
				$config['upload_path']   = './assets/admin/products/'; 
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size']      = 500042; 
				$config['file_name']	= $_FILES['file']['name'];
				// $fname=str_replace(preg_replace("/[^a-zA-Z0-9.]/", "", $file_name), '_', $_FILES['file-upload']['name']);
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('file')) {
					$error = array('error' => $this->upload->display_errors());
				}
				else { 
					$gallery = $this->upload->data(); 
					$offer_detail = array('resid'=>$this->input->post('restid'),'name'=>$this->input->post('pname'),
						'details'=>$this->input->post('pdetail'),
						'picture'=>$gallery['file_name'],
						'price'=>$this->input->post('price'),'proprice'=>$this->input->post('price'),
						'status'=>'0','isSpcl'=>$this->input->post('isSpcl'),'spclprice'=>$this->input->post('spclprice'),'validaty'=>$this->input->post('spcldate'));
					if($this->pathlab_model->insert('products',$offer_detail))
					{
						$data['success'] = 'Offer saved successfully !';
					}
					else
					{
						$data['error']   = 'An error occurred while Adding Offer upload, please try again !';
					}
				} 	
			}
		}
		$data['page'] = 'admin/addOffer';
		$data['restname'] = $this->pathlab_model->get_select_option('rest_master','rid','rest_name');
		$this->load->view('admin/main', $data);
	}

	public function EditProduct($id){
		$data = array();
		if(isset($_POST['submit']))
		{
			$this->form_validation->set_rules('pname', 'Product Name', 'trim|required');
			$this->form_validation->set_rules('pdetail', 'Product description', 'trim|required');
			$this->form_validation->set_rules('price', 'Price', 'trim|required');
			$this->form_validation->set_error_delimiters('<span class="fielderror">', '</span>');
			if($this->form_validation->run() == false) 
			{
				$data['reset'] = false;
			}
			else
			{
				$config['upload_path']   = './assets/admin/products/'; 
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size']      = 500042; 
				$config['file_name']	= $_FILES['file']['name'];
				// $fname=str_replace(preg_replace("/[^a-zA-Z0-9.]/", "", $file_name), '_', $_FILES['file-upload']['name']);
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('file')) {
					$error = array('error' => $this->upload->display_errors());
				}
				else { 
					$gallery = $this->upload->data(); 
					$offer_detail = array('resid'=>$this->input->post('restid'),'name'=>$this->input->post('pname'),
						'details'=>$this->input->post('pdetail'),
						'picture'=>$gallery['file_name'],
						'price'=>$this->input->post('price'),'proprice'=>$this->input->post('price'),
						'status'=>'0');
					if($this->pathlab_model->update('products',$offer_detail,'id',$id))
					{
						$data['success'] = 'Offer saved successfully !';
					}
					else
					{
						$data['error']   = 'An error occurred while Adding Offer upload, please try again !';
					}
				} 	
			}
		}
		$data['page'] = 'admin/EditProduct';

		$data['offer_detail'] = $this->pathlab_model->getRowbyId('products','id',$id);
		$data['restname'] = $this->pathlab_model->get_select_option('rest_master','rid','rest_name',$data['offer_detail']->resid);

		$this->load->view('admin/main', $data);
	}	
	public function EditRest($id){
		$data = array();
		$file='';
		if(isset($_POST['submit']))
		{
			unset($config);
			$this->form_validation->set_rules('rest_name', 'restaurant Name', 'trim|required');
			$this->form_validation->set_rules('rest_address', 'restaurant Address', 'trim|required');
			$this->form_validation->set_rules('rest_phone', 'Phone Name', 'trim|required');
			$this->form_validation->set_rules('rest_city', 'City Name', 'trim|required');
			$this->form_validation->set_error_delimiters('<span class="fielderror">', '</span>');
			if($this->form_validation->run() == false) 
			{
				$data['reset'] = false;
			}
			else
			{
				$config['upload_path']   = './assets/admin/rest_logo/'; 
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size']      = 500042; 
				$config['file_name']	= $_FILES['file']['name'];
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('file')) {
					$error = array('error' => $this->upload->display_errors());
				}
				else { 
					$gallery = $this->upload->data(); 
					$offer_detail = array('rest_name'=>$this->input->post('rest_name'),
						'rest_address'=>$this->input->post('rest_address'),
						'rest_phone'=>$this->input->post('rest_phone'),
						'rest_logo'=>$gallery['file_name'],
						'rest_city'=>$this->input->post('rest_city'),'status'=>'False',
						'createdate'=>date('d-m-Y'));
					if($this->pathlab_model->update('rest_master',$offer_detail,'rid',$id))
					{
						$data['success'] = 'One restaurant Updated successfully !';
					}
					else
					{
						$data['error']   = 'An error occurred while Adding restaurant, please try again !';
					}
				} 	
			}
		}
		echo $offer_detail;
		$data['offer_detail'] = $this->pathlab_model->getRestsById($id);
		$data['page'] = 'admin/EditRest';
		$this->load->view('admin/main', $data);
	}

	public function AddVideo(){
		$data = array();
		if(isset($_POST['submit']))
		{
			if($this->form_validation->run() == TRUE) 
			{
				$data['reset'] = false;
			}
			else
			{
				$config['upload_path']   = './assets/admin/videos/'; 
				$config['allowed_types'] = 'mp4|mpeg|avi|flv|wmv|png|jpg|gif|jpeg'; 
				$config['file_name']	= $_FILES['video']['name'];
				$config['remove_spaces']=TRUE;
				$fname=$_FILES['video']['name'];
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('video')) {
					$error = array('error' => $this->upload->display_errors());
				}
				else { 
					$gallery = $this->upload->data(); 
					$videos_detail = array('vname'=>$this->input->post('vtitle'),
						'description'=>$this->input->post('vdescription'),
						'length'=>($_FILES['video']['size']),
						'uploaddate'=>date('d-m-Y'),
						'vpath'=>'');

					if($this->CEIT_model->insert('videos',$videos_detail))
					{
						$data['success'] = 'Video upload successfully !';
					}
					else
					{
						$data['error']   = 'An error occurred while Adding Video upload, please try again !';
					}
				} 	
			}
		}
		$data['page'] = 'video';
		$data['videos_detail'] = $this->CEIT_model->getVideo();
		$data['username']=$this->session->userdata['admindetails']['username'];
		$this->load->view('admin/main', $data);
	}

	function logout()
	{
		$this->session->unset_userdata('admindetails');
		redirect(base_url());  

	}



//end Of Admin Controller
}
