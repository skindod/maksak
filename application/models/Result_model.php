<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class result_model extends CI_Model
{
    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->db = $this->load->database('default',TRUE);
    }
    
    public function get_list_per_sport($event_id)
    {
        $this->db->select('events_sports.sport_id');
        $this->db->select('sports.name');
        $this->db->from('events_sports');
        $this->db->join('sports', 'sports.id = events_sports.sport_id');
        $this->db->where('event_id', $event_id);
        $query = $this->db->get();
        $result = $query->result();
        
        if(count($result) > 0){
            foreach($result as $res){
                $this->db->select('points.name as position');
                $this->db->select('points.point');
                $this->db->select('badan_gabungan.name');
                $this->db->from('result'); 
                $this->db->join('points', 'result.point_id = points.id', 'LEFT');
                $this->db->join('badan_gabungan', 'result.state_id = badan_gabungan.id', 'LEFT');
                $this->db->where('result.event_id', $event_id);
                $this->db->where('result.sport_id', $res->sport_id);
                $this->db->order_by('points.id', 'ASC');
                $query1 = $this->db->get();
                $result1 = $query1->result();
                
                $res->result = $result1;
            }
        }

        return $result;
    }

    public function get_ranking_data($year)
    {
        $this->db->select_sum('points.point');
        $this->db->select('badan_gabungan.name');
        $this->db->from('result'); 
        $this->db->join('events', 'result.event_id = events.id', 'LEFT');
        $this->db->join('events_location', 'events.id = events_location.event_id', 'LEFT');
        $this->db->join('points', 'result.point_id = points.id', 'LEFT');
        $this->db->join('badan_gabungan', 'result.state_id = badan_gabungan.id', 'LEFT');
        $this->db->where('YEAR(events_location.date_from)', $year);
        $this->db->group_by("badan_gabungan.name");
        $this->db->order_by('point', 'DESC');
        $query1 = $this->db->get();
        $result1 = $query1->result();

        
        // $this->db->select('events_sports.sport_id');
        // $this->db->select('sports.name');
        // $this->db->from('events_sports');
        // $this->db->join('sports', 'sports.id = events_sports.sport_id');
        // $this->db->where('event_id', $event_id);
        // $query = $this->db->get();
        // $result = $query->result();
        
        // if(count($result) > 0){
        //     foreach($result as $res){
        //         $this->db->select('points.name as position');
        //         $this->db->select('points.point');
        //         $this->db->select('badan_gabungan.name');
        //         $this->db->from('result'); 
        //         $this->db->join('points', 'result.point_id = points.id', 'LEFT');
        //         $this->db->join('badan_gabungan', 'result.state_id = badan_gabungan.id', 'LEFT');
        //         $this->db->where('result.event_id', $event_id);
        //         $this->db->where('result.sport_id', $res->sport_id);
        //         $this->db->order_by('points.id', 'ASC');
        //         $query1 = $this->db->get();
        //         $result1 = $query1->result();
                
        //         $res->result = $result1;
        //     }
        // }
        
        return $result1;
    }
    
    public function get_list_per_state($event_id)
    {
        $this->db->from('badan_gabungan');
        $query = $this->db->get();
        $states = $query->result();
        
        $return_str = '[';
        $num = 1;
        foreach($states as $state){
            
            $return_str .= '{"RecordID":'.$num.',"body":"MAKSAK '.$state->name.'",';
            $this->db->select('points.name as position');
            $this->db->select('points.point');
            $this->db->select('points.id as point_id');
            $this->db->select('sports.name');
            $this->db->from('result'); 
            $this->db->join('points', 'result.point_id = points.id', 'LEFT');
            $this->db->join('sports', 'result.sport_id = sports.id', 'LEFT');
            $this->db->where('result.event_id', $event_id);
            $this->db->where('result.state_id', $state->id);
            $this->db->order_by('points.id', 'ASC');
            $query1 = $this->db->get();
            $result1 = $query1->result();

            $state->sport_list = array();
            $state->total_points = 0;
            $state->total_players = 0;
            if(count($result1) > 0){
                $total_points = 0;
                foreach($result1 as $res1){
                    $total_points = $total_points + $res1->point;
                }
                $state->total_points = $total_points;
            }
            
            $return_str .= '"totalMarks":"'.$state->total_points.'",';
            $return_str .= '"sportsCount":"'.$state->total_players.'",';
            $return_str .= '"Orders":[';
            if(count($result1) > 0){
                $count = 1;
                foreach($result1 as $res1){
                    $return_str .= '{"sportID":"'.$res1->name.'",';
                    $return_str .= '"sportMarks":"'.$res1->point.'",';
                    $return_str .= '"Status":"'.$res1->point_id.'"}';
                    if($count != count($result1)){
                        $return_str .= ',';
                    }
                    $count++;
                }
                $state->total_points = $total_points;
            } else {
                $return_str .= '{"sportID":"Tiada markah direkodkan buat masa ini.",';
                $return_str .= '"sportMarks":"0",';
                $return_str .= '"Status":"7"}';
            }
            $return_str .= ']}';
            if($num != count($states)){
                $return_str .= ',';
            }
            $num++;
        }
        $return_str .= ']';

        return $return_str;
    }

    public function insert($sport_id, $event_id, $state, $point)
    {
        for($num = 0; $num < count($state); $num++){
            $data = array(
                'event_id' => $event_id,
                'sport_id' => $sport_id,
                'state_id' => $state[$num],
                'point_id' => $point[$num],
                'created_by' => $_SESSION['userid'],
                'created_date' => date('Y-m-d H:i:s')
            );

            $this->db->insert('result', $data);
        }
        
        return;
    }
    
    function get_search_list($event_id, $sport_id)
    {
        $this->db->from('result');
        $this->db->where('event_id', $event_id);
        $this->db->where('sport_id', $sport_id);
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        $result = $query->result();
        
        return $result;
    }
    
    public function update($sport_id, $event_id, $state, $point)
    {
        $this->db->where('event_id', $event_id);
        $this->db->where('sport_id', $sport_id);
        $this->db->delete('result');
        
        for($num = 0; $num < count($state); $num++){
            $data = array(
                'event_id' => $event_id,
                'sport_id' => $sport_id,
                'state_id' => $state[$num],
                'point_id' => $point[$num],
                'created_by' => $_SESSION['userid'],
                'created_date' => date('Y-m-d H:i:s')
            );

            $this->db->insert('result', $data);
        }
        
        return;
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
    
}?>