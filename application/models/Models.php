<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Models extends CI_Model
{
    var $table = 't_paket';
    var $column_order = array(null, 'id_outlet', 'id_jenis', 'nama_paket', 'harga'); //set column field database for datatable orderable
    var $column_search = array('nama_paket', 'jenis', 'nama_outlet', 'harga'); //set column field database for datatable searchable 
    var $order = array('id_paket' => 'asc'); // default order

    var $table_member = 't_member';
    var $column_order_member = array(null, 'id_outlet', 'nama', 'alamat_member', 'jenis_kelamin', 'tlp_member'); //set column field database for datatable orderable
    var $column_search_member = array('nama', 'alamat_member', 'jenis_kelamin', 'tlp_member'); //set column field database for datatable searchable 
    var $order_member = array('id_member' => 'asc'); // default order

    private function _get_datatables_query_member()
    {
        $this->db->select('*');
        $this->db->from('t_member');
        $this->db->join('t_outlet', 't_member.id_outlet = t_outlet.id_outlet');

        $i = 0;

        foreach ($this->column_search_member as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search_member) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order_member[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order_member)) {
            $order = $this->order_member;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables_member()
    {
        $this->_get_datatables_query_member();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_member()
    {
        $this->_get_datatables_query_member();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_member()
    {
        $this->db->from($this->table_member);
        return $this->db->count_all_results();
    }

    private function _get_datatables_query()
    {
        $this->db->select('*');
        $this->db->from('t_paket');
        $this->db->join('t_outlet', 't_paket.id_outlet = t_outlet.id_outlet');
        $this->db->join('t_jenis', 't_paket.id_jenis = t_jenis.id_jenis');

        $i = 0;

        foreach ($this->column_search as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

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
