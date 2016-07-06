<?php
Class Model_startup_add_member extends CI_Model
{
 
	public function getStartupNames($uid)
	{
		$this->db->select('startup_id, name')
				->from('startups')
				->where('user_id', $uid);

		$startups = $this->db->get();
		$a= $startups->result();

		return $a;

	}

	public function getUserNames()
	{
		$this->db->select('user_id, name')
				->from('users');

		$users = $this->db->get();
		$a= $users->result();

		return $a;

	}

}