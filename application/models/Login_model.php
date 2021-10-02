<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login_model extends CI_Model
{
    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->db = $this->load->database('default', TRUE);
    }

    public function login($email, $password)
    {
        $this->db->from('user');
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $this->db->limit(1);
        
        $query = $this->db->get();
        
        if($query->num_rows() == 1)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }
}?>