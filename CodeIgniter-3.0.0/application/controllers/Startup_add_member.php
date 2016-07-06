<?php
defined('BASEPATH') OR exit(' direct script access allowed');

class Startup_add_member extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->helper('url');
		$this->load->helper(array('form'));
		$this->load->library('session');
		$this->load->database();
		$this->load->helper('array');
		$this->load->model('Model_startup_add_member','',TRUE);

		//this method will have the credentials for validation.
            $this->load->library('form_validation');

            if(!$this->session->has_userdata('logged_in'))
            {
                redirect('', 'refresh');
            }
	}

	public function index()
	{
		$this->load->view('startup_add_member_view');
	}

	public function get_startups()
	{
		$user= $this->session->userdata('logged_in');
		$startups= $this->Model_startup_add_member->getStartupNames($user['uid']);

		echo json_encode($startups);
	}

	public function get_users()
	{
		$users= $this->Model_startup_add_member->getUserNames();

		echo json_encode($users);
	}
	

}
