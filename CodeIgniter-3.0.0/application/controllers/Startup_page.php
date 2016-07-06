<?php
defined('BASEPATH') OR exit(' direct script access allowed');

class Startup_page extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->helper('url');
		$this->load->helper(array('form'));
		$this->load->library('session');
		$this->load->database();
		$this->load->helper('array');
		$this->load->model('Model_startup_signup','',TRUE);
	}

	public function index()
	{

	}

	public function page($s_name)
	{
		//getting user session fields from the current set session.
        $loggedin= $this->session->userdata('logged_in');


		// $s_name: startup name, to be passed in as a unique distinguishing factor.
		//this function passes all values of the startup to startupPage_view view

		$s_name= str_replace("_", " ", $s_name);
		

		//echo $s_name;
		$query= $this->db->query("SELECT * FROM startups WHERE name='$s_name' LIMIT 1;");
        if($query->num_rows() == 0)
        {
            $sobj['status']= 'false';
            $sobj['msg']  = 'No Such Startup Exists!';

            $data['msg']='Sorry! This URL does not belong to any registered startup page!';
			$this->load->view('signed_up', $data);
		//	print_r($sobj);
        }
        else
        {

            	$temp= $query->row();

        		$c_name= $this->db->query("SELECT * FROM city WHERE id='$temp->city_id'");
	            $row= $c_name->row();
	            $city= $row->name;
	    
	            //getting the number and details of members from members table
	            $mem= $this->db->query("SELECT * FROM members WHERE startup_id='$temp->startup_id'");
	            $mem_num= $mem->num_rows();

	            $totalFounders= array(); $i=0;
	            foreach($mem->result() as $memRow)
	            {
	           

	            	$userDetails= $this->db
	            					->select('*')
	            					->where('user_id', $memRow->user_id)
	            					->get('users');

	            	//getting user details of each member from users table
	            	foreach ($userDetails->result() as $uDetail) {

	            		$cofounder= array(
	            			'name' => $uDetail->name,
	            			'fb' => $uDetail->facebook,
	            			'gplus' => $uDetail->googleplus,
	            			'ln' => $uDetail->linkedin
	            			);          		
	            	}

	            	$totalFounders[$i] = $cofounder; 
	            	$i++;
	            }

	     //       print_r($totalFounders);

	            

	            //checking if the page is being opened by the owner.
	            if($loggedin['uid'] == $temp->user_id)
	            {
	            	$owner="true";
	            }else
	            {
	            	$owner= "false";
	            }



	            $sobj = array(
	            	  'status' => 'true',
	            	  'owner' => $owner,
	                  'name' => $temp->name,
	                  'tagline' => $temp->tagline,
	                  'city'=> $city,
	                  'sector'=> $temp->sector,
	                  'idea'=> $temp->idea,
	                  'location'=> $temp->location,
	                  'accomplishments'=> $temp->accomplishments,
	                  'contactus' => $temp->contactus,
	                  'cofounders' => $totalFounders
	              );	

		//		print_r($sobj);
	           $this->load->view('startupPage_view', $sobj);
	        }
            
        }



        //edit a startup page
        public function edit($sName)
        {
        	$sName= str_replace("_", " ", $sName);

        	$query= $this->db->query("SELECT * FROM startups WHERE name='$sName' LIMIT 1;");
	        if($query->num_rows() == 0)
	        {
	            $sobj['status']= 'false';
	            $sobj['msg']  = 'No Such Startup Exists!';

	            $data['msg']='Sorry! This URL does not belong to any registered startup page!';
				$this->load->view('signed_up', $data);
			//	print_r($sobj);
	        }else
	        {	
	        	$temp = $query->row();


	        	//move on if the user is logged in and is the owner of page

	        	if($this->session->has_userdata('logged_in'))
				{
					$loggedin = $this->session->userdata('logged_in');
					if($temp->user_id == $loggedin['uid'])
					{
						//person logged in is the owner of page. allowed edit rights.

						//get city name from city table
						$city= $this->Model_startup_signup->get_cityname($temp->city_id);


						

			            
						 $sobj = array(						 	  
			                  'city'=> $city,
			                  'name' => $temp->name,
			                  'tagline' => $temp->tagline,
			                  'sector'=> $temp->sector,
			                  'idea'=> $temp->idea,
			                  'location'=> $temp->location,
			                  'accomplishments'=> $temp->accomplishments,
			                  'startup_id' => $temp->startup_id
			              );

					//	 print_r($sobj);
						 $this->load->view('editStartup_view', $sobj);


					}else
					{
						//person logged in is not owner of page. no edit rights. 
						//direct to home page.

						redirect('', 'refresh');
					}

				}else
				{
					redirect('', 'refresh');
				}
	        }
	    }
	}
