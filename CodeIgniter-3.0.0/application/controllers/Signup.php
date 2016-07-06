<?php
defined('BASEPATH') OR exit(' direct script access allowed');

class Signup extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->helper('url');
		$this->load->helper(array('form'));
		$this->load->library('session');
		$this->load->database();
	}

	public function index()
	{
		$this->load->view('signup_view');
	}
	
	public function verify($email,$key)
	{
		
		$query = $this->db->query("SELECT * FROM users WHERE name='$email'");
		if($query->row()->activated ==0 && $key==md5($query->row()->password))
 		{
	
			$data = array(
     			 'activated' => 1
			);
 
			$this->db->where('name',$email);
			$this->db->update('users', $data); 	

  		}
		redirect('activated', 'refresh');
	}

	public function divert()
	{
		$data['msg']='A verification link has been mailed to you. Please click on the verification link to verify your Account.';

		$this->load->view('signed_up', $data);
	}
}
