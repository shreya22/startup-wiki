<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class UserProfile extends CI_Controller {
	

	 function __construct()
	 {
	   parent::__construct();
	    $this->load->model('Model_userProfile', '', TRUE);
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper(array('form'));
		$this->load->library('email');

		//checking for session
		if(!$this->session->has_userdata('logged_in'))
		{
			redirect('');
		}


	 }

	function index()
	{	
		if($this->session->has_userdata('logged_in'))
		{
			$loggedUser= $this->session->userdata('logged_in');
			$userId = $loggedUser['uid'];

			$userData = $this->Model_userProfile->getUserData($userId);

			$a= array();
			foreach(json_decode($userData)->involvedData as $i)
			{
				array_push($a, $this->Model_userProfile->getStartupInfo($i->startup_id));
			}


			$data= array(
					'user' => json_decode($userData)->userData,
					'startups' => json_decode($userData)->startupData,
					'events' => json_decode($userData)->eventData,
					'involved' => $a
				);

	//		print_r($data);

			$this->load->view('userProfile_view', $data);
		}else
		{
			redirect('', 'refresh');
		}
	}


//editing the user personal entries.
	function edit($cat, $val)
	{

		
		$login= $this->session->userdata('logged_in');
echo $login['uid'];
		//cat will indicate the category the incoming value belongs to, accordingly modification.

		$data = array(
               $cat => $val,
            );

		$chk= $this->Model_userProfile->updateEdit($data);

		if($chk == true)
		{
			if($cat == 'name')
			{
				//updating session name
				$sess_login = array(
	                'uid' => $login['uid'],
	                'name' => $val,
	                'email' => $row->email
	              );
				$this->session->set_userdata('logged_in', $sess_login);
			}

			redirect('/UserProfile');
		}else
		{
			echo 'no';
		}
	}

}