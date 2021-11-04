<?php
defined('BASEPATH') or exit('No direct script access allowed');

class City_model extends CI_Model
{
    //load database
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function get_allcity()
    {
        $this->db->select('city.*, provinsi_name');
        $this->db->from('city');
        // join
        $this->db->join('provinsi', 'provinsi.id = city.provinsi_id', 'LEFT');
        // End Join
        $this->db->order_by('provinsi.provinsi_name', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_city($limit, $start)
    {
        $this->db->select('city.*, provinsi_name');
        $this->db->from('city');
        // join
        $this->db->join('provinsi', 'provinsi.id = city.provinsi_id', 'LEFT');
        // End Join
        $this->db->limit($limit, $start);
        $this->db->order_by('provinsi.provinsi_name', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function total_row()
    {
        $this->db->select('*');
        $this->db->from('city');
        $this->db->order_by('city_name', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function detail($city_id)
    {
        $this->db->select('*');
        $this->db->from('city');
        $this->db->where('id', $city_id);
        $query = $this->db->get();
        return $query->row();
    }
    public function detail_city($id)
    {
        $this->db->select('*');
        $this->db->from('city');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }
    public function city_by_provinsi($provinsi_id)
    {
        $this->db->select('*');
        $this->db->from('city');
        $this->db->where(['id', $provinsi_id]);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    // Create
    public function create($data)
    {
        $this->db->insert('city', $data);
    }
    // Update
    public function update($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('city', $data);
    }
    //
    //Delete Data
    public function delete($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->delete('city', $data);
    }
}
