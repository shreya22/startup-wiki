<?php
defined('BASEPATH') OR exit(' direct script access allowed');

class Activated extends CI_Controller{
	public function index()
	{
		$data['msg']='Congrax! you are just registered as a startupwiki user!<br>
                Login and...Go ahead! create events, Create your startup page, or just scroll down the startups all over :)';

		$this->load->view('signed_up', $data);
	}
	

}

?>