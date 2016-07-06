<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Events extends CI_Controller{

		 function __construct()
		 {
		    parent::__construct();
		    $this->load->Model('Model_events', '', true);
			$this->load->helper('url');
			$this->load->helper('file');
			$this->load->library('session');
			$this->load->helper('form');
			$this->load->helper('array');

			//this method will have the credentials for form validation.
			$this->load->library('form_validation');
		 }

		//to be called by default, will load the startupsignup page.
		public function index()
		{

			//from modal we'll know how many events in db in total, 
				//then display them with their respective values.

			$eventData= $this->Model_events->eventsData();

			$cityName=array();

			foreach ($eventData['eData'] as $x) {
				array_push($cityName, $this->Model_events->get_cityname($x->city_id));
			}

			$data= array(
				'numrows' => $eventData['numrows'],
				'eData' => json_encode($eventData),
				'cityName' => json_encode($cityName)
				);

//print_r($cityName);
			$this->load->view('event_view.php', $data);

		}

		public function addEvent()
		{
			if(!$this->session->has_userdata('logged_in'))
			{
				redirect('', 'refresh');
			}
			$this->load->view('eventSignup_view');
		}

		//will check for validations in the addEvent form. if validated, will divert to congo page.
		
		public function event_validate()
		{
			if(!$this->session->has_userdata('logged_in'))
			{
				redirect('', 'refresh');
			}

			//getting user session fields from the current set session.
            $loggedin= $this->session->userdata('logged_in');
    
			//this method will have the credentials for validation.
			$this->load->library('form_validation');


			//backend checks
			$this->form_validation->set_rules('form-name', 'Event Name', 'required|callback_name_check');
			$this->form_validation->set_rules('form-tagline', 'Tagline','required|max_length[200]');
			$this->form_validation->set_rules('form-companyname', 'Company Name', 'required|trim');

			$this->form_validation->set_rules('form-description', 'Description','required|max_length[750]');

			$this->form_validation->set_rules('form-contactus', 'Contactus','required|max_length[1000]');

			

			//Field validation failed, return false
            if($this->form_validation->run() == false)
            {
            	//$this->session->set_userdata('register_error',validation_errors());
            	
				$return_data['status'] = 'false';
				$return_data['msg'] =validation_errors() ; 
            	echo json_encode($return_data);
            	return;

           //		redirect('startup_signup', '');
            }

          //  	$imgup= 'logo';

		        

            	//validation successful, put values in array.

            	//getting the city_id from table 'city'
            	$city_id= $this->Model_events->get_cityid($_POST['form-city']);

            	//getting user id from session variable initialised above
            	$uid= $loggedin['uid'];

	            $data= array(
	            	'user_id' => $loggedin['uid'],
	            	'name'=> $_POST['form-name'],
					'city_id' => $city_id,		
					'numdays' => $_POST['form-numdays'],			
					'organisation'=> $_POST['form-companyname'],
					'tagline' => $_POST['form-tagline'],
					'description' => $_POST['form-description'],
					'contactus' => $_POST['form-contactus'],					
					'dateone' => $_POST['form-numday1'],
					'datefrom' => $_POST['form-numday2'],
					'dateto' => $_POST['form-numday3']
					);
//            	print_r($data);

            	$this->Model_events->add_event($data);
            									//values added in events table


            	//send them their personal page link
      //      	$this->Model_startup_signup->sendmail($_POST['form-name']);


//all entries successfully saved in db and mail sent, return true.
//shreya
			$return_data['status'] = 'true';
			$return_data['msg'] ="Success" ; 
            	echo json_encode($return_data);
            	return;
				
       //     }
		}
			

	// } 

		public function name_check($str)
		{
			if($this->Model_events->uniqueEname($str))
				return TRUE;
			else
			{
				$this->form_validation->set_message('name_check', 'Event Name already in use! Try a different one.');
				return FALSE;
			}
		}

		



		public function page_done()
		{
			$data['msg']='Congo.. Hardwork Paid off! You just created an Event.. Find it in your profile, pr search in Events page!';
			$this->load->view('signed_up', $data);
		}

		public function eventDescription($id)
		{			

			$eventFullPage = $this->Model_events->eventFullPage($id);
			$cityName = $this->Model_events->get_cityname($eventFullPage[0]->city_id);

			if(!$this->session->has_userdata('logged_in'))
			{
				$owner= 'false';
			}else
			{
				$loggedin= $this->session->userdata('logged_in');
				if($loggedin['uid'] == $eventFullPage[0]->user_id)
				{
					$owner= 'true';
				}else
				{
					$owner= 'false';
				}

			}

			$eventData= array(
	                'eventFullPage' => $eventFullPage,
	                'cityName' => $cityName
	            );

			$data= array(
				'data' => $eventData,
				'owner' => $owner
			);

			//print_r($data);

			$this->load->view('event_fullPage_view', $data);
		}

		public function EditEvent($eid)
		{
			if(!$this->session->has_userdata('logged_in'))
			{
				redirect('', 'refresh');
			}

        	$query= $this->db->query("SELECT * FROM events WHERE event_id='$eid' LIMIT 1;");
	        if($query->num_rows() == 0)
	        {
	            $sobj['status']= 'false';
	            $sobj['msg']  = 'No Such Event Exists!';

	            $data['msg']='Sorry! This URL does not belong to any registered Event page!';
				$this->load->view('signed_up', $data);
			//	print_r($sobj);
	        }else
	        {	
	        	$temp = $query->row();


	        	//move on if the user is logged in and is the owner of event

	        	if($this->session->has_userdata('logged_in'))
				{
					$loggedin = $this->session->userdata('logged_in');
					if($temp->user_id == $loggedin['uid'])
					{
						//person logged in is the owner of current event. allowed edit rights.

						//get city name from city table
						$cityName = $this->Model_events->get_cityname($temp->city_id);
			            
						 

						 $eobj= array(
			            	'name'=> $temp->name,
			            	'eid' => $temp->event_id,
							'city_id' => $cityName,		
							'numdays' => $temp->numdays,			
							'organisation'=> $temp->organisation,
							'tagline' => $temp->tagline,
							'description' => $temp->description,
							'contactus' => $temp->contactus,					
							'dateone' => $temp->dateone,
							'datefrom' => $temp->datefrom,
							'dateto' => $temp->dateto
							);

					//	 print_r($eobj);
						 $this->load->view('editEvent_view', $eobj);


					}else
					{
						//person logged in is not owner of event. no edit rights. 
						//direct to home page.

						redirect('', 'refresh');
					}

				}else
				{
					redirect('', 'refresh');
				}
	        }
	        //redirect to events edit form
		}


		//update event after edit!
		public function updateEvent()
		{
			if(!$this->session->has_userdata('logged_in'))
			{
				redirect('', 'refresh');
			}

			//getting user session fields from the current set session.
            $loggedin= $this->session->userdata('logged_in');
    
			//getting user session fields from the current set session.
            $loggedin= $this->session->userdata('logged_in');


			//backend checks
			$this->form_validation->set_rules('form-name', 'Event Name', 'required|callback_editName_check');
			$this->form_validation->set_rules('form-tagline', 'Tagline','required|max_length[200]');
			$this->form_validation->set_rules('form-companyname', 'Company Name', 'required|trim');

			$this->form_validation->set_rules('form-description', 'Description','required|max_length[1000]');

			$this->form_validation->set_rules('form-contactus', 'Contactus','required|max_length[1000]');

			

			//Field validation failed, return false
            if($this->form_validation->run() == false)
            {
            	//$this->session->set_userdata('register_error',validation_errors());
            	
				$return_data['status'] = 'false';
				$return_data['msg'] =validation_errors() ; 
            	echo json_encode($return_data);
            	return;
            }
	        
            	//validation successful, put values in array.

            	//getting the city_id from table 'city'
            	$city_id= $this->Model_events->get_cityid($_POST['form-city']);

            	//getting user id from session variable initialised above
            	$uid= $loggedin['uid'];

	            $data= array(
	            	'event_id' => $_POST['eventId'],
	            	'user_id' => $loggedin['uid'],
	            	'name'=> $_POST['form-name'],
					'city_id' => $city_id,		
					'numdays' => $_POST['form-numdays'],			
					'organisation'=> $_POST['form-companyname'],
					'tagline' => $_POST['form-tagline'],
					'description' => $_POST['form-description'],
					'contactus' => $_POST['form-contactus'],					
					'dateone' => $_POST['form-numday1'],
					'datefrom' => $_POST['form-numday2'],
					'dateto' => $_POST['form-numday3']
					);
//            	print_r($data);


            	$this->Model_events->update_event($data);
            									//values updated in events table

//all entries successfully updated in db, return true.

				$return_data['status'] = 'true';
				$return_data['msg'] ="Success" ; 
            	echo json_encode($return_data);

		//		print_r($return_data);

            	return;

		}	//editing validated and updated!
		

		public function editName_check($str)
		{
			$id= $_POST['eventId'];
			if($str == $this->Model_events->eventInitialName($id))
			{
				return TRUE;
			}else
			{
				if($this->Model_events->uniqueEname($str))
					return TRUE;
				else
				{
					$this->form_validation->set_message('editName_check', 'Event Name already in use! Try a different one.');
					return FALSE;
				}
			}

			
		}
		
		public function shreya()
		{
			echo $this->Model_events->eventInitialName('EV_0000001');
		}


	}



?>


