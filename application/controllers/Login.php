<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required', [
            'required' => 'Masukkan Username anda!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Masukkan Password anda!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'GO-Laundry | Login';
            $this->load->view('Login/Index', $data);
        } else {
            $this->_Login();
        }
    }

    private function _Login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('t_user', ['username' => $username])->row_array();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'nama_lengkap' => $user['nama_lengkap'],
                    'username' => $user['username'],
                    'nama_role' => $user['nama_role']
                ];
                $this->session->set_userdata($data);
                redirect('Dashboard');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show w-25" id="alert" role="alert" style="position: absolute; left: 50%; transform: translate(-50%, -50%); box-shadow: 0 5px 10px rgba(119, 108, 108, .1); margin-top: 100px">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top: -12px; margin-right: 5px">
                <span aria-hidden="true">&times;</span>
                </button>
                <b>Password salah!</b>
                </div>');
                redirect('Login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show w-25" id="alert" role="alert" style="position: absolute; left: 50%; transform: translate(-50%, -50%); box-shadow: 0 5px 10px rgba(119, 108, 108, .1); margin-top: 100px">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top: -12px; margin-right: 5px">
            <span aria-hidden="true">&times;</span>
            </button>
            <b>Akun belum terdaftar!</b>
            </div>');
            redirect('Login');
        }
    }

    public function Logout()
    {
        $this->session->sess_destroy();
        redirect('Login');
    }
}
