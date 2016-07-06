<?php
	Class Model_startup_signup extends CI_Model{

		public function get_cityid($city)
		{
			$this->db->select('id');
			$this->db->from('city');
			$this->db->where('name', $city);
			$this->db->limit(1);

			$query= $this->db->get();
			$res= $query->result();

			foreach($res as $row)
			{
				return $row->id;
			}
		}

		public function get_cityname($city_id)
		{
			$this->db->select('name');
			$this->db->from('city');
			$this->db->where('id', $city_id);
			$this->db->limit(1);

			$query= $this->db->get();
			$res= $query->result();

			foreach($res as $row)
			{
				return $row->name;
			}
		}


		//adding the basc details in startups table.
		public function add_startup($data)
		{			
			$this->db->set('date_creation', 'NOW()', FALSE);
			$this->db->insert('startups',$data);

			//process for generating unique user id.
			  $sid= $this->db->insert_id();
			  $x= strlen($sid);
			  $len= 7-$x;

			  $startupid= '';
			  for($i=0; $i<$len; ++$i)
			  {
			    $startupid= $startupid.'0';
			  }
			  $startupid= 'ST_'.$startupid.$sid;

			  $query = $this->db->query("update startups set startup_id= '$startupid' where id= '$sid'");
			  //startup_id updated in table.

			  return $startupid;
		}

		//add co-founders in members table
		public function add_member($mData)
		{
			$this->db->insert('members', $mData);
		}


		public function sendmail($name)
		{
				$sess= $this->session->userdata('logged_in');

				$name= str_replace(" ","_", $name);
			
            	//get email id of user associated with the startup
            	$userid= $sess['uid'];
	            $uid= $this->db->query("SELECT email from users WHERE user_id = '$userid'");
	            $uid= $uid->row();

            	//Sending Email
				    $this->email->from('mail@startupwiki.com','StartupWiki');
				    $this->email->to($uid->email);
				    $this->email->subject('Email Verification');
				    $this->email->message('<h3>Finally U\'r here..!</h3>
					Congratulations....you have just created your very own startup page.Link:
					<a href='.site_url(base_url().'index.php/Startup_page/page/'.$name).'>My Own Page :)</a>
					'); 
				    
				 $this->email->send();
		}
	}
?>