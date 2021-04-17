<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'GO-Laundry | Login';
        $this->load->view('Login/Index', $data);
    }
}
