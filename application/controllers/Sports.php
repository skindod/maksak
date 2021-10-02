<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sports extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->library('form_validation');
        $this->load->helper(array('url'));
        
        //load the login model
        $this->load->model('sports_model');

        $this->jompay = $this->load->database('default',TRUE);
        
        if(!isset($_SESSION['login'])){
            redirect(base_url());
        }
    }

    public function Create()
    {
        //set validations
        $this->form_validation->set_rules("name", "name", "required");

        if ($this->form_validation->run() == FALSE)
        {
            $data['sports_list'] = $this->sports_model->get_list();
            $this->load->view('sports_create', $data);
        }
        else
        {
            //get the posted values
            $name = $this->input->post("name");
            $description = $this->input->post("description");
            
            $result = $this->sports_model->insert($name, $description);
            
            if($result != FALSE){
                
                $session = array(
                    'msgstatus'  => 1,
                    'msg'     => 'Acara berjaya ditambah.'
                );
                $this->session->set_userdata($session);
                
                redirect(base_url('sports/create'));
            } else {
                $session = array(
                    'msgstatus'  => 0,
                    'msg'     => 'Acara gagal ditambah.'
                );
                $this->session->set_userdata($session);
                
                redirect(base_url('sports/create'));
            }
        }
    }
    
    public function Update($id)
    {
        //set validations
        $this->form_validation->set_rules("name", "name", "required");

        if ($this->form_validation->run() == FALSE)
        {
            $data['sports_list'] = $this->sports_model->get_list();
            $data['sport'] = $this->sports_model->get_data($id);
            $this->load->view('sports_update', $data);
        }
        else
        {
            //get the posted values
            $name = $this->input->post("name");
            $description = $this->input->post("description");
            
            $result = $this->sports_model->update($id, $name, $description);
            
            if($result != FALSE){
                
                $session = array(
                    'msgstatus'  => 1,
                    'msg'     => 'Acara berjaya disunting.'
                );
                $this->session->set_userdata($session);
                
                redirect(base_url('sports/create'));
            } else {
                $session = array(
                    'msgstatus'  => 0,
                    'msg'     => 'Acara gagal disunting.'
                );
                $this->session->set_userdata($session);
                
                redirect(base_url('sports/create'));
            }
        }
    }
}
