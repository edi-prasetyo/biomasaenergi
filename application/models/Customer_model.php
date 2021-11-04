<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer_model extends CI_Model
{
    //load database
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    //listing Pendaftaran
    public function get_customer()
    {
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_allcustomer($limit, $start, $keyword)
    {
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->like('fullname', $keyword);
        $this->db->or_like('phone', $keyword);
        $this->db->order_by('id', 'DESC');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }
    public function detail($id)
    {
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->where('id', $id);
        $this->db->order_by('id');
        $query = $this->db->get();
        return $query->row();
    }
    public function customer_detail($customer_id)
    {
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->where('id', $customer_id);
        $this->db->order_by('id');
        $query = $this->db->get();
        return $query->row();
    }
    public function create($data)
    {
        $this->db->insert('customer', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    public function update($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('customer', $data);
    }
    //Hapus Data Dari Database
    public function delete($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->delete('customer', $data);
    }
    // Product Customer Read
    public function read($id)
    {
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->where('id', $id);
        $this->db->order_by('id');
        $query = $this->db->get();
        return $query->row();
    }

    //Total Row Pelanggan
    public function total_row_customer()
    {
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
    // SEARCH PELANGGAN
    public function get_customer_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->like('customer_name', $keyword);
        $this->db->or_like('customer_phone', $keyword);
        return $this->db->get()->result();
    }

    // GET DATA AUTOCOMPLETE
    function search_blog($title)
    {
        $this->db->like('company', $title, 'both');
        $this->db->order_by('id', 'ASC');
        $this->db->limit(10);
        return $this->db->get('customer')->result();
    }
    public function get_autofill($id)
    {
        $hasil = $this->db->query("SELECT * FROM customer WHERE id='$id'");
        return $hasil->result();
    }
}
