<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class salutations_model extends CI_Model
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
        $this->db->from('salutations');
        $this->db->order_by('name', 'ASC');
        $query = $this->db->get();
        $result = $query->result();
        
        return $result;
    }
    
}?>