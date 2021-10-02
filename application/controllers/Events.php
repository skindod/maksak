<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Events extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->library('form_validation');
        $this->load->helper(array('url'));
        
        //load the login model
        $this->load->model('events_model');
        $this->load->model('state_model');
        $this->load->model('sports_model');
        $this->load->model('register_model');
        $this->load->model('badanGabungan_model');
        
//        if(!isset($_SESSION['login'])){
//            redirect(base_url());
//        }
    }
    
    public function Index()
    {
        $data['events_list'] = $this->events_model->get_list();
        
        $this->load->view('events_list', $data);
    }
    
    public function Details($event_id)
    {
        if(!isset($_SESSION['login'])){
            $data['public_mode'] = true;
        }else{
            $data['public_mode'] = false;
        }
        $data['event_details'] = $this->events_model->get_detail($event_id);
        $data['badan_gabungan_list'] = $this->badanGabungan_model->get_list();
        if(isset($_SESSION['badan_gabungan_id']) && $_SESSION['badan_gabungan_id'] != 0){ 
            $data['registered_list'] = $this->register_model->get_registered_list($event_id);
        } else {
            $data['registered_list'] = $this->register_model->get_registered_list($event_id);
        }
//        echo '<pre>'; print_r($data['registered_list']); die();
        $this->load->view('events_detail', $data);
    }
    
    public function Register_player($event_id)
    {
        //set validations
//        $this->form_validation->set_rules("state_id", "state_id", "required");
        $this->form_validation->set_rules("sport_id", "sport_id", "required");
        $this->form_validation->set_rules("ic", "ic", "required");
        $this->form_validation->set_rules("jawatan", "jawatan", "required");
        
        if ($this->form_validation->run() == FALSE)
        {
            redirect(base_url('events/details/'.$event_id));
        }
        else
        {
            //get the posted values
            if(isset($_SESSION['badan_gabungan_id']) && $_SESSION['badan_gabungan_id'] != 0){ 
                $state_id = $this->input->post("temp_state_id");
            } else {
                $state_id = $this->input->post("state_id");
            }
            $sport_id = $this->input->post("sport_id");
            $ic = $this->input->post("ic");
            $jawatan = $this->input->post("jawatan");
            
            $result = $this->register_model->verify($event_id, $state_id, $sport_id, $ic, $jawatan);
            
            if($result['status'] == true){
                $result1 = $this->register_model->insert($event_id, $state_id, $sport_id, $ic, $jawatan, $result['msg'], $result['age']);
                $session = array(
                    'msgstatus'  => 1,
                    'msg'     => 'Pemain berjaya didaftar!'
                );
                $this->session->set_userdata($session);

                redirect(base_url('events/details/'.$event_id));
            } else {
                $session = array(
                    'msgstatus'  => 0,
                    'msg'     => $result['msg']
                );
                $this->session->set_userdata($session);

                redirect(base_url('events/details/'.$event_id));
            }
        }
    }
    
    public function Search_player($event_id)
    {
        if(!isset($_SESSION['login'])){
            $data['public_mode'] = true;
        }else{
            $data['public_mode'] = false;
        }
         
        $name = $this->input->post("name");
        $state_id = $this->input->post("state_id");
        $sport_id = $this->input->post("sport_id");
        $jawatan = $this->input->post("jawatan");
        $gender = $this->input->post("gender");
        $veteran_status = $this->input->post("veteran_status");
        if(isset($_SESSION['badan_gabungan_id']) && $_SESSION['badan_gabungan_id'] != 0){ 
            $data['registered_list'] = $this->register_model->get_registered_list($event_id);
        } else {
            $data['registered_list'] = $this->register_model->get_registered_list($event_id);
        }
        
        $data['search_list'] = $this->register_model->get_search_list($event_id, $name, $state_id, $sport_id, $jawatan, $gender, $veteran_status);
        $data['search_param']['name'] = $name;
        $data['search_param']['state_id'] = $state_id;
        $data['search_param']['sport_id'] = $sport_id;
        $data['search_param']['jawatan'] = $jawatan;
        $data['search_param']['gender'] = $gender;
        $data['search_param']['veteran_status'] = $veteran_status;
        
        $data['event_details'] = $this->events_model->get_detail($event_id);
        $data['badan_gabungan_list'] = $this->badanGabungan_model->get_list();
        
//        echo '<pre>'; print_r($data['search_list']); die();
        $this->load->view('events_detail', $data);
    }

    public function Create()
    {
        //set validations
        $this->form_validation->set_rules("event_name", "event_name", "required");
        $this->form_validation->set_rules("location_name", "location_name", "required");
        $this->form_validation->set_rules("location_date_range", "location_date_range", "required");
        
        if ($this->form_validation->run() == FALSE)
        {
            $data['state_list'] = $this->state_model->get_list();
            $data['sports_list'] = $this->sports_model->get_list();
            $this->load->view('events_create', $data);
        }
        else
        {
            //get the posted values
            $event_name = $this->input->post("event_name");
            $event_description = $this->input->post("event_description");
            
            $event_id = $this->events_model->create_event($event_name, $event_description);
            
            if($event_id != false){
                $location_name = $this->input->post("location_name");
                $url_map = $this->input->post("url_map");
                $location_address = $this->input->post("location_address");
                $location_state = $this->input->post("location_state");
                $location_city = $this->input->post("location_city");
                $location_date_range = $this->input->post("location_date_range");
                $last_registration_date = $this->input->post("last_registration_date");

                $this->events_model->create_event_location($event_id, $location_name, $url_map, $location_address, $location_state, $location_city, $location_date_range, $last_registration_date);
                
                $sports_arr = $this->input->post("repeater");
                
                if(count($sports_arr) > 0){
                    $result = $this->events_model->create_event_sports($event_id, $sports_arr);
                    if($result == false){
                        $output = array('status' => 3);
                        echo json_encode($output);
                    } else {
                        $output = array('status' => 1);
                        echo json_encode($output);
                    }
                }
            } else {
                $output = array('status' => 0);
                echo json_encode($output);
            }
        }
    }
    
    public function Update($id)
    {
        //set validations
        $this->form_validation->set_rules("event_name", "event_name", "required");
        $this->form_validation->set_rules("location_name", "location_name", "required");
        $this->form_validation->set_rules("location_date_range", "location_date_range", "required");
        
        if ($this->form_validation->run() == FALSE)
        {
            $data['event'] = $this->events_model->get_detail($id);
//            echo '<pre>';            print_r($data['event']); die();
            $data['state_list'] = $this->state_model->get_list();
            $data['sports_list'] = $this->sports_model->get_list();
            $this->load->view('events_update', $data);
        }
        else
        {
            
            //get the posted values
            $event_name = $this->input->post("event_name");
            $event_description = $this->input->post("event_description");
            
            $event_id = $this->events_model->update_event($id, $event_name, $event_description);
            
            if($event_id != false){
                $location_name = $this->input->post("location_name");
                $url_map = $this->input->post("url_map");
                $location_address = $this->input->post("location_address");
                $location_state = $this->input->post("location_state");
                $location_city = $this->input->post("location_city");
                $location_date_range = $this->input->post("location_date_range");
                $last_registration_date = $this->input->post("last_registration_date");
//echo '<pre>'; print_r($date_arr); die();
                $this->events_model->update_event_location($id, $location_name, $url_map, $location_address, $location_state, $location_city, $location_date_range, $last_registration_date);
                $sports_arr = $this->input->post("repeater");
                
                if(count($sports_arr) > 0){
                    $result = $this->events_model->update_event_sports($id, $sports_arr);
                    
                    if($result == false){
                        $output = array('status' => 3);
                        echo json_encode($output);
                    } else {
                        $output = array('status' => 2);
                        echo json_encode($output);
                    }
                }
            } else {
                $output = array('status' => 0);
                echo json_encode($output);
            }
        }
    }
    
    public function Publish()
    {
        //get the posted values
        $event_id = $this->input->post("event_id");

        $this->events_model->update_publish_status($event_id);
        $current_events = $this->events_model->get_current_events();

        $session = array(
            'msgstatus'         => 1 ,
            'msg'               => 'Event telah diterbitkan.' ,
            'current_events'    => $current_events
        );
        $this->session->set_userdata($session);

        redirect(base_url('events/index'));
    }
    
    public function Unpublish()
    {
        //get the posted values
        $event_id = $this->input->post("event_id");
        $reason = $this->input->post("reason");

        $this->events_model->update_unpublish_status($event_id, $reason);

        $session = array(
            'msgstatus'  => 1,
            'msg'     => 'Event telah dibatalkan.'
        );
        $this->session->set_userdata($session);

        redirect(base_url('events/index'));
    }
}
