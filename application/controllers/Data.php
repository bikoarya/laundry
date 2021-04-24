<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Go-Laundry | Data Transaksi';
        $this->load->view('Templates/Header', $data);
        $this->load->view('Templates/Sidebar');
        $this->load->view('Transaksi/DataTransaksi');
        $this->load->view('Templates/Footer');
    }

    public function showData()
    {
        echo $this->dataTransaksi();
    }
    public function dataTransaksi()
    {
        $join = [
            't_paket' => 't_transaksi.nama_paket=t_paket.nama_paket'
        ];
        $query = $this->model->joins('t_transaksi', $join, '')->result_array();
        $output = '';

        // <td>Rp. ' . number_format($value['harga'], 0, ',', '.') . '</td>
        foreach ($query as $row => $value) {
            $total = $value['berat'] * $value['harga'];
            $output .= '
				<tr>
				<td>' . ($row + 1) . '</td>
				<td>' . $value['kode_invoice'] . '</td>
				<td>' . $value['tanggal'] . '</td>
				<td>' . $value['nama'] . '</td>
				<td>' . $value['nama_paket'] . '</td>
				<td>' . $value['tgl_selesai'] . '</td>
				<td><span class="status">' . $value['status'] . '</span></td>
				<td style="white-space: nowrap"><span class="statusBayar">' . $value['status_bayar'] . '</span></td>
				<td> <a href="javascript:void(0);" class="text-success editTransaksi" data-id_transaksi="' . $value['id_transaksi'] . '"><p class="text-primary d-inline mr-4" data-toggle="modal" data-target="#editPaket"><i class="fas fa-edit" style="font-size: 18px" data-placement="bottom" title="Edit"></i></p></a> <a href="javascript:void(0);" class="text-danger hapusTransaksi" data-id_transaksi="' . $value['id_transaksi'] . '"><p class="text-danger d-inline"><i class="fas fa-trash-alt text-danger" style="font-size: 18px" data-placement="bottom" title="Hapus"></i></p></a></td>
				</tr>';
        }

        return $output;
    }
}
