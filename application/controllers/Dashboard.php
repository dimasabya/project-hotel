<?php
class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('NotifikasiModel');
    }

    public function index()
    {
        // melakukan pengecekan ketika akan membuka halaman dashboard
        // dimana ketika dalam sesi itu sudah ada data id maka bisa masuk ke dashboard
        // dan ketika tidak ada maka akan dilemar lagi ke halaman login admin
        if (!$this->session->userdata('id')) {
            redirect('admin'); // melemarkan ke controller admin
        } else {

            $data['user'] = $this->ModelUser->get_all_user();
            $data['newUser'] = $this->ModelUser->get_user_new();
            $data['total_user'] = $this->ModelUser->get_total_user();
            $data['total_hotel'] = $this->ModelUser->get_total_hotels();
            $data['hotels'] = $this->ModelHotel->get_all_hotel();
            $data['total_detail_reservasi'] = $this->ModelUser->get_total_detail_reservasi();
            $data['newReservasi'] = $this->ModelUser->get_new_reservasi();
            $data['reservasi'] = $this->ModelHotel->get_reservasi();
            $data['notifikasi'] = $this->NotifikasiModel->get_all_notif();
            $data['countNotif'] = $this->NotifikasiModel->getUnreadCount();

            $id = $this->session->userdata('id');
            $username = $this->session->userdata('username');

            $foto = $this->ModelAdmin->get_admin_foto($id);

            $data['username'] = $username;
            $data['foto'] = $foto;

            $this->load->view('header/header');
            $this->load->view('dashboard/admin-dashboard', $data);
            $this->load->view('footer/footer');
            $this->load->view('create/create');
        }
    }
}
