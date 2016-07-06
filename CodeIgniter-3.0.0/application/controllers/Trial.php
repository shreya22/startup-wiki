<?php
defined('BASEPATH') OR exit(' direct script access allowed');

class Trial extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->helper('url');
		$this->load->helper(array('form'));
		$this->load->library('session');
		$this->load->database();
	}

	public function index()
	{
		$this->load->view('eventSignup_view');
	}
	
}

