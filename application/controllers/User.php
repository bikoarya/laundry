<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('nama_lengkap') != null) {
            if ($this->session->userdata('nama_role') == 'Admin') {
                $data['outlet'] = $this->model->get('t_outlet');
                $data['role'] = $this->model->get('t_role');
                $data['title'] = 'Go-Laundry | User';
                $this->load->view('Templates/Header', $data);
                $this->load->view('Templates/Sidebar');
                $this->load->view('User/Index');
                $this->load->view('Templates/Footer');
            } else {
                redirect('Notfound');
            }
        } else {
            redirect('Notfound');
        }
    }

    public function insert()
    {
        $data = [
            'nama_lengkap' => htmlspecialchars($this->input->post('namaLengkap')),
            'username' => htmlspecialchars($this->input->post('username')),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'id_outlet' => htmlspecialchars($this->input->post('outlet')),
            'nama_role' => htmlspecialchars($this->input->post('role'))
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
            't_role' => 't_user.nama_role=t_role.nama_role'
        ];
        $query = $this->model->joins('t_user', $join, '')->result_array();
        $output = '';
        $no = 1;

        foreach ($query as $row => $value) {
            if ($value['nama_role'] != 'Admin') {
                $output .= '
				<tr>
				<td>' . $no++ . '</td>
				<td>' . $value['nama_lengkap'] . '</td>
				<td>' . $value['username'] . '</td>
				<td>' . $value['nama_outlet'] . '</td>
				<td>' . $value['nama_role'] . '</td>
				<td> <a href="javascript:void(0);" class="text-success editUser" data-id_user="' . $value['id_user'] . '" data-nama_lengkap="' . $value['nama_lengkap'] . '" data-username="' . $value['username'] . '" data-password="' . $value['password'] . '" data-outlet="' . $value['id_outlet'] . '" data-role="' . $value['nama_role'] . '"><p class="text-primary d-inline mr-4" data-toggle="modal" data-target="#editUser"><i class="fas fa-edit" style="font-size: 18px" data-placement="bottom" title="Edit"></i></p></a> <a href="javascript:void(0);" class="text-danger hapusUser" data-id_user="' . $value['id_user'] . '"><p class="text-danger d-inline"><i class="fas fa-trash-alt text-danger" style="font-size: 18px" data-placement="bottom" title="Hapus"></i></p></a></td>
				</tr>';
            }
        }

        return $output;
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
                'nama_role'          => $role
            ];
            $this->model->put('t_user', $data, $where);
        } else {
            $data = [
                'nama_lengkap'     => $namaLengkap,
                'username'         => $username,
                'id_outlet'        => $outlet,
                'nama_role'          => $role,
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
