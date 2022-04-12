<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
    //load the required libraries and helpers for login
        $this->load->helper('url');
        $this->load->library(['form_validation','session']);
        $this->load->database();

        //load the Login Model
        $this->load->model('LoginModel', 'login');
	}

  public function index()
  {
    $this->load->view('login/index');
  }

  public function doLogin(){
      $email = $this->input->post('email');
      $password = $this->input->post('password');
      //var_dump( password_hash('', PASSWORD_BCRYPT));exit;
			$hash = $this->login->getPassword($email);
      $verified = password_verify($password, $hash);
      //send the email pass to query if the user is present or not
       $user = $this->login->getUserData($email);
       //if the result is query result is 1 then valid user
       if ($verified) {
           //if yes then set the session 'loggin_in' as true
           $this->session->set_userdata('logged_in', true);
					 //$udata = unset($user[0]);
					 $this->session->set_userdata("user", $user);
					  $this->session->set_flashdata('msg', '');

           redirect('execution');
       } else {
           //if no then set the session 'logged_in' as false
           $this->session->set_userdata('logged_in', false);

           //and redirect to login page with flashdata invalid msg
           $this->session->set_flashdata('msg', 'Username / Password Invalid');
           redirect('login', 'refresh');

       }

  }

  public function generate()
	{
		$pwd = $this->input->get('pwd');
		echo password_hash($pwd, PASSWORD_DEFAULT);
	}

  public function logout() {
       //unset the logged_in session and redirect to login page
       $this->session->unset_userdata('logged_in');
			 $this->session->unset_userdata('user');
			 $this->session->unset_userdata('msg');
       redirect('login');
   }
}
