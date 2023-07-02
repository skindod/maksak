<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class grade_model extends CI_Model
{
    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->db = $this->load->database('default',TRUE);
    }
    
    function get_list()
    { 
        $this->db->from('grade');
        $this->db->order_by('name', 'ASC');
        $query = $this->db->get();
        $result = $query->result(); 
        
        return $result;
    }

    function get_by_id($id)
    {
        $this->db->from('grade');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }
    
    function get_data($id)
    {
        $this->db->from('sports');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }
    
}?>