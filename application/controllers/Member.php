<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Go-Laundry | Member';
        $this->load->view('Templates/Header', $data);
        $this->load->view('Templates/Sidebar');
        $this->load->view('Member/Index');
        $this->load->view('Templates/Footer');
    }

    public function insert()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama')),
            'alamat' => htmlspecialchars($this->input->post('alamat')),
            'jenis_kelamin' => htmlspecialchars($this->input->post('gender')),
            'tlp' => htmlspecialchars($this->input->post('tlp'))
        ];

        $this->db->insert('t_member', $data);
        echo $this->showData();
    }

    public function showData()
    {
        echo $this->data();
    }
    public function data()
    {
        $query = $this->model->get('t_member');
        $output = '';

        foreach ($query as $row => $value) {
            $output .= '
				<tr>
				<td>' . ($row + 1) . '</td>
				<td>' . $value['nama'] . '</td>
				<td>' . $value['alamat'] . '</td>
				<td>' . $value['jenis_kelamin'] . '</td>
				<td>' . $value['tlp'] . '</td>
				<td> <a href="javascript:void(0);" class="text-success editMember" data-id_member="' . $value['id_member'] . '" data-nama="' . $value['nama'] . '" data-alamat="' . $value['alamat'] . '" data-gender="' . $value['jenis_kelamin'] . '" data-tlp="' . $value['tlp'] . '"><p class="text-primary d-inline mr-4" data-toggle="modal" data-target="#editMember"><i class="fas fa-edit" style="font-size: 18px" data-placement="bottom" title="Edit"></i></p></a> <a href="javascript:void(0);" class="text-danger hapusMember" data-id_member="' . $value['id_member'] . '"><p class="text-danger d-inline"><i class="fas fa-trash-alt text-danger" style="font-size: 18px" data-placement="bottom" title="Hapus"></i></p></a></td>
				</tr>';
        }

        return $output;
    }

    public function update()
    {
        $id         = htmlspecialchars($this->input->post('id'));
        $nama       = htmlspecialchars($this->input->post('nama'));
        $alamat     = htmlspecialchars($this->input->post('alamat'));
        $gender     = htmlspecialchars($this->input->post('gender'));
        $tlp        = htmlspecialchars($this->input->post('tlp'));

        $where = ['id_member' => $id];

        $data = [
            'nama'          => $nama,
            'alamat'        => $alamat,
            'jenis_kelamin' => $gender,
            'tlp'           => $tlp
        ];
        $this->model->put('t_member', $data, $where);
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $where = ['id_member' => $id];
        $this->model->delete('t_member', $where);
    }
}
