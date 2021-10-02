<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class players_model extends CI_Model
{
    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->db = $this->load->database('default',TRUE);
    }

    public function insert($ic, $salutations_id, $player_name, $sex, $dob_day, $dob_month, $dob_year, $address, $telephone, $email, $grade_id, $employer, $occupation, $state_of_position, $position)
    {
        $passport_pic = '';
        if (isset($_FILES['passport_pic'])) {
            $check = $_FILES['passport_pic']['name'];

            if ($check != '') {
                // Loop through each file
                if ($_FILES["passport_pic"]['name'] != '') {

                    $name = str_replace(' ', '_', $_FILES["passport_pic"]['name']);
                    $passport_pic = date("Ymdhis") . '_' . $name;

                    $config['upload_path'] = './images/passport_pic';
                    $config['allowed_types'] = 'jpg|png|heic|heif|jpeg|JPG|PNG|JPEG';
                    $config['max_size'] = 2000;
                    $config['file_name'] = $passport_pic;

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('passport_pic')) {
                        $session = array(
                            'msgstatus' => 0,
                            'msg' => $this->upload->display_errors()
                        );
                        $this->session->set_userdata($session);

                        redirect(base_url('players/create'));
                    }
                }
            }
        }
        
        $sah_surat_pelantikan = '';
        if (isset($_FILES['sah_surat_pelantikan'])) {
            $check = $_FILES['sah_surat_pelantikan']['name'];

            if ($check != '') {
                // Loop through each file
                if ($_FILES["sah_surat_pelantikan"]['name'] != '') {

                    $name = str_replace(' ', '_', $_FILES["sah_surat_pelantikan"]['name']);
                    $sah_surat_pelantikan = date("Ymdhis") . '_' . $name;

                    $config['upload_path'] = './images/sah_surat_pelantikan';
                    $config['allowed_types'] = 'jpg|png|pdf|heic|heif|jpeg|JPG|PNG|JPEG';
                    $config['max_size'] = 2000;
                    $config['file_name'] = $sah_surat_pelantikan;
                    
                    $this->upload->initialize($config);
                    $this->load->library('upload', $config);
                    
                    if (!$this->upload->do_upload('sah_surat_pelantikan')) {
                        $session = array(
                            'msgstatus' => 0,
                            'msg' => $this->upload->display_errors().' LA1'
                        );
                        $this->session->set_userdata($session);

                        redirect(base_url('players/create'));
                    }
                }
            }
        }
        
        $kad_pengenalan = '';
        if (isset($_FILES['kad_pengenalan'])) {
            $check = $_FILES['kad_pengenalan']['name'];

            if ($check != '') {
                // Loop through each file
                if ($_FILES["kad_pengenalan"]['name'] != '') {

                    $name = str_replace(' ', '_', $_FILES["kad_pengenalan"]['name']);
                    $kad_pengenalan = date("Ymdhis") . '_' . $name;

                    $config['upload_path'] = './images/kad_pengenalan';
                    $config['allowed_types'] = 'jpg|png|pdf|heic|heif|jpeg|JPG|PNG|JPEG';
                    $config['max_size'] = 2000;
                    $config['file_name'] = $kad_pengenalan;

                    $this->upload->initialize($config);
                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('kad_pengenalan')) {
                        $session = array(
                            'msgstatus' => 0,
                            'msg' => $this->upload->display_errors().' LA2'
                        );
                        $this->session->set_userdata($session);

                        redirect(base_url('players/create'));
                    }
                }
            }
        }
        
        $penyata_gaji = '';
        if (isset($_FILES['penyata_gaji'])) {
            $check = $_FILES['penyata_gaji']['name'];

            if ($check != '') {
                // Loop through each file
                if ($_FILES["penyata_gaji"]['name'] != '') {

                    $name = str_replace(' ', '_', $_FILES["penyata_gaji"]['name']);
                    $penyata_gaji = date("Ymdhis") . '_' . $name;

                    $config['upload_path'] = './images/penyata_gaji';
                    $config['allowed_types'] = 'jpg|png|pdf|heic|heif|jpeg|JPG|PNG|JPEG';
                    $config['max_size'] = 2000;
                    $config['file_name'] = $penyata_gaji;

                    $this->upload->initialize($config);
                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('penyata_gaji')) {
                        $session = array(
                            'msgstatus' => 0,
                            'msg' => $this->upload->display_errors().' LA3'
                        );
                        $this->session->set_userdata($session);

                        redirect(base_url('players/create'));
                    }
                }
            }
        }
        
        $caruman_kwsp = '';
        if (isset($_FILES['caruman_kwsp'])) {
            $check = $_FILES['caruman_kwsp']['name'];

            if ($check != '') {
                // Loop through each file
                if ($_FILES["caruman_kwsp"]['name'] != '') {

                    $name = str_replace(' ', '_', $_FILES["caruman_kwsp"]['name']);
                    $caruman_kwsp = date("Ymdhis") . '_' . $name;

                    $config['upload_path'] = './images/caruman_kwsp';
                    $config['allowed_types'] = 'jpg|png|pdf|heic|heif|jpeg|JPG|PNG|JPEG';
                    $config['max_size'] = 2000;
                    $config['file_name'] = $caruman_kwsp;

                    $this->upload->initialize($config);
                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('caruman_kwsp')) {
                        $session = array(
                            'msgstatus' => 0,
                            'msg' => $this->upload->display_errors().' LA4'
                        );
                        $this->session->set_userdata($session);

                        redirect(base_url('players/create'));
                    }
                }
            }
        }
        
        $surat_pengesahan_jabatan = '';
        if (isset($_FILES['surat_pengesahan_jabatan'])) {
            $check = $_FILES['surat_pengesahan_jabatan']['name'];

            if ($check != '') {
                // Loop through each file
                if ($_FILES["surat_pengesahan_jabatan"]['name'] != '') {

                    $name = str_replace(' ', '_', $_FILES["surat_pengesahan_jabatan"]['name']);
                    $surat_pengesahan_jabatan = date("Ymdhis") . '_' . $name;

                    $config['upload_path'] = './images/surat_pengesahan_jabatan';
                    $config['allowed_types'] = 'jpg|png|pdf|heic|heif|jpeg|JPG|PNG|JPEG';
                    $config['max_size'] = 2000;
                    $config['file_name'] = $surat_pengesahan_jabatan;

                    $this->upload->initialize($config);
                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('surat_pengesahan_jabatan')) {
                        $session = array(
                            'msgstatus' => 0,
                            'msg' => $this->upload->display_errors().' LA5'
                        );
                        $this->session->set_userdata($session);

                        redirect(base_url('players/create'));
                    }
                }
            }
        }
        
        $data1 = array(
            'ic' => $ic,
            'salutations_id' => $salutations_id,
            'name' => $player_name,
            'sex' => $sex,
            'dob_day' => $dob_day,
            'dob_month' => $dob_month,
            'dob_year' => $dob_year,
            'address' => $address,
            'telephone' => $telephone,
            'email' => $email,
            'grade_id' => $grade_id,
            'employer' => $employer,
            'occupation' => $occupation,
            'state_of_position' => $state_of_position,
            'position' => $position,
            'passport_pic' => $passport_pic,
            'sah_surat_pelantikan' => $sah_surat_pelantikan,
            'kad_pengenalan' => $kad_pengenalan,
            'penyata_gaji' => $penyata_gaji,
            'caruman_kwsp' => $caruman_kwsp,
            'surat_pengesahan_jabatan' => $surat_pengesahan_jabatan,
            'created_date' => date('Y-m-d H:i:s')
        );
        
        $this->db->insert('players', $data1);
        
        return ($this->db->affected_rows() != 1) ? false : true;
    }
    
    public function update($id, $ic, $salutations_id, $player_name, $sex, $dob_day, $dob_month, $dob_year, $address, $telephone, $email, $grade_id, $employer, $occupation, $state_of_position, $position)
    {
        $data1 = array(
            'ic' => $ic,
            'salutations_id' => $salutations_id,
            'name' => $player_name,
            'sex' => $sex,
            'dob_day' => $dob_day,
            'dob_month' => $dob_month,
            'dob_year' => $dob_year,
            'address' => $address,
            'telephone' => $telephone,
            'email' => $email,
            'grade_id' => $grade_id,
            'employer' => $employer,
            'occupation' => $occupation,
            'state_of_position' => $state_of_position,
            'position' => $position,
            'created_date' => date('Y-m-d H:i:s')
        );
        
        if($state_of_position == '' || $state_of_position == 'tetap'){
            $data1['sah_surat_pelantikan'] = '';
            $data1['kad_pengenalan'] = '';
            $data1['penyata_gaji'] = '';
            $data1['caruman_kwsp'] = '';
            $data1['surat_pengesahan_jabatan'] = '';
        }
        
        $passport_pic = '';
        if (isset($_FILES['passport_pic'])) {
            $check = $_FILES['passport_pic']['name'];

            if ($check != '') {
                // Loop through each file
                if ($_FILES["passport_pic"]['name'] != '') {

                    $name = str_replace(' ', '_', $_FILES["passport_pic"]['name']);
                    $passport_pic = date("Ymdhis") . '_' . $name;

                    $config['upload_path'] = './images/passport_pic';
                    $config['allowed_types'] = 'jpg|png|heic|heif|jpeg|JPG|PNG|JPEG';
                    $config['max_size'] = 2000;
                    $config['file_name'] = $passport_pic;

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('passport_pic')) {
                        $session = array(
                            'msgstatus' => 0,
                            'msg' => $this->upload->display_errors()
                        );
                        $this->session->set_userdata($session);

                        redirect(base_url('players/create'));
                    } else {
                        $data1['passport_pic'] = $passport_pic;
                    }
                }
            }
        }
        
        $sah_surat_pelantikan = '';
        if (isset($_FILES['sah_surat_pelantikan'])) {
            $check = $_FILES['sah_surat_pelantikan']['name'];

            if ($check != '') {
                // Loop through each file
                if ($_FILES["sah_surat_pelantikan"]['name'] != '') {

                    $name = str_replace(' ', '_', $_FILES["sah_surat_pelantikan"]['name']);
                    $sah_surat_pelantikan = date("Ymdhis") . '_' . $name;

                    $config['upload_path'] = './images/sah_surat_pelantikan';
                    $config['allowed_types'] = 'jpg|png|pdf|heic|heif|jpeg|JPG|PNG|JPEG';
                    $config['max_size'] = 2000;
                    $config['file_name'] = $sah_surat_pelantikan;
                    
//                    $this->upload->initialize($config);
                    $this->load->library('upload', $config);
                    
                    if (!$this->upload->do_upload('sah_surat_pelantikan')) {
                        $session = array(
                            'msgstatus' => 0,
                            'msg' => $this->upload->display_errors().' LA1'
                        );
                        $this->session->set_userdata($session);

                        redirect(base_url('players/create'));
                    } else {
                        $data1['sah_surat_pelantikan'] = $sah_surat_pelantikan;
                    }
                }
            }
        }
        
        $kad_pengenalan = '';
        if (isset($_FILES['kad_pengenalan'])) {
            $check = $_FILES['kad_pengenalan']['name'];

            if ($check != '') {
                // Loop through each file
                if ($_FILES["kad_pengenalan"]['name'] != '') {

                    $name = str_replace(' ', '_', $_FILES["kad_pengenalan"]['name']);
                    $kad_pengenalan = date("Ymdhis") . '_' . $name;

                    $config['upload_path'] = './images/kad_pengenalan';
                    $config['allowed_types'] = 'jpg|png|pdf|heic|heif|jpeg|JPG|PNG|JPEG';
                    $config['max_size'] = 2000;
                    $config['file_name'] = $kad_pengenalan;

//                    $this->upload->initialize($config);
                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('kad_pengenalan')) {
                        $session = array(
                            'msgstatus' => 0,
                            'msg' => $this->upload->display_errors().' LA2'
                        );
                        $this->session->set_userdata($session);

                        redirect(base_url('players/create'));
                    } else {
                        $data1['kad_pengenalan'] = $kad_pengenalan;
                    }
                }
            }
        }
        
        $penyata_gaji = '';
        if (isset($_FILES['penyata_gaji'])) {
            $check = $_FILES['penyata_gaji']['name'];

            if ($check != '') {
                // Loop through each file
                if ($_FILES["penyata_gaji"]['name'] != '') {

                    $name = str_replace(' ', '_', $_FILES["penyata_gaji"]['name']);
                    $penyata_gaji = date("Ymdhis") . '_' . $name;

                    $config['upload_path'] = './images/penyata_gaji';
                    $config['allowed_types'] = 'jpg|png|pdf|heic|heif|jpeg|JPG|PNG|JPEG';
                    $config['max_size'] = 2000;
                    $config['file_name'] = $penyata_gaji;

//                    $this->upload->initialize($config);
                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('penyata_gaji')) {
                        $session = array(
                            'msgstatus' => 0,
                            'msg' => $this->upload->display_errors().' LA3'
                        );
                        $this->session->set_userdata($session);

                        redirect(base_url('players/create'));
                    } else {
                        $data1['penyata_gaji'] = $penyata_gaji;
                    }
                }
            }
        }
        
        $caruman_kwsp = '';
        if (isset($_FILES['caruman_kwsp'])) {
            $check = $_FILES['caruman_kwsp']['name'];

            if ($check != '') {
                // Loop through each file
                if ($_FILES["caruman_kwsp"]['name'] != '') {

                    $name = str_replace(' ', '_', $_FILES["caruman_kwsp"]['name']);
                    $caruman_kwsp = date("Ymdhis") . '_' . $name;

                    $config['upload_path'] = './images/caruman_kwsp';
                    $config['allowed_types'] = 'jpg|png|pdf|heic|heif|jpeg|JPG|PNG|JPEG';
                    $config['max_size'] = 2000;
                    $config['file_name'] = $caruman_kwsp;

//                    $this->upload->initialize($config);
                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('caruman_kwsp')) {
                        $session = array(
                            'msgstatus' => 0,
                            'msg' => $this->upload->display_errors().' LA4'
                        );
                        $this->session->set_userdata($session);

                        redirect(base_url('players/create'));
                    } else {
                        $data1['caruman_kwsp'] = $caruman_kwsp;
                    }
                }
            }
        }
        
        $surat_pengesahan_jabatan = '';
        if (isset($_FILES['surat_pengesahan_jabatan'])) {
            $check = $_FILES['surat_pengesahan_jabatan']['name'];

            if ($check != '') {
                // Loop through each file
                if ($_FILES["surat_pengesahan_jabatan"]['name'] != '') {

                    $name = str_replace(' ', '_', $_FILES["surat_pengesahan_jabatan"]['name']);
                    $surat_pengesahan_jabatan = date("Ymdhis") . '_' . $name;

                    $config['upload_path'] = './images/surat_pengesahan_jabatan';
                    $config['allowed_types'] = 'jpg|png|pdf|heic|heif|jpeg|JPG|PNG|JPEG';
                    $config['max_size'] = 2000;
                    $config['file_name'] = $surat_pengesahan_jabatan;

//                    $this->upload->initialize($config);
                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('surat_pengesahan_jabatan')) {
                        $session = array(
                            'msgstatus' => 0,
                            'msg' => $this->upload->display_errors().' LA5'
                        );
                        $this->session->set_userdata($session);

                        redirect(base_url('players/create'));
                    } else {
                        $data1['surat_pengesahan_jabatan'] = $surat_pengesahan_jabatan;
                    }
                }
            }
        }
        
        
        
        $this->db->where('id', $id);
        $this->db->update('players', $data1);
        
        return ($this->db->affected_rows() != 1) ? false : true;
    }
    
    function get_search_list($ic)
    {
        $this->db->from('players');
        $this->db->where('ic', $ic);
        $query = $this->db->get();
        return $query->row();
    }
    
    function get_list()
    {
        $this->db->from('sports');
        $this->db->order_by('name', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }
    
    function get_latest_players_list()
    {
        $this->db->from('players');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(50);
        $query = $this->db->get();
        return $query->result();
    }
    
    function get_player_data($id)
    {
        $this->db->from('players');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }
    
    function check_ic($ic)
    {
        $this->db->from('players');
        $this->db->where('ic', $ic);
        $query = $this->db->get();
        $result = $query->result();
        
        if(count($result) > 0){
            return 0;
        } else {
            return 1;
        }
    }
    
    function get_data($id)
    {
        $this->db->from('sports');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }
    
}?>