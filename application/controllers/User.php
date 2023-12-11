<?php
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function update_user()
    {
        $id = $this->input->get('id');

        if (!$this->session->userdata('id')) {
            redirect('admin'); // melemarkan ke controller admin
        }

        // ini menuju ke model admin dan ke function get_user_by_id dan mengirimkan parameter id
        // hasil dari return model user disimpan ke array data dan di variable user
        $data['user'] = $this->ModelUser->get_user_by_id($id);

        // melempar ke view dan mengirimkan parameter/props agar bisa di akses
        $this->load->view('update_user_view', $data);
    }

    public function procces_update_user($id)
    {
        $this->form_validation->set_rules(
            'nama',
            'Nama',
            'min_length[3]',
            ['min_length' => 'Nama minimal 3 huruf']
        );
        $this->form_validation->set_rules(
            'username',
            'Username',
            'min_length[3]',
            ['min_length' => 'Nama minimal 3 huruf']
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'min_length[3]',
            ['min_length' => 'Nama minimal 3 huruf']
        );

        if ($this->form_validation->run() == FALSE) {
            // $this->load->view('update_user_view');
            redirect('admin/update_user/' . $id);
        } else {
            $id = $this->input->post('id');
            $new_data = array(
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
            );

            $this->ModelUser->update_user($id, $new_data);

            $this->session->set_flashdata('success', 'Data User Berhasil Di Update Dengan Id ' . $id);
            redirect('dashboard');
        }
    }

    public function delete_by_id()
    {
        $id = $this->input->get('id');
        $this->ModelUser->delete_by_id($id);

        $this->session->set_flashdata('success', 'Data User Berhasil di Hapus dengan id ' . $id);
        redirect('dashboard');
    }
}
