<?php
class ModelAdmin extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //function untuk mengecek saat login admin ke table admin
    public function get_admin_by_username($username)
    {
        $this->db->where('username', $username); //query untuk mencari ke kolom username
        $query = $this->db->get('admin'); // query untuk mencari ke table admin

        // pengcekan apa hsail dari get data dari table admin ada datanya dan lebih dari 0
        if ($query->num_rows() > 0) {
            return $query->row(); //mengembalikan nilai dari hasil query
        } else {
            return null; // Username tidak ditemukan
        }
    }

    public function get_admin_by_email($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('admin');

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }

    public function get_admin_foto($id)
    {
        $this->db->select('img');
        $this->db->where('id', $id);
        $query = $this->db->get('admin');

        if ($query->num_rows() > 0) {
            $admin = $query->row();
            return $admin->img; // pengembalian value atau hasil hanya satu dari table admin yaitu hanya kolom img
        } else {
            return null;
        }
    }

    public function changePassword($password)
    {
        $pw = password_hash($password, PASSWORD_DEFAULT);
        $email = $this->session->userdata('userEmail');

        $this->db->set('password', $pw);
        $this->db->where('email', $email);
        $query = $this->db->update('admin');

        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function clearPasswordResetToken($emai)
    {
        $this->db->set('token', null);
        $this->db->set('email', null);
        $this->db->set('expiredAt', null);
        $this->db->where('email', $emai);
        $this->db->update('password_token');
    }

    public function updateIsAvtive($email)
    {
        $this->db->set('isActive', 1);
        $this->db->where('email', $email);
        $this->db->update('admin');
        // $this->db->get_where('admin', array('email' => $email));
    }
}
