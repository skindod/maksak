<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class jointBodies_model extends CI_Model
{
    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->load->library(array('session'));
        $this->db = $this->load->database('default',TRUE);
    }

    public function insert($email, $state, $phone)
    {
        $password = $this->randomPassword();
        
        $data = array(
            // 'name' => $name,
            'email' => $email,
            'password' => $password,
            'badan_gabungan_id' => $state,
            'phone' => $phone,
            'status' => 1,
            'role' => 2,
            'created_by' => $_SESSION['userid'],
            'created_date' => date('Y-m-d H:i:s') 
        );

        $this->db->insert('user', $data);
        
        if($this->db->affected_rows() != 1){
            return false;
        } else {
            $to = $email;
            $subject = "Selamat datang ke Sistem MAKSAK";

            $message = "
            <html>
            <head>
            <title>Butiran log masuk anda</title>
            </head>
            <body>
            <br>
            Email : <b><h3>".$email."</h3></b>
                <br>
            Kata laluan : <b><h3>".$password."</h3></b>
            <br>
            </body>
            </html>
            ";

            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            $headers .= 'From: <webmaster@maksak.com>' . "\r\n";
            $headers .= "Reply-To: The Sender <webmaster@maksak.com>\r\n"; 
            $headers .= "Return-Path: webmaster@maksak.com\r\n";

            mail($to,$subject,$message,$headers);
            
            return true;
        }
    }
    
    function email_validation($email)
    {
        $this->db->from('user');
        $this->db->where('email', $email);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function update($status, $id, $name, $email, $state, $phone)
    {
        $this->db->set('name', $name);
        $this->db->set('email', $email);
        $this->db->set('status', $status);
        $this->db->set('badan_gabungan_id', $state);
        $this->db->set('phone', $phone);
        $this->db->set('modified_by', $_SESSION['userid']);
        $this->db->set('modified_date', date('Y-m-d H:i:s'));
        $this->db->where('id', $id);
        $this->db->update('user');
        
        return ($this->db->affected_rows() != 1) ? false : true;
    }
    
    function get_list()
    {
        $this->db->select('user.*');
        $this->db->select('badan_gabungan.name as badan_name');
        $this->db->from('user');
        $this->db->join('badan_gabungan', 'user.badan_gabungan_id = badan_gabungan.id');
        $this->db->where('role', 2);
        $query = $this->db->get();
        return $query->result();
    }
    
    function get_data($id)
    {
        $this->db->from('user');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }
    
    function randomPassword() {
        $alphabet = 'abcdefghjkmnpqrstuvwxyzABCDEFGHJKMNPQRSTUVWXYZ23456789';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 6; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    function get_num_of_events_joined($selected_bg_id, $selected_year)
    {
        $this->db->select('count(distinct e.name) as num_of_events');
        $this->db->from('register r');
        $this->db->join('events e', 'e.id = r.event_id');
        $this->db->join('events_location el', 'el.event_id = e.id');
        $this->db->join('sports s', 's.id = r.sport_id');
        $this->db->where('r.badan_gabungan_id', $selected_bg_id);
        $this->db->where('year(el.date_from)', $selected_year);
        $query = $this->db->get();
        return $query->result();
    }

    function get_num_of_sports_joined($selected_bg_id, $selected_year)
    {
        $this->db->select('count(distinct s.name) as num_of_sports');
        $this->db->from('register r');
        $this->db->join('events e', 'e.id = r.event_id');
        $this->db->join('events_location el', 'el.event_id = e.id');
        $this->db->join('sports s', 's.id = r.sport_id');
        $this->db->where('r.badan_gabungan_id', $selected_bg_id);
        $this->db->where('year(el.date_from)', $selected_year);
        $query = $this->db->get();
        return $query->result();
    }

    function get_num_of_players_joined($selected_bg_id, $selected_year)
    {
        $this->db->select('count(distinct r.player_id) as num_of_players');
        $this->db->from('register r');
        $this->db->join('events e', 'e.id = r.event_id');
        $this->db->join('events_location el', 'el.event_id = e.id');
        $this->db->join('sports s', 's.id = r.sport_id');
        $this->db->where('r.badan_gabungan_id', $selected_bg_id);
        $this->db->where('year(el.date_from)', $selected_year);
        $query = $this->db->get();
        return $query->result();
    }

    function get_total_points($selected_bg_id, $selected_year)
    {
        $this->db->select('sum(p.point) as total_points');
        $this->db->from('events e');
        $this->db->join('result r', 'e.id = r.event_id');
        $this->db->join('points p', 'r.point_id = p.id');
        $this->db->join('events_location el', 'el.event_id = e.id');
        $this->db->where('r.state_id', $selected_bg_id);
        $this->db->where('year(el.date_from)', $selected_year);
        $query = $this->db->get();
        return $query->result();
    }

    function get_list_of_events_joined($selected_bg_id, $selected_year)
    {
        $this->db->select('e.name as event_name,s.name as sport_name, e.id as event_id, s.id as sport_id, DATE_FORMAT(el.date_from, "%d/%m/%y") AS date_from, DATE_FORMAT(el.date_to, "%d/%m/%y") AS date_to');
        $this->db->from('register r');
        $this->db->join('events e', 'e.id = r.event_id');
        $this->db->join('events_location el', 'el.event_id = e.id');
        $this->db->join('sports s', 's.id = r.sport_id');
        $this->db->where('r.badan_gabungan_id', $selected_bg_id);
        $this->db->where('year(el.date_from)', $selected_year);
        $this->db->group_by('1,2,3,4,5,6');
        $this->db->order_by('e.id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    function get_details($selected_bg_id, $selected_year)
    {
        $this->db->select('e.id');
        $this->db->from('events e');
        $this->db->join('result r', 'e.id = r.event_id');
        $this->db->join('points p', 'r.point_id = p.id');
        $this->db->join('events_location el', 'el.event_id = e.id');
        $this->db->where('r.state_id', $selected_bg_id);
        $this->db->where('year(el.date_from)', $selected_year);
        $query = $this->db->get();
        return $query->result();
    }

    function get_players_list_by_sport_event_bg_id($sport_id, $event_id, $bg_id)
    {
        $this->db->select('r.*');
        $this->db->from('register r');
        // $this->db->join('events e', 'e.id = r.event_id');
        // $this->db->join('events_location el', 'el.event_id = e.id');
        // $this->db->join('sports s', 's.id = r.sport_id');
        $this->db->where('r.sport_id', $sport_id);
        $this->db->where('r.event_id', $event_id);
        $this->db->where('r.badan_gabungan_id', $bg_id);
        $this->db->order_by('r.id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    function get_event_by_id($event_id)
    {
        $this->db->select('e.name as event_name');
        $this->db->from('events e');
        $this->db->where('e.id', $event_id);
        $query = $this->db->get();
        return $query->row();
    }

    function get_sport_by_id($sport_id)
    {
        $this->db->select('s.name as sport_name');
        $this->db->from('sports s');
        $this->db->where('s.id', $sport_id);
        $query = $this->db->get();
        return $query->row();
    }
    
}?>