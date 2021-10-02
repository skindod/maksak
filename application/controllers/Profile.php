<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->library('form_validation');
        $this->load->helper(array('url'));
        
        //load the login model
        $this->load->model('profile_model');

        $this->jompay = $this->load->database('default',TRUE);
        
        if(!isset($_SESSION['login'])){
            redirect(base_url());
        }
    }

    public function Index()
    {
        //set validations
        $this->form_validation->set_rules("name", "name", "required");
        $this->form_validation->set_rules("email", "email", "required");

        if ($this->form_validation->run() == FALSE)
        {
            $data['admin'] = $this->profile_model->get_data($_SESSION['userid']);
            $this->load->view('profile', $data);
        }
        else
        {
            //get the posted values
            $name = $this->input->post("name");
            $email = $this->input->post("email");
            
            $result1 = $this->profile_model->email_validation($email);
            
            if(count($result1) == 0){
                $result = $this->profile_model->update($name, $email);

                if($result != FALSE){
                    
                    $session = array(
                        'msgstatus'  => 1,
                        'msg'     => 'Profil berjaya disunting.'
                    );
                    $this->session->set_userdata($session);

                    redirect(base_url('profile/index'));
                } else {
                    $session = array(
                        'msgstatus'  => 0,
                        'msg'     => 'Profil gagal disunting.'
                    );
                    $this->session->set_userdata($session);

                    redirect(base_url('profile/index'));
                }
            } else {
                $session = array(
                    'msgstatus'  => 0,
                    'msg'     => 'Emel pernah didaftar. Emel yang sama tidak boleh digunakan lagi. Sila cuba emel yang lain.'
                );
                $this->session->set_userdata($session);

                redirect(base_url('profile/index'));
            }
        }
    }
    
    public function Update()
    {
        //set validations
        $this->form_validation->set_rules("name", "name", "required");
        $this->form_validation->set_rules("email", "email", "required");

        if ($this->form_validation->run() == FALSE)
        {
            redirect(base_url('profile/index'));
        }
        else
        {
            //get the posted values
            $name = $this->input->post("name");
            $email = $this->input->post("email");
            $phone = $this->input->post("phone");
            $id = $_SESSION['userid'];
            
            $result = $this->profile_model->update($id, $name, $email, $phone);
            
            if($result != FALSE){
                
                $session = array(
                    'msgstatus'  => 1,
                    'msg'     => 'Profil berjaya disunting.'
                );
                $this->session->set_userdata($session);
                
                redirect(base_url('profile/index'));
            } else {
                $session = array(
                    'msgstatus'  => 0,
                    'msg'     => 'Profil gagal disunting.'
                );
                $this->session->set_userdata($session);
                
                redirect(base_url('profile/index'));
            }
        }
    }
}
