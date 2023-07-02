<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sports_model extends CI_Model
{
    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->db = $this->load->database('default',TRUE);
    }

    public function insert($name, $description)
    {
        $data = array(
            'name' => $name,
            'description' => $description,
            'created_by' => $_SESSION['userid'],
            'created_date' => date('Y-m-d H:i:s')
        );

        $this->db->insert('sports', $data);
        
        return ($this->db->affected_rows() != 1) ? false : true;
    }
    
    public function update($id, $name, $description)
    {
        $this->db->set('name', $name);
        $this->db->set('description', $description);
        $this->db->set('modified_by', $_SESSION['userid']);
        $this->db->set('modified_date', date('Y-m-d H:i:s'));
        $this->db->where('id', $id);
        $this->db->update('sports');
        
        return ($this->db->affected_rows() != 1) ? false : true;
    }
    
    function get_list()
    {
        $this->db->from('sports');
        $this->db->order_by('name', 'ASC');
        $query = $this->db->get();
        $result = $query->result();
        
        if(count($result) > 0){
            foreach($result as $res){
                $res->total_anjuran = 0;
                
                $this->db->from('events_sports');
                $this->db->where('sport_id', $res->id);
                $query1 = $this->db->get();
                $result1 = $query1->result();
                
                if(count($result1) > 0){
                    $res->total_anjuran = count($result1);
                }
            }
        }
        
        return $result;
    }
    
    function get_data($id)
    {
        $this->db->from('sports');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }
    
    function get_dashboard_data()
    {
        $return = array();

        $this->db->from('sports');
        $query = $this->db->get();
        $return['all'] = $query->num_rows();

        return $return;
    }
}?>