<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{
    public function index()
    {
        $join = [
            't_paket' => 't_transaksi.nama_paket=t_paket.nama_paket'
        ];
        $where = [
            'nama_outlet' => $this->session->userdata('nama_outlet')
        ];

        $data['transaksi'] = $this->model->joinOrder('t_transaksi', $join, $where)->result_array();
        $data['status'] = ['Baru', 'Proses', 'Selesai', 'Diambil'];
        $data['bayar'] = ['Belum bayar', 'Lunas'];
        $data['title'] = 'Go-Laundry | Data Transaksi';
        $this->load->view('Templates/Header', $data);
        $this->load->view('Templates/Sidebar');
        $this->load->view('Transaksi/DataTransaksi');
        $this->load->view('Templates/Footer');
    }

    public function update()
    {
        $id         = htmlspecialchars($this->input->post('id'));
        $status     = htmlspecialchars($this->input->post('status'));
        $bayar      = htmlspecialchars($this->input->post('bayar'));

        $where = ['id_transaksi' => $id];

        $data = [
            'status'        => $status,
            'status_bayar'  => $bayar
        ];
        $asd = $this->model->put('t_transaksi', $data, $where);
        var_dump($data);
        die;
    }

    // public function showData()
    // {
    //     echo $this->dataTransaksi();
    // }
    public function dataTransaksi()
    {
        $join = [
            't_paket' => 't_transaksi.nama_paket=t_paket.nama_paket'
        ];
        $where = [
            'nama_outlet' => $this->session->userdata('nama_outlet')
        ];
        $data['transaksi'] = $this->model->joinOrder('t_transaksi', $join, $where)->result_array();

        // $output = '';

        // foreach ($query as $row => $value) {
        //     $total = $value['berat'] * $value['harga'];
        //     $output .= '
        // 		<tr>
        // 		<td>' . ($row + 1) . '</td>
        // 		<td>' . $value['kode_invoice'] . '</td>
        // 		<td style="white-space: nowrap">' . date('d M Y', strtotime($value['tanggal'])) . '</td>
        // 		<td>' . $value['nama'] . '</td>
        // 		<td>' . $value['nama_paket'] . '</td>
        // 		<td style="white-space: nowrap">' . date('d M Y', strtotime($value['tgl_selesai'])) . '</td>
        // 		<td style="white-space: nowrap">' . $value['nama_lengkap'] . '</td>
        // 		<td><span class="status">' . $value['status'] . '</span></td>
        // 		<td style="white-space: nowrap"><span class="statusBayar">' . $value['status_bayar'] . '</span></td>
        // 		<td> <a href="javascript:void(0);" class="text-success editStatus" data-id_transaksi="' . $value['id_transaksi'] . '" data-nama_member="' . $value['nama'] . '" data-harga="' . $value['harga'] . '" data-berat="' . $value['berat'] . '" data-status="' . $value['status'] . '" data-bayar="' . $value['status_bayar'] . '" data-paket="' . $value['nama_paket'] . '"><p class="text-primary d-inline mr-4" data-toggle="modal" data-target="#editTransaksi"><i class="fas fa-edit" style="font-size: 18px" data-placement="bottom" title="Edit"></i></p></a></td>
        // 		</tr>';
        // }

        // return $output;
    }
}
