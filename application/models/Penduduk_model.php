<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penduduk_model extends CI_Model
{

    public $table = 'penduduk';
    public $id = 'id_penduduk';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_penduduk', $q);
	$this->db->or_like('no_induk', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('alamat', $q);
	$this->db->or_like('no_telepon', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_penduduk', $q);
	$this->db->or_like('no_induk', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('alamat', $q);
	$this->db->or_like('no_telepon', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    // get all
    function get_total()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function cek_no_induk($no_induk)
    {
        $this->db->where('no_induk', $no_induk);
        $num_row = $this->db->get($this->table)->num_rows();
        if ($num_row == 1 ) {
            return true;
        } else {
            return false;
        }
    }

}

/* End of file Penduduk_model.php */
/* Location: ./application/models/Penduduk_model.php */