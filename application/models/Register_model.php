<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class register_model extends CI_Model {

    public function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->load->library(array('session'));
        $this->db = $this->load->database('default', TRUE); 
    }

    public function verify($event_id, $state_id, $sport_id, $ic, $jawatan) {
        
        $this->db->from('players');
        $this->db->where('ic', $ic);
        $query = $this->db->get();
        $result = $query->result();

        if(count($result) > 0){
            
            // calculate age
            $d1 = new DateTime($result[0]->dob_year.'-'.$result[0]->dob_month.'-'.$result[0]->dob_day);
            $d2 = new DateTime(date("Y-m-d"));
            $diff = $d2->diff($d1);
            $age = $diff->y;

            // gender = 1 (male), gender = 2 (female)
            $gender = $result[0]->sex;

            // get event sports policy
            $this->db->from('events_sports');
            $this->db->where('event_id', $event_id);
            $this->db->where('sport_id', $sport_id);
            $query = $this->db->get();
            $events_sports = $query->row();

            // check veteran status
            $veteran_status = 1;
            if($age < $events_sports->veteran_age){
                $veteran_status = 0;
            }

            // check veteran/player limit
            if($veteran_status == 1){
                $this->db->from('register');
                $this->db->where('event_id', $event_id);
                $this->db->where('sport_id', $sport_id);
                $this->db->where('badan_gabungan_id', $state_id);
                $this->db->where('veteran_status', 1);
                $query = $this->db->get();
                $veteran_result = $query->result();

                if(count($veteran_result) < $events_sports->veteran_num){
                    $veteran_check = true;

                    // check jawatan limit
                    $this->db->from('register');
                    $this->db->where('event_id', $event_id);
                    $this->db->where('sport_id', $sport_id);
                    $this->db->where('badan_gabungan_id', $state_id);
                    $this->db->where('playing_position', $jawatan);
                    $query = $this->db->get();
                    $jawatan_result = $query->result();

                    $all_check = false;
                    if($jawatan == 'pengurus'){
                        if(count($jawatan_result) < $events_sports->pengurus_num){
                            $all_check = true;
                        } else {
                            return array('status' => false, 'msg' => 'Pengurus sudah mencapai had bagi pasukan ini. Sila daftar pemain lain.');
                        }
                    } else if($jawatan == 'jurulatih'){
                        if(count($jawatan_result) < $events_sports->jurulatih_num){
                            $all_check = true;
                        } else {
                            return array('status' => false, 'msg' => 'Jurulatih sudah mencapai had bagi pasukan ini. Sila daftar pemain lain.');
                        }
                    } else if($jawatan == 'pemain'){
                        if(count($jawatan_result) < $events_sports->pemain_num){
                            // check gender limit
                            $this->db->from('register');
                            $this->db->where('event_id', $event_id);
                            $this->db->where('sport_id', $sport_id);
                            $this->db->where('badan_gabungan_id', $state_id);
                            $this->db->where('sex', $gender);
                            $query = $this->db->get();
                            $gender_result = $query->result();

                            if($gender == 1){
                                if(count($gender_result) < $events_sports->male_num){
                                    $all_check = true;
                                } else {
                                    return array('status' => false, 'msg' => 'Pemain lelaki sudah mencapai had bagi pasukan ini. Sila daftar pemain lain.');
                                }
                            } else {
                                if(count($gender_result) < $events_sports->female_num){
                                    $all_check = true;
                                } else {
                                    return array('status' => false, 'msg' => 'Pemain perempuan sudah mencapai had bagi pasukan ini. Sila daftar pemain lain.');
                                }
                            }
                            $all_check = true;
                        } else {
                            return array('status' => false, 'msg' => 'Pemain sudah mencapai had bagi pasukan ini. Sila daftar pemain lain.');
                        }
                    } else if($jawatan == 'fisio'){
                        if(count($jawatan_result) < $events_sports->fisio_num){
                            $all_check = true;
                        } else {
                            return array('status' => false, 'msg' => 'Fisio sudah mencapai had bagi pasukan ini. Sila daftar pemain lain.');
                        }
                    } else if($jawatan == 'kitman'){
                        if(count($jawatan_result) < $events_sports->kitman_num){
                            $all_check = true;
                        } else {
                            return array('status' => false, 'msg' => 'Kitman sudah mencapai had bagi pasukan ini. Sila daftar pemain lain.');
                        }
                    }

                    if($all_check == true){
                        return array('status' => true, 'msg' => 'veteran_check_true', 'age' => $age);
                    }
                } else {
                    return array('status' => false, 'msg' => 'Pemain veteran sudah mencapai had bagi pasukan ini. Sila daftar pemain lain.'); 
                }
            } else {
                
                // check jawatan limit
                $this->db->from('register');
                $this->db->where('event_id', $event_id);
                $this->db->where('sport_id', $sport_id);
                $this->db->where('badan_gabungan_id', $state_id);
                $this->db->where('playing_position', $jawatan);
                $query = $this->db->get();
                $jawatan_result = $query->result();

                $all_check = false;
                if($jawatan == 'pengurus'){
                    if(count($jawatan_result) < $events_sports->pengurus_num){
                        $all_check = true;
                    } else {
                        return array('status' => false, 'msg' => 'Pengurus sudah mencapai had bagi pasukan ini. Sila daftar pemain lain.');
                    }
                } else if($jawatan == 'jurulatih'){
                    if(count($jawatan_result) < $events_sports->jurulatih_num){
                        $all_check = true;
                    } else {
                        return array('status' => false, 'msg' => 'Jurulatih sudah mencapai had bagi pasukan ini. Sila daftar pemain lain.');
                    }
                } else if($jawatan == 'pemain'){
                    if(count($jawatan_result) < $events_sports->pemain_num){
                        // check gender limit
                        $this->db->from('register');
                        $this->db->where('event_id', $event_id);
                        $this->db->where('sport_id', $sport_id);
                        $this->db->where('badan_gabungan_id', $state_id);
                        $this->db->where('sex', $gender);
                        $query = $this->db->get();
                        $gender_result = $query->result();

                        if($gender == 1){
                            if(count($gender_result) < $events_sports->male_num){
                                $all_check = true;
                            } else {
                                return array('status' => false, 'msg' => 'Pemain lelaki sudah mencapai had bagi pasukan ini. Sila daftar pemain lain.');
                            }
                        } else {
                            if(count($gender_result) < $events_sports->female_num){
                                $all_check = true;
                            } else {
                                return array('status' => false, 'msg' => 'Pemain perempuan sudah mencapai had bagi pasukan ini. Sila daftar pemain lain.');
                            }
                        }
                    } else {
                        return array('status' => false, 'msg' => 'Pemain sudah mencapai had bagi pasukan ini. Sila daftar pemain lain.');
                    }
                } else if($jawatan == 'fisio'){
                    if(count($jawatan_result) < $events_sports->fisio_num){
                        $all_check = true;
                    } else {
                        return array('status' => false, 'msg' => 'Fisio sudah mencapai had bagi pasukan ini. Sila daftar pemain lain.');
                    }
                } else if($jawatan == 'kitman'){
                    if(count($jawatan_result) < $events_sports->kitman_num){
                        $all_check = true;
                    } else {
                        return array('status' => false, 'msg' => 'Kitman sudah mencapai had bagi pasukan ini. Sila daftar pemain lain.');
                    }
                }

                if($all_check == true){
                    return array('status' => true, 'msg' => 'veteran_check_false', 'age' => $age);
                }
            }
        } else {
            return array('status' => false, 'msg' => 'Kad pengenalan tidak dijumpai. Sila daftar dahulu.'); 
        }
    }
    
    public function insert($event_id, $state_id, $sport_id, $ic, $jawatan, $veteran_status, $age) {
        
        if($veteran_status == 'veteran_check_true'){
            $veteran_status = 1;
        } else {
            $veteran_status = 0;
        }
        
        $this->db->from('players');
        $this->db->where('ic', $ic);
        $query = $this->db->get();
        $result = $query->result();
        
        $data = array(
            'event_id' => $event_id,
            'sport_id' => $sport_id,
            'badan_gabungan_id' => $state_id,
            'player_id' => $result[0]->id,
            'age' => $age,
            'sex' => $result[0]->sex,
            'veteran_status' => $veteran_status,
            'playing_position' => $jawatan,
            'ic' => $result[0]->ic,
            'salutations_id' => $result[0]->salutations_id,
            'name' => $result[0]->name,
            'dob_day' => $result[0]->dob_day,
            'dob_month' => $result[0]->dob_month,
            'dob_year' => $result[0]->dob_year,
            'address' => $result[0]->address,
            'telephone' => $result[0]->telephone,
            'email' => $result[0]->email,
            'grade_id' => $result[0]->grade_id,
            'employer' => $result[0]->employer,
            'occupation' => $result[0]->occupation,
            'state_of_position' => $result[0]->state_of_position,
            'registered_position' => $result[0]->position,
            'passport_pic' => $result[0]->passport_pic,
            'sah_surat_pelantikan' => $result[0]->sah_surat_pelantikan,
            'kad_pengenalan' => $result[0]->kad_pengenalan,
            'penyata_gaji' => $result[0]->penyata_gaji,
            'caruman_kwsp' => $result[0]->caruman_kwsp,
            'surat_pengesahan_jabatan' => $result[0]->surat_pengesahan_jabatan,
            'created_by' => $_SESSION['userid'],
            'created_date' => date('Y-m-d H:i:s')
        );

        $this->db->insert('register', $data);

        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function get_search_list($event_id, $name, $state_id, $sport_id, $jawatan, $gender, $veteran_status)
    {
        $this->db->from('badan_gabungan');
        if($state_id != 0){
            $this->db->where('id', $state_id);
        }
        $query = $this->db->get();
        $states = $query->result();
//        echo $sport_id; die();
        foreach($states as $state){
            
            $this->db->select('register.*');
            $this->db->select('sports.name as sport_name');
            $this->db->from('register');
            $this->db->join('sports', 'register.sport_id = sports.id', 'LEFT');
            if($sport_id != '0'){
                $this->db->where('register.sport_id', $sport_id);
            }
            if($jawatan != '0'){
                $this->db->where('register.playing_position', $jawatan);
            }
            if($gender != '0'){
                $this->db->where('register.sex', $gender);
            }
            if($veteran_status != '2'){
                $this->db->where('register.veteran_status', $veteran_status);
            }
            if($name != ''){
                $this->db->like('register.name', $name, 'both');
            }
            $this->db->where('register.event_id', $event_id);
            $this->db->where('register.badan_gabungan_id', $state->id);
            $this->db->order_by('register.sport_id', 'ASC');
            $query1 = $this->db->get();
            $result1 = $query1->result();
//            echo '<pre>'; print_r($this->db->last_query()); die();
            if(count($result1) > 0){
                $state->data_list = $result1;
            }
        }
        
        return $states;
    }
    
    public function get_registered_list($event_id)
    {
        $this->db->select('events_sports.*');
        $this->db->select('sports.name as sport_name');
        $this->db->from('events_sports');
        $this->db->join('sports', 'events_sports.sport_id = sports.id', 'LEFT');
        $this->db->where('event_id', $event_id);
        $query = $this->db->get();
        $sports = $query->result();
        
        foreach($sports as $sport){
            
            $this->db->select('register.*');
            $this->db->select('sports.name as sport_name');
            $this->db->select('badan_gabungan.name as badan_gabungan_name');
            $this->db->from('register');
            $this->db->join('sports', 'register.sport_id = sports.id', 'LEFT');
            $this->db->join('badan_gabungan', 'register.badan_gabungan_id = badan_gabungan.id', 'LEFT');
            if($sport->sport_id != 0){
                $this->db->where('register.sport_id', $sport->sport_id);
            }
            if(isset($_SESSION['badan_gabungan_id']) && $_SESSION['badan_gabungan_id'] != 0){ 
                $this->db->where('register.badan_gabungan_id', $_SESSION['badan_gabungan_id']);
            }
            $this->db->where('register.event_id', $event_id);
            $this->db->order_by('register.badan_gabungan_id', 'ASC');
            $query1 = $this->db->get();
            $result1 = $query1->result();
            if(count($result1) > 0){
                $sport->registered_list = $result1;
            } else {
                $sport->registered_list = array();
            }
        }
//        echo '<pre>'; print_r($sports); die();
        return $sports;
    }
}

?>