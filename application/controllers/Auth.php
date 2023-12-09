<?php
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelToken');
    }

    public function process_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Panggil model untuk mendapatkan data pengguna berdasarkan username
        //dan function dalam model adminnya
        $user = $this->ModelAdmin->get_admin_by_username($username);

        if ($user) {
            // Username ditemukan, Anda dapat memeriksa password dan melakukan login
            // disini akan melakukan perbandingan antara password yg di input dan di dalam database
            if (password_verify($password, $user->password)) {
                if ($user->isActive == 0) {
                    $token = bin2hex(random_bytes(32));
                    $expired  = time() + 3600;

                    $this->ModelToken->setPasswordResetToken($user->email, $token, $expired);
                    $this->sendResetEmail($user->email, $token, 'verify');
                    $this->session->set_flashdata('success', 'Cek email untuk melakukan verifikasi');
                    redirect('admin');
                } else {
                    $this->session->set_userdata('id', $user->id);
                    $this->session->set_userdata('username', $user->username);
                    redirect('dashboard');
                }
            } else {
                $data['error_message'] = 'Password Salah';
                $this->load->view('login/admin-login', $data);
            }
        } else {
            // Username tidak ditemukan
            $data['error_message'] = 'Username tidak ditemukan';
            $this->load->view('login/admin-login', $data); // Tampilkan pesan kesalahan dan kirim variablenya ke view login
        }
    }
    public function getEmail()
    {
        $email = $this->input->post('email');

        $user = $this->ModelAdmin->get_admin_by_email($email);

        if ($user) {

            $token = bin2hex(random_bytes(32));
            $expired  = time() + 3600;

            $this->session->set_userdata('userEmail', $user->email);

            $this->ModelToken->setPasswordResetToken($user->email, $token, $expired);

            $send = $this->sendResetEmail($email, $token, 'forgot');

            if ($send) {
                $this->session->set_flashdata('success', 'Cek emaill untuk reset password');
                // redirect('auth/forgotPassword');
                redirect('admin');
            } else {
                $this->session->set_flashdata('error', 'Gagal');
                // redirect('auth/forgotPassword');
                redirect('admin');
            }
        } else {
            redirect('admin');
        }
    }

    public function changePassword()
    {
        $this->form_validation->set_rules(
            'password1',
            'Password1',
            'min_length[3]',
            ['min_length' => 'Minimal Password harus 3']
        );
        $this->form_validation->set_rules(
            'password2',
            'Password2',
            'min_length[3]',
            ['min_length' => 'Minamal password harus 3']
        );

        if ($this->form_validation->run() == FALSE) {
            // redirect('admin');
            $this->load->view('login/lupa-password');
        } else {
            $pw1 = $this->input->post('password1');
            $pw2 = $this->input->post('password2');

            if ($pw1 === $pw2) {

                $email = $this->session->userdata('userEmail');

                $user = $this->ModelAdmin->changePassword($pw1);

                $this->ModelAdmin->clearPasswordResetToken($email);

                if ($user) {
                    $this->load->helper('date');
                    // $this->session->unset_userdata('userId');
                    $this->session->set_flashdata('success', 'Password Berhasil di Ubah Silahkan Login Kembali');
                    // redirect('admin');

                    date_default_timezone_set('Asia/Jakarta');
                    $data = [
                        'title' => 'Password',
                        'mainTitle' => 'Change Password',
                        'date' => date('Y-m-d H:i:s'),
                        'pesan' => 'Password berhasil di ubah dan berhasil disimpan, jaga kerhasiaan password dari pihak lain.
                                    Silahkan kembali ke halaman login dan gunakan password terbaru.',
                        'end' => 'Terimakasih telah memakai fitur ini by Hotel.com'
                    ];

                    $this->load->view('auth/success', $data);
                } else {
                    $this->session->set_flashdata('error', 'Password Gagal di Ubah Silahkan Login Kembali');
                    $this->getEmail();
                }
            } else {
                $this->session->set_flashdata('error', 'Password Tidak Sama!');
                $this->load->view('login/lupa-password');
            }
        }
    }

    private function sendResetEmail($email, $token, $data)
    {
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_port' => 587,
            'smtp_user' => 'your_email',
            'smtp_pass' => 'your_password',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n",
            'smtp_crypto' => 'tls',
            'wordwrap' => TRUE,
        );

        $this->load->library('email', $config);

        $this->email->from('your_email', 'Hotel.com');
        $this->email->to($email);

        if ($data === 'verify') {
            $this->email->subject('Verifikasi Akun');

            $verifyLink = base_url('auth/verifikasi?email=' . urlencode($email) . '&token=' . urlencode($token));

            $emailVerif = "Klik disini untuk melakukan verifikasi akun anda: <a href=\"$verifyLink\">$verifyLink</a>";

            $this->email->message($emailVerif);
        } else if ($data === 'forgot') {
            $this->email->subject('Reset Password');

            $resetLink = base_url('auth/resetPassword?email=' . urlencode($email) . '&token=' . urlencode($token));

            $resetLink = base_url('auth/resetPassword/email=' . urlencode($email) . '&token=' . urlencode($token));
            $emailContent = "Klik disini untuk reset password: <a href=\"$resetLink\">$resetLink</a>";

            $this->email->message($emailContent);
        }

        if ($this->email->send()) {
            log_message('info', 'Email berhasil dikirim!');
            return true;
        } else {
            $this->email->debug = true;
            show_error($this->email->print_debugger());
            log_message('error', $this->email->print_debugger()); // Menampilkan informasi debugging ke log aplikasi
            return false;
        }
    }

    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $currentTimestamp = time();
        $expired = $this->ModelToken->getExpired($email);
        if ($expired) {
            if ($expired->expiredAt < $currentTimestamp) {
                $this->load->view('login/lupa-password');
            } else {
                $this->session->set_flashdata('error', 'Token expired silahkan login dan gunakan fitur lupa password lagi');

                date_default_timezone_set('Asia/Jakarta');
                $data = [
                    'title' => 'Token Expired',
                    'mainTitle' => 'Verifikasi Token Gagal',
                    'date' => date('Y-m-d H:i:s'),
                    'pesan' => 'Token expired tidak dapat melakukan ubah password',
                    'end' => 'Terimakasih telah memakai fitur ini by Hotel.com'
                ];
                $this->load->view('auth/success', $data);
            }
        } else {
            $this->session->set_flashdata('error', 'Token expired silahkan login dan gunakan fitur lupa password lagi');

            date_default_timezone_set('Asia/Jakarta');
            $data = [
                'title' => 'Token Expired',
                'mainTitle' => 'Verifikasi Token Gagal',
                'date' => date('Y-m-d H:i:s'),
                'pesan' => 'Token expired tidak dapat melakukan ubah password',
                'end' => 'Terimakasih telah memakai fitur ini by Hotel.com'
            ];
            $this->load->view('auth/success', $data);
        }
    }

    public function verifikasi()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $expired = $this->ModelToken->getExpired($email);

        $currentTimestamp = time();
        if ($expired) {
            if ($expired->expiredAt < $currentTimestamp) {
                $this->ModelAdmin->updateIsAvtive($email);
                $this->ModelAdmin->clearPasswordResetToken($email);

                date_default_timezone_set('Asia/Jakarta');
                $data = [
                    'title' => 'Verifikasi',
                    'mainTitle' => 'Verifikasi Account Berhasil',
                    'date' => date('Y-m-d H:i:s'),
                    'pesan' => 'Akun berhasil di verifikasi, silahkan melakukan login ulang.',
                    'end' => 'Terimakasih telah memakai fitur ini by Hotel.com'
                ];

                $this->load->view('auth/success', $data);
            } else {
                $this->ModelAdmin->clearPasswordResetToken($email);
                $this->session->set_flashdata('error', 'Token expired silahkan login dan verifikasi ulang');

                date_default_timezone_set('Asia/Jakarta');
                $data = [
                    'title' => 'Token Expired',
                    'mainTitle' => 'Verifikasi Account Gagal',
                    'date' => date('Y-m-d H:i:s'),
                    'pesan' => 'Akun gagal di verifikasi, silahkan melakukan login ulang.',
                    'end' => 'Terimakasih telah memakai fitur ini by Hotel.com'
                ];
                $this->load->view('auth/success', $data);
            }
        } else {
            $this->ModelAdmin->clearPasswordResetToken($email);
            $this->session->set_flashdata('error', 'Token expired silahkan login dan verifikasi ulang');

            date_default_timezone_set('Asia/Jakarta');
            $data = [
                'title' => 'Token Expired',
                'mainTitle' => 'Verifikasi Account Gagal',
                'date' => date('Y-m-d H:i:s'),
                'pesan' => 'Akun gagal di verifikasi, silahkan melakukan login ulang.',
                'end' => 'Terimakasih telah memakai fitur ini by Hotel.com'
            ];
            $this->load->view('auth/success', $data);
        }
    }
}
