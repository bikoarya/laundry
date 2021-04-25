<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('nama_lengkap') != null) {
            $data['title'] = 'Go-Laundry | Dashboard';
            $this->load->view('Templates/Header', $data);
            $this->load->view('Templates/Sidebar');
            $this->load->view('Dashboard');
            $this->load->view('Templates/Footer');
        } else {
            redirect('Notfound');
        }
    }
}
