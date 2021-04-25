<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notfound extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Go-Laundry | Notfound';
        $this->load->view('Templates/Header', $data);
        $this->load->view('Notfound');
        $this->load->view('Templates/Footer');
    }
}
