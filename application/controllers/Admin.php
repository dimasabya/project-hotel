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

    public function delete_by_id()
    {
        $id = $this->input->get('id');
        $this->ModelUser->delete_by_id($id);

        $this->session->set_flashdata('success', 'Data User Berhasil di Hapus dengan id ' . $id);
        redirect('dashboard');
    }
    public function delete_hotel()
    {
        $id = $this->input->get('id');
        $this->ModelHotel->delete_by_id($id);

        $this->session->set_flashdata('success', 'Data Hotel Berhasil di Hapus dengan id ' . $id);
        redirect('dashboard');
    }

    public function delete_transaksi()
    {
        $id = $this->input->get('id');
        $this->ModelHotel->delete_transaksi($id);
        $this->ModelHotel->delete_detail_transaksi($id);

        $this->session->set_flashdata('success', 'Data transaksi berhasik dihapus dengan id ' . $id);
        redirect('dashboard');
    }

    // public function update_user()
    // {
    //     $id = $this->input->get('id');

    //     if (!$this->session->userdata('id')) {
    //         redirect('admin'); // melemarkan ke controller admin
    //     }

    //     // ini menuju ke model admin dan ke function get_user_by_id dan mengirimkan parameter id
    //     // hasil dari return model user disimpan ke array data dan di variable user
    //     $data['user'] = $this->ModelUser->get_user_by_id($id);

    //     // melempar ke view dan mengirimkan parameter/props agar bisa di akses
    //     $this->load->view('update_user_view', $data);
    // }
    // public function update_hotel()
    // {
    //     $id = $this->input->get('id');
    //     if (!$this->session->userdata('id')) {
    //         redirect('admin'); // melemarkan ke controller admin
    //     }

    //     // ini menuju ke model admin dan ke function get_user_by_id dan mengirimkan parameter id
    //     // hasil dari return model user disimpan ke array data dan di variable user
    //     $data['hotel'] = $this->ModelHotel->get_hotel_by_id($id);

    //     // melempar ke view dan mengirimkan parameter/props agar bisa di akses
    //     $this->load->view('update_hotel_view', $data);
    // }

    // public function procces_update_user($id)
    // {
    //     $this->form_validation->set_rules(
    //         'nama',
    //         'Nama',
    //         'min_length[3]',
    //         ['min_length' => 'Nama minimal 3 huruf']
    //     );
    //     $this->form_validation->set_rules(
    //         'username',
    //         'Username',
    //         'min_length[3]',
    //         ['min_length' => 'Nama minimal 3 huruf']
    //     );
    //     $this->form_validation->set_rules(
    //         'password',
    //         'Password',
    //         'min_length[3]',
    //         ['min_length' => 'Nama minimal 3 huruf']
    //     );

    //     if ($this->form_validation->run() == FALSE) {
    //         // $this->load->view('update_user_view');
    //         redirect('admin/update_user/' . $id);
    //     } else {
    //         $id = $this->input->post('id');
    //         $new_data = array(
    //             'nama' => $this->input->post('nama'),
    //             'username' => $this->input->post('username'),
    //             'email' => $this->input->post('email'),
    //             'password' => $this->input->post('password'),
    //         );

    //         $this->ModelUser->update_user($id, $new_data);

    //         $this->session->set_flashdata('success', 'Data User Berhasil Di Update Dengan Id ' . $id);
    //         redirect('dashboard');
    //     }
    // }
    // public function procces_update_hotel($id)
    // {
    //     $this->form_validation->set_rules(
    //         'nama_hotel',
    //         'Nama_hotel',
    //         'min_length[3]',
    //         ['min_length' => 'Nama minimal 3 huruf']
    //     );
    //     $this->form_validation->set_rules(
    //         'kota',
    //         'Kota',
    //         'min_length[3]',
    //         ['min_length' => 'Nama minimal 3 huruf']
    //     );
    //     $this->form_validation->set_rules(
    //         'desk',
    //         'Desk',
    //         'min_length[3]',
    //         ['min_length' => 'Nama minimal 3 huruf']
    //     );

    //     if ($this->form_validation->run() == FALSE) {
    //         // $this->load->view('update_user_view');
    //         redirect('admin/update_hotel/' . $id);
    //     } else {
    //         $id = $this->input->post('id');
    //         $new_data = array(
    //             'nama_hotel' => $this->input->post('nama_hotel'),
    //             'kota' => $this->input->post('kota'),
    //             'desk' => $this->input->post('desk'),
    //         );

    //         $this->ModelHotel->update_hotel($id, $new_data);

    //         $this->session->set_flashdata('success', 'Data Hotel Berhasil Di Update Dengan Id ' . $id);
    //         redirect('dashboard');
    //     }
    // }

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
