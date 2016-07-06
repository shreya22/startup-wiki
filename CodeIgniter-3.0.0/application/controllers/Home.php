<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//we need to call PHP's session object to access it through CI
class Home extends CI_Controller {

 function __construct()
 {
   parent::__construct();
	
	$this->load->helper('url');
	$this->load->helper(array('form'));
 }

 function index()
 {
   //logged_is is the session array.

   if($this->session->has_userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['email'] = $session_data['email'];
     $data['user_id'] = $session_data['uid'];
     $data['username'] = $session_data['name'];

	   $this->load->view('login_view', $data);
   }
   else
   {
     //If no session, redirect to login page
     redirect('', 'refresh');
	
   }
 }
 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('home', 'refresh');
 }

}

?>