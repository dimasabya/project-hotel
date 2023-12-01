<?php
class NotifikasiModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_notif()
    {
        $this->db->where('is_read', false);

        $query = $this->db->get('notifikasi');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function changeIsRead($data)
    {
        $this->db->where('is_read', false);
        $this->db->update('notifikasi', $data);
    }

    public function getUnreadCount()
    {
        $this->db->where('is_read',  false);

        $unReadCount = $this->db->count_all_results('notifikasi');

        // return $unReadCount;
        if ($unReadCount > 0) {
            return $unReadCount;
        } else {
            return false;
        }
    }
}
