<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Foodshop extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation','User_agent');
		$this->load->helper(array('form', 'url','file','custom_helper','security'));
		$this->load->database();
		$this->load->model('pathlab_model');
		
		define('ASSETS', base_url().'assets/');
		define('PATH', base_url());
		define('ASSETS2', base_url().'assets/admin/');
		
	}
	public function index()
	{
		$data=array();
		$data['page']='index';
		$data['special_offers']=$this->pathlab_model->getSpecialOffers();
    $data['top_restaurants']=$this->pathlab_model->dbselect('rest_master');
    $data['top_cusines']=$this->pathlab_model->getSpecialOffers();
    $this->load->view('main',$data);
  }
  function login()
  {
    $data = array();
    $data['special_offers']=$this->pathlab_model->getSpecialOffers();
    if(isset($_POST['submit']))
    {
     $this->form_validation->set_rules('Username', 'Usernameme', 'trim|required');
     $this->form_validation->set_rules('Password', 'Password', 'trim|required');
     $this->form_validation->set_error_delimiters('<span class="fielderror">', '</span>');
     if($this->form_validation->run() == FALSE) 
     {
      $data['reset'] = FALSE;
    }
    else
    {
      $uname = $this->input->post('Username');
      $password = $this->input->post('Password');
      if($this->pathlab_model->userlogin($uname, $password))
      {
       redirect(base_url().'Order');
				//echo "Hi";
				// $data['page'] = 'dashboard';
				// $this->load->view('admin/login', $data);
				//exit;
				//$this->load->view('user/content', $data);
     }
     else
     {
       $data['error'] = 'Wrong Username/password combination, please try again !';
       $data['page'] = 'login';
       $this->load->view('main', $data);
     }
   }
 }
 else
 {
   $data['page'] = 'login';
   $this->load->view('main', $data);
 }

}
function get_client_ip() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {   //check ip from share internet
        	$ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {   //to check ip is pass from proxy
        	$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
        	$ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
      }
function SendEnq()
      {
       if($_POST)
       {
        $user_detail = array('uname'=>$this->input->post('uname'),
         'msg'=>$this->input->post('msg'),'mobile_no'=>$this->input->post('mobile_no'),
         'status'=>'False',
         'createdate'=>date('d-m-Y'),'ipaddress'=>$this->get_client_ip());

        if($this->pathlab_model->insert('enquiry_master',$user_detail))
        {
         $data['success'] = 'User Registration successfully !';
       }
       else
       {
         $data['error']   = 'An error occurred while Register User, please try again !';
       }


     }
   }
   function Register()
   {
     $data = array();
     if (isset($_POST['submit'])) {
      $this->form_validation->set_rules('pwd', 'Password', 'trim|required');
      $this->form_validation->set_rules('pwd2', 'confirm Password', 'trim|required');
      $this->form_validation->set_rules('fname', 'First Name', 'trim|required');
      $this->form_validation->set_rules('lname', 'Last Name', 'trim|required');
      $this->form_validation->set_rules('email', 'email Address', 'trim|required');
      $this->form_validation->set_error_delimiters('<label class="fielderror">', '</label>');
      if($this->form_validation->run() == FALSE) 
      {
       $data['reset'] = FALSE;
     }
     else
     {
       $user_detail = array('fname'=>$this->input->post('fname'),'lname'=>$this->input->post('lname'),'email'=>$this->input->post('email'),
        'password'=>$this->input->post('pwd'),
        'role'=>'User','date'=>date('d-m-Y'));
       if($this->pathlab_model->insert('usermaster',$user_detail))
       {
        $data['success'] = 'User Registration successfully !';
      }
      else
      {
        $data['error']   = 'An error occurred while Register User, please try again !';
      }
    }
  }
  $data['page'] = 'register';
  $data['special_offers']=$this->pathlab_model->getSpecialOffers();
  $this->load->view('main', $data);
}
function Delete($tablename='', $fieldname='', $indexid=0)
{
 $this->CEIT_model->deleterecord($tablename, $fieldname, $indexid);
}
public function viewSliders()
{
 $data['page']='index';
 $data['slider_list']=$this->pathlab_model->getSliders();
		// $data['username']=$this->session->userdata['admindetails']['username'];
 $this->load->view('main',$data);
}

public function Order(){
 $data = array();
  $Useremail=$this->session->userdata['userdetails']['email'];
 $s="";$m="";
 $data['products'] = $this->pathlab_model->get_select_option('products','price','name');
 $data['cities'] = $this->pathlab_model->get_select_option_dist('rest_master','rid','rest_city');
 // $data['location'] = $this->pathlab_model->get_select_option_dist('rest_master','rid','rest_address');
 $data['rest_name'] = $this->pathlab_model->get_select_option_dist('rest_master','rid','rest_name');
 is_userlogged_in();
 if(isset($_POST['submitOrder']))
 {
  $order_detail = array('username'=>$this->input->post('uname'),
   'order_type'=>$this->input->post('order_type'),
   'cusine'=>$this->input->post('cuisine'),
   'rest_loca'=>$this->input->post('location'),
   'city'=>$this->input->post('city'),
   'restname'=>$this->input->post('restname'),
   'deliver_date'=>$this->input->post('delivery_date'),
   'order_date'=>date('d-m-Y'),'status'=>0);
  if(($id=$this->pathlab_model->PlaceOrder('order_master',$order_detail)))
  {
    $s="Your Order #:".$id." from Food4Fun";
    $m="<h2>Thank you for your order!</h2>.<br>";
    $m.="Your Placed Order #".$id."<br>";
    $m.="and Total Amount of your order is:".$this->input->post('cuisine');
    $m.="Please Confirm your order by click on this link<br>";
    $m.='<a href="http://localhost/FoodShop/confirmOrder/'.$id.'">Cofirm order</a>';
    $m.="<br>Thank you.";

    if($this->sendMail($Useremail,$s,$m))
    {
     $data['success'] = 'Order Placed successfully!!.. Please Confirm Your Order from Your Email.';
    }
    else
    {
      $data['success'] = 'Order Placed successfully !'; 
    }

   
 }
 else
 {
   $data['error']   = 'An error occurred while Placing Order, please try again !';
 }
}
     // exit();
$data['page'] = 'order';

    	
$this->load->view('main', $data);
}
public function Contact(){
 $data = array();

 if(isset($_POST['submit']))
 {
  $this->form_validation->set_rules('uname', 'Username', 'trim|required');
  $this->form_validation->set_rules('email', 'Email', 'trim|required');
  $this->form_validation->set_rules('subject', 'subject', 'trim|required');
  $this->form_validation->set_rules('phone', 'Phone', 'trim|required');
  $this->form_validation->set_error_delimiters('<label class="fielderror">', '</label>');
  if($this->form_validation->run() == false) 
  {
   $data['reset'] = false;
 }
 else
 {
   $gallery_detail = array('uname'=>$this->input->post('uname'),
    'email'=>$this->input->post('email'),'phone'=>$this->input->post('phone'),
    'subject'=>$this->input->post('subject'),'msg'=>$this->input->post('msg'),
    'date'=>date('d-m-Y'),'status'=>0);
   if($this->pathlab_model->insert('enquiry_master',$gallery_detail))
   {
    $data['success'] = 'Your Enquiry has been Submitted!';
  }
  else
  {
    $data['error']   = 'An error occurred while submitting enquiry, please try again !';
  }
}
}
$data['page'] = 'contact';
$this->load->view('main', $data);
}
public function viewUser(){
 $data= array();
 $data['page']='view_users';
 $users = $this->CEIT_model->getUsers();
 $data['users'] = $users;
 $this->load->view('admin/main',$data);
}
public function PopularRestaurants(){
 $data= array();
 $data['page']='popular_rest';
 $users = $this->pathlab_model->getPopularRest();
 $data['rests'] = $users;
 $this->load->view('main',$data);
}
public function confirmOrder($oid){
 $data= array();
 $data['page']='OrderConfirm';
 if($this->pathlab_model->UpdateOrder($oid))
 {
  $data['success']="Your Order has been Confirmed";
 }
 else{
  $data['error']="Opps!!.. Some Error Occured while Updating your Order. Please Try again After some time..";
 }
 $this->load->view('main',$data);
}
function sendMail($to,$subject,$msg)
{
  error_reporting(0);
  $config = Array(
    'protocol' => 'smtp',
    'smtp_host' => 'ssl://smtp.googlemail.com',
    'smtp_port' => 465,
    'smtp_user' => 'sagarswtboy@gmail.com', 
    'smtp_pass' => 'SWTBOY@8141', 
    'mailtype' => 'html',
    'charset' => 'iso-8859-1',
    'wordwrap' => TRUE
    );

  $message = '';
  $this->load->library('email', $config);
  $this->email->set_newline("\r\n");
  $this->email->from('sagarswtboy@gmail.com');
  $this->email->to($to);
  $this->email->subject($subject);
  $this->email->message($msg);
  if($this->email->send())
  {
    return true;
  }
  else
  {
    return false;
      //show_error($this->email->print_debugger());
  }

}
function logout()
{
 $this->session->unset_userdata('userdetails');
 redirect(base_url());

}

//End of Pathlab Controller
}
