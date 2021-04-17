<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Outlet extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Go-Laundry | Outlet';
        $this->load->view('Templates/Header', $data);
        $this->load->view('Templates/Sidebar');
        $this->load->view('Outlet/Index');
        $this->load->view('Templates/Footer');
    }

    public function insert()
    {
        $data = [
            'nama_outlet' => htmlspecialchars($this->input->post('nama')),
            'alamat' => htmlspecialchars($this->input->post('alamat')),
            'tlp' => htmlspecialchars($this->input->post('tlp'))
        ];

        $this->db->insert('t_outlet', $data);
        echo $this->showData();
    }

    public function showData()
    {
        echo $this->data();
    }
    public function data()
    {
        $data['query'] = $this->model->get('t_outlet');
        $this->load->view('Outlet/DataOutlet', $data);
    }

    public function update()
    {
        $id         = htmlspecialchars($this->input->post('id'));
        $nama       = htmlspecialchars($this->input->post('nama'));
        $alamat     = htmlspecialchars($this->input->post('alamat'));
        $tlp        = htmlspecialchars($this->input->post('tlp'));

        $where = ['id_outlet' => $id];

        $data = [
            'nama_outlet'      => $nama,
            'alamat'    => $alamat,
            'tlp'       => $tlp
        ];
        $this->model->put('t_outlet', $data, $where);
    }

    public function delete()
    {
        $id = htmlspecialchars($this->input->post('id'));
        $this->model->delete('t_outlet', ['id_outlet' => $id]);
    }
}
