<?php 

	Class Model_userProfile extends CI_Model
	{	
		public function getUserData($id)
		{
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where('user_id', $id);
			$this->db->limit(1);

			$query= $this->db->get();
			$userData= $query->result();

			$startups= $this->db
				->select('*')
				->where('user_id', $id)
				->get('startups');
			$startups = $startups->result();

			$events= $this->db
				->select('*')
				->where('user_id', $id)
				->get('events');
			$events = $events->result();

			$involved= $this->db
				->select('startup_id')
				->where('user_id', $id)
				->get('members');
			$involved = $involved->result();

			$data= array(
				'userData' => $userData,
				'startupData' => $startups,
				'eventData' => $events,
				'involvedData' => $involved
				);

			return json_encode($data);
		}

		public function updateEdit($data)
		{
				$login= $this->session->userdata('logged_in');

			$this->db->where('user_id', $login['uid']);
			if($this->db->update('users', $data))
			{
				return true;
			}else
			{
				return false;
			}
		}

		public function getStartupInfo($id)
		{
			$involved= $this->db
				->select('*')
				->where('startup_id', $id)
				->get('startups');
			$involved = $involved->result();

			return $involved;
		}
	}

?>