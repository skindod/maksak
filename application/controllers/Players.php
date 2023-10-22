<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Players extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->library('form_validation');
        $this->load->helper(array('url'));

        //load the login model
        $this->load->model('players_model');
        $this->load->model('salutations_model');
        $this->load->model('grade_model');
        $this->load->model('badanGabungan_model');
        $this->load->model('logs_model');

        $this->jompay = $this->load->database('default', TRUE);
    }
    
    public function Index()
    {
        if(!isset($_SESSION['login'])){
            redirect(base_url());
        }
        $data = array();
        // $data['players_list'] = $this->players_model->get_latest_players_list();
        
        $this->load->view('players_list', $data);
    }

    public function Create() {
        //set validations
        $this->form_validation->set_rules("ic", "ic", "required");
        $this->form_validation->set_rules("name", "name", "required");
        $this->form_validation->set_rules("kad_kredit", "kad_kredit", "required");
        $this->form_validation->set_rules("pendapatan_bulanan", "pendapatan_bulanan", "required");
        $this->form_validation->set_rules("checked", "checked", "required");

        if ($this->form_validation->run() == FALSE) {
            $data['salutations'] = $this->salutations_model->get_list();
            $data['grades'] = $this->grade_model->get_list();
            $data['badan_gabungan_list'] = $this->badanGabungan_model->get_list();
            $this->load->view('players_create', $data);
        } else {
            //get the posted values
            $ic = $this->input->post("ic");
            $salutations_id = $this->input->post("salutations_id");
            $badan_gabungan_id = $this->input->post("badan_gabungan_id");
            $name = $this->input->post("name");
            $sex = $this->input->post("sex");
            $dob_day = $this->input->post("dob_day");
            $dob_month = $this->input->post("dob_month");
            $dob_year = $this->input->post("dob_year");
            $address = $this->input->post("address");
            $telephone = $this->input->post("telephone");
            $email = $this->input->post("email");
            $grade_id = $this->input->post("grade_id");
            $employer = $this->input->post("employer");
            $occupation = $this->input->post("occupation");
            $state_of_position = $this->input->post("state_of_position");
            $position = $this->input->post("position");
            // $last_vaccine_date = $this->input->post("last_vaccine_date");
            // $vaccine_type = $this->input->post("vaccine_type");
            $last_vaccine_date = '';
            $vaccine_type = '';
            $nhs_id = $this->input->post("nhs_id");
            $handicap_no = $this->input->post("handicap_no");
            $fide_id = $this->input->post("fide_id");
            $tahun_pemain_kebangsaan = $this->input->post("tahun_pemain_kebangsaan");
            $kad_kredit = $this->input->post("kad_kredit");
            $pendapatan_bulanan = $this->input->post("pendapatan_bulanan");

            $request = array(
                'badan_gabungan_id' => $badan_gabungan_id,
                'salutations_id' => $salutations_id,
                'ic' => $ic,
                'name' => $name,
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
                'last_vaccine_date' => $last_vaccine_date,
                'vaccine_type' => $vaccine_type,
                'nhs_id' => $nhs_id,
                'handicap_no' => $handicap_no,
                'fide_id' => $fide_id,
                'tahun_pemain_kebangsaan' => $tahun_pemain_kebangsaan,
                'kad_kredit' => $kad_kredit,
                'pendapatan_bulanan' => $pendapatan_bulanan,
            );

            $result = $this->players_model->insert($ic, $salutations_id, $badan_gabungan_id, $name, $sex, $dob_day, $dob_month, $dob_year, $address, $telephone, $email, $grade_id, $employer, $occupation, $state_of_position, $position, $last_vaccine_date, $vaccine_type, $nhs_id, $handicap_no, $fide_id, $tahun_pemain_kebangsaan, $kad_kredit, $pendapatan_bulanan);

            if ($result != FALSE) {

                $grade = $this->grade_model->get_by_id($grade_id);
                $this->email_create_player($email, $name, $ic, $telephone, $occupation, $grade->name, $employer, $address, $state_of_position, $last_vaccine_date, $vaccine_type,  $nhs_id, $handicap_no, $fide_id);
                if(isset($_SESSION['userid']))
                {
                    $userid = $_SESSION['userid'];
                }
                else
                {
                    $userid = 0;
                }
                $this->logs_model->insert($badan_gabungan_id, 0, 0, $result['player_id'], 'Pemain baru didaftar', $userid, $request, array('Pemain berjaya ditambah.'));
                $session = array(
                    'msgstatus' => 1,
                    'msg' => 'Pemain berjaya ditambah.'
                );
                $this->session->set_userdata($session);

                redirect(base_url('players/create'));
            } else {
                $this->logs_model->insert($badan_gabungan_id, 0, 0, $result['player_id'], 'Pemain baru didaftar', $userid, $request, array('Pemain gagal ditambah.'));
                $session = array(
                    'msgstatus' => 0,
                    'msg' => 'Pemain gagal ditambah.'
                );
                $this->session->set_userdata($session);

                redirect(base_url('players/create'));
            }
        }
    }

    public function Email_create_player($email, $name, $ic, $telephone, $occupation, $grade, $employer, $address, $state_of_position, $last_vaccine_date, $vaccine_type, $nhs_id, $handicap_no, $fide_id)
    {
        $last_vaccine_date = date("d/m/Y", strtotime($last_vaccine_date));
        $to = $email;
        $subject = "MAKSAK : Pendaftaran baru";
        $handicap_string = !empty($nhs_id)?'Ya<br>NHS ID <b>'.$nhs_id.'</b><br>Handicap <b>'.$handicap_no.'</b>':'Tidak<br>';
        $chess_string = !empty($fide_id)?$nhs_id.'<br>':'-<br>';

        $message = '
        <html>
        <head>
        </head>
        <body>
            <div id="content" style="width: 600px; margin: 0 auto; padding: 10px 20px; text-align: center; background-color: #fff";>
                <img src="'.base_url().'asset/assets/media/logos/logo-maksak.png" style="width: 100px; margin: 0 auto;" />
                <h2 style="font-family: sans-serif; font-weight: 300; font-size: 22px; text-align: center; padding-top:20px;">Pendaftaran sebagai pemain telah berjaya!</h2>

                <p style="text-align: center; font-family: sans-serif; font-weight: 300; font-size: 14px; margin-top: 50px; line-height: 1.5;">Hi <strong>'.ucfirst($name).'!</strong>,<br>
                    Pendaftaran anda sebagai pemain dibawah <strong>MAKSAK</strong> telah berjaya. Berikut merupakan butiran yang telah didaftarkan.</p>
                <table style="text-align: left; font-family: sans-serif; font-weight: 300; font-size: 14px; line-height: 1.2; border: 1px solid #f3f3f3; border-radius: 5px; padding: 10px; margin: 0 auto !important;">
                    <tr>
                        <td style="vertical-align: top;">Nama penuh</td>
                        <td style="vertical-align: top;">:</td>
                        <td>'.ucfirst($name).'<br></td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top;">No kad pengenalan</td>
                        <td style="vertical-align: top;">:</td>
                        <td>'.$ic.'<br></td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top;">Alamat email</td>
                        <td style="vertical-align: top;">:</td>
                        <td>'.$email.'<br></td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top;">No telefon</td>
                        <td style="vertical-align: top;">:</td>
                        <td>'.$telephone.'<br></td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top;">Maklumat pekerjaan</td>
                        <td style="vertical-align: top;">:</td>
                        <td>'.$occupation.' ('.$grade.'),<br> <!-- nama jawatan (gred)-->
                            '.ucfirst($employer).',<br><!-- nama majikan -->
                            '.$address.'<br><br>
                            Taraf jawatan : '.ucfirst($state_of_position).'<br>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top;">Maklumat vaksinasi</td>
                        <td style="vertical-align: top;">:</td>
                        <td>Vaksin lengkap - '.ucfirst($vaccine_type).' (Tarikh lengkap: '.$last_vaccine_date.')`   <br></td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top;">Status handicap</td>
                        <td style="vertical-align: top;">:</td>
                        <td>
                            '.$handicap_string.'
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top;">FIDE ID (Chess)</td>
                        <td style="vertical-align: top;">:</td>
                        <td>'.$chess_string.'</td>
                    </tr>
                </table>
            </div>
            <div id="footer" style="width: 600px; margin: 0 auto; background-color: #fff; padding: 10px 20px; text-align: center;">
                <p style="font-size: 10px; font-family: sans-serif;">Email ini merupakan email notifikasi pendaftaran pemain di mgasmeslink.maksak.gov.my. Sila layari laman web <a href="https://maksak.gov.my">MAKSAK</a> untuk maklumat terkini atau hubungi pengurus badan anda untuk sebarang bantuan.</p>
            </div>
        </body>
        </html>
        ';

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <webmaster@example.com>' . "\r\n";
        $headers .= "Reply-To: The Sender <webmaster@example.com>\r\n";
        $headers .= "Return-Path: webmaster@example.com\r\n";

        mail($to, $subject, $message, $headers);
    }
    
    public function Search_player()
    {
        if (!isset($_SESSION['login'])) {
            redirect(base_url());
        }

        $ic = $this->input->post("ic");
        
        $data['player'] = $this->players_model->get_search_list($ic);
        // echo '<pre>'; print_r($data['player']); die();
        // $data['players_list'] = $this->players_model->get_latest_players_list();
        

        $this->load->view('players_list', $data);
    }

    public function Details()
    {
        if (!isset($_SESSION['login'])) {
            redirect(base_url());
        }

        $id = $this->input->get("id");
        
        $data['player'] = $this->players_model->get_by_id($id);
        

        $this->load->view('players_detail', $data);
    }

    public function Update($id) 
    {
        if (!isset($_SESSION['login'])) {
            redirect(base_url());
        }
        
        //set validations
        $this->form_validation->set_rules("ic", "ic", "required");
        $this->form_validation->set_rules("name", "name", "required");
        $this->form_validation->set_rules("kad_kredit", "kad_kredit", "required");
        $this->form_validation->set_rules("pendapatan_bulanan", "pendapatan_bulanan", "required");
        $this->form_validation->set_rules("checked", "checked", "required");

        if ($this->form_validation->run() == FALSE) {
            $data['salutations'] = $this->salutations_model->get_list();
            $data['grades'] = $this->grade_model->get_list();
            $data['player'] = $this->players_model->get_player_data($id);
            $data['badan_gabungan_list'] = $this->badanGabungan_model->get_list();
            $this->load->view('players_update', $data);
        } else {
             //get the posted values
            $ic = $this->input->post("ic");
            $salutations_id = $this->input->post("salutations_id");
            $badan_gabungan_id = $this->input->post("badan_gabungan_id");
            $name = $this->input->post("name");
            $sex = $this->input->post("sex");
            $dob_day = $this->input->post("dob_day");
            $dob_month = $this->input->post("dob_month");
            $dob_year = $this->input->post("dob_year");
            $address = $this->input->post("address");
            $telephone = $this->input->post("telephone");
            $email = $this->input->post("email");
            $grade_id = $this->input->post("grade_id");
            $employer = $this->input->post("employer");
            $occupation = $this->input->post("occupation");
            $state_of_position = $this->input->post("state_of_position");
            $position = $this->input->post("position");
            // $last_vaccine_date = $this->input->post("last_vaccine_date");
            // $vaccine_type = $this->input->post("vaccine_type");
            $last_vaccine_date = '';
            $vaccine_type = '';
            $nhs_id = $this->input->post("nhs_id");
            $handicap_no = $this->input->post("handicap_no");
            $fide_id = $this->input->post("fide_id");
            $tahun_pemain_kebangsaan = $this->input->post("tahun_pemain_kebangsaan");
            $kad_kredit = $this->input->post("kad_kredit");
            $pendapatan_bulanan = $this->input->post("pendapatan_bulanan");

            $request = array(
                'badan_gabungan_id' => $badan_gabungan_id,
                'salutations_id' => $salutations_id,
                'ic' => $ic,
                'name' => $name,
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
                'last_vaccine_date' => $last_vaccine_date,
                'vaccine_type' => $vaccine_type,
                'nhs_id' => $nhs_id,
                'handicap_no' => $handicap_no,
                'fide_id' => $fide_id,
                'tahun_pemain_kebangsaan' => $tahun_pemain_kebangsaan,
                'kad_kredit' => $kad_kredit,
                'pendapatan_bulanan' => $pendapatan_bulanan,
            );

            $result = $this->players_model->update($id, $ic, $salutations_id, $badan_gabungan_id, $name, $sex, $dob_day, $dob_month, $dob_year, $address, $telephone, $email, $grade_id, $employer, $occupation, $state_of_position, $position, $last_vaccine_date, $vaccine_type, $nhs_id, $handicap_no, $fide_id, $tahun_pemain_kebangsaan, $kad_kredit, $pendapatan_bulanan);

            if ($result != FALSE) {
                $this->logs_model->insert($badan_gabungan_id, 0, 0, $id, 'Data pemain ditukar', $_SESSION['userid'], $request, array('Pemain berjaya dikemaskini.'));
                $session = array(
                    'msgstatus' => 1,
                    'msg' => 'Pemain berjaya dikemaskini.'
                );
                $this->session->set_userdata($session);

                redirect(base_url('players/update/'.$id));
            } else {
                $this->logs_model->insert($badan_gabungan_id, 0, 0, $id, 'Data pemain ditukar', $_SESSION['userid'], $request, array('Pemain gagal dikemaskini.'));
                $session = array(
                    'msgstatus' => 0,
                    'msg' => 'Pemain gagal dikemaskini.'
                );
                $this->session->set_userdata($session);

                redirect(base_url('players/update/'.$id));
            }
        }
    }

    public function Check_ic() 
    {
        if(!isset($_POST['ic']) || empty($_POST['ic'])) {
            echo '0';
            exit();
        } else {
            $result = $this->players_model->check_ic($_POST['ic']);
            echo $result;
            exit();
        }
    }

}
