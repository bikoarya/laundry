<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paket extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('nama_lengkap') != null) {
            if ($this->session->userdata('nama_role') == 'Admin') {
                $data['jenis'] = $this->model->get('t_jenis');
                $data['outlet'] = $this->model->get('t_outlet');
                $data['title'] = $this->session->userdata('nama_outlet') . ' | Paket';
                $this->load->view('Templates/Header', $data);
                $this->load->view('Templates/Sidebar');
                $this->load->view('Paket/Index');
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

    public function insertJenis()
    {
        $data = [
            'jenis' => htmlspecialchars($this->input->post('jenis'))
        ];

        $this->db->insert('t_jenis', $data);
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
        $query = $this->model->joins('t_paket', $join, '')->result_array();
        $output = '';

        foreach ($query as $row => $value) {
            $output .= '
        		<tr>
        		<td>' . ($row + 1) . '</td>
        		<td>' . $value['nama_paket'] . '</td>
        		<td>' . $value['jenis'] . '</td>
        		<td>Rp. ' . number_format($value['harga']) . '</td>
        		<td>' . $value['nama_outlet'] . '</td>
        		<td> <a href="javascript:void(0);" class="text-success editPaket" data-id_paket="' . $value['id_paket'] . '" data-nama_paket="' . $value['nama_paket'] . '" data-jenis="' . $value['id_jenis'] . '" data-harga="' . $value['harga'] . '" data-outlet="' . $value['id_outlet'] . '"><p class="text-primary d-inline mr-4" data-toggle="modal" data-target="#editPaket"><i class="fas fa-edit" style="font-size: 18px" data-placement="bottom" title="Edit"></i></p></a> <a href="javascript:void(0);" class="text-danger hapusPaket" data-id_paket="' . $value['id_paket'] . '"><p class="text-danger d-inline"><i class="fas fa-trash-alt text-danger" style="font-size: 18px" data-placement="bottom" title="Hapus"></i></p></a></td>
        		</tr>';
        }

        return $output;
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

    public function ajaxList()
    {
        $list = $this->model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $paket) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $paket->nama_paket;
            $row[] = $paket->jenis;
            $row[] = number_format($paket->harga);
            $row[] = $paket->nama_outlet;
            $row[] = '<a href="javascript:void(0)"><p class="text-primary d-inline mr-4 editPaket" data-id_paket="' . $paket->id_paket . '" data-nama_paket="' . $paket->nama_paket . '" data-jenis="' . $paket->id_jenis . '" data-harga="' . $paket->harga . '" data-outlet="' . $paket->id_outlet . '" data-toggle="modal" data-target="#editPaket"><i class="fas fa-edit" style="font-size: 18px" data-placement="bottom" title="Edit"></i></p></a> 
			<a href="javascript:void(0);" class="text-danger hapusPaket" data-id_kuitansi="' . $paket->id_paket . '"><p class="text-danger d-inline"><i class="fas fa-trash-alt text-danger" style="font-size: 18px" data-placement="bottom" title="Hapus"></i></p></a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->model->count_all(),
            "recordsFiltered" => $this->model->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }
}
