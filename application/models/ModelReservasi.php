<?php
class ModelReservasi extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    public function get_reservasi($id)
    {
        $status = 'selesai';

        $this->db->set('status', $status);
        $this->db->where('id_reservasi', $id);
        $query = $this->db->update('detail_reservasi');

        if ($query) {
            return true;
        } else {
            return false;
        }
    }
}
