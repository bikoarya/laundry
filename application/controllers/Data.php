<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Go-Laundry | Data Transaksi';
        $this->load->view('Templates/Header', $data);
        $this->load->view('Templates/Sidebar');
        $this->load->view('Transaksi/DataTransaksi');
        $this->load->view('Templates/Footer');
    }
}
