<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Berita_model extends CI_Model
{

    public $table = 'berita';
    public $id = 'id_berita';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->join('users', 'users.id = berita.penulis', 'left');
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        $this->db->join('users', 'users.id = berita.penulis', 'left');
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_berita', $q);
    	$this->db->or_like('judul', $q);
    	$this->db->or_like('isi', $q);
    	$this->db->or_like('penulis', $q);
    	$this->db->or_like('tanggal', $q);
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->join('users', 'berita.penulis = users.id', 'left');
    	$this->db->limit($limit, $start);
        $this->db->order_by($this->id, $this->order);
        $this->db->like('berita.id_berita', $q);
        $this->db->or_like('berita.judul', $q);
        $this->db->or_like('berita.isi', $q);
        $this->db->or_like('berita.penulis', $q);
        $this->db->or_like('berita.tanggal', $q);
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

    function get_total()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function get_all_join()
    {
        $query = $this->db->query(' SELECT *
                                    FROM berita
                                    JOIN users
                                    ON berita.penulis = users.id 
                                    ORDER BY berita.id_berita DESC '
                                );
        return $query->result();
    }
}

/* End of file Berita_model.php */
/* Location: ./application/models/Berita_model.php */