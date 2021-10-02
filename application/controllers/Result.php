<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Result extends CI_Controller {

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
        $this->load->model('result_model');
        $this->load->model('points_model');

        $this->jompay = $this->load->database('default',TRUE);
        
        if(!isset($_SESSION['login'])){
            redirect(base_url());
        }
    }
    
    public function Index($event_id)
    {
        $data['event_details'] = $this->events_model->get_list_for_result_page($event_id);
        $data['state_list'] = $this->state_model->get_list();
        $data['points_list'] = $this->points_model->get_list();
        $data['result_per_sport_list'] = $this->result_model->get_list_per_sport($event_id);
        $data['result_per_state_list'] = $this->result_model->get_list_per_state($event_id);
        $data['event_id'] = $event_id;
//        echo '<pre>';        print_r($data['points_list']); die();
        if(isset($_SESSION['search_event_id']) && isset($_SESSION['search_sport_id'])){
            $data['search_details'] = $this->result_model->get_search_list($_SESSION['search_event_id'], $_SESSION['search_sport_id']);
        }
        
        $this->load->view('result', $data);
    }

    public function Create()
    {
        // set validations
        $this->form_validation->set_rules("sport_id", "sport_id", "required");
        $this->form_validation->set_rules("event_id", "event_id", "required");
        
        if ($this->form_validation->run() == FALSE)
        {
            redirect(base_url('result/index'));
        }
        else
        {
            // get the posted values
            $sport_id = $this->input->post("sport_id");
            $event_id = $this->input->post("event_id");
            $state = $this->input->post("state");
            $point = $this->input->post("point");
            
            $this->result_model->insert($sport_id, $event_id, $state, $point);
            $session = array(
                'msgstatus' => 1,
                'msg' => 'Keputusan berjaya ditambah.'
            );
            $this->session->set_userdata($session);

            redirect(base_url('result/index/'.$event_id));
        }
    }
    
    public function Search($event_id, $sport_id)
    {
        $session = array(
            'search_event_id' => $event_id,
            'search_sport_id' => $sport_id
        );
        $this->session->set_userdata($session);

        redirect(base_url('result/index/'.$event_id));
    }
    
    public function Update()
    {
        // set validations
        $this->form_validation->set_rules("sport_id", "sport_id", "required");
        $this->form_validation->set_rules("event_id", "event_id", "required");
        
        if ($this->form_validation->run() == FALSE)
        {
            redirect(base_url('result/index'));
        }
        else
        {
            // get the posted values
            $sport_id = $this->input->post("sport_id");
            $event_id = $this->input->post("event_id");
            $state = $this->input->post("state");
            $point = $this->input->post("point");
            
            $this->result_model->update($sport_id, $event_id, $state, $point);
            $session = array(
                'msgstatus' => 1,
                'msg' => 'Keputusan berjaya disunting.'
            );
            $this->session->set_userdata($session);

            redirect(base_url('result/index/'.$event_id));
        }
    }
}
