<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class badangabungan_model extends CI_Model
{
    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->load->library(array('session'));
        $this->db = $this->load->database('default',TRUE);
    }

    public function insert($name, $email, $state, $phone)
    {
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
            $headers .= 'From: <webmaster@example.com>' . "\r\n";
            $headers .= "Reply-To: The Sender <webmaster@example.com>\r\n"; 
            $headers .= "Return-Path: webmaster@example.com\r\n";

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
    
    public function update($id, $name, $email, $state, $phone)
    {
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
    
    function get_list()
    {
        $this->db->from('badan_gabungan');
        $this->db->order_by('name', 'ASC');
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
    
}?>