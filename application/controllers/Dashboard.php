<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->library('form_validation');
        $this->load->helper(array('url'));
        
        //load the login model
//        $this->load->model('login_model');

        $this->jompay = $this->load->database('default',TRUE);
        
        if(!isset($_SESSION['login'])){
            redirect(base_url());
        }
    }

    public function Index()
    {
        if($_SESSION['role'] == 0){
            $this->load->view('dashboard');
        } else if($_SESSION['role'] == 1){
            $this->load->view('dashboard');
        } else {
            $this->load->view('dashboard');
        }
    }
}
