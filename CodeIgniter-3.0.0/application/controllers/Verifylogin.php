<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

 function __construct()
 {
   parent::__construct();
	$this->load->database();
	$this->load->helper('url');
	$this->load->helper(array('form'));
	$this->load->library('email');

 }

 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('email', 'email', 'required');
   if($this->input->post('login')=='yes')
   {	
		  $this->form_validation->set_rules('password', 'Password', 'required|callback_check_database');
		

   }
   ////////////////////////////////////////////////////////////////////////////////////////////////////
   else if($this->input->post('forgot')=='yes')
   {
      $this -> db -> select('user_id, email, password');
      $this -> db -> from('users');
      $this -> db -> where('email', $this->input->post('email'));
      $this -> db -> where('activated =', 1); 
      $this -> db -> limit(1);

      $query = $this -> db -> get();

      if($query -> num_rows() == 1)
      {
        
        $result=$query->result();
		    foreach($result as $row)
     		{

          //Sending Email
          $this->email->from('mail@startupwiki.com','StartupWiki');
          $this->email->to($this->input->post('email'));
          $this->email->subject('Reset Password');
          $this->email->message('Use the the url below to reset password. http://startupwiki.esy.es/index.php/login/reset/'.$row->user_id.'/'.md5($row->password)); 
        }
        
        $this->email->send();
        $return_data['msg'] = "Password reset link mailed";
    	}
    	else
    	{
      	$return_data['msg'] = "No account found";
			
    	}
	echo json_encode($return_data);
	exit;
   }

   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
		$return_data['msg'] = validation_errors();
		echo json_encode($return_data);
		//echo "false";
   }
   else
   {
     		//Go to private area
		$return_data['msg'] ="yes"; 
          	echo json_encode($return_data);
		redirect('home', 'refresh');
   }

 }

 public function check_database($password)
 {
   //Field validation succeeded.  Validate against database
   $email = $this->input->post('email');
   //query the database

	$this -> db -> select('user_id, name, email, password, activated');
   	$this -> db -> from('users');
   	$this -> db -> where('email', $email);
   	$this -> db -> where('password', $password);
 //  	$this -> db -> where('activated =', 1);	
   	$this -> db -> limit(1);

   	$query = $this -> db -> get();
	if($query -> num_rows() == 1)
   	{
     		
		  $result=$query->result();
   	}
	else
	{
		$result=false;
		
	}

     if($result)
   	{
     		$act= $query->row();
        if($act->activated== 0)
        {
          $this->form_validation->set_message('check_database', 'Your account is not activated. Follow the link in email to activate your account.');
          return FALSE;
        }

        else{
          $sess_login = array();
          foreach($result as $row)
          {
              $sess_login = array(
                'uid' => $row->user_id,
                'name' => $row->name,
                'email' => $row->email
              );
            $this->session->set_userdata('logged_in', $sess_login);
          }
          return TRUE;
        }
        
   	}
   	else
   	{
     		$this->form_validation->set_message('check_database', 'Invalid username or password');
     		return FALSE;
   	}
 }


}
?>