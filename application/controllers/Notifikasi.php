<?php
class Notifikasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("NotifikasiModel");
    }

    // public function getUnreadCount()
    // {
    //     $unReadCount = $this->NotifikasiModel->getUnreadCount();

    //     if ($unReadCount > 0) {
    //         $this->session->set_flashdata("success", "Data berhasil di ubah");
    //         return $unReadCount;
    //     } else {
    //         return 0;
    //     }

    //     // echo json_encode(array("unReadCount" => $unReadCount));
    // }

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
