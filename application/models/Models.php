<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Models extends CI_Model
{
    function get($tabel)
    {
        return $this->db->get($tabel)->result_array();
    }

    function get_where($tabel, $where)
    {
        return $this->db->get_where($tabel, $where);
    }

    function insert($tabel, $data)
    {
        $this->db->insert($tabel, $data);
    }

    function put($tabel, $data, $where)
    {
        $this->db->where($where);
        $this->db->update($tabel, $data);
    }

    function delete($table = null, $where = null)
    {
        $this->db->delete($table, $where);
    }

    function joins($table = null,  $join = null, $where = null)
    {
        if ($join != null) {
            foreach ($join as $keyj => $valuej) {
                $this->db->join($keyj, $valuej);
            }
        }
        if ($where != null) {
            foreach ($where as $keyw => $dataw) {
                $this->db->where($keyw, $dataw);
            }
        }
        $data = $this->db->get($table);
        return $data;
    }

    function joinOrder($table = null,  $join = null, $where = null)
    {
        if ($join != null) {
            foreach ($join as $keyj => $valuej) {
                $this->db->join($keyj, $valuej);
            }
        }
        if ($where != null) {
            foreach ($where as $keyw => $dataw) {
                $this->db->where($keyw, $dataw);
            }
        }
        $this->db->order_by('id_transaksi', 'DESC');
        $data = $this->db->get($table);
        return $data;
    }

    public function countPaket()
    {
        $this->db->select('*');
        $where = [
            'id_outlet' => $this->session->userdata('id_outlet')
        ];
        $this->db->where($where);
        return $this->db->get('t_paket')->num_rows();
    }
    public function countMember()
    {
        $this->db->select('*');
        $where = [
            'id_outlet' => $this->session->userdata('id_outlet')
        ];
        $this->db->where($where);
        return $this->db->get('t_member')->num_rows();
    }
    public function countOutlet()
    {
        $this->db->select('*');
        return $this->db->get('t_outlet')->num_rows();
    }
    public function countAntri()
    {
        $this->db->select('*');
        $where = [
            'status' => 'Baru',
            'nama_outlet' => $this->session->userdata('nama_outlet')
        ];
        $this->db->where($where);
        return $this->db->get('t_transaksi')->num_rows();
    }

    public function kode_invoice()
    {
        $this->db->SELECT('RIGHT(t_transaksi.kode_invoice,4) as kode', FALSE);
        $this->db->order_by('kode_invoice', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('t_transaksi');
        if ($query->num_rows() <> 0) {
            // jika kodesudah ada
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada
            $kode = 1;
        }
        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kodejadi = "GL" . $kodemax;

        return $kodejadi;
    }
}
