<?php
class ModelToken extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function setPasswordResetToken($email, $token, $expired)
    {
        $data = array(
            'email' => $email,
            'token' => $token,
            'expiredAt' => $expired
        );

        $this->db->insert('password_token', $data);
    }

    public function getExpired($email)
    {
        $query = $this->db->get_where('password_token', array('email' => $email));

        return $query->row();
    }
}
