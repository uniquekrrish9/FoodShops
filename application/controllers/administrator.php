<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class administrator extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url','file','custom_helper'));
        $this->load->database();
        $this->load->model('pathlab_model');
        define('Adminpath', base_url().'index.php/administrator/');
        define('ASSETS2', base_url().'assets/admin/');
        define('administrator', base_url().'index.php/administrator/');
        define('PATH', base_url().'index.php');
    }
    function index()
    {
      $data = array();
      $this->load->view('admin/login', $data);
  }

  function login()
  {
    $data = array();
    if(isset($_POST['submit']))
    {
        $this->form_validation->set_rules('username', 'Usernameme', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="fielderror">', '</span>');
        if($this->form_validation->run() == FALSE) 
        {
            $data['reset'] = FALSE;
        }
        else
        {
            $uname = $this->input->post('username');
            $password = $this->input->post('password');
            if($this->pathlab_model->login($uname, $password))
            {

                redirect(base_url().'index.php/admin/dashboard');
                // echo "Hi";
                // $data['page'] = 'dashboard';
                // $this->load->view('admin/login', $data);
                //exit;
                //$this->load->view('user/content', $data);
            }
            else
            {
                $data['error'] = 'Wrong Username/password combination, please try again !';
                    // $data['page'] = 'login';
                $this->load->view('admin/login', $data);
            }
        }
    }
    else{
        $data['page'] = 'login';
        $this->load->view('admin/login', $data);
    }
}

function Register()
{
    $data = array();
    if (isset($_POST['submit'])) {
        $this->form_validation->set_rules('username', 'User Name', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('password2', 'confirm Password', 'trim|required');
        $this->form_validation->set_rules('fname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('email', 'email Address', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="fielderror">', '</span>');
        if($this->form_validation->run() == FALSE) 
        {
            $data['reset'] = FALSE;
        }
        else
        {
            $user_detail = array('fname'=>$this->input->post('username'),
                'lname'=>$this->input->post('fname'),
                'email'=>$this->input->post('email'),
                'password'=>$this->input->post('password'),'role'=>'User','date'=>date('d-M-Y'));
            if($this->pathlab_model->insert('usermaster',$user_detail))
            {
                $data['success'] = 'User Registration successfully !';
                redirect(base_url().'index.php/admin');  
            }
            else
            {
                $data['error']   = 'An error occurred while Register User, please try again !';
            }
        }
    }
    $data['page'] = 'admin/register';
    $this->load->view('admin/register', $data);
}
function logout()
{
    $this->session->unset_userdata('admindetails');
    $this->index();
		//redirect(base_url().'index.php/admin/login');
}
}