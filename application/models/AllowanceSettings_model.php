<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class allowancesettings_model extends CI_Model
{
    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->load->library(array('session'));
        $this->db = $this->load->database('default',TRUE);
    }

    public function insert($year, $mileage_allowance, $food_allowance, $accommodation_allowance)
    {
        $data = array(
            'year' => $year,
            'mileage_allowance' => $mileage_allowance,
            'food_allowance' => $food_allowance,
            'accommodation_allowance' => $accommodation_allowance
        );

        $this->db->insert('allowance_settings', $data);
    }
    
    public function update($year, $mileage_allowance, $food_allowance, $accommodation_allowance)
    {
        $this->db->set('mileage_allowance', $mileage_allowance);
        $this->db->set('food_allowance', $food_allowance);
        $this->db->set('accommodation_allowance', $accommodation_allowance);
        $this->db->where('year', $year);
        $this->db->update('allowance_settings');
        
        return ($this->db->affected_rows() != 1) ? false : true;
    }
    
    function get_by_year($year)
    {
        $this->db->from('allowance_settings');
        $this->db->where('year', $year);
        $query = $this->db->get();
        return $query->row();
    }
    
}?>