<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Events extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->library('form_validation');
        $this->load->helper(array('url'));
        
        //load the login model
        $this->load->model('events_model');
        $this->load->model('state_model');
        $this->load->model('sports_model');
        $this->load->model('register_model');
        $this->load->model('badanGabungan_model');
        $this->load->model('players_model');
        $this->load->model('logs_model');
    }
    
    public function Index()
    {
        $year = $this->input->get('year');
        if(empty($year))
        {
            $year = date('Y');
        }
        $data['events_list'] = $this->events_model->get_list($year);
        $data['selectYear'] = $year;
        
        $this->load->view('events_list', $data);
    }
    
    public function Details($event_id)
    {
        if(!isset($_SESSION['login'])){
            $data['public_mode'] = true;
        }else{
            $data['public_mode'] = false;
        }
        $data['event_details'] = $this->events_model->get_detail($event_id);
        $data['badan_gabungan_list'] = $this->badanGabungan_model->get_list();
        if(isset($_SESSION['badan_gabungan_id']) && $_SESSION['badan_gabungan_id'] != 0){ 
            $data['registered_list'] = $this->register_model->get_registered_list($event_id);
        } else {
            $data['registered_list'] = $this->register_model->get_registered_list($event_id);
        }
        
        $this->load->view('events_detail', $data);
    }

    public function Generate_olahraga_report($event_id)
    {
        $data['event_details'] = $this->events_model->get_detail($event_id);
        $data['report'] = $this->events_model->get_olahraga_report($event_id);
        
        $this->load->view('events_olahraga', $data);
    }
    
    public function Register_player($event_id)
    {
        //set validations
        $this->form_validation->set_rules("sport_id", "sport_id", "required");
        $this->form_validation->set_rules("ic", "ic", "required");
        $this->form_validation->set_rules("jawatan", "jawatan", "required");
        
        if ($this->form_validation->run() == FALSE)
        {
            redirect(base_url('events/details/'.$event_id));
        }
        else
        {
            if (!isset($_SESSION['login'])) {
                redirect(base_url());
            }

            //get the posted values
            if(isset($_SESSION['badan_gabungan_id']) && $_SESSION['badan_gabungan_id'] != 0){ 
                $state_id = $this->input->post("temp_state_id");
            } else {
                $state_id = $this->input->post("state_id");
            }
            $sport_id = $this->input->post("sport_id");
            $ic = $this->input->post("ic");
            $jawatan = $this->input->post("jawatan");
            $request = array(
                'badan_gabungan_id' => $state_id,
                'sport_id' => $sport_id,
                'ic' => $ic,
                'jawatan' => $jawatan,
            );
            
            $result = $this->register_model->verify($event_id, $state_id, $sport_id, $ic, $jawatan);

            if($result['status'] == true){
                $result1 = $this->register_model->insert($event_id, $state_id, $sport_id, $ic, $jawatan, $result['msg'], $result['age']);
                $this->Email_register_player($event_id, $sport_id, $ic, $jawatan, $state_id);
                $this->logs_model->insert($state_id, $event_id, $sport_id, $result1['player_id'], 'Pemain daftar dalam kejohanan', $_SESSION['userid'], $request, array('Pemain berjaya didaftar!'));
                $session = array(
                    'msgstatus'  => 1,
                    'msg'     => 'Pemain berjaya didaftar!'
                );
                $this->session->set_userdata($session);

                redirect(base_url('events/details/'.$event_id));
            } else {
                $this->logs_model->insert($state_id, $event_id, $sport_id, 0, 'Pemain daftar dalam kejohanan', $_SESSION['userid'], $request, array($result['msg']));
                $session = array(
                    'msgstatus'  => 0,
                    'msg'     => $result['msg']
                );
                $this->session->set_userdata($session);

                redirect(base_url('events/details/'.$event_id));
            }
        }
    }

    public function Email_register_player($event_id, $sport_id, $ic, $jawatan, $state_id)
    {
        
        $subject = "MAKSAK : Anda terpilih!";
        $player = $this->players_model->get_by_ic($ic);
        $sport = $this->sports_model->get_data($sport_id);
        $badan_gabungan = $this->badanGabungan_model->get_by_id($state_id);
        $event = $this->events_model->get_by_id($event_id);
        $image_string = !empty($event->image)?'<img src="./images/events/'.$event->image.'" style="width: 100%;"/><br><br>':'<br>';
        $event_location = $this->events_model->get_location_by_id($event_id);
        $date_from = date("d/m/Y", strtotime($event_location->date_from));
        $date_to = date("d/m/Y", strtotime($event_location->date_to));

        $to = $player->email;
        $message = '
        <html>
        <head>
        </head>
        <body>
            <div id="content" style="width: 600px; margin: 0 auto; padding: 10px 20px; text-align: center; background-color: #fff";>
                <img src="'.base_url().'asset/assets/media/logos/logo-maksak.png" style="width: 100px; margin: 0 auto;" />
                <h2 style="font-family: sans-serif; font-weight: 300; font-size: 22px; text-align: center; padding-top:20px;">Anda telah dipilih sebagai pemain!</h2>

                <p style="text-align: center; font-family: sans-serif; font-weight: 300; font-size: 14px; margin-top: 50px; line-height: 1.5;">Hi <strong>
                    '.ucfirst($player->name).'!</strong>,<br>
                    anda telah dipilih sebagai pemain <strong>'.ucfirst($sport->name).'</strong> dibawah <strong>'.$badan_gabungan->name.'</strong>. Berikut merupakan butiran penganjuran.</p>

                <p style="text-align: center; font-family: sans-serif; font-weight: 300; font-size: 14px; margin-top: 20px; line-height: 1.5">
                    '.$image_string.'
                    '.$event->name.'<br>
                    '.$event_location->location_name.'</a><br>
                    '.$date_from.' - '.$date_to.'<br>
                </p>
                
                <p style="text-align: center; font-family: sans-serif; font-weight: 300; font-size: 14px; margin-top: 50px; line-height: 1.5;">Sekiranya terdapat sebarang pertanyaan atau kekeliruan mengenai butiran diatas, sila hubungi pengurus badan anda.</p>
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

    public function Remove_registered_player($event_id, $register_id)
    {
        if (!isset($_SESSION['login'])) {
            redirect(base_url());
        }

        $this->register_model->remove($register_id);
        
        $session = array(
            'msgstatus'  => 1,
            'msg'     => 'Pemain berjaya dibuang!'
        );
        $this->session->set_userdata($session);

        redirect(base_url('events/details/'.$event_id));
    }
    
    public function Search_player($event_id)
    {
        if(!isset($_SESSION['login'])){
            $data['public_mode'] = true;
        }else{
            $data['public_mode'] = false;
        }
         
        $name = $this->input->post("name");
        $state_id = $this->input->post("state_id");
        $sport_id = $this->input->post("sport_id");
        $jawatan = $this->input->post("jawatan");
        $gender = $this->input->post("gender");
        $veteran_status = $this->input->post("veteran_status");
        if(isset($_SESSION['badan_gabungan_id']) && $_SESSION['badan_gabungan_id'] != 0){ 
            $data['registered_list'] = $this->register_model->get_registered_list($event_id);
        } else {
            $data['registered_list'] = $this->register_model->get_registered_list($event_id);
        }
        
        $data['search_list'] = $this->register_model->get_search_list($event_id, $name, $state_id, $sport_id, $jawatan, $gender, $veteran_status);
        $data['search_param']['name'] = $name;
        $data['search_param']['state_id'] = $state_id;
        $data['search_param']['sport_id'] = $sport_id;
        $data['search_param']['jawatan'] = $jawatan;
        $data['search_param']['gender'] = $gender;
        $data['search_param']['veteran_status'] = $veteran_status;
        
        $data['event_details'] = $this->events_model->get_detail($event_id);
        $data['badan_gabungan_list'] = $this->badanGabungan_model->get_list();
        
        $this->load->view('events_detail', $data);
    }

    public function Create()
    {
        if (!isset($_SESSION['login'])) {
            redirect(base_url());
        }

        //set validations
        $this->form_validation->set_rules("event_name", "event_name", "required");
        $this->form_validation->set_rules("location_name", "location_name", "required");
        $this->form_validation->set_rules("location_date_range", "location_date_range", "required");
        
        if ($this->form_validation->run() == FALSE)
        {
            $data['state_list'] = $this->state_model->get_list();
            $data['sports_list'] = $this->sports_model->get_list();
            $this->load->view('events_create', $data);
        }
        else
        {
            //get the posted values
            $event_name = $this->input->post("event_name");
            $event_description = $this->input->post("event_description");
            
            $event_id = $this->events_model->create_event($event_name, $event_description);
            
            if($event_id != false){
                $location_name = $this->input->post("location_name");
                $url_map = $this->input->post("url_map");
                $location_address = $this->input->post("location_address");
                $location_state = $this->input->post("location_state");
                $location_city = $this->input->post("location_city");
                $location_date_range = $this->input->post("location_date_range");
                $last_registration_date = $this->input->post("last_registration_date");

                $this->events_model->create_event_location($event_id, $location_name, $url_map, $location_address, $location_state, $location_city, $location_date_range, $last_registration_date);
                
                $sports_arr = $this->input->post("repeater");
                
                if(count($sports_arr) > 0){
                    $result = $this->events_model->create_event_sports($event_id, $sports_arr);
                    if($result == false){
                        $output = array('status' => 3);
                        echo json_encode($output);
                    } else {
                        $output = array('status' => 1);
                        echo json_encode($output);
                    }
                }
            } else {
                $output = array('status' => 0);
                echo json_encode($output);
            }
        }
    }
    
    public function Update($id)
    {
        if (!isset($_SESSION['login'])) {
            redirect(base_url());
        }

        //set validations
        $this->form_validation->set_rules("event_name", "event_name", "required");
        $this->form_validation->set_rules("location_name", "location_name", "required");
        $this->form_validation->set_rules("location_date_range", "location_date_range", "required");
        
        if ($this->form_validation->run() == FALSE)
        {
            $data['event'] = $this->events_model->get_detail($id);
        //    echo '<pre>';            print_r($data['event']); die();
            $data['state_list'] = $this->state_model->get_list();
            $data['sports_list'] = $this->sports_model->get_list();
            $this->load->view('events_update', $data);
        }
        else
        {
            
            //get the posted values
            $event_name = $this->input->post("event_name");
            $event_description = $this->input->post("event_description");
            
            $event_id = $this->events_model->update_event($id, $event_name, $event_description);
            
            if($event_id != false){
                $location_name = $this->input->post("location_name");
                $url_map = $this->input->post("url_map");
                $location_address = $this->input->post("location_address");
                $location_state = $this->input->post("location_state");
                $location_city = $this->input->post("location_city");
                $location_date_range = $this->input->post("location_date_range");
                $last_registration_date = $this->input->post("last_registration_date");
                
                $this->events_model->update_event_location($id, $location_name, $url_map, $location_address, $location_state, $location_city, $location_date_range, $last_registration_date);
                $sports_arr = $this->input->post("repeater");
                
                if(count($sports_arr) > 0){
                    $result = $this->events_model->update_event_sports($id, $sports_arr);
                    
                    if($result == false){
                        $output = array('status' => 3);
                        echo json_encode($output);
                    } else {
                        $output = array('status' => 2);
                        echo json_encode($output);
                    }
                }
            } else {
                $output = array('status' => 0);
                echo json_encode($output);
            }
        }
    }
    
    public function Publish()
    {
        if (!isset($_SESSION['login'])) {
            redirect(base_url());
        }

        //get the posted values
        $event_id = $this->input->post("event_id");

        $this->events_model->update_publish_status($event_id);
        $current_events = $this->events_model->get_current_events();

        $session = array(
            'msgstatus'         => 1 ,
            'msg'               => 'Event telah diterbitkan.' ,
            'current_events'    => $current_events
        );
        $this->session->set_userdata($session);

        $event_details = $this->events_model->get_detail($event_id);
        $user_list = $this->badanGabungan_model->get_user_list();
        $date_from = date("d/m/Y", strtotime($event_details['location'][0]->date_from));
        $date_to = date("d/m/Y", strtotime($event_details['location'][0]->date_to));
        $date_end = date("d/m/Y", strtotime($event_details['location'][0]->last_registration_date));
        $description_string = !empty($event_details[0]->description)?$event_details[0]->description.'<br><br>':'<br><br>';
        $image_string = !empty($event_details[0]->image)?'<img src="'.base_url().'images/events/'.$event_details[0]->image.'" style="width: 100%;"/><br><br>':'<br><br>';
        $location_string = !empty($event_details['location'][0]->location_address)?$event_details['location'][0]->location_address.'<br>':'<br>';

        $sport_string = '';
        if(count($event_details['sports']) > 0){ 
            foreach($event_details['sports'] as $event_sport){
                $veteran_age_male = ($event_sport->veteran_age_male == 99)?'Tiada':$event_sport->veteran_age_male;
                $veteran_age_female = ($event_sport->veteran_age_female == 99)?'Tiada':$event_sport->veteran_age_female;
                $veteran_num = ($event_sport->veteran_num == 99)?'Tiada':$event_sport->veteran_num;
                $male_num = ($event_sport->male_num == 99)?'Tiada':$event_sport->male_num;
                $female_num = ($event_sport->female_num == 99)?'Tiada':$event_sport->female_num;
                $pengurus_num = ($event_sport->pengurus_num == 99)?'Tiada':$event_sport->pengurus_num;
                $jurulatih_num = ($event_sport->jurulatih_num == 99)?'Tiada':$event_sport->jurulatih_num;
                $pemain_num = ($event_sport->pemain_num == 99)?'Tiada':$event_sport->pemain_num;
                $pemain_kebangsaan_num = ($event_sport->pemain_kebangsaan_num == 99)?'Tiada':$event_sport->pemain_kebangsaan_num;
                $fisio_num = ($event_sport->fisio_num == 99)?'Tiada':$event_sport->fisio_num;
                $kitman_num = ($event_sport->kitman_num == 99)?'Tiada':$event_sport->kitman_num;
                $koreografer_num = ($event_sport->koreografer_num == 99)?'Tiada':$event_sport->koreografer_num;
                
                $sport_string .= '
                <table style="text-align: left; font-family: sans-serif; font-weight: 300; font-size: 14px; line-height: 1.2; border: 1px solid #f3f3f3; border-radius: 5px; padding: 10px; margin: 0 auto !important;">
                    <tr>
                        <td style="vertical-align: top;">Acara</td>
                        <td style="vertical-align: top;">:</td>
                        <td>'.$event_sport->sport_name.'<br></td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top;">Butiran Veteran</td>
                        <td style="vertical-align: top;">:</td>
                        <td>Had umur veteran lelaki - '.$veteran_age_male.'<br>
                            Had umur veteran perempuan - '.$veteran_age_female.'<br>
                            Had bilangan veteran - '.$veteran_num.'<br>
                            <br></td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top;">Butiran Jantina</td>
                        <td style="vertical-align: top;">:</td>
                        <td>Had bilangan lelaki - '.$male_num.'<br>
                            Had bilangan perempuan - '.$female_num.'<br>
                            <br></td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top;">Butiran pasukan</td>
                        <td style="vertical-align: top;">:</td>
                        <td>Had bilangan pengurus - '.$pengurus_num.'<br>
                            Had bilangan jurulatih - '.$jurulatih_num.'<br>
                            Had bilangan pemain - '.$pemain_num.'<br>
                            Had bilangan pemain kebangsaan - '.$pemain_kebangsaan_num.'<br>
                            Had bilangan fisio - '.$fisio_num.'<br>
                            Had bilangan kitman - '.$kitman_num.'<br>
                            Had bilangan koreografer - '.$koreografer_num.'<br>
                            <br></td>
                    </tr>
                </table>';
            }
        }

        if(count($user_list) > 0){
            foreach($user_list as $user_badan){
                //email to all badan gabungan
                $subject = "MAKSAK : Kejohanan baru";
                $to = $user_badan->email;
                
                $message = '
                <html>
                <head>
                </head>
                <body>
                    <div id="content" style="width: 600px; margin: 0 auto; padding: 10px 20px; text-align: center; background-color: #fff";>
                        <img src="'.base_url().'asset/assets/media/logos/logo-maksak.png" style="width: 100px; margin: 0 auto;" />
                        <h2 style="font-family: sans-serif; font-weight: 300; font-size: 22px; text-align: center; padding-top:20px;">Bersiap sedia bagi kejohanan yang akan datang!</h2>

                        <p style="text-align: center; font-family: sans-serif; font-weight: 300; font-size: 14px; margin-top: 50px; line-height: 1.5;">Hi <strong>
                            '.$user_badan->badan_name.'!</strong>,<br>
                            Kejohanan <strong>'.$event_details[0]->name.'</strong> akan dianjurkan pada '.$date_from.' sehingga '.$date_to.'. Kejohanan akan berlangsung di '.$event_details['location'][0]->location_name.', '.$event_details['location'][0]->city.'. Berikut merupakan butiran penganjuran.</p>

                        <p style="text-align: center; font-family: sans-serif; font-weight: 300; font-size: 14px; margin-top: 20px; line-height: 1.5">
                            '.$image_string.'
                            <span style="font-size: 20px">'.$event_details[0]->name.'</span><br>
                            '.$description_string.'
                            '.$event_details['location'][0]->location_name.', '.$event_details['location'][0]->city.'<br>
                            '.$location_string.'
                            '.$date_from.' - '.$date_to.'<br><br>
                            <strong>Tarikh tutup penyertaan</strong> adalah pada<br>
                            '.$date_end.'
                            <br><br>
                            Berikut merupakan butiran acara yang akan dipertandingkan:
                        </p>
                        '.$sport_string.'
                    </div>
                    <div id="footer" style="width: 600px; margin: 0 auto; background-color: #fff; padding: 10px 20px; text-align: center;">
                        <p style="font-size: 10px; font-family: sans-serif;">Email ini merupakan email notifikasi penerbitan kejohanan di mgameslink.maksak.gov.my. Sila layari laman web <a href="https://maksak.gov.my">MAKSAK</a> untuk maklumat terkini.</p>
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

                // mail($to, $subject, $message, $headers);
            }
        }

        redirect(base_url('events/index'));
    }
    
    public function Unpublish()
    {
        if (!isset($_SESSION['login'])) {
            redirect(base_url());
        }
        
        //get the posted values
        $event_id = $this->input->post("event_id");
        $reason = $this->input->post("reason");

        $this->events_model->update_unpublish_status($event_id, $reason);

        $session = array(
            'msgstatus'  => 1,
            'msg'     => 'Event telah dibatalkan.'
        );
        $this->session->set_userdata($session);

        redirect(base_url('events/index'));
    }
}
