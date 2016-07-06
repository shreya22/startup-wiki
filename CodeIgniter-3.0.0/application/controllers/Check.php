<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Check extends CI_Controller {
	

	 function __construct()
	 {
	   parent::__construct();
	    $this->load->model('model_check','',TRUE);
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper(array('form'));
		$this->load->library('email');

	 }

	function index()
	{	
		if($this->session->has_userdata['logged_in'])
		{
			$data= $this->session->userdata['logged_in'];
			$temp= $this->model_check->user_id($data['uid']);

			$arr['temp']= $temp;

			$this->load->view('login_view', $arr);
		}
			$this->load->view('login_view');
	}

}