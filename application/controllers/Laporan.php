<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('nama_lengkap') != null) {
            $join = [
                't_paket' => 't_transaksi.nama_paket=t_paket.nama_paket'
            ];
            $where = [
                'nama_outlet' => $this->session->userdata('nama_outlet')
            ];

            $data['transaksi'] = $this->model->joinOrder('t_transaksi', $join, $where)->result_array();
            $data['title'] = 'Go-Laundry | Laporan';
            $this->load->view('Templates/Header', $data);
            $this->load->view('Templates/Sidebar');
            $this->load->view('Laporan/Index');
            $this->load->view('Templates/Footer');
        } else {
            redirect('Notfound');
        }
    }
}
