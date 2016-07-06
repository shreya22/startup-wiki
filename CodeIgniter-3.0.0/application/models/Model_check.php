<?php
Class Model_check extends CI_Model
{
 
 //if a startup exists with this user_id, set $temp to 1, else set it to 0, and return to controller
	public function user_id($uid)
	{
		$query= $this->db->query("select * from startups where user_id='$uid'");
		if($query->num_rows() == 1)
			$temp= 1;
		else
			$temp=0;

		return $temp;
	}

	public function uniqueSname($name)
	{
		$query= $this->db
			->select('*')
			->where('name', $name)
			->get('startups');

		$num= $query->num_rows();
		if($num == 0) return TRUE;
		else return FALSE;
	}
}