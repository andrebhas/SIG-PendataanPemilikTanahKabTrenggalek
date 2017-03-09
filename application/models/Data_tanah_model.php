<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_tanah_model extends CI_Model
{

    public $table = 'data_tanah';
    public $id = 'id_tanah';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->join('users', 'users.id = data_tanah.penginput', 'left');
        $this->db->join('penduduk', 'penduduk.id_penduduk = data_tanah.id_penduduk', 'left');
        $this->db->join('jenis_bangunan', 'jenis_bangunan.id_jenis_bangunan = data_tanah.id_jenis_bangunan', 'left');
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
        $this->db->like('id_tanah', $q);
    	$this->db->or_like('id_penduduk', $q);
    	$this->db->or_like('id_jenis_bangunan', $q);
    	$this->db->or_like('penginput', $q);
    	$this->db->or_like('persil', $q);
    	$this->db->or_like('luas_tanah', $q);
    	$this->db->or_like('lat', $q);
    	$this->db->or_like('lng', $q);
    	$this->db->or_like('gambar', $q);
    	$this->db->or_like('tanggal', $q);
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_tanah', $q);
    	$this->db->or_like('id_penduduk', $q);
    	$this->db->or_like('id_jenis_bangunan', $q);
    	$this->db->or_like('penginput', $q);
    	$this->db->or_like('persil', $q);
    	$this->db->or_like('luas_tanah', $q);
    	$this->db->or_like('lat', $q);
    	$this->db->or_like('lng', $q);
    	$this->db->or_like('gambar', $q);
    	$this->db->or_like('tanggal', $q);
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

    function get_by_id_penduduk($id)
    {
        $query = $this->db->query(' SELECT *
                                    FROM data_tanah
                                    JOIN penduduk
                                    ON data_tanah.id_penduduk = penduduk.id_penduduk
                                    JOIN jenis_bangunan
                                    ON jenis_bangunan.id_jenis_bangunan = data_tanah.id_jenis_bangunan
                                    WHERE data_tanah.id_penduduk ='.$id
                                );
        return $query->result();
    }

    function get_total()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function get_all_join() 
    {
        $query = $this->db->query(' SELECT *
                                    FROM data_tanah
                                    JOIN penduduk
                                    ON data_tanah.id_penduduk = penduduk.id_penduduk
                                    JOIN jenis_bangunan
                                    ON jenis_bangunan.id_jenis_bangunan = data_tanah.id_jenis_bangunan'
                                );
        return $query->result();
    }

    function get_by_nama($nama)
    {
       $query = $this->db->query(' SELECT *
                                    FROM data_tanah
                                    JOIN penduduk
                                    ON data_tanah.id_penduduk = penduduk.id_penduduk
                                    JOIN jenis_bangunan
                                    ON jenis_bangunan.id_jenis_bangunan = data_tanah.id_jenis_bangunan
                                    WHERE penduduk.nama = '.$nama

                                );
        return $query->result();
    }

}

/* End of file Data_tanah_model.php */
/* Location: ./application/models/Data_tanah_model.php */