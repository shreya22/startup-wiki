<?php
	Class Model_startup_edit extends CI_Model{

//adding the basc details in startups table.
		public function update_startup($data)
		{			
			$this->db->where('startup_id', $data['startup_id']);
			$this->db->update('startups',$data);

		}

		//returns initial name of event based on id
		public function startupInitialName($id)
		{
			$query= $this->db
				->select('name')
				->where('startup_id', $id)
				->get('startups');

			$res= $query->result();

			foreach($res as $row)
			{
				return $row->name;
			}
		}


}
?>