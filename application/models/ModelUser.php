<?php
class ModelUser extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_user()
    {
        $query = $this->db->get("user");

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function get_user_by_id($id)
    {
        $this->db->where("id", $id);
        $query = $this->db->get("user");
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }

    public function get_user_new()
    {
        $this->db->order_by("id", "DESC");
        $this->db->limit(3);

        $query = $this->db->get("user");

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function get_total_user()
    {
        return $this->db->count_all_results("user");
    }

    // crud

    public function delete_by_id($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }

    public function update_user($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }

    // hotel
    public function get_total_hotels()
    {
        return $this->db->count_all_results('hotels');
    }

    public function get_total_detail_reservasi()
    {
        return $this->db->count_all_results('detail_reservasi');
    }

    public function get_new_reservasi()
    {
        $this->db->select('user.nama, user.image');
        $this->db->from('reservasi');
        $this->db->join('user', 'reservasi.id_user = user.id');
        $this->db->order_by('reservasi.id_reservasi', 'DESC');
        $this->db->limit(3);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }


    public function create_admin($data)
    {
        // melakukan pengecekan ke table admin
        // apa username yg di inpput sudah ada atau belum di db
        $existing_username = $this->db->get_where('admin', array('username' => $data['username']));
        // kondisi ketika ada
        if ($existing_username->num_rows() > 0) {
            return false;
        }

        // ketika data tidak ada ini akan dijalankan
        $hash_password = password_hash($data['password'], PASSWORD_DEFAULT);
        $insert_data = array(
            'username' => $data['username'],
            'password' => $hash_password,
        );

        if ($this->db->insert('admin', $insert_data)) {
            return true;
        } else {
            return false;
        }
    }

    public function create_user($data)
    {
        $existing_username = $this->db->get_where('user', array('username' => $data['username']));

        if ($existing_username->num_rows() > 0) {
            return false;
        }

        $hash_password = password_hash($data['password'], PASSWORD_DEFAULT);
        $insert_data = array(
            'nama' => $data['nama'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => $hash_password,
        );

        if ($this->db->insert('user', $insert_data)) {
            $this->addNotifikasi($data['nama']);
            return true;
        } else {
            return false;
        }
    }

    private function addNotifikasi($nama)
    {
        $this->db->insert('notifikasi', array(
            'username' => $nama,
            'pesan' => 'User baru telah melakukan registrasi dengan nama ' . $nama,
            'waktu' => date('Y-m-d H:i:s'),
            'is_read' => false,
        ));
    }

    public function getInfoUser($id)
    {
        $query = $this->db->get_where('user', array('id' => $id));

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }
}
