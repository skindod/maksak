<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Players extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->library('form_validation');
        $this->load->helper(array('url'));

        //load the login model
        $this->load->model('players_model');
        $this->load->model('salutations_model');
        $this->load->model('grade_model');

        $this->jompay = $this->load->database('default', TRUE);
    }
    
    public function Index()
    {
        if(!isset($_SESSION['login'])){
            redirect(base_url());
        }
        
        $data['players_list'] = $this->players_model->get_latest_players_list();
        
        $this->load->view('players_list', $data);
    }

    public function Create() {
        //set validations
        $this->form_validation->set_rules("ic", "ic", "required");
        $this->form_validation->set_rules("name", "name", "required");

        if ($this->form_validation->run() == FALSE) {
            $data['salutations'] = $this->salutations_model->get_list();
            $data['grades'] = $this->grade_model->get_list();
            $this->load->view('players_create', $data);
        } else {
            //get the posted values
            $ic = $this->input->post("ic");
            $salutations_id = $this->input->post("salutations_id");
            $name = $this->input->post("name");
            $sex = $this->input->post("sex");
            $dob_day = $this->input->post("dob_day");
            $dob_month = $this->input->post("dob_month");
            $dob_year = $this->input->post("dob_year");
            $address = $this->input->post("address");
            $telephone = $this->input->post("telephone");
            $email = $this->input->post("email");
            $grade_id = $this->input->post("grade_id");
            $employer = $this->input->post("employer");
            $occupation = $this->input->post("occupation");
            $state_of_position = $this->input->post("state_of_position");
            $position = $this->input->post("position");

            $result = $this->players_model->insert($ic, $salutations_id, $name, $sex, $dob_day, $dob_month, $dob_year, $address, $telephone, $email, $grade_id, $employer, $occupation, $state_of_position, $position);

            if ($result != FALSE) {

                $session = array(
                    'msgstatus' => 1,
                    'msg' => 'Pemain berjaya ditambah.'
                );
                $this->session->set_userdata($session);

                redirect(base_url('players/create'));
            } else {
                $session = array(
                    'msgstatus' => 0,
                    'msg' => 'Pemain gagal ditambah.'
                );
                $this->session->set_userdata($session);

                redirect(base_url('players/create'));
            }
        }
    }
    
    public function Search_player()
    {
        $ic = $this->input->post("ic");
        
        $data['player'] = $this->players_model->get_search_list($ic);
        $data['players_list'] = $this->players_model->get_latest_players_list();
        
//        echo '<pre>'; print_r($data['player']); die();
        $this->load->view('players_list', $data);
    }

    public function Update($id) {
        //set validations
        $this->form_validation->set_rules("ic", "ic", "required");
        $this->form_validation->set_rules("name", "name", "required");

        if ($this->form_validation->run() == FALSE) {
            $data['salutations'] = $this->salutations_model->get_list();
            $data['grades'] = $this->grade_model->get_list();
            $data['player'] = $this->players_model->get_player_data($id);
            $this->load->view('players_update', $data);
        } else {
             //get the posted values
            $ic = $this->input->post("ic");
            $salutations_id = $this->input->post("salutations_id");
            $name = $this->input->post("name");
            $sex = $this->input->post("sex");
            $dob_day = $this->input->post("dob_day");
            $dob_month = $this->input->post("dob_month");
            $dob_year = $this->input->post("dob_year");
            $address = $this->input->post("address");
            $telephone = $this->input->post("telephone");
            $email = $this->input->post("email");
            $grade_id = $this->input->post("grade_id");
            $employer = $this->input->post("employer");
            $occupation = $this->input->post("occupation");
            $state_of_position = $this->input->post("state_of_position");
            $position = $this->input->post("position");

            $result = $this->players_model->update($id, $ic, $salutations_id, $name, $sex, $dob_day, $dob_month, $dob_year, $address, $telephone, $email, $grade_id, $employer, $occupation, $state_of_position, $position);

            if ($result != FALSE) {

                $session = array(
                    'msgstatus' => 1,
                    'msg' => 'Pemain berjaya dikemaskini.'
                );
                $this->session->set_userdata($session);

                redirect(base_url('players/update/'.$id));
            } else {
                $session = array(
                    'msgstatus' => 0,
                    'msg' => 'Pemain gagal dikemaskini.'
                );
                $this->session->set_userdata($session);

                redirect(base_url('players/update/'.$id));
            }
        }
    }

    public function Check_ic() 
    {
        if(!isset($_POST['ic']) || empty($_POST['ic'])) {
            echo '0';
            exit();
        } else {
            $result = $this->players_model->check_ic($_POST['ic']);
            echo $result;
            exit();
        }
    }

}
