<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function index()
    {
        $data['outlet'] = $this->model->get('t_outlet');
        $data['role'] = $this->model->get('t_role');
        $data['title'] = 'GO-Laundry | User';
        $this->load->view('Templates/Header', $data);
        $this->load->view('Templates/Sidebar');
        $this->load->view('User/Index');
        $this->load->view('Templates/Footer');
    }

    public function insert()
    {
        $data = [
            'nama_lengkap' => htmlspecialchars($this->input->post('namaLengkap')),
            'username' => htmlspecialchars($this->input->post('username')),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'id_outlet' => htmlspecialchars($this->input->post('outlet')),
            'id_role' => htmlspecialchars($this->input->post('role'))
        ];

        $this->db->insert('t_user', $data);
        echo $this->showData();
    }

    public function showData()
    {
        echo $this->data();
    }
    public function data()
    {
        $join = [
            't_outlet' => 't_user.id_outlet=t_outlet.id_outlet',
            't_role' => 't_user.id_role=t_role.id_role'
        ];
        $data['query'] = $this->model->joins('t_user', $join, '')->result_array();
        $this->load->view('User/DataUser', $data);
    }

    public function update()
    {
        $id                 = htmlspecialchars($this->input->post('id'));
        $namaLengkap        = htmlspecialchars($this->input->post('namaLengkap'));
        $username           = htmlspecialchars($this->input->post('username'));
        $password           = htmlspecialchars($this->input->post('password'));
        $newPassword        = password_hash($password, PASSWORD_DEFAULT);
        $oldPass            = htmlspecialchars($this->input->post('oldPass'));
        $outlet             = htmlspecialchars($this->input->post('outlet'));
        $role               = htmlspecialchars($this->input->post('role'));

        $where = ['id_user' => $id];

        if ($password != null) {
            $data = [
                'nama_lengkap'     => $namaLengkap,
                'username'         => $username,
                'password'         => $newPassword,
                'id_outlet'        => $outlet,
                'id_role'          => $role
            ];
            $this->model->put('t_user', $data, $where);
        } else {
            $data = [
                'nama_lengkap'     => $namaLengkap,
                'username'         => $username,
                'id_outlet'        => $outlet,
                'id_role'          => $role,
                'password'         => $oldPass
            ];
            $this->model->put('t_user', $data, $where);
        }
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $this->model->delete('t_user', ['id_user' => $id]);
    }
}
