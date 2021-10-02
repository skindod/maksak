<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class events_model extends CI_Model {

    public function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->load->library(array('session'));
        $this->db = $this->load->database('default', TRUE);
    }

    public function insert($name, $email, $state, $phone) {
        $password = $this->randomPassword(); 

        $data = array(
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'state_id' => $state,
            'phone' => $phone,
            'role' => 2,
            'created_by' => $_SESSION['userid'],
            'created_date' => date('Y-m-d H:i:s')
        );

        $this->db->insert('user', $data);

        return ($this->db->affected_rows() != 1) ? false : true;
    }

    function email_validation($email) {
        $this->db->from('user');
        $this->db->where('email', $email);
        $query = $this->db->get();
        return $query->result();
    }

    public function create_event($event_name, $event_description) {

        $filename = '';
        if (isset($_FILES['event_file'])) {
            $check = $_FILES['event_file']['name'];


            if ($check != '') {
                // Loop through each file
                if ($_FILES["event_file"]['name'] != '') {

                    $name = str_replace(' ', '_', $_FILES["event_file"]['name']);
                    $filename = date("Ymdhis") . '_' . $name;

                    $config['upload_path'] = './images/events';
                    $config['allowed_types'] = 'jpg|png';
                    $config['max_size'] = 2000;
                    $config['file_name'] = $filename;

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('event_file')) {
                        $session = array(
                            'msgstatus' => 0,
                            'msg' => $this->upload->display_errors()
                        );
                        $this->session->set_userdata($session);

                        redirect(base_url('events/create'));
                    }
                }
            }
        }

        $data = array(
            'name' => $event_name,
            'image' => $filename,
            'publish_status' => 0,
            'description' => $event_description,
            'created_by' => $_SESSION['userid'],
            'created_date' => date('Y-m-d H:i:s')
        );

        $this->db->insert('events', $data);
        $insert_id = $this->db->insert_id();

        return ($this->db->affected_rows() != 1) ? false : $insert_id;
    }
    
    public function update_event($id, $event_name, $event_description) {

        $filename = '';
        if (isset($_FILES['event_file'])) {
            $check = $_FILES['event_file']['name'];


            if ($check != '') {
                // Loop through each file
                if ($_FILES["event_file"]['name'] != '') {

                    $name = str_replace(' ', '_', $_FILES["event_file"]['name']);
                    $filename = date("Ymdhis") . '_' . $name;

                    $config['upload_path'] = './images/events';
                    $config['allowed_types'] = 'jpg|png';
                    $config['max_size'] = 2000;
                    $config['file_name'] = $filename;

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('event_file')) {
                        $session = array(
                            'msgstatus' => 0,
                            'msg' => $this->upload->display_errors()
                        );
                        $this->session->set_userdata($session);

                        redirect(base_url('events/create'));
                    } else {
                        $this->db->set('image', $filename);
                    }
                }
            }
        }

        $this->db->set('name', $event_name);
        $this->db->set('description', $event_description);
        $this->db->set('modified_by', $_SESSION['userid']);
        $this->db->set('modified_date', date('Y-m-d H:i:s'));
        $this->db->where('id', $id);
        $this->db->update('events');

        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function create_event_location($event_id, $location_name, $url_map, $location_address, $location_state, $location_city, $location_date_range, $last_registration_date) {

        $date_arr = explode("/", $location_date_range);
        
        $last_registration_date = date("Y-m-d", strtotime($last_registration_date));
        
//        $this->db->set('name', $event_name);
//        $this->db->set('description', $event_description);
//        $this->db->set('modified_by', $_SESSION['userid']);
//        $this->db->set('modified_date', date('Y-m-d H:i:s'));
//        $this->db->where('id', $id);
//        $this->db->update('sports');
        
        $data = array(
            'event_id' => $event_id,
            'location_name' => $location_name,
            'url_map' => $url_map,
            'location_address' => $location_address,
            'state_id' => $location_state,
            'city' => $location_city,
            'date_from' => $date_arr[0],
            'date_to' => $date_arr[1],
            'last_registration_date' => $last_registration_date,
            'created_by' => $_SESSION['userid'],
            'created_date' => date('Y-m-d H:i:s')
        );

        $this->db->insert('events_location', $data);

        return ($this->db->affected_rows() != 1) ? true : false;
    }
    
    public function update_event_location($event_id, $location_name, $url_map, $location_address, $location_state, $location_city, $location_date_range, $last_registration_date) {

        $date_arr = explode("/", $location_date_range);
        
        $last_registration_date1 = date("Y-m-d", strtotime($last_registration_date));
//        echo $last_registration_date; die();
        $this->db->set('location_name', $location_name);
        $this->db->set('url_map', $url_map);
        $this->db->set('location_address', $location_address);
        $this->db->set('state_id', $location_state);
        $this->db->set('city', $location_city);
        $this->db->set('date_from', $date_arr[0]);
        $this->db->set('date_to', $date_arr[1]);
        $this->db->set('last_registration_date', $last_registration_date1);
        $this->db->set('modified_by', $_SESSION['userid']);
        $this->db->set('modified_date', date('Y-m-d H:i:s'));
        $this->db->where('event_id', $event_id);
        $this->db->update('events_location');
                

        return ($this->db->affected_rows() != 1) ? true : false;
    }

    public function create_event_sports($event_id, $sports_arr) {

        $sport_id_arr = array();
        foreach ($sports_arr as $sport) {
            $data = array(
                'event_id' => $event_id,
                'sport_id' => $sport['acara'],
                'veteran_age' => $sport['veteran_age'],
                'veteran_num' => $sport['veteran_limit'],
                'male_num' => $sport['male_num'],
                'female_num' => $sport['female_num'],
                'pengurus_num' => $sport['pengurus_num'],
                'jurulatih_num' => $sport['jurulatih_num'],
                'pemain_num' => $sport['pemain_num'],
                'fisio_num' => $sport['fisio_num'],
                'kitman_num' => $sport['kitman_num'],
                'created_by' => $_SESSION['userid'],
                'created_date' => date('Y-m-d H:i:s')
            );

            $this->db->insert('events_sports', $data);
            
            $sport_id_arr[] = $sport['acara'];
        }
        
        if ( count( $sport_id_arr ) !== count( array_unique( $sport_id_arr ) ) ){
            
            $this->db->where('id', $event_id);
            $this->db->delete('events');

            $this->db->where('event_id', $event_id);
            $this->db->delete('events_location');

            $this->db->where('event_id', $event_id);
            $this->db->delete('events_sports');

            return false;
        }
        return true;
    }
    
    public function update_event_sports($event_id, $sports_arr) {
        
        $sport_id_arr = array();
        foreach ($sports_arr as $sport) {
            $sport_id_arr[] = $sport['acara'];
        }
        
        if ( count( $sport_id_arr ) !== count( array_unique( $sport_id_arr ) ) ){
            return false;
        } else {
            $this->db->where('event_id', $event_id);
            $this->db->delete('events_sports');

            foreach ($sports_arr as $sport) {
                $data = array(
                    'event_id' => $event_id,
                    'sport_id' => $sport['acara'],
                    'veteran_age' => $sport['veteran_age'],
                    'veteran_num' => $sport['veteran_limit'],
                    'male_num' => $sport['male_num'],
                    'female_num' => $sport['female_num'],
                    'pengurus_num' => $sport['pengurus_num'],
                    'jurulatih_num' => $sport['jurulatih_num'],
                    'pemain_num' => $sport['pemain_num'],
                    'fisio_num' => $sport['fisio_num'],
                    'kitman_num' => $sport['kitman_num'],
                    'created_by' => $_SESSION['userid'],
                    'created_date' => date('Y-m-d H:i:s')
                );

                $this->db->insert('events_sports', $data);
            }
            return true;
        }
    }

    public function update($id, $name, $email, $state, $phone) {
        $this->db->set('name', $name);
        $this->db->set('email', $email);
        $this->db->set('state_id', $state);
        $this->db->set('phone', $phone);
        $this->db->set('modified_by', $_SESSION['userid']);
        $this->db->set('modified_date', date('Y-m-d H:i:s'));
        $this->db->where('id', $id);
        $this->db->update('user');

        return ($this->db->affected_rows() != 1) ? false : true;
    }
    
    public function update_publish_status($event_id) {
        $this->db->set('publish_status', 1);
        $this->db->where('id', $event_id);
        $this->db->update('events');

        $this->db->from('user');
        $query = $this->db->get();
        $result = $query->result();

        if(count($result) > 0){
            $this->db->from('events');
            $this->db->where('id', $event_id);
            $query1 = $this->db->get();
            $result1 = $query1->result();

            foreach($result as $res){
                $to = $res->email;
                $subject = "MAKSAK : Aktif kejohanan";

                $message = "
                <html>
                <head>
                <title>Aktif Kejohanan</title>
                </head>
                <body>
                <br>
                Kejohanan : <b><h3>" . $result1[0]->name . "</h3></b>
                <br>
                Status : <b><h3 style='color:green;'>Aktif</h3></b>
                <br>
                Pendaftaran pemain boleh dimulakan.
                </body>
                </html>
                ";

                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // More headers
                $headers .= 'From: <webmaster@example.com>' . "\r\n";
                $headers .= "Reply-To: The Sender <webmaster@example.com>\r\n";
                $headers .= "Return-Path: webmaster@example.com\r\n";

                mail($to, $subject, $message, $headers);
            }
        }
        return;
    }
    
    public function update_unpublish_status($event_id, $reason) {
        $this->db->set('publish_status', 2);
        $this->db->set('unpublish_reason', $reason);
        $this->db->where('id', $event_id);
        $this->db->update('events');
        
        $this->db->from('user');
        $query = $this->db->get();
        $result = $query->result();

        if(count($result) > 0){
            $this->db->from('events');
            $this->db->where('id', $event_id);
            $query1 = $this->db->get();
            $result1 = $query1->result();

            foreach($result as $res){
                $to = $res->email;
                $subject = "MAKSAK : Pembatalan kejohanan";

                $message = "
                <html>
                <head>
                <title>Pembatalan Kejohanan</title>
                </head>
                <body>
                <br>
                Kejohanan : <b><h3>" . $result1[0]->name . "</h3></b>
                <br>
                Status : <b><h3 style='color:red;'>Dibatalkan</h3></b>
                <br>
                Sebab : <b><h3>" . $result1[0]->unpublish_reason . "</h3></b>
                </body>
                </html>
                ";

                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // More headers
                $headers .= 'From: <webmaster@example.com>' . "\r\n";
                $headers .= "Reply-To: The Sender <webmaster@example.com>\r\n";
                $headers .= "Return-Path: webmaster@example.com\r\n";

                mail($to, $subject, $message, $headers);
            }
        }
        return;
    }

    function get_list() {
        $this->db->select('events.*');
        $this->db->from('events');
        if($_SESSION['role'] == 2){
            $this->db->where('publish_status', 1);
        }
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        $result = $query->result();
        
        if(count($result) > 0){
            foreach($result as $res){
                $res->location = array();
                $res->sports = array();
                $res->badan_gabungan = array();
                $res->veteran_num = array();
                
                $this->db->select('events_sports.*, sports.*');
                $this->db->from('events_sports');
                $this->db->join('sports', 'events_sports.sport_id = sports.id');
                $this->db->where('events_sports.event_id', $res->id);
                $this->db->order_by('sports.name', 'asc');
                $query1 = $this->db->get();
                $result1 = $query1->result();
                
                if(count($result1) > 0){
                    $res->sports = $result1;
                }
                
                $this->db->distinct();
                $this->db->select('badan_gabungan_id');
                $this->db->from('register');
                $this->db->where('event_id', $res->id);
                $query3 = $this->db->get();
                $result3 = $query3->result();
                
                if(count($result3) > 0){
                    $res->badan_gabungan = $result3;
                }
                
                $this->db->select('id');
                $this->db->from('register');
                $this->db->where('event_id', $res->id);
                $this->db->where('veteran_status', 1);
                $query4 = $this->db->get();
                $result4 = $query4->result();
                
                if(count($result4) > 0){
                    $res->veteran_num = $result4;
                }
                
                $this->db->from('events_location');
                $this->db->where('events_location.event_id', $res->id);
                $query2 = $this->db->get();
                $result2 = $query2->result();
                
                if(count($result2) > 0){
                    $today = date('Y-m-d');
                    $today = date('Y-m-d', strtotime($today));
                    
                    $result2[0]->event_date_status = 'past';
                    if (($today >= $result2[0]->date_from) && ($today <= $result2[0]->date_to)){
                        $result2[0]->event_date_status = 'current';
                    }else if (($today < $result2[0]->date_from) && ($today < $result2[0]->date_to)){
                        $result2[0]->event_date_status = 'coming';
                    }

                    $res->location = $result2;
                }
            }
        }
        
        return $result;
    }
    
    function get_list_for_result_page($id) {
        $this->db->select('events.*');
        $this->db->from('events');
        $this->db->where('id', $id);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        $result = $query->result();
        
        if(count($result) > 0){
            foreach($result as $res){
                $res->location = array();
                $res->sports = array();
                
                $this->db->select('events_sports.*, sports.*');
                $this->db->from('events_sports');
                $this->db->join('sports', 'events_sports.sport_id = sports.id');
                $this->db->where('events_sports.event_id', $res->id);
                $this->db->order_by('sports.name', 'asc');
                $query1 = $this->db->get();
                $result1 = $query1->result();
                
                if(count($result1) > 0){
                    $res->sports = $result1;
                }
                
                $this->db->from('events_location');
                $this->db->where('events_location.event_id', $res->id);
                $query2 = $this->db->get();
                $result2 = $query2->result();
                
                if(count($result2) > 0){
                    $res->location = $result2;
                }
            }
        }
        
        return $result;
    }
    
    function get_current_events() {
        
        $this->db->select('events.*, events_location.date_from, events_location.date_to, events_location.last_registration_date');
        $this->db->from('events');
        $this->db->join('events_location', 'events_location.event_id = events.id');
        $this->db->where('events.publish_status', 1);
        $this->db->order_by('events.id', 'ASC');
        $query = $this->db->get();
        $result = $query->result();
        
        $return = array();
        $return['event_now'] = array();
        $return['event_later'] = array();
        if(count($result) > 0){ 
            foreach($result as $res){
                $today = date('Y-m-d');
                $today = date('Y-m-d', strtotime($today));

                if (($today >= $res->date_from) && ($today <= $res->date_to)){
                    $return['event_now'][] = $res;
                }else if (($today <= $res->date_from) && ($today <= $res->date_to)){
                    $return['event_later'][] = $res;
                }
            }
        }
        

        return $return;
    }

    function get_detail($id) {
        $this->db->from('events');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->result();
        
        $this->db->from('events_location');
        $this->db->where('event_id', $id);
        $query1 = $this->db->get();
        $result['location'] = $query1->result();
        $today = date('Y-m-d');
        $today = date('Y-m-d', strtotime($today));

        if (($today > $result['location'][0]->last_registration_date)){
            $result['location'][0]->closed_registration = true;
        }else{
            $result['location'][0]->closed_registration = false;
        }
        
        $this->db->select('events_sports.*');
        $this->db->select('sports.name as sport_name');
        $this->db->from('events_sports');
        $this->db->join('sports','events_sports.sport_id = sports.id');
        $this->db->where('event_id', $id);
        $query2 = $this->db->get();
        $sport_list = $query2->result();
         
        $result['sports'] = array();
        if(count($sport_list) > 0){
            foreach($sport_list as $sport){
                $this->db->distinct();
                $this->db->select('badan_gabungan_id');
                $this->db->from('register');
                $this->db->where('event_id', $id);
                $this->db->where('sport_id', $sport->id);
                $query2 = $this->db->get();
                $badan_list = $query2->result();
                
                $sport->jumlah_badan_berdaftar = count($badan_list);
                $result['sports'][] = $sport;
            }
        } 
        
        return $result;
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

}

?>