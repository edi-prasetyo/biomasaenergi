<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran_model extends CI_Model
{
    //load database
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    //listing Paket
    public function get_pembayaran()
    {
        $this->db->select('*');
        $this->db->from('pembayaran');
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    //Detail pembayaran
    public function detail_pembayaran($id)
    {
        $this->db->select('*');
        $this->db->from('pembayaran');
        $this->db->where('id', $id);
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        return $query->row();
    }
    //tambah / Insert Data
    public function create($data)
    {
        $this->db->insert('pembayaran', $data);
    }

    //Edit Data
    public function update($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('pembayaran', $data);
    }

    //Delete Data
    public function delete($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->delete('pembayaran', $data);
    }

    public function get_pembayaran_active()
    {
        $this->db->select('*');
        $this->db->from('pembayaran');
        $this->db->where('status', 1);
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }
}
