<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class logs_model extends CI_Model
{
    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->db = $this->load->database('default', TRUE);
    }

    public function insert($badanGabunganId = 0, $eventsId = 0, $eventsSportsId = 0, $playersId = 0, $description = '', $createdBy = 0, $request = array(), $response = array())
    {
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $data = array(
            'badan_gabungan_id' => $badanGabunganId,
            'events_id' => $eventsId,
            'events_sports_id' => $eventsSportsId,
            'players_id' => $playersId,
            'description' => $description,
            'created_date' => date('Y-m-d H:i:s'),
            'created_by' => $createdBy,
            'request' => json_encode($request),
            'response' => json_encode($response),
        );
        
        $this->db->insert('logs', $data);
        
        return;
    }

    public function get_list()
    {
        $this->db->select('logs.*, badan_gabungan.name as badan_name, events.name as event_name, sports.name as sport_name, players.name as player_name, players.ic as player_ic, user.name as user_name');
        $this->db->from('logs');
        $this->db->join('badan_gabungan', 'logs.badan_gabungan_id = badan_gabungan.id', 'left');
        $this->db->join('events', 'logs.events_id = events.id', 'left');
        $this->db->join('sports', 'logs.events_sports_id = sports.id', 'left');
        $this->db->join('players', 'logs.players_id = players.id', 'left');
        $this->db->join('user', 'logs.created_by = user.id', 'left');
        $this->db->order_by('logs.log_id', 'desc');
        
        $query = $this->db->get();
        return $query->result();
    }
}?>