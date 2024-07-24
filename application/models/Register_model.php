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

    public function remove($register_id) {
        $this->db->where('id', $register_id);
        $this->db->delete('register');
    }

    public function verify($event_id, $state_id, $sport_id, $ic, $jawatan) {
        
        // check ic exist in system
        $this->db->from('players');
        $this->db->where('ic', $ic);
        $query = $this->db->get();
        $result = $query->result();

        if(count($result) == 0 || empty($result)){
            return array('status' => false, 'msg' => 'Kad pengenalan tidak dijumpai. Sila daftar dahulu.');
        }

        // get event sports policy
        $this->db->from('events_sports');
        $this->db->where('event_id', $event_id);
        $this->db->where('sport_id', $sport_id);
        $query = $this->db->get();
        $events_sports = $query->row();

        // variables : calculate age
        $d1 = new DateTime($result[0]->dob_year.'-'.$result[0]->dob_month.'-'.$result[0]->dob_day);
        $d2 = new DateTime(date("Y-12-t"));
        $diff = $d2->diff($d1);
        $age = $diff->y;

        // variables : gender = 1 (male), gender = 2 (female)
        $gender = $result[0]->sex;

        // variables : calculate tahun pemain kebangsaan (-2 years)
        $tahun_pemain_kebangsaan = $result[0]->tahun_pemain_kebangsaan;
        $limit_tahun_pemain_kebangsaan = date('Y') - 2;

        // check veteran status
        $veteran_status = 'veteran_check_true';
        if($gender == 1){
            if($age < $events_sports->veteran_age_male){
                $veteran_status = 'veteran_check_false';
            }
        }else{
            if($age < $events_sports->veteran_age_female){
                $veteran_status = 'veteran_check_false';
            }
        }

        // check jawatan limit
        $this->db->from('register');
        $this->db->where('event_id', $event_id);
        $this->db->where('sport_id', $sport_id);
        $this->db->where('badan_gabungan_id', $state_id);
        $this->db->where('playing_position', $jawatan);
        $query = $this->db->get();
        $jawatan_result = $query->result();
        
        $jawatan_num = $jawatan."_num";
        if($jawatan == 'pemain'){
            
            if(count($jawatan_result) < $events_sports->pemain_num){
                // check kebangsaan limit
                if($tahun_pemain_kebangsaan > (date('Y') -2)){
                    $this->db->from('register');
                    $this->db->where('event_id', $event_id);
                    $this->db->where('sport_id', $sport_id);
                    $this->db->where('badan_gabungan_id', $state_id);
                    $this->db->where('tahun_pemain_kebangsaan >', $limit_tahun_pemain_kebangsaan);
                    $this->db->where('playing_position', $jawatan);
                    $query = $this->db->get();
                    $kebangsaan_result = $query->result();

                    if(count($kebangsaan_result) >= $events_sports->pemain_kebangsaan_num){
                        return array('status' => false, 'msg' => 'Pemain kebangsaan sudah mencapai had bagi pasukan ini. Sila cuba lagi.');
                    }
                }

                // check gender limit
                $this->db->from('register');
                $this->db->where('event_id', $event_id);
                $this->db->where('sport_id', $sport_id);
                $this->db->where('badan_gabungan_id', $state_id);
                $this->db->where('sex', $gender);
                $this->db->where('playing_position', $jawatan);
                $query = $this->db->get();
                $gender_result = $query->result();

                if($gender == 1){
                    if(count($gender_result) >= $events_sports->male_num){
                        return array('status' => false, 'msg' => 'Pemain lelaki sudah mencapai had bagi pasukan ini. Sila cuba lagi.');
                    }
                } else {
                    if(count($gender_result) >= $events_sports->female_num){
                        return array('status' => false, 'msg' => 'Pemain perempuan sudah mencapai had bagi pasukan ini. Sila cuba lagi.');
                    }
                }
                
            } else {
                return array('status' => false, 'msg' => 'Pemain sudah mencapai had bagi pasukan ini. Sila cuba lagi.');
            }
        } else if(count($jawatan_result) >= $events_sports->$jawatan_num){
            return array('status' => false, 'msg' => ucfirst($jawatan).' sudah mencapai had bagi pasukan ini. Sila cuba lagi.');
        }

        return array('status' => true, 'msg' => $veteran_status, 'age' => $age);
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
            'surat_hrmis' => $result[0]->surat_hrmis,
            'surat_pelantikan_terkini' => $result[0]->surat_pelantikan_terkini,
            'surat_pelantikan_terdahulu' => $result[0]->surat_pelantikan_terdahulu,
            'kad_pengenalan' => $result[0]->kad_pengenalan,
            'penyata_gaji' => $result[0]->penyata_gaji,
            'caruman_kwsp' => $result[0]->caruman_kwsp,
            'surat_pengesahan_jabatan' => $result[0]->surat_pengesahan_jabatan,
            'tahun_pemain_kebangsaan' => $result[0]->tahun_pemain_kebangsaan,
            'created_by' => $_SESSION['userid'],
            'created_date' => date('Y-m-d H:i:s')
        );

        $this->db->insert('register', $data);

        return array('status' => ($this->db->affected_rows() != 1) ? false : true, 'player_id' => $result[0]->id);
    }

    public function get_search_list($event_id, $name, $state_id, $sport_id, $jawatan, $gender, $veteran_status)
    {
        $this->db->from('badan_gabungan');
        if($state_id != 0){
            $this->db->where('id', $state_id);
        }
        $query = $this->db->get();
        $states = $query->result();

        foreach($states as $state){
            $this->db->select('players.name, register.playing_position, register.age, register.sex, register.player_id, register.veteran_status, register.state_of_position, players.passport_pic, players.surat_pengesahan_jabatan, players.sah_surat_pelantikan, players.kad_pengenalan, players.penyata_gaji, players.caruman_kwsp, players.surat_hrmis, players.surat_pelantikan_terdahulu, players.surat_pelantikan_terkini');
            $this->db->join('players', 'register.player_id = players.id', 'LEFT');
            $this->db->from('register');
            if($sport_id != '0'){
                $this->db->select('register.sport_id');
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
            if($sport_id != '0'){
                $this->db->order_by('register.sport_id', 'ASC');
            }
            $this->db->distinct('register.player_id');
            $query1 = $this->db->get();
            $result1 = $query1->result();
           
            if(count($result1) > 0){
                foreach($result1 as $res){
                    $this->db->select('sports.name as sport_name');
                    $this->db->from('register');
                    $this->db->join('sports', 'register.sport_id = sports.id', 'LEFT');
                    if($sport_id != '0'){
                        $this->db->where('register.sport_id', $sport_id);
                    }
                    $this->db->where('register.player_id', $res->player_id);
                    $this->db->where('register.event_id', $event_id);
                    $query2 = $this->db->get();
                    $result2 = $query2->result();
                    $res->sports = $query2->result();
                }
                
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
            
            $this->db->select('register.id, register.player_id, register.name, register.playing_position, register.age, register.veteran_status, register.sex, players.state_of_position, register.ic');
            $this->db->select('sports.name as sport_name');
            $this->db->select('badan_gabungan.name as badan_gabungan_name');
            $this->db->select('players.handicap_no');
            $this->db->select('players.fide_id');
            $this->db->select('players.nhs_id');
            $this->db->select('players.passport_pic, players.surat_pengesahan_jabatan, players.sah_surat_pelantikan, players.kad_pengenalan, players.penyata_gaji, players.caruman_kwsp, players.surat_hrmis, players.surat_pelantikan_terdahulu, players.surat_pelantikan_terkini');
            $this->db->from('register');
            $this->db->join('players', 'register.player_id = players.id');
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
        
        return $sports;
    }
}

?>