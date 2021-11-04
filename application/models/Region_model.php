<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Region_model extends CI_Model
{

    // Get cities
    function getProvince()
    {

        $response = array();

        // Select record
        $this->db->select('*');
        $this->db->order_by('province_name', 'ASC');
        $q = $this->db->get('province');

        $response = $q->result_array();

        return $response;
    }
    public function detail($id)
    {
        $this->db->select('*');
        $this->db->from('province');
        $this->db->where(['id', $id]);
        $query = $this->db->get();
        return $query->row();
    }

    // Get City departments
    function getCity($postData)
    {
        $response = array();

        // Select record
        $this->db->select('id,city_name');
        $this->db->where('province_id', $postData['province']);
        $this->db->order_by('city_name', 'ASC');
        $q = $this->db->get('city');
        $response = $q->result_array();

        return $response;
    }

    // Get Department user
    function getKecamatan($postData)
    {
        $response = array();

        // Select record
        $this->db->select('id,kecamatan_name');
        $this->db->where('city_id', $postData['city']);
        $q = $this->db->get('kecamatan');
        $response = $q->result_array();

        return $response;
    }
}
