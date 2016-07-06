<?php
Class User extends CI_Model
{
 
      public function add_user()
       {

      		$this->load->library('email');

          $data=array(
            'name'=>$this->input->post('username'),
            'password'=>$this->input->post('password'),
            'email'=>$this->input->post('email'),
            'facebook'=>$this->input->post('fb'),
            'googleplus'=>$this->input->post('gplus'),
            'linkedin'=>$this->input->post('ln')
          );
          $this->db->insert('users',$data);
        	
          //process for generating unique user id.
          $id= $this->db->insert_id();
          $x= strlen($id);
          $len= 7-$x;

          $userid= '';
          for($i=0; $i<$len; ++$i)
          {
            $userid= $userid.'0';
          }
          $userid= 'US_'.$userid.$id;

          $query = $this->db->query("update users set user_id= '$userid' where id= '$id'");
          //user_id updated in table.
          
      
           $sess= array(
                          'name'=>$this->input->post('username'),
                          'password'=>$this->input->post('password'),
                          'email'=>$this->input->post('email')
                           );

                    $this->session->set_userdata('usercurrent', $sess);





      }


}
?>