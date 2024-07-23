<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->library('form_validation');
        $this->load->helper(array('url'));

        //load the login model
        $this->load->model('login_model');
        $this->load->model('events_model');
        $this->load->model('logs_model');
    }

    public function Index() {
        //set validations
        $this->form_validation->set_rules("email", "email", "required");
        $this->form_validation->set_rules("password", "password", "required");

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
            //get the posted values
            $email = $this->input->post("email");
            $password = $this->input->post("password");

            $request = array(
                'email' => $email,
                'password' => $password,
            );
            
            $result = $this->login_model->login($email, $password);
            
            if ($result != FALSE) {

                $current_events = $this->events_model->get_current_events();
                $this->logs_model->insert($result[0]->badan_gabungan_id, 0, 0, 0, 'Login', $result[0]->id, $request, array('login success'));
                
                $session = array(
                    'login' => true,
                    'userid' => $result[0]->id,
                    'email' => $result[0]->email,
                    'name' => $result[0]->name,
                    'role' => $result[0]->role,
                    'image' => $result[0]->image_url,
                    'badan_gabungan_id' => $result[0]->badan_gabungan_id,
                    'current_events' => $current_events
                );
                $this->session->set_userdata($session);
                
                redirect(base_url('dashboard/index'));
            } else {
                $this->logs_model->insert(($result[0]->badan_gabungan_id == null) ? 0 : $result[0]->badan_gabungan_id, 0, 0, 0, 'Login', ($request[0]->id == null) ? 0 : $request[0]->id, array('Salah kata laluan atau email. Sila cuba lagi.'));
                $session = array(
                    'msgstatus' => 0,
                    'msg' => 'Salah kata laluan atau email. Sila cuba lagi.'
                );
                $this->session->set_userdata($session);

                redirect(base_url());
            }
        }
    }

    public function ForgetAccount() {

        //set validations
        $this->form_validation->set_rules("email", "email", "required");

        if ($this->form_validation->run() == FALSE) {
            redirect(base_url());
        } else {

            //get the posted values
            $email = $this->input->post("email");
            $result = $this->login_model->forgetaccount($email);

            if ($result != FALSE) {
                $session = array(
                    'msgstatus' => 1,
                    'msg' => 'Kata laluan baru telah dihantar ke email anda, sila periksa dan cuba log masuk sekali lagi.'
                );

                $this->session->set_userdata($session);
            } else {
                $session = array(
                    'msgstatus' => 0,
                    'msg' => 'Email tiada dalam sistem, sila cuba email lain.'
                );

                $this->session->set_userdata($session);
            }

            redirect(base_url());
        }
    }

    function Logout() {
        $this->session->sess_destroy();
        redirect(base_url());
    }

}
