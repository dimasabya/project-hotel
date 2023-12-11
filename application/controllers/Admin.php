<?php
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('ModelAdmin');
        $this->load->model('ModelUser');
        $this->load->model('ModelToken');
    }

    public function index()
    {
        if ($this->session->userdata('id')) {
            redirect('dashboard');
        }
        $this->load->view('login/admin-login');
    }

    // proses login untuk admin

    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('username');
        redirect('admin');
    }

    // create admin
    public function create_admin()
    {
        $this->form_validation->set_rules(
            'username',
            'Username',
            'min_length[3]',
            ['min_length' => 'Minimal username harus 3']
        );
        $this->form_validation->set_rules(
            'email',
            'Emil',
            'min_length[3]',
            ['min_length' => 'Minimal email harus 3']
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'min_length[3]',
            ['min_length' => 'Minamal password harus 3']
        );

        if ($this->form_validation->run() == FALSE) {
            redirect('dashboard');
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
            );

            $result = $this->ModelUser->create_admin($data);
            if ($result) {
                $this->session->set_flashdata('success', 'Data Admin Berhasil Di Tambahkan');
            } else {
                $this->session->set_flashdata('error', 'Data Gagal di Tambahkan');
            }
            redirect('dashboard');
        }
    }

    public function create_user()
    {
        $this->form_validation->set_rules(
            'username',
            'Username',
            'min_length[3]',
            ['min_length' => 'Username Minimal 3 huruf']
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'min_length[3]',
            ['min_length' => 'Password minimal 3 huruf']
        );

        if ($this->form_validation->run() == FALSE) {
            redirect('dashboard');
        } else {
            $data = array(
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
            );

            $result = $this->ModelUser->create_user($data);
            if ($result) {
                $this->session->set_flashdata('success', 'Data User Berhasil di Tambahkan');
            } else {
                $this->session->set_flashdata('error', 'Data error');
            }

            redirect('dashboard');
        }
    }

    public function create_hotel()
    {
        $data = array(
            'nama_hotel' => $this->input->post('nama_hotel'),
            'kota' => $this->input->post('kota'),
            'desk' => $this->input->post('desk'),
        );

        $result = $this->ModelHotel->create_hotel($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Data Hotel Berhasil di Tambahakan');
        } else {
            $this->session->set_flashdata('error', 'Error Data Gagal di Tambahkan');
        }
        redirect('dashboard');
    }
}
