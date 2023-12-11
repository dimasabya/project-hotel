<?php
class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelReservasi');
    }


    public function update_reservasi($id)
    {
        if (!$this->session->userdata('id')) {
            redirect('admin');
        }

        $data = $this->ModelReservasi->get_reservasi($id);

        if ($data) {
            $this->session->set_flashdata('success', 'Reservasi berhasil di ubah dengan id' . $id);
            redirect('dashboard');
        } else {
            $this->session->set_flashdata('success', 'Reservasi gagal di ubah dengan id' . $id);
            redirect('dashboard');
        }
    }

    public function delete_transaksi()
    {
        $id = $this->input->get('id');
        $this->ModelHotel->delete_transaksi($id);
        $this->ModelHotel->delete_detail_transaksi($id);

        $this->session->set_flashdata('success', 'Data transaksi berhasik dihapus dengan id ' . $id);
        redirect('dashboard');
    }
}
