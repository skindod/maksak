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
        // $this->form_validation->set_rules("name", "name", "required");
        $this->form_validation->set_rules("email", "email", "required");
        $this->form_validation->set_rules("state", "state", "required");

        if ($this->form_validation->run() == FALSE) {
            $data['joint_bodies_list'] = $this->jointBodies_model->get_list();
            $data['state_list'] = $this->badanGabungan_model->get_list();
            $this->load->view('joint_bodies_create', $data);
        } else {
            //get the posted values
            // $name = $this->input->post("name");
            $email = $this->input->post("email");
            $state = $this->input->post("state");
            $phone = $this->input->post("phone");

            $result1 = $this->jointBodies_model->email_validation($email);

            if (count($result1) == 0) {
                $result = $this->jointBodies_model->insert($email, $state, $phone);

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

    public function List() {

        // manage selected year
        $year = $this->input->get('year');
        if(empty($year))
        {
            $year = date('Y');
        }

        // manage selected badan gabungan; default to Majlis Sukan Angkatan Tentera
        $selected_bg_id = $this->input->get('bg');
        if(empty($selected_bg_id))
        {
            $selected_bg_id = 13;
        }
        
        // Selected badan gabungan data
        $data['badan_gabungan'] = $this->badanGabungan_model->get_by_id($selected_bg_id);
        $data['num_of_events'] = $this->jointBodies_model->get_num_of_events_joined($selected_bg_id, $year);
        $data['num_of_sports'] = $this->jointBodies_model->get_num_of_sports_joined($selected_bg_id, $year);
        $data['num_of_players'] = $this->jointBodies_model->get_num_of_players_joined($selected_bg_id, $year);
        $data['total_points'] = $this->jointBodies_model->get_total_points($selected_bg_id, $year);
        $data['list_of_sports'] = $this->jointBodies_model->get_list_of_events_joined($selected_bg_id, $year);

        // General data
        $data['state_list'] = $this->badanGabungan_model->get_list();
        $data['selectYear'] = $year;
        // echo '<pre>'; print_r($data); die();
        $this->load->view('joint_bodies_list', $data);
    }

    public function Sport_details() {

        $sport_id = $this->input->get('sport_id');
        $event_id = $this->input->get('event_id');
        $bg_id = $this->input->get('bg_id');
        
        // get data
        $data['player_list'] = $this->jointBodies_model->get_players_list_by_sport_event_bg_id($sport_id, $event_id, $bg_id);
        $data['badan_gabungan'] = $this->badanGabungan_model->get_by_id($bg_id);
        $data['kejohanan'] = $this->jointBodies_model->get_event_by_id($event_id);
        $data['acara'] = $this->jointBodies_model->get_sport_by_id($sport_id);
        // echo '<pre>'; print_r($data); die();
        $this->load->view('joint_bodies_player_list', $data);
    }
}
