<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class JointBodies extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->library('form_validation');
        $this->load->helper(array('url'));

        //load the login model
        $this->load->model('jointBodies_model');
        $this->load->model('state_model');
        $this->load->model('badanGabungan_model');

        $this->jompay = $this->load->database('default', TRUE);

        if (!isset($_SESSION['login'])) {
            redirect(base_url());
        }
    }

    public function Create() {
        //set validations
        $this->form_validation->set_rules("name", "name", "required");
        $this->form_validation->set_rules("email", "email", "required");
        $this->form_validation->set_rules("state", "state", "required");

        if ($this->form_validation->run() == FALSE) {
            $data['joint_bodies_list'] = $this->jointBodies_model->get_list();
            $data['state_list'] = $this->badanGabungan_model->get_list();
            $this->load->view('joint_bodies_create', $data);
        } else {
            //get the posted values
            $name = $this->input->post("name");
            $email = $this->input->post("email");
            $state = $this->input->post("state");
            $phone = $this->input->post("phone");

            $result1 = $this->jointBodies_model->email_validation($email);

            if (count($result1) == 0) {
                $result = $this->jointBodies_model->insert($name, $email, $state, $phone);

                if ($result != FALSE) {

                    $session = array(
                        'msgstatus' => 1,
                        'msg' => 'Ahli berjaya ditambah.'
                    );
                    $this->session->set_userdata($session);

                    redirect(base_url('jointBodies/create'));
                } else {
                    $session = array(
                        'msgstatus' => 0,
                        'msg' => 'Ahli gagal ditambah.'
                    );
                    $this->session->set_userdata($session);

                    redirect(base_url('jointBodies/create'));
                }
            } else {
                $session = array(
                    'msgstatus' => 0,
                    'msg' => 'Emel pernah didaftar. Emel yang sama tidak boleh digunakan lagi. Sila cuba emel yang lain.'
                );
                $this->session->set_userdata($session);

                redirect(base_url('jointBodies/create'));
            }
        }
    }

    public function Update($id) {
        //set validations
        $this->form_validation->set_rules("status", "status", "required");
        $this->form_validation->set_rules("name", "name", "required");
        $this->form_validation->set_rules("email", "email", "required");
        $this->form_validation->set_rules("state", "state", "required");

        if ($this->form_validation->run() == FALSE) {
            $data['joint_bodies_list'] = $this->jointBodies_model->get_list();
            $data['joint_body'] = $this->jointBodies_model->get_data($id);
            $data['state_list'] = $this->badanGabungan_model->get_list();
            $this->load->view('joint_bodies_update', $data);
        } else { 
            //get the posted values
            $status = $this->input->post("status");
            $name = $this->input->post("name");
            $email = $this->input->post("email");
            $state = $this->input->post("state");
            $phone = $this->input->post("phone");

            $result = $this->jointBodies_model->update($status, $id, $name, $email, $state, $phone);

            if ($result != FALSE) {

                $session = array(
                    'msgstatus' => 1,
                    'msg' => 'Ahli berjaya disunting.'
                );
                $this->session->set_userdata($session);

                redirect(base_url('jointBodies/create'));
            } else {
                $session = array(
                    'msgstatus' => 0,
                    'msg' => 'Ahli gagal disunting.'
                );
                $this->session->set_userdata($session);

                redirect(base_url('jointBodies/create'));
            }
        }
    }

}
