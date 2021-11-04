<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Province_model extends CI_Model
{
    //load database
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    //listing Pendaftaran
    public function get_allprovince()
    {
        $this->db->select('*');
        $this->db->from('province');
        $this->db->order_by('id', 'DESC');

        $query = $this->db->get();
        return $query->result();
    }
    public function get_province($limit, $start)
    {
        $this->db->select('*');
        $this->db->from('province');
        $this->db->limit($limit, $start);
        $this->db->order_by('province_name', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function total_row()
    {
        $this->db->select('*');
        $this->db->from('province');
        $this->db->order_by('province_name', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }


    public function detail_province($id)
    {
        $this->db->select('*');
        $this->db->from('province');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }
    public function detail($province_id)
    {
        $this->db->select('*');
        $this->db->from('province');
        $this->db->where('id', $province_id);
        $query = $this->db->get();
        return $query->row();
    }
    public function list_city($province_id)
    {
        $this->db->select('*');
        $this->db->from('city');
        $this->db->where('province_id', $province_id);
        $this->db->order_by('city.id', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }
    // Create
    public function create($data)
    {
        $this->db->insert('province', $data);
    }
    // Update
    public function update($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('province', $data);
    }
    //
    //Delete Data
    public function delete($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->delete('province', $data);
    }
}
