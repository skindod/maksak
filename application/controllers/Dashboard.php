<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->library('form_validation');
        $this->load->helper(array('url'));

        $this->load->model('players_model');
        $this->load->model('events_model');
        $this->load->model('sports_model');
        $this->load->model('result_model');
        
        //load the login model
//        $this->load->model('login_model');

        $this->jompay = $this->load->database('default',TRUE);
        
        if(!isset($_SESSION['login'])){
            redirect(base_url());
        }
    }

    public function Index()
    {
        $year = $this->input->get('year');
        if(empty($year))
        {
            $year = date('Y');
        }
        $data['players_data'] = $this->players_model->get_dashboard_data($year);
        $data['events_data'] = $this->events_model->get_dashboard_data($year);
        $data['sports_data'] = $this->sports_model->get_dashboard_data($year);
        $data['barchart_data'] = $this->events_model->get_dashboard_barchart_data($year);
        $data['ranking_data'] = $this->result_model->get_ranking_data($year);
        $data['selectYear'] = $year;
// echo '<pre>'; print_r($data['ranking_data']); die();
        // if($_SESSION['role'] == 0){
        //     $this->load->view('dashboard', $data);
        // } else if($_SESSION['role'] == 1){
        //     $this->load->view('dashboard', $data);
        // } else {
        //     $this->load->view('dashboard', $data);
        // }

        $this->load->view('dashboard', $data);
    }
}
