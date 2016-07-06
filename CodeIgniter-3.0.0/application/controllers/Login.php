<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index()
	{
		$this->load->helper('url');
		$this->load->library('session');
	 	$this->load->library('form_validation');
		$this->load->helper(array('form'));
		$this->load->view('login_view');


	}
	public function reset($userid,$key)
	{
		$this->load->helper('url');
		$this->load->helper(array('form'));
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->view('forgot_view');

		$query = $this->db->query("SELECT * FROM users WHERE user_id='$userid'");
		if($query->row()->activated ==1 && $key==md5($query->row()->password))
 		{
				$this->session->set_userdata('userid',$userid);
				
				

  		}
	
	}


	public function resetsubmit()
	{
			$this->load->helper('url');
			$this->load->helper(array('form'));
			$this->load->database();
			$this->load->library('form_validation');

			$this->form_validation->set_rules('password', 'password', 'required|min_length[6]|matches[repassword]');
        $this->form_validation->set_rules('repassword', 'Password Confirmation', 'required|min_length[6]');
			
			 if ($this->form_validation->run() == TRUE)
		       {

				$data = array(
     			'password' => $this->input->post('password')
				);
 
				$this->db->where('user_id',$this->session->userdata('userid'));
				$this->db->update('users', $data); 
				redirect('', 'refresh');

			  }
			else
			{
				$this->session->set_userdata('forget_errors', validation_errors());
				redirect('login/reset', 'refresh');
			}
	}

	

}
