<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Verifysignup extends CI_Controller {

 function __construct()
 {
    parent::__construct();
    $this->load->model('user','',TRUE);
  	$this->load->library('session');
  	$this->load->helper('url');
  	$this->load->helper(array('form'));

    $this->load->library('form_validation');
 }

 function index()
 {
   //This method will have the credentials validation
   
	
	      $this->form_validation->set_rules('username', 'username', 'required|callback_username_check');
        $this->form_validation->set_rules('password', 'password', 'required|min_length[6]|matches[repassword]');
        $this->form_validation->set_rules('repassword', 'Password Confirmation', 'required|min_length[6]');
        $this->form_validation->set_rules('email', 'Email', 'required|callback_email_check');

	   if ($this->form_validation->run() == FALSE)
        {
            //Field validation failed.  User redirected to login page
            $this->session->set_userdata('register_error',validation_errors());

            $msg=array(
              'status' => 'false',
              'msg' => validation_errors()
              );

            echo json_encode($msg);
            return;
        //    redirect('signup', 'refresh');

        }
        else
        {
            	$this->user->add_user();

              $msg=array(
              'status' => 'true',
              'msg' => 'form submitted yeah!'
              );

            echo json_encode($msg);
        		return;	

           //   redirect('signup/divert', 'refresh');

        }

  } 
 
  public function username_check($str)
    {
        if ($str == 'test')
        {
            $this->form_validation->set_message('username_check', 'The %s field can not be the word "test"');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

  public function email_check($email)
    {
        
    	$result = $this->db->query("SELECT * FROM users WHERE email='".$email."'");
    	if($result->num_rows() > 0)
    	{
    		  $this->form_validation->set_message('email_check', 'This email is already in use!');
          return FALSE;
    	}
      else
      {
          return TRUE;
      }
    }


}
?>