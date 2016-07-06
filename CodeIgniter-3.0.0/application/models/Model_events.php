<?php
	Class Model_events extends CI_Model{

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


		//adding the details in events table.
		public function add_event($data)
		{			
		//	$this->db->set('date_creation', 'NOW()', FALSE);
			$this->db->insert('events',$data);

			//process for generating unique user id.
			  $eid= $this->db->insert_id();
			  $x= strlen($eid);
			  $len= 7-$x;

			  $eventid= '';
			  for($i=0; $i<$len; ++$i)
			  {
			    $eventid= $eventid.'0';
			  }
			  $eventid= 'EV_'.$eventid.$eid;

			  $query = $this->db->query("update events set event_id= '$eventid' where id= '$eid'");
			  //startup_id updated in table.

		//	  return $eventid;
		}


		public function eventsData()
		{
			$query= $this->db
				->select('*')
				->get('events');

			$numrows= $query->num_rows();
			$data= $query->result();

			$eventData= array(
				'numrows' => $numrows,
				'eData' => $data
				);

			return $eventData;
		}

		public function eventFullPage($id)
		{
			$query= $this->db
				->select('*')
				->where('event_id', $id)
				->limit(1)
				->get('events');

			return $query->result();
		}


		public function uniqueEname($name)
		{
			$query= $this->db
				->select('*')
				->where('name', $name)
				->get('events');

			$num= $query->num_rows();
			if($num == 0) return TRUE;
			else return FALSE;
		}


		//update the edited values in db
		public function update_event($data)
		{			
			$this->db->where('event_id', $data['event_id']);
			$this->db->update('events',$data);

		}

		//returns initial name of event based on id
		public function eventInitialName($id)
		{
			$query= $this->db
				->select('name')
				->where('event_id', $id)
				->get('events');

			$res= $query->result();

			foreach($res as $row)
			{
				return $row->name;
			}
		}

	}
?>