<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Outlet extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('nama_lengkap') != null) {
            if ($this->session->userdata('nama_role') == 'Admin') {
                $data['title'] = $this->session->userdata('nama_outlet') . ' | Outlet';
                $this->load->view('Templates/Header', $data);
                $this->load->view('Templates/Sidebar');
                $this->load->view('Outlet/Index');
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
        $query = $this->model->get('t_outlet');
        $output = '';

        foreach ($query as $row => $value) {
            if ($value['nama_outlet'] != 'Outlet Pusat') {
                $output .= '
				<tr>
				<td>' . ($row + 1) . '</td>
				<td>' . $value['nama_outlet'] . '</td>
				<td>' . $value['alamat'] . '</td>
				<td>' . $value['tlp'] . '</td>
				<td> <a href="javascript:void(0);" class="text-success editOutlet" data-id_outlet="' . $value['id_outlet'] . '" data-nama="' . $value['nama_outlet'] . '" data-alamat="' . $value['alamat'] . '" data-tlp="' . $value['tlp'] . '"><p class="text-primary d-inline mr-4" data-toggle="modal" data-target="#editOutlet"><i class="fas fa-edit" style="font-size: 18px" data-placement="bottom" title="Edit"></i></p></a> <a href="javascript:void(0);" class="text-danger hapusOutlet" data-id_outlet="' . $value['id_outlet'] . '"><p class="text-danger d-inline"><i class="fas fa-trash-alt text-danger" style="font-size: 18px" data-placement="bottom" title="Hapus"></i></p></a></td>
				</tr>';
            }
        }

        return $output;
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

    public function ajaxList()
    {
        $list = $this->model->get_datatables_outlet();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $outlet) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $outlet->nama_outlet;
            $row[] = $outlet->alamat;
            $row[] = $outlet->tlp;
            $row[] = '<a href="javascript:void(0)"><p class="text-primary d-inline mr-4 editOutlet" data-id_outlet="' . $outlet->id_outlet . '" data-nama="' . $outlet->nama_outlet . '" data-alamat="' . $outlet->alamat . '" data-tlp="' . $outlet->tlp . '" data-toggle="modal" data-target="#editOutlet"><i class="fas fa-edit" style="font-size: 18px" data-placement="bottom" title="Edit"></i></p></a> 
			<a href="javascript:void(0);" class="text-danger hapusOutlet" data-id_outlet="' . $outlet->id_outlet . '"><p class="text-danger d-inline"><i class="fas fa-trash-alt text-danger" style="font-size: 18px" data-placement="bottom" title="Hapus"></i></p></a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->model->count_all_outlet(),
            "recordsFiltered" => $this->model->count_filtered_outlet(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }
}
