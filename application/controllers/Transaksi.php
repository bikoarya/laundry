<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
    }

    public function index()
    {
        if ($this->session->userdata('nama_lengkap') != null) {
            if ($this->session->userdata('nama_role') == 'Admin') {
                redirect('Data');
            } else if ($this->session->userdata('nama_role') == 'Kasir') {
                $data['member'] = $this->model->get('t_member');
                $join = [
                    't_jenis' => 't_paket.id_jenis=t_jenis.id_jenis'
                ];
                $where = [
                    'id_outlet' => $this->session->userdata('id_outlet')
                ];
                $data['paket'] = $this->model->joins('t_paket', $join, $where)->result_array();
                $data['title'] = 'Go-Laundry | Transaksi';
                $this->load->view('Templates/Header', $data);
                $this->load->view('Templates/Sidebar');
                $this->load->view('Transaksi/Index');
                $this->load->view('Templates/Footer');
            }
        } else {
            redirect('Notfound');
        }
    }

    public function add($id)
    {
        $invoice        = htmlspecialchars($this->input->post('invoice'));
        $tgl            = htmlspecialchars($this->input->post('tgl'));
        $user           = htmlspecialchars($this->input->post('user'));
        $outlet         = htmlspecialchars($this->input->post('outlet'));
        $member         = htmlspecialchars($this->input->post('member'));
        $paket          = htmlspecialchars($this->input->post('paket'));
        $berat          = htmlspecialchars($this->input->post('berat'));
        $qty            = htmlspecialchars($this->input->post('qty'));
        $harga1         = htmlspecialchars($this->input->post('harga'));
        $harga2         = str_replace("Rp. ", "", $harga1);
        $harga          = str_replace(".", "", $harga2);
        $tglSelesai     = htmlspecialchars($this->input->post('tglSelesai'));

        if ($berat != null) {
            $cart = [
                'id'                => $id,
                'name'              => $paket,
                'price'             => $harga,
                'kode_invoice'      => $invoice,
                'qty'               => $berat,
                'nama'              => $member,
                'tanggal'           => $tgl,
                'nama_lengkap'      => $user,
                'nama_outlet'       => $outlet,
                'tgl_selesai'       => $tglSelesai,
            ];
            $this->cart->insert($cart);
            echo $this->show_cart();
        } else {
            $cart = [
                'id'                => $id,
                'name'              => $paket,
                'price'             => $harga,
                'kode_invoice'      => $invoice,
                'qty'               => $qty,
                'nama'              => $member,
                'tanggal'           => $tgl,
                'nama_lengkap'      => $user,
                'nama_outlet'       => $outlet,
                'tgl_selesai'       => $tglSelesai,
            ];
            $this->cart->insert($cart);
            echo $this->show_cart();
        }
    }

    public function simpanTransaksi()
    {
        $check = count($this->cart->contents());

        if ($check == 0) {
            $message = "Data masih kosong!";
            echo "<script type='text/javascript'>
            alert('$message');
            window.location = '/laundry/Transaksi';
            </script>";
        } else {
            foreach ($this->cart->contents() as $items) {

                $insert = [
                    'kode_invoice' => $items['kode_invoice'],
                    'nama' => $items['nama'],
                    'nama_paket' => $items['name'],
                    'berat' => $items['qty'],
                    'nama_outlet' => $items['nama_outlet'],
                    'nama_lengkap' => $items['nama_lengkap'],
                    'tanggal' => date('Y-m-d', strtotime($items['tanggal'])),
                    'status' => 'Baru',
                    'status_bayar' => 'Belum bayar',
                    'tgl_selesai' => date('Y-m-d', strtotime($items['tgl_selesai']))
                ];
                $insert = $this->db->insert('t_transaksi', $insert);
            }
            $this->cart->destroy();
            redirect('Data');
        }
    }

    function load()
    {
        echo $this->show_cart();
    }

    function show_cart()
    {
        $output = '';
        $no = 0;
        foreach ($this->cart->contents() as $items) {
            $no++;
            $total = $items['qty'] * $items['price'];
            $output .= '
			<tr>
			<td>' . $no . '</td>
			<td>' . $items['kode_invoice'] . '</td>
			<td>' . $items['tanggal'] . '</td>
			<td>' . $items['nama'] . '</td>
			<td>' . $items['name'] . '</td>
			<td>' . $items['tgl_selesai'] . '</td>
			<td>Rp. ' . number_format($items['price'], 0, ',', '.') . '</td>
			<td>' . $items['qty'] . '</td>
			<td>Rp. ' . number_format($total, 0, ',', '.') . '</td>
			<td><a href="javascript:void(0);" class="text-danger deleteCart" data-id_cart="' . $items['rowid'] . '"><p class="text-danger d-inline"><i class="fas fa-trash-alt text-danger" style="font-size: 18px" data-placement="bottom" title="Hapus"></i></p></a></td>
			</tr>
			';
        }
        return $output;
    }

    public function grandTotal()
    {
        echo 'Rp. ' . number_format($this->cart->total(), 0, ',', '.');
    }

    public function delete()
    {
        $data = [
            'rowid' => $this->input->post('id'),
            'qty' => 0,
        ];
        $this->cart->update($data);
        echo $this->show_cart();
    }
}
