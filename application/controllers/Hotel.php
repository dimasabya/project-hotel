<?php
class Hotel extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('home');
    }

    public function update_hotel()
    {
        $id = $this->input->get('id');
        if (!$this->session->userdata('id')) {
            redirect('admin'); // melemarkan ke controller admin
        }

        // ini menuju ke model admin dan ke function get_user_by_id dan mengirimkan parameter id
        // hasil dari return model user disimpan ke array data dan di variable user
        $data['hotel'] = $this->ModelHotel->get_hotel_by_id($id);

        // melempar ke view dan mengirimkan parameter/props agar bisa di akses
        $this->load->view('update_hotel_view', $data);
    }

    public function procces_update_hotel($id)
    {
        $this->form_validation->set_rules(
            'nama_hotel',
            'Nama_hotel',
            'min_length[3]',
            ['min_length' => 'Nama minimal 3 huruf']
        );
        $this->form_validation->set_rules(
            'kota',
            'Kota',
            'min_length[3]',
            ['min_length' => 'Nama minimal 3 huruf']
        );
        $this->form_validation->set_rules(
            'desk',
            'Desk',
            'min_length[3]',
            ['min_length' => 'Nama minimal 3 huruf']
        );

        if ($this->form_validation->run() == FALSE) {
            // $this->load->view('update_user_view');
            redirect('admin/update_hotel/' . $id);
        } else {
            $id = $this->input->post('id');
            $new_data = array(
                'nama_hotel' => $this->input->post('nama_hotel'),
                'kota' => $this->input->post('kota'),
                'desk' => $this->input->post('desk'),
            );

            $this->ModelHotel->update_hotel($id, $new_data);

            $this->session->set_flashdata('success', 'Data Hotel Berhasil Di Update Dengan Id ' . $id);
            redirect('dashboard');
        }
    }

    public function delete_hotel()
    {
        $id = $this->input->get('id');
        $this->ModelHotel->delete_by_id($id);

        $this->session->set_flashdata('success', 'Data Hotel Berhasil di Hapus dengan id ' . $id);
        redirect('dashboard');
    }
}
