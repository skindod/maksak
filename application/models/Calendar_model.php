<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class calendar_model extends CI_Model {

    public function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->load->library(array('session'));
        $this->db = $this->load->database('default', TRUE);
        $this->load->model('logs_model');
    }

    // public function insert($name, $email, $state, $phone) {
    //     $password = $this->randomPassword(); 

    //     $data = array(
    //         'name' => $name,
    //         'email' => $email,
    //         'password' => $password,
    //         'state_id' => $state,
    //         'phone' => $phone,
    //         'role' => 2,
    //         'created_by' => $_SESSION['userid'],
    //         'created_date' => date('Y-m-d H:i:s')
    //     );

    //     $this->db->insert('user', $data);

    //     return ($this->db->affected_rows() != 1) ? false : true;
    // }

    function get_list($year = '') {

        $this->db->select('*');
        $this->db->from('calendar');
        if(!empty($year))
        {
            $this->db->where('program_date_from >=', $year.'-01-01');
            $this->db->where('program_date_to <=', $year.'-12-31');
        }
        $this->db->order_by('program_date_from', 'desc');
        $query = $this->db->get();
        $result = $query->result();
        
        return $result;
    }
    
}

?>
