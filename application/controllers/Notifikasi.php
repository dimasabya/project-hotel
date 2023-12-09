<?php
class Notifikasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("NotifikasiModel");
    }

    public function changeIsRead()
    {
        $isRead = true;

        $data = array(
            "is_read" => $isRead
        );

        $this->NotifikasiModel->changeIsRead($data);
        redirect("dashboard");
    }
}
