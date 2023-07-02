<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login_model extends CI_Model
{
    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->db = $this->load->database('default', TRUE);
    }

    public function login($email, $password)
    {
        $this->db->from('user');
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $this->db->limit(1);
        
        $query = $this->db->get();
        
        if($query->num_rows() == 1)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }

    public function forgetaccount($email)
    {
        $this->db->from('user');
        $this->db->where('email', $email);
        $this->db->limit(1);
        
        $query = $this->db->get();
        
        if($query->num_rows() == 1)
        {
            $result = $query->result();
        }
        else
        {
            return false;
        }

        $password = $this->randomPassword();

        $data = array(
            'password' => $password
        );

        $this->db->where('email', $email);
        $this->db->update('user', $data);

        $to = $email;
        $subject = "Selamat datang ke Sistem MAKSAK";

        $message = "
        <html>
        <head>
        <title>Lupa kata laluan?</title>
        </head>
        <body>
        Kata laluan baru anda
        <br><br>
        Email : <b><h3>" . $email . "</h3></b>
            <br>
        Kata laluan : <b><h3>" . $password . "</h3></b>
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

        mail($to, $subject, $message, $headers);

        return true;
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