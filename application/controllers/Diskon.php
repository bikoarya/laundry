<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diskon extends CI_Controller
{
    public function index()
    {
        $data['title'] = $this->session->userdata('nama_outlet') . ' | Diskon';
        $this->load->view('Templates/Header', $data);
        $this->load->view('Templates/Sidebar');
        $this->load->view('Diskon/Index');
        $this->load->view('Templates/Footer');
    }

    public function insert()
    {
        $data = [
            'jumlah_diskon' => htmlspecialchars($this->input->post('diskon'))
        ];

        $this->db->insert('t_diskon', $data);
        echo $this->showData();
    }

    public function showData()
    {
        echo $this->data();
    }
    public function data()
    {
        $query = $this->model->get('t_diskon');
        $output = '';

        foreach ($query as $row => $value) {
            $output .= '
				<tr>
				<td>' . ($row + 1) . '</td>
				<td>' . $value['jumlah_diskon'] . ' %</td>
				<td> <a href="javascript:void(0);" class="text-success editDiskon" data-id_diskon="' . $value['id_diskon'] . '" data-jumlah_diskon="' . $value['jumlah_diskon'] . '" ><p class="text-primary d-inline mr-4" data-toggle="modal" data-target="#editDiskon"><i class="fas fa-edit" style="font-size: 18px" data-placement="bottom" title="Edit"></i></p></a> <a href="javascript:void(0);" class="text-danger hapusDiskon" data-id_diskon="' . $value['id_diskon'] . '"><p class="text-danger d-inline"><i class="fas fa-trash-alt text-danger" style="font-size: 18px" data-placement="bottom" title="Hapus"></i></p></a></td>
				</tr>';
        }

        return $output;
    }

    public function update()
    {
        $id = htmlspecialchars($this->input->post('id'));
        $diskon = htmlspecialchars($this->input->post('diskon'));

        $data = [
            'jumlah_diskon' => $diskon
        ];

        $where = ['id_diskon' => $id];

        $this->model->put('t_diskon', $data, $where);
    }

    public function delete()
    {
        $id = htmlspecialchars($this->input->post('id'));
        $this->model->delete('t_diskon', ['id_diskon' => $id]);
    }

    public function ajaxList()
    {
        $list = $this->model->get_datatables_diskon();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $diskon) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $diskon->jumlah_diskon;
            $row[] = '<a href="javascript:void(0)"><p class="text-primary d-inline mr-4 editDiskon" data-id_diskon="' . $diskon->id_diskon . '" data-jumlah_diskon="' . $diskon->jumlah_diskon . '" data-toggle="modal" data-target="#editDiskon"><i class="fas fa-edit" style="font-size: 18px" data-placement="bottom" title="Edit"></i></p></a> 
			<a href="javascript:void(0);" class="text-danger hapusDiskon" data-id_diskon="' . $diskon->id_diskon . '"><p class="text-danger d-inline"><i class="fas fa-trash-alt text-danger" style="font-size: 18px" data-placement="bottom" title="Hapus"></i></p></a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->model->count_all_diskon(),
            "recordsFiltered" => $this->model->count_filtered_diskon(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }
}
