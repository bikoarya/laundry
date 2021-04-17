<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paket extends CI_Controller
{
    public function index()
    {
        $data['jenis'] = $this->model->get('t_jenis');
        $data['outlet'] = $this->model->get('t_outlet');
        $data['title'] = 'Go-Laundry | Paket';
        $this->load->view('Templates/Header', $data);
        $this->load->view('Templates/Sidebar');
        $this->load->view('Paket/Index');
        $this->load->view('Templates/Footer');
    }

    public function insert()
    {
        $harga1      = htmlspecialchars($this->input->post('harga'));
        $harga2     = str_replace("Rp. ", "", $harga1);
        $harga      = str_replace(".", "", $harga2);

        $data = [
            'nama_paket' => htmlspecialchars($this->input->post('nama')),
            'id_jenis' => htmlspecialchars($this->input->post('jenis')),
            'harga' => $harga,
            'id_outlet' => htmlspecialchars($this->input->post('outlet'))
        ];

        $this->db->insert('t_paket', $data);
        echo $this->showData();
    }

    public function showData()
    {
        echo $this->data();
    }
    public function data()
    {
        $join = [
            't_outlet' => 't_paket.id_outlet=t_outlet.id_outlet',
            't_jenis' => 't_paket.id_jenis=t_jenis.id_jenis'
        ];
        $data['query'] = $this->model->joins('t_paket', $join, '')->result_array();
        $this->load->view('Paket/DataPaket', $data);
    }

    public function update()
    {
        $harga1      = htmlspecialchars($this->input->post('harga'));
        $harga2     = str_replace("Rp. ", "", $harga1);

        $id         = htmlspecialchars($this->input->post('id'));
        $nama       = htmlspecialchars($this->input->post('nama'));
        $jenis      = htmlspecialchars($this->input->post('jenis'));
        $harga      = str_replace(".", "", $harga2);
        $outlet      = htmlspecialchars($this->input->post('outlet'));

        $where = ['id_paket' => $id];

        $data = [
            'nama_paket'    => $nama,
            'id_jenis'      => $jenis,
            'harga'         => $harga,
            'id_outlet'     => $outlet
        ];
        $this->model->put('t_paket', $data, $where);
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $this->model->delete('t_paket', ['id_paket' => $id]);
    }
}
