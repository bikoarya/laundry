<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('nama_lengkap') != null) {
            $join = [
                't_paket' => 't_transaksi.nama_paket=t_paket.nama_paket'
            ];
            $where = [
                'nama_outlet' => $this->session->userdata('nama_outlet')
            ];

            $data['transaksi'] = $this->model->joinOrder('t_transaksi', $join, $where)->result_array();
            $data['title'] = 'Go-Laundry | Laporan';
            $this->load->view('Templates/Header', $data);
            $this->load->view('Templates/Sidebar');
            $this->load->view('Laporan/Index');
            $this->load->view('Templates/Footer');
        } else {
            redirect('Notfound');
        }
    }

    public function Cetak()
    {
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->SetTitle('Cetak Laporan');
        $join = [
            't_paket' => 't_transaksi.nama_paket=t_paket.nama_paket'
        ];
        $where = [
            'status_bayar' => 'Lunas',
            'nama_outlet' => $this->session->userdata('nama_outlet')
        ];

        $data['transaksi'] = $this->model->joins('t_transaksi', $join, $where)->result_array();
        $data = $this->load->view('Laporan/Cetak', $data, TRUE);
        $mpdf->WriteHTML($data);
        $mpdf->Output('Laporan.pdf', 'I');
    }

    public function Bulan($bulan)
    {
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->SetTitle('Cetak Laporan');
        // $bulan = $this->input->post('bulan');
        $outlet = $this->session->userdata('nama_outlet');
        $data['transaksi'] = $this->db->query("SELECT * FROM t_transaksi t JOIN t_paket p ON t.nama_paket=p.nama_paket WHERE DATE_FORMAT(tanggal, '%Y-%m') = '$bulan' AND status_bayar = 'Lunas' AND nama_outlet = '$outlet'")->result_array();

        if (count($data['transaksi']) == 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-dismissible fade show w-25 mt-2 alertBulanan" id="alert" role="alert" style="position: absolute; box-shadow: 0 5px 10px rgba(119, 108, 108, .1); margin-left: 340px; border-radius: 3px">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top: -12px; margin-right: 5px">
                <span aria-hidden="true">&times;</span>
                </button>
                <b>Data tidak ditemukan.</b>
                </div>');
            redirect('Laporan');
        }

        $data = $this->load->view('Laporan/Cetak', $data, TRUE);
        $mpdf->WriteHTML($data);
        $mpdf->Output('Laporan.pdf', 'I');
    }
}
