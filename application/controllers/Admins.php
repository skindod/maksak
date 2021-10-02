<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admins extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->library('form_validation');
        $this->load->helper(array('url'));
        
        //load the login model
        $this->load->model('admins_model');

        $this->jompay = $this->load->database('default',TRUE);
        
        if(!isset($_SESSION['login'])){
            redirect(base_url());
        }
    }

    public function Create()
    {
        //set validations
        $this->form_validation->set_rules("name", "name", "required");
        $this->form_validation->set_rules("email", "email", "required");

        if ($this->form_validation->run() == FALSE)
        {
            $data['admins_list'] = $this->admins_model->get_list();
            $this->load->view('admins_create', $data);
        }
        else
        {
            //get the posted values
            $name = $this->input->post("name");
            $email = $this->input->post("email");
            $role = $this->input->post("role");
            
            $result1 = $this->admins_model->email_validation($email);
            
            if(count($result1) == 0){
                $result = $this->admins_model->insert($name, $email, $role);

                if($result != FALSE){
                    
                    $session = array(
                        'msgstatus'  => 1,
                        'msg'     => 'Ahli berjaya ditambah.'
                    );
                    $this->session->set_userdata($session);

                    redirect(base_url('admins/create'));
                } else {
                    $session = array(
                        'msgstatus'  => 0,
                        'msg'     => 'Ahli gagal ditambah.'
                    );
                    $this->session->set_userdata($session);

                    redirect(base_url('admins/create'));
                }
            } else {
                $session = array(
                    'msgstatus'  => 0,
                    'msg'     => 'Emel pernah didaftar. Emel yang sama tidak boleh digunakan lagi. Sila cuba emel yang lain.'
                );
                $this->session->set_userdata($session);

                redirect(base_url('admins/create'));
            }
        }
    }
    
    public function Update($id)
    {
        //set validations
        $this->form_validation->set_rules("name", "name", "required");
        $this->form_validation->set_rules("email", "email", "required");

        if ($this->form_validation->run() == FALSE)
        {
            $data['admins_list'] = $this->admins_model->get_list();
            $data['admin'] = $this->admins_model->get_data($id);
            $this->load->view('admins_update', $data);
        }
        else
        {
            //get the posted values
            $name = $this->input->post("name");
            $email = $this->input->post("email");
            $role = $this->input->post("role");
            
            $result = $this->admins_model->update($id, $name, $email, $role);
            
            if($result != FALSE){
                
                $session = array(
                    'msgstatus'  => 1,
                    'msg'     => 'Ahlli berjaya disunting.'
                );
                $this->session->set_userdata($session);
                
                redirect(base_url('admins/create'));
            } else {
                $session = array(
                    'msgstatus'  => 0,
                    'msg'     => 'Ahlli gagal disunting.'
                );
                $this->session->set_userdata($session);
                
                redirect(base_url('admins/create'));
            }
        }
    }
}
