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

    public function insert($ic, $salutations_id, $badan_gabungan_id, $player_name, $sex, $dob_day, $dob_month, $dob_year, $address, $telephone, $email, $grade_id, $employer, $occupation, $state_of_position, $position, $last_vaccine_date = '', $vaccine_type = '', $nhs_id, $handicap_no, $fide_id, $tahun_pemain_kebangsaan, $kad_kredit, $pendapatan_bulanan)
    {
        // echo '<pre>'; print_r($_FILES); die();
        $vaccine_doc = '';
        if (isset($_FILES['vaccine_doc'])) {
            $check = $_FILES['vaccine_doc']['name'];

            if ($check != '') {
                // Loop through each file
                if ($_FILES["vaccine_doc"]['name'] != '') {

                    $ext = pathinfo($_FILES["vaccine_doc"]['name'], PATHINFO_EXTENSION);
                    if(!in_array(strtolower($ext), ACCEPTABLE_FILE_TYPE) ){
                        $session = array(
                            'msgstatus' => 0,
                            'msg' => 'Gambar vaccine salah format! Sila muatnaik fail format JPG,PNG,JPEG,HEIC,HEIF,PDF sahaja.'
                        );
                        $this->session->set_userdata($session);

                        redirect(base_url('players/create'));
                    }
                    
                    $name = str_replace(' ', '_', $_FILES["vaccine_doc"]['name']);
                    $vaccine_doc = date("Ymdhis") . '_' . $name;

                    $config['upload_path'] = './images/vaccine_doc';
                    $config['allowed_types'] = '*';
                    $config['max_size'] = 2000;
                    $config['file_name'] = $vaccine_doc;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if (!$this->upload->do_upload('vaccine_doc')) {
                        $session = array(
                            'msgstatus' => 0,
                            'msg' => $this->upload->display_errors().' [Fail vaksin]'
                        );
                        $this->session->set_userdata($session);

                        redirect(base_url('players/create'));
                    }
                }
            }
        }

        $passport_pic = '';
        if (isset($_FILES['passport_pic'])) {
            $check = $_FILES['passport_pic']['name'];

            if ($check != '') {
                // Loop through each file
                if ($_FILES["passport_pic"]['name'] != '') {

                    $ext = pathinfo($_FILES["passport_pic"]['name'], PATHINFO_EXTENSION);
                    if(!in_array(strtolower($ext), ACCEPTABLE_FILE_TYPE) ){
                        $session = array(
                            'msgstatus' => 0,
                            'msg' => 'Gambar passport salah format! Sila muatnaik fail format JPG,PNG,JPEG,HEIC,HEIF,PDF sahaja.'
                        );
                        $this->session->set_userdata($session);

                        redirect(base_url('players/create'));
                    }

                    $name = str_replace(' ', '_', $_FILES["passport_pic"]['name']);
                    $passport_pic = date("Ymdhis") . '_' . $name;

                    $config['upload_path'] = './images/passport_pic';
                    $config['allowed_types'] = '*';
                    $config['max_size'] = 2000;
                    $config['file_name'] = $passport_pic;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if (!$this->upload->do_upload('passport_pic')) {
                        $session = array(
                            'msgstatus' => 0,
                            'msg' => $this->upload->display_errors().' [Fail gambar passport]'
                        );
                        $this->session->set_userdata($session);

                        redirect(base_url('players/create'));
                    }
                }
            }
        }

        $surat_pelantikan_terkini = '';
        if (isset($_FILES['surat_pelantikan_terkini'])) {
            $check = $_FILES['surat_pelantikan_terkini']['name'];

            if ($check != '') {
                // Loop through each file
                if ($_FILES["surat_pelantikan_terkini"]['name'] != '') {

                    $ext = pathinfo($_FILES["surat_pelantikan_terkini"]['name'], PATHINFO_EXTENSION);
                    if(!in_array(strtolower($ext), ACCEPTABLE_FILE_TYPE) ){
                        $session = array(
                            'msgstatus' => 0,
                            'msg' => 'Surat pelantikan terkini salah format! Sila muatnaik fail format JPG,PNG,JPEG,HEIC,HEIF,PDF sahaja.'
                        );
                        $this->session->set_userdata($session);

                        redirect(base_url('players/create'));
                    }

                    $name = str_replace(' ', '_', $_FILES["surat_pelantikan_terkini"]['name']);
                    $surat_pelantikan_terkini = date("Ymdhis") . '_' . $name;

                    $config['upload_path'] = './images/surat_pelantikan_terkini';
                    $config['allowed_types'] = '*';
                    $config['max_size'] = 2000;
                    $config['file_name'] = $surat_pelantikan_terkini;
                    
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    
                    if (!$this->upload->do_upload('surat_pelantikan_terkini')) {
                        $session = array(
                            'msgstatus' => 0,
                            'msg' => $this->upload->display_errors().' [Fail surat pelantikan terkini]'
                        );
                        $this->session->set_userdata($session);

                        redirect(base_url('players/create'));
                    }
                }
            }
        }

        $surat_pelantikan_terdahulu = '';
        if (isset($_FILES['surat_pelantikan_terdahulu'])) {
            $check = $_FILES['surat_pelantikan_terdahulu']['name'];

            if ($check != '') {
                // Loop through each file
                if ($_FILES["surat_pelantikan_terdahulu"]['name'] != '') {

                    $ext = pathinfo($_FILES["surat_pelantikan_terdahulu"]['name'], PATHINFO_EXTENSION);
                    if(!in_array(strtolower($ext), ACCEPTABLE_FILE_TYPE) ){
                        $session = array(
                            'msgstatus' => 0,
                            'msg' => 'Surat pelantikan terdahulu salah format! Sila muatnaik fail format JPG,PNG,JPEG,HEIC,HEIF,PDF sahaja.'
                        );
                        $this->session->set_userdata($session);

                        redirect(base_url('players/create'));
                    }

                    $name = str_replace(' ', '_', $_FILES["surat_pelantikan_terdahulu"]['name']);
                    $surat_pelantikan_terdahulu = date("Ymdhis") . '_' . $name;

                    $config['upload_path'] = './images/surat_pelantikan_terdahulu';
                    $config['allowed_types'] = '*';
                    $config['max_size'] = 2000;
                    $config['file_name'] = $surat_pelantikan_terdahulu;
                    
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    
                    if (!$this->upload->do_upload('surat_pelantikan_terdahulu')) {
                        $session = array(
                            'msgstatus' => 0,
                            'msg' => $this->upload->display_errors().' [Fail sah surat pelantikan]'
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

                    $ext = pathinfo($_FILES["sah_surat_pelantikan"]['name'], PATHINFO_EXTENSION);
                    if(!in_array(strtolower($ext), ACCEPTABLE_FILE_TYPE) ){
                        $session = array(
                            'msgstatus' => 0,
                            'msg' => 'Surat pelantikan salah format! Sila muatnaik fail format JPG,PNG,JPEG,HEIC,HEIF,PDF sahaja.'
                        );
                        $this->session->set_userdata($session);

                        redirect(base_url('players/create'));
                    }

                    $name = str_replace(' ', '_', $_FILES["sah_surat_pelantikan"]['name']);
                    $sah_surat_pelantikan = date("Ymdhis") . '_' . $name;

                    $config['upload_path'] = './images/sah_surat_pelantikan';
                    $config['allowed_types'] = '*';
                    $config['max_size'] = 2000;
                    $config['file_name'] = $sah_surat_pelantikan;
                    
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    
                    if (!$this->upload->do_upload('sah_surat_pelantikan')) {
                        $session = array(
                            'msgstatus' => 0,
                            'msg' => $this->upload->display_errors().' [Fail sah surat pelantikan]'
                        );
                        $this->session->set_userdata($session);

                        redirect(base_url('players/create'));
                    }
                }
            }
        }

        $surat_hrmis = '';
        if (isset($_FILES['surat_hrmis'])) {
            $check = $_FILES['surat_hrmis']['name'];

            if ($check != '') {
                // Loop through each file
                if ($_FILES["surat_hrmis"]['name'] != '') {

                    $ext = pathinfo($_FILES["surat_hrmis"]['name'], PATHINFO_EXTENSION);
                    if(!in_array(strtolower($ext), ACCEPTABLE_FILE_TYPE) ){
                        $session = array(
                            'msgstatus' => 0,
                            'msg' => 'Surat hrmis salah format! Sila muatnaik fail format JPG,PNG,JPEG,HEIC,HEIF,PDF sahaja.'
                        );
                        $this->session->set_userdata($session);

                        redirect(base_url('players/create'));
                    }

                    // if($_FILES["surat_hrmis"]['size'] > 2000){
                    //     $session = array(
                    //         'msgstatus' => 0,
                    //         'msg' => $this->upload->display_errors().' Laporan Profil Perkhidmatan Semasa Hrmis lebih dari 2MB! Sila muatnaik fail bawah dari 2MB.'
                    //     );
                    //     $this->session->set_userdata($session);

                    //     redirect(base_url('players/create'));
                    // }

                    $name = str_replace(' ', '_', $_FILES["surat_hrmis"]['name']);
                    $surat_hrmis = date("Ymdhis") . '_' . $name;

                    $config['upload_path'] = './images/surat_hrmis';
                    $config['allowed_types'] = '*';
                    $config['max_size'] = 2000;
                    $config['file_name'] = $surat_hrmis;
                    
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    
                    if (!$this->upload->do_upload('surat_hrmis')) {
                        $session = array(
                            'msgstatus' => 0,
                            'msg' => $this->upload->display_errors().' [Fail surat hrmis]'
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

                    $ext = pathinfo($_FILES["kad_pengenalan"]['name'], PATHINFO_EXTENSION);
                    if(!in_array(strtolower($ext), ACCEPTABLE_FILE_TYPE) ){
                        $session = array(
                            'msgstatus' => 0,
                            'msg' => 'Kad pengenalan salah format! Sila muatnaik fail format JPG,PNG,JPEG,HEIC,HEIF,PDF sahaja.'
                        );
                        $this->session->set_userdata($session);

                        redirect(base_url('players/create'));
                    }

                    $name = str_replace(' ', '_', $_FILES["kad_pengenalan"]['name']);
                    $kad_pengenalan = date("Ymdhis") . '_' . $name;

                    $config['upload_path'] = './images/kad_pengenalan';
                    $config['allowed_types'] = '*';
                    $config['max_size'] = 2000;
                    $config['file_name'] = $kad_pengenalan;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if (!$this->upload->do_upload('kad_pengenalan')) {
                        $session = array(
                            'msgstatus' => 0,
                            'msg' => $this->upload->display_errors().' [Fail kad pengenalan]'
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

                    $ext = pathinfo($_FILES["penyata_gaji"]['name'], PATHINFO_EXTENSION);
                    if(!in_array(strtolower($ext), ACCEPTABLE_FILE_TYPE) ){
                        $session = array(
                            'msgstatus' => 0,
                            'msg' => 'Penyata gaji salah format! Sila muatnaik fail format JPG,PNG,JPEG,HEIC,HEIF,PDF sahaja.'
                        );
                        $this->session->set_userdata($session);

                        redirect(base_url('players/create'));
                    }

                    $name = str_replace(' ', '_', $_FILES["penyata_gaji"]['name']);
                    $penyata_gaji = date("Ymdhis") . '_' . $name;

                    $config['upload_path'] = './images/penyata_gaji';
                    $config['allowed_types'] = '*';
                    $config['max_size'] = 2000;
                    $config['file_name'] = $penyata_gaji;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if (!$this->upload->do_upload('penyata_gaji')) {
                        $session = array(
                            'msgstatus' => 0,
                            'msg' => $this->upload->display_errors().' [Fail penyata gaji]'
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

                    $ext = pathinfo($_FILES["caruman_kwsp"]['name'], PATHINFO_EXTENSION);
                    if(!in_array(strtolower($ext), ACCEPTABLE_FILE_TYPE) ){
                        $session = array(
                            'msgstatus' => 0,
                            'msg' => 'Caruman KWSP salah format! Sila muatnaik fail format JPG,PNG,JPEG,HEIC,HEIF,PDF sahaja.'
                        );
                        $this->session->set_userdata($session);

                        redirect(base_url('players/create'));
                    }

                    $name = str_replace(' ', '_', $_FILES["caruman_kwsp"]['name']);
                    $caruman_kwsp = date("Ymdhis") . '_' . $name;

                    $config['upload_path'] = './images/caruman_kwsp';
                    $config['allowed_types'] = '*';
                    $config['max_size'] = 2000;
                    $config['file_name'] = $caruman_kwsp;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if (!$this->upload->do_upload('caruman_kwsp')) {
                        $session = array(
                            'msgstatus' => 0,
                            'msg' => $this->upload->display_errors().' [Fail caruman KWSP]'
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

                    $ext = pathinfo($_FILES["surat_pengesahan_jabatan"]['name'], PATHINFO_EXTENSION);
                    if(!in_array(strtolower($ext), ACCEPTABLE_FILE_TYPE) ){
                        $session = array(
                            'msgstatus' => 0,
                            'msg' => 'Surat pengesahan jabatan salah format! Sila muatnaik fail format JPG,PNG,JPEG,HEIC,HEIF,PDF sahaja.'
                        );
                        $this->session->set_userdata($session);

                        redirect(base_url('players/create'));
                    }

                    $name = str_replace(' ', '_', $_FILES["surat_pengesahan_jabatan"]['name']);
                    $surat_pengesahan_jabatan = date("Ymdhis") . '_' . $name;

                    $config['upload_path'] = './images/surat_pengesahan_jabatan';
                    $config['allowed_types'] = '*';
                    $config['max_size'] = 2000;
                    $config['file_name'] = $surat_pengesahan_jabatan;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if (!$this->upload->do_upload('surat_pengesahan_jabatan')) {
                        $session = array(
                            'msgstatus' => 0,
                            'msg' => $this->upload->display_errors().' [Fail surat pengesahan jabatan]'
                        );
                        $this->session->set_userdata($session);

                        redirect(base_url('players/create'));
                    }
                }
            }
        }

        // $last_vaccine_date = date("Y-m-d", strtotime($last_vaccine_date));
        
        $data1 = array(
            'ic' => $ic,
            'salutations_id' => $salutations_id,
            'badan_gabungan_id' => $badan_gabungan_id,
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
            'surat_pelantikan_terkini' => $surat_pelantikan_terkini,
            'surat_pelantikan_terdahulu' => $surat_pelantikan_terdahulu,
            'sah_surat_pelantikan' => $sah_surat_pelantikan,
            'surat_hrmis' => $surat_hrmis,
            'kad_pengenalan' => $kad_pengenalan,
            'penyata_gaji' => $penyata_gaji,
            'caruman_kwsp' => $caruman_kwsp,
            'surat_pengesahan_jabatan' => $surat_pengesahan_jabatan,
            'vaccine_doc' => $vaccine_doc,
            // 'last_vaccine_date' => $last_vaccine_date,
            // 'vaccine_type' => $vaccine_type,
            'nhs_id' => $nhs_id,
            'handicap_no' => $handicap_no,
            'fide_id' => $fide_id,
            'tahun_pemain_kebangsaan' => $tahun_pemain_kebangsaan,
            'kad_kredit' => $kad_kredit,
            'pendapatan_bulanan' => $pendapatan_bulanan,
            'created_date' => date('Y-m-d H:i:s')
        );
        // echo '<pre>'; print_r($data1); die();
        $this->db->insert('players', $data1);
        $player_id = $this->db->insert_id();
        
        return array('status' => ($this->db->affected_rows() != 1) ? false : true, 'player_id' => $player_id);
    }
    
    public function update($id, $ic, $salutations_id, $badan_gabungan_id, $player_name, $sex, $dob_day, $dob_month, $dob_year, $address, $telephone, $email, $grade_id, $employer, $occupation, $state_of_position, $position, $last_vaccine_date = '', $vaccine_type = '', $nhs_id, $handicap_no, $fide_id, $tahun_pemain_kebangsaan, $kad_kredit, $pendapatan_bulanan)
    {
        // $last_vaccine_date = date("Y-m-d", strtotime($last_vaccine_date));

        $data1 = array(
            'ic' => $ic,
            'salutations_id' => $salutations_id,
            'badan_gabungan_id' => $badan_gabungan_id,
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
            // 'last_vaccine_date' => $last_vaccine_date,
            // 'vaccine_type' => $vaccine_type,
            'nhs_id' => $nhs_id,
            'handicap_no' => $handicap_no,
            'fide_id' => $fide_id,
            'tahun_pemain_kebangsaan' => $tahun_pemain_kebangsaan,
            'kad_kredit' => $kad_kredit,
            'pendapatan_bulanan' => $pendapatan_bulanan,
            'created_date' => date('Y-m-d H:i:s')
        );
        
        if($state_of_position == '' || $state_of_position == 'tetap'){
            $data1['surat_hrmis'] = '';
            $data1['surat_pelantikan_terkini'] = '';
            $data1['surat_pelantikan_terdahulu'] = '';
            $data1['sah_surat_pelantikan'] = '';
            $data1['kad_pengenalan'] = '';
            $data1['penyata_gaji'] = '';
            $data1['caruman_kwsp'] = '';
            $data1['surat_pengesahan_jabatan'] = '';
        }

        $this->db->where('id', $id);
        $this->db->update('players', $data1);

        $vaccine_doc = '';
        if (isset($_FILES['vaccine_doc'])) {
            $check = $_FILES['vaccine_doc']['name'];

            if ($check != '') {
                // Loop through each file
                if ($_FILES["vaccine_doc"]['name'] != '') {

                    $ext = pathinfo($_FILES["vaccine_doc"]['name'], PATHINFO_EXTENSION);
                    if(!in_array(strtolower($ext), ACCEPTABLE_FILE_TYPE) ){
                        $session = array(
                            'msgstatus' => 0,
                            'msg' => 'Vaccine doc salah format! Sila muatnaik fail format JPG,PNG,JPEG,HEIC,HEIF,PDF sahaja.'
                        );
                        $this->session->set_userdata($session);

                        redirect(base_url('players/update/'.$id));
                    }
                    
                    $name = str_replace(' ', '_', $_FILES["vaccine_doc"]['name']);
                    $vaccine_doc = date("Ymdhis") . '_' . $name;

                    $config['upload_path'] = './images/vaccine_doc';
                    $config['allowed_types'] = '*';
                    $config['max_size'] = 2000;
                    $config['file_name'] = $vaccine_doc;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if (!$this->upload->do_upload('vaccine_doc')) {
                        $session = array(
                            'msgstatus' => 0,
                            'msg' => $this->upload->display_errors().' [Fail vaksin]'
                        );
                        $this->session->set_userdata($session);

                        redirect(base_url('players/update/'.$id));
                    } else {
                        $data1['vaccine_doc'] = $vaccine_doc;
                    }
                }
            }
        }
        
        $passport_pic = '';
        if (isset($_FILES['passport_pic'])) {
            // Loop through each file
            if ($_FILES["passport_pic"]['name'] != '') {

                $ext = pathinfo($_FILES["passport_pic"]['name'], PATHINFO_EXTENSION);
                if(!in_array(strtolower($ext), ACCEPTABLE_FILE_TYPE) ){
                    $session = array(
                        'msgstatus' => 0,
                        'msg' => 'Gambar passport salah format! Sila muatnaik fail format JPG,PNG,JPEG,HEIC,HEIF,PDF sahaja.'
                    );
                    $this->session->set_userdata($session);

                    redirect(base_url('players/update/'.$id));
                }

                $name = str_replace(' ', '_', $_FILES["passport_pic"]['name']);
                $passport_pic = date("Ymdhis") . '_' . $name;

                $config['upload_path'] = './images/passport_pic';
                $config['allowed_types'] = '*';
                $config['max_size'] = 2000;
                $config['file_name'] = $passport_pic;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('passport_pic')) {
                    $session = array(
                        'msgstatus' => 0,
                        'msg' => $this->upload->display_errors().' [Fail gambar passport]'
                    );
                    $this->session->set_userdata($session);

                    redirect(base_url('players/update/'.$id));
                } else {
                    $data1['passport_pic'] = $passport_pic;
                }
            }
        }

        $surat_pelantikan_terkini = '';
        if (isset($_FILES['surat_pelantikan_terkini'])) {
            
            if ($_FILES["surat_pelantikan_terkini"]['name'] != '') {
                
                $ext = pathinfo($_FILES["surat_pelantikan_terkini"]['name'], PATHINFO_EXTENSION);
                if(!in_array(strtolower($ext), ACCEPTABLE_FILE_TYPE) ){
                    $session = array(
                        'msgstatus' => 0,
                        'msg' => 'Surat pelantikan terkini salah format! Sila muatnaik fail format JPG,PNG,JPEG,HEIC,HEIF,PDF sahaja.'
                    );
                    $this->session->set_userdata($session);

                    redirect(base_url('players/update/'.$id));
                }

                $name = str_replace(' ', '_', $_FILES["surat_pelantikan_terkini"]['name']);
                $surat_pelantikan_terkini = date("Ymdhis") . '_' . $name;

                $config['upload_path'] = './images/surat_pelantikan_terkini';
                $config['allowed_types'] = '*';
                $config['max_size'] = 2000;
                $config['file_name'] = $surat_pelantikan_terkini;
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                if (!$this->upload->do_upload('surat_pelantikan_terkini')) {
                    $session = array(
                        'msgstatus' => 0,
                        'msg' => $this->upload->display_errors().' [Fail sah surat pelantikan]'
                    );
                    $this->session->set_userdata($session);

                    redirect(base_url('players/update/'.$id));
                } else {
                    $data1['surat_pelantikan_terkini'] = $surat_pelantikan_terkini;
                }
            }
        }

        $surat_pelantikan_terdahulu = '';
        if (isset($_FILES['surat_pelantikan_terdahulu'])) {
            
            if ($_FILES["surat_pelantikan_terdahulu"]['name'] != '') {
                
                $ext = pathinfo($_FILES["surat_pelantikan_terdahulu"]['name'], PATHINFO_EXTENSION);
                if(!in_array(strtolower($ext), ACCEPTABLE_FILE_TYPE) ){
                    $session = array(
                        'msgstatus' => 0,
                        'msg' => 'Surat pelantikan terdahulu salah format! Sila muatnaik fail format JPG,PNG,JPEG,HEIC,HEIF,PDF sahaja.'
                    );
                    $this->session->set_userdata($session);

                    redirect(base_url('players/update/'.$id));
                }

                $name = str_replace(' ', '_', $_FILES["surat_pelantikan_terdahulu"]['name']);
                $surat_pelantikan_terdahulu = date("Ymdhis") . '_' . $name;

                $config['upload_path'] = './images/surat_pelantikan_terdahulu';
                $config['allowed_types'] = '*';
                $config['max_size'] = 2000;
                $config['file_name'] = $surat_pelantikan_terdahulu;
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                if (!$this->upload->do_upload('surat_pelantikan_terdahulu')) {
                    $session = array(
                        'msgstatus' => 0,
                        'msg' => $this->upload->display_errors().' [Fail sah surat pelantikan]'
                    );
                    $this->session->set_userdata($session);

                    redirect(base_url('players/update/'.$id));
                } else {
                    $data1['surat_pelantikan_terdahulu'] = $surat_pelantikan_terdahulu;
                }
            }
        }
        
        $sah_surat_pelantikan = '';
        if (isset($_FILES['sah_surat_pelantikan'])) {
            
            if ($_FILES["sah_surat_pelantikan"]['name'] != '') {
                
                $ext = pathinfo($_FILES["sah_surat_pelantikan"]['name'], PATHINFO_EXTENSION);
                if(!in_array(strtolower($ext), ACCEPTABLE_FILE_TYPE) ){
                    $session = array(
                        'msgstatus' => 0,
                        'msg' => 'Surat pelantikan salah format! Sila muatnaik fail format JPG,PNG,JPEG,HEIC,HEIF,PDF sahaja.'
                    );
                    $this->session->set_userdata($session);

                    redirect(base_url('players/update/'.$id));
                }
                
                $name = str_replace(' ', '_', $_FILES["sah_surat_pelantikan"]['name']);
                $sah_surat_pelantikan = date("Ymdhis") . '_' . $name;

                $config['upload_path'] = './images/sah_surat_pelantikan';
                $config['allowed_types'] = '*';
                $config['max_size'] = 2000;
                $config['file_name'] = $sah_surat_pelantikan;
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                if (!$this->upload->do_upload('sah_surat_pelantikan')) {
                    $session = array(
                        'msgstatus' => 0,
                        'msg' => $this->upload->display_errors().' [Fail sah surat pelantikan]'
                    );
                    $this->session->set_userdata($session);

                    redirect(base_url('players/update/'.$id));
                } else {
                    $data1['sah_surat_pelantikan'] = $sah_surat_pelantikan;
                }
            }
        }

        $surat_hrmis = '';
        if (isset($_FILES['surat_hrmis'])) {
            $check = $_FILES['surat_hrmis']['name'];

            if ($check != '') {
                // Loop through each file
                if ($_FILES["surat_hrmis"]['name'] != '') {

                    $ext = pathinfo($_FILES["surat_hrmis"]['name'], PATHINFO_EXTENSION);
                    if(!in_array(strtolower($ext), ACCEPTABLE_FILE_TYPE) ){
                        $session = array(
                            'msgstatus' => 0,
                            'msg' => 'Laporan Profil Perkhidmatan Semasa Hrmis salah format! Sila muatnaik fail format JPG,PNG,JPEG,HEIC,HEIF,PDF sahaja.'
                        );
                        $this->session->set_userdata($session);

                        redirect(base_url('players/update/'.$id));
                    }

                    // if($_FILES["surat_hrmis"]['size'] > 2000){
                    //     $session = array(
                    //         'msgstatus' => 0,
                    //         'msg' => 'Laporan Profil Perkhidmatan Semasa Hrmis lebih dari 2MB! Sila muatnaik fail bawah dari 2MB.'
                    //     );
                    //     $this->session->set_userdata($session);

                    //     redirect(base_url('players/update/'.$id));
                    // }

                    $name = str_replace(' ', '_', $_FILES["surat_hrmis"]['name']);
                    $surat_hrmis = date("Ymdhis") . '_' . $name;

                    $config['upload_path'] = './images/surat_hrmis';
                    $config['allowed_types'] = '*';
                    $config['max_size'] = 2000;
                    $config['file_name'] = $surat_hrmis;
                    
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    
                    if (!$this->upload->do_upload('surat_hrmis')) {
                        $session = array(
                            'msgstatus' => 0,
                            'msg' => $this->upload->display_errors().' [Fail surat hrmis]'
                        );
                        $this->session->set_userdata($session);

                        redirect(base_url('players/update/'.$id));
                    } else {
                        $data1['surat_hrmis'] = $surat_hrmis;
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

                    $ext = pathinfo($_FILES["kad_pengenalan"]['name'], PATHINFO_EXTENSION);
                    if(!in_array(strtolower($ext), ACCEPTABLE_FILE_TYPE) ){
                        $session = array(
                            'msgstatus' => 0,
                            'msg' => 'Kad pengenalan salah format! Sila muatnaik fail format JPG,PNG,JPEG,HEIC,HEIF,PDF sahaja.'
                        );
                        $this->session->set_userdata($session);

                        redirect(base_url('players/update/'.$id));
                    }

                    $name = str_replace(' ', '_', $_FILES["kad_pengenalan"]['name']);
                    $kad_pengenalan = date("Ymdhis") . '_' . $name;

                    $config['upload_path'] = './images/kad_pengenalan';
                    $config['allowed_types'] = '*';
                    $config['max_size'] = 2000;
                    $config['file_name'] = $kad_pengenalan;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if (!$this->upload->do_upload('kad_pengenalan')) {
                        $session = array(
                            'msgstatus' => 0,
                            'msg' => $this->upload->display_errors().' [Fail kad pengenalan]'
                        );
                        $this->session->set_userdata($session);

                        redirect(base_url('players/update/'.$id));
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

                    $ext = pathinfo($_FILES["penyata_gaji"]['name'], PATHINFO_EXTENSION);
                    if(!in_array(strtolower($ext), ACCEPTABLE_FILE_TYPE) ){
                        $session = array(
                            'msgstatus' => 0,
                            'msg' => 'Penyata gaji salah format! Sila muatnaik fail format JPG,PNG,JPEG,HEIC,HEIF,PDF sahaja.'
                        );
                        $this->session->set_userdata($session);

                        redirect(base_url('players/update/'.$id));
                    }

                    $name = str_replace(' ', '_', $_FILES["penyata_gaji"]['name']);
                    $penyata_gaji = date("Ymdhis") . '_' . $name;

                    $config['upload_path'] = './images/penyata_gaji';
                    $config['allowed_types'] = '*';
                    $config['max_size'] = 2000;
                    $config['file_name'] = $penyata_gaji;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if (!$this->upload->do_upload('penyata_gaji')) {
                        $session = array(
                            'msgstatus' => 0,
                            'msg' => $this->upload->display_errors().' [Fail penyata gaji]'
                        );
                        $this->session->set_userdata($session);

                        redirect(base_url('players/update/'.$id));
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

                    $ext = pathinfo($_FILES["caruman_kwsp"]['name'], PATHINFO_EXTENSION);
                    if(!in_array(strtolower($ext), ACCEPTABLE_FILE_TYPE) ){
                        $session = array(
                            'msgstatus' => 0,
                            'msg' => 'Caruman KWSP salah format! Sila muatnaik fail format JPG,PNG,JPEG,HEIC,HEIF,PDF sahaja.'
                        );
                        $this->session->set_userdata($session);

                        redirect(base_url('players/update/'.$id));
                    }

                    $name = str_replace(' ', '_', $_FILES["caruman_kwsp"]['name']);
                    $caruman_kwsp = date("Ymdhis") . '_' . $name;

                    $config['upload_path'] = './images/caruman_kwsp';
                    $config['allowed_types'] = '*';
                    $config['max_size'] = 2000;
                    $config['file_name'] = $caruman_kwsp;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if (!$this->upload->do_upload('caruman_kwsp')) {
                        $session = array(
                            'msgstatus' => 0,
                            'msg' => $this->upload->display_errors().' [Fail caruman KWSP]'
                        );
                        $this->session->set_userdata($session);

                        redirect(base_url('players/update/'.$id));
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

                    $ext = pathinfo($_FILES["surat_pengesahan_jabatan"]['name'], PATHINFO_EXTENSION);
                    if(!in_array(strtolower($ext), ACCEPTABLE_FILE_TYPE) ){
                        $session = array(
                            'msgstatus' => 0,
                            'msg' => 'Surat pengesahan jabatan salah format! Sila muatnaik fail format JPG,PNG,JPEG,HEIC,HEIF,PDF sahaja.'
                        );
                        $this->session->set_userdata($session);

                        redirect(base_url('players/update/'.$id));
                    }

                    $name = str_replace(' ', '_', $_FILES["surat_pengesahan_jabatan"]['name']);
                    $surat_pengesahan_jabatan = date("Ymdhis") . '_' . $name;

                    $config['upload_path'] = './images/surat_pengesahan_jabatan';
                    $config['allowed_types'] = '*';
                    $config['max_size'] = 2000;
                    $config['file_name'] = $surat_pengesahan_jabatan;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if (!$this->upload->do_upload('surat_pengesahan_jabatan')) {
                        $session = array(
                            'msgstatus' => 0,
                            'msg' => $this->upload->display_errors().' [Fail surat pengesahan jabatan]'
                        );
                        $this->session->set_userdata($session);

                        redirect(base_url('players/update/'.$id));
                    } else {
                        $data1['surat_pengesahan_jabatan'] = $surat_pengesahan_jabatan;
                    }
                }
            }
        }
        
        $this->db->where('id', $id);
        $this->db->update('players', $data1);
        
        return true;
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
        $this->db->select('players.*, badan_gabungan.name as badan_name');
        $this->db->from('players');
        if($_SESSION['badan_gabungan_id'] != 0){
            $this->db->where('badan_gabungan_id', $_SESSION['badan_gabungan_id']);
        }
        $this->db->join('badan_gabungan', 'players.badan_gabungan_id = badan_gabungan.id');
        $this->db->order_by('name', 'ASC');
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

    function get_by_ic($ic)
    {
        $this->db->from('players');
        $this->db->where('ic', $ic);
        $query = $this->db->get();
        return $query->row();
    }

    function get_by_id($id)
    {
        $this->db->select('players.*, badan_gabungan.name as badan_name, salutations.name as salute_name, grade.name as grade_name');
        $this->db->from('players');
        $this->db->join('badan_gabungan', 'players.badan_gabungan_id = badan_gabungan.id');
        $this->db->join('salutations', 'players.salutations_id = salutations.id');
        $this->db->join('grade', 'players.grade_id = grade.id');
        $this->db->where('players.id', $id);
        $query = $this->db->get();
        return $query->row();
    }
    
    function get_data($id)
    {
        $this->db->from('sports');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    function get_dashboard_data($year)
    {
        $return = array();

        $this->db->from('players');
        $this->db->where('YEAR(created_date) <=', $year);
        $query = $this->db->get();
        $return['all'] = $query->num_rows();

        $this->db->from('players');
        $this->db->where('YEAR(created_date) <=', $year);
        $this->db->where('sex', 1);
        $query = $this->db->get();
        $return['male'] = $query->num_rows();

        $this->db->from('players');
        $this->db->where('YEAR(created_date) <=', $year);
        $this->db->where('sex', 2);
        $query = $this->db->get();
        $return['female'] = $query->num_rows();

        return $return;
    }
    
}?>