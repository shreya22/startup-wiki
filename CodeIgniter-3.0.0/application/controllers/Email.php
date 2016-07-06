<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {
	public function index()
	{
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->helper(array('form'));
		$this->load->library('email');
$admin_email = "jose.harish@rediffmail.com";
  $email = "me@me.com";
  $subject = "again testing mail";
  $comment = "comments body";
  
  //send email
  mail($admin_email, "$subject", $comment, "From:" . $email);

echo "hai";
	}
}
