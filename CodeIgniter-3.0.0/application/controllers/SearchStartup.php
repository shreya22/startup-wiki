<?php
defined('BASEPATH') OR exit(' direct script access allowed');

class SearchStartup extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->helper('url');
		$this->load->helper(array('form'));
		//$this->load->library('session');
		$this->load->database();
		$this->load->helper('array');
		//$this->load->model('Model_startup_signup','',TRUE);
	}

	public function index()
	{
		
		$this->load->view('search_view');
	}

	
	}
?>
