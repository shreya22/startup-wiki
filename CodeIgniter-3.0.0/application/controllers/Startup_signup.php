<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Startup_signup extends CI_Controller{

         function __construct()
         {
           parent::__construct();

        //   $this->output->enable_profiler(TRUE);

            $this->load->model('Model_startup_signup','',TRUE);
            $this->load->model('Model_check','',TRUE);
            $this->load->helper('url');
            $this->load->helper('file');
            $this->load->library('session');
            $this->load->helper('form');
            $this->load->helper('array');

            //this method will have the credentials for validation.
            $this->load->library('form_validation');

            if(!$this->session->has_userdata('logged_in'))
            {
                redirect('', 'refresh');
            }
         }

        //to be called by default, will load the startupsignup page.
        public function index()
        {
            //opens only if the user session is set, else directed to base page

            if($this->session->has_userdata('logged_in'))
            {
                $this->load->view('startupsignup_view');
            }else
            {
                redirect('', 'refresh');
            }
        }

        //will check for validations in the startupsignup form. if validated, will divert to congo page.
        
       public function startup_validate()
        {
            if(!$this->session->has_userdata('logged_in'))
            {
                redirect('', 'refresh');
            }

            //getting user session fields from the current set session.
            $loggedin= $this->session->userdata('logged_in');
    
            //backend checks
            $this->form_validation->set_rules('form-name', 'Startup Name', 'required|callback_name_check');
            $this->form_validation->set_rules('form-tagline', 'Tagline','required|max_length[50]|min_length[5]');
            $this->form_validation->set_rules('form-sector', 'Startup Sector', 'required|trim');

            //for headings
            $this->form_validation->set_rules('form-idea', 'idea','required|max_length[1000]');

            $this->form_validation->set_rules('form-location', 'location','required|max_length[1000]');

            $this->form_validation->set_rules('form-accomplishments', 'accomplishments','required|max_length[1000]');
            $this->form_validation->set_rules('form-contactus', 'contact us','required|max_length[1000]');


            //Field validation failed, return false
            if($this->form_validation->run() == false)
            {                
                $return_data['status'] = 'false';
                $return_data['msg'] =validation_errors() ; 
                echo json_encode($return_data);
                return;
            }

                $imgup= 'logo';

                
                //validation successful, put values in array.

                    //getting the city_id from table 'city'
                $city_id= $this->Model_startup_signup->get_cityid($_POST['form-city']);

                //getting user id from session variable initialised above
                $uid= $loggedin['uid'];
/*
        $config['upload_path'] ='./img/startup_logo/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = $loggedin['name'];
            //$config['max_size']   = '100';
            //$config['max_width']  = '1024';
            //$config['max_height']  = '768';

            $this->load->library('upload', $config);
    if (! $this->upload->do_upload('logo'))
            {
                $lklk = "error";
                $return_data['msg'] = $this->upload->display_errors();
            }
            else
            {
                $imgdata = $this->upload->data();
                
                                $config['image_library'] = 'gd2';
                                $config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
                                //$config['new_image'] = './image_uploads/';
                                $config['maintain_ratio'] = TRUE;
                    $config['overwrite'] = TRUE;
                                $config['width'] = 170;
                                $config['height'] = 170;
                                $this->load->library('image_lib',$config);                   
                                if ($this->image_lib->resize())
                {
                            $lklk="uploaded";
                                }
            }

*/
                $data= array(
                    'user_id' => $loggedin['uid'],
                    'city_id' => $city_id,
                    'name'=> $_POST['form-name'],
                    'tagline' => $_POST['form-tagline'],
                    'sector' => $_POST['form-sector'],
                    'idea' => $_POST['form-idea'],
                    'location' => $_POST['form-location'],
                    'accomplishments' => $_POST['form-accomplishments'],
                    'contactus' => $_POST['form-contactus']
  //                                      ,'logo' => $imgdata['raw_name'].$imgdata['file_ext']
                    );
//              print_r($data);
                $startup_id= $this->Model_startup_signup->add_startup($data);
                                                //values added in startup table


                //set session for current startup
                


//all entries successfully saved in db and session set, return true.
            $return_data['status'] = 'true';
            $return_data['msg'] ="Success" ; 
                echo json_encode($return_data);
                return;
                
        }

        public function name_validate()
        {
            //backend checks
            $this->form_validation->set_rules('form-name', 'Startup Name', 'required|min_length[5]|callback_name_check');

            if($this->form_validation->run() == false)
            {
                //$this->session->set_userdata('register_error',validation_errors());
                
                $return_data['status'] = 'false';
                $return_data['msg'] =validation_errors(); 
                echo json_encode($return_data);
                return;
           //       redirect('startup_signup', '');
            }


            //name validation successful, return true.
                $return_data['status'] = 'true';
                $return_data['msg'] ='name valid!'; 
                echo json_encode($return_data);
                return;
        }

        public function name_check($str)
        {
            if($this->Model_check->uniqueSname($str))
                return TRUE;
            else
            {
                $this->form_validation->set_message('name_check', 'Startup Name already in use! Try a different one.');
                return FALSE;
            }
        }

        
        public function page_done_startup()
        {
            $data['msg']='Congo.. Hardwork Paid off! You just created a page for you.. The LInk has been mailed to you. Share, Let Everyonw know about you... And dont forget to Smile.. :)';
            $this->load->view('signed_up_startup', $data);
        }


        public function page_done()
        {
            $data['msg']='Congo.. Hardwork Paid off! You just created a page for you.. The LInk has been mailed to you. Share, Let Everyonw know about you... And dont forget to Smile.. :)';
            $this->load->view('signed_up', $data);
        }

        public function getUserNames()
        {       
            $allFields= $this->db->query("SELECT * FROM users ORDER BY name ASC");

            if($allFields)
            {
                $tname= array();
                $temail= array();
                $tuser_id= array();
                $total= array();

                foreach($allFields->result() as $row)
                {
                    $name= $row->name; 
                    $email= $row->email;
                    $user_id= $row->user_id;


                    array_push($tname, $name);
                    array_push($temail, $email);
                    array_push($tuser_id, $user_id);
                }

                $total= array(
                    'name' => $tname,
                    'email' => $temail,
                    'user_id' => $tuser_id,
                    'status' => 'true'
                    );
            }
            else
            {
                
                $total= array(
                    'status' => 'false',
                    'msg' => 'Some Error has Occured'
                    );
            }

            echo json_encode($total);
        //  print_r($total);
            return;
        }

        public function insertIntoMembers()
        {
            //insert user details in members table and return the member id in json encoded array.  

            $arr= $_POST['info'];

            $que= "SELECT * FROM members WHERE startup_id= '".$arr['startup_id']."' AND user_id= '".$arr['user_id']. "'";
            $isPresent= $this->db->query($que);
            if($isPresent->num_rows() >= 1)
            {
                $total= array(
                            'status' => 'false',
                            'msg' => 'This entry already Present'
                            );
            }else
            {
                //not already present has to be inserted.

                if($this->db->insert('members', $arr)) 
                {

                    $member_id= $this->db->insert_id();
                    $total= array(
                            'status' => 'true',
                            'msg' => 'no error yippee',
                            'memid' => $member_id
                            );
                }else
                {
                    $total= array(
                            'status' => 'false',
                            'msg' => 'Some Error has Occured'
                            );
                }

            }

            
            echo json_encode($total);
        }

    }



?>