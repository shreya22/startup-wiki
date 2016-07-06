<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Startup_edit extends CI_Controller{

		 function __construct()
		 {
		   parent::__construct();

		//   $this->output->enable_profiler(TRUE);

		    $this->load->model('Model_startup_edit','',TRUE);
		    $this->load->model('Model_startup_signup','',TRUE);
		    $this->load->model('Model_check', '', TRUE);
			$this->load->helper('url');
			$this->load->helper('file');
			$this->load->library('session');
			$this->load->helper('form');

			//opens only if the user session is set, else directed to base page
			if(!$this->session->has_userdata('logged_in'))
			{
				redirect('', 'refresh');
			}

			//this method will have the credentials for validation.
			$this->load->library('form_validation');
		 }

		//to be called by default, will load the startupsignup page.
		public function index()
		{
			

			
		}

		//will check for validations in the startupsignup form. if validated, will divert to congo page.
		
		public function validate()
		{
			//getting user session fields from the current set session.
            $loggedin= $this->session->userdata('logged_in');
    
			//backend checks
			$this->form_validation->set_rules('form-name', 'Startup Name', 'required|callback_editName_check');
			$this->form_validation->set_rules('form-tagline', 'Tagline','required|max_length[50]');
			$this->form_validation->set_rules('form-sector', 'Startup Sector', 'required|trim');

			//for headings
			$this->form_validation->set_rules('form-idea', 'idea','required|max_length[750]');

			$this->form_validation->set_rules('form-location', 'location','required|max_length[750]');

			$this->form_validation->set_rules('form-accomplishments', 'accomplishments','required|max_length[750]');

			
			

			//Field validation failed, return false
            if($this->form_validation->run() == false)
            {
            	//$this->session->set_userdata('register_error',validation_errors());
            	
				$return_data['status'] = 'false';
				$return_data['msg'] =validation_errors(); 

	//			print_r($return_data);

            	echo json_encode($return_data);
            	return;

           //		redirect('startup_signup', '');
            }

            	$imgup= 'logo';

	        
            	//validation successful, put values in array.

            		//getting the city_id from table 'city'
            	$city_id= $this->Model_startup_signup->get_cityid($_POST['form-city']);

            	//getting user id from session variable initialised above
            	$uid= $loggedin['uid'];

	            $data= array(
	            	'startup_id' => $_POST['startup_id'],
	            	'user_id' => $loggedin['uid'],
					'city_id' => $city_id,
					'name'=> $_POST['form-name'],
					'tagline' => $_POST['form-tagline'],
					'sector' => $_POST['form-sector'],
					'idea' => $_POST['form-idea'],
					'location' => $_POST['form-location'],
					'accomplishments' => $_POST['form-accomplishments'],
					);


            	//print_r($data);
            	$this->Model_startup_edit->update_startup($data);
            									//values added in startup table

//all entries successfully saved in db, return true.

				$return_data['status'] = 'true';
				$return_data['msg'] ="Success" ; 
            	echo json_encode($return_data);

		//		print_r($return_data);

            	return;
				
  		}
		

		public function editName_check($str)
		{
			$id= $_POST['startup_id'];
			if($str == $this->Model_startup_edit->startupInitialName($id))
			{
				return TRUE;
			}else
			{
				if($this->Model_check->uniqueSname($str))
                return TRUE;
            else
            {
                $this->form_validation->set_message('editName_check', 'Startup Name already in use! Try a different one.');
                return FALSE;
            }
			}
		}

	}



?>