<?php
class ModelHotel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_hotel()
    {
        $query = $this->db->get("hotels");

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function create_hotel($data)
    {
        $insert_data = array(
            'nama_hotel' => $data['nama_hotel'],
            'kota' => $data['kota'],
            'desk' => $data['desk'],
        );

        if ($this->db->insert('hotels', $insert_data)) {
            return true;
        } else {
            return false;
        }
    }

    public function get_hotel_by_id($id)
    {
        $query = $this->db->get_where('hotels', array('id_hotel' => $id));

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function update_hotel($id, $data)
    {
        $this->db->where('id_hotel', $id);
        $this->db->update('hotels', $data);
    }

    public function delete_by_id($id)
    {
        $this->db->where('id_hotel', $id);
        $this->db->delete('hotels');
    }

    public function get_reservasi()
    {
        $this->db->select('reservasi.id_reservasi, user.nama, hotels.nama_hotel, kamar.no_kamar, kamar.tipe_kamar, reservasi.tanggal_reservasi, detail_reservasi.tanggal_checkin, detail_reservasi.tanggal_checkout, detail_reservasi.jumlah_orang, detail_reservasi.status');
        $this->db->from('detail_reservasi');
        $this->db->join('reservasi', 'detail_reservasi.id_reservasi = reservasi.id_reservasi');
        $this->db->join('user', 'reservasi.id_user = user.id');
        $this->db->join('hotels', 'reservasi.id_hotel = hotels.id_hotel');
        $this->db->join('kamar', 'detail_reservasi.id_kamar = kamar.id_kamar');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function delete_transaksi($id)
    {
        $this->db->where('id_reservasi', $id);
        $this->db->delete('reservasi');
    }
    public function delete_detail_transaksi($id)
    {
        $this->db->where('id_reservasi', $id);
        $this->db->delete('detail_reservasi');
    }
}
