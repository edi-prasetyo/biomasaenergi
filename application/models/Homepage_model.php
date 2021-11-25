<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homepage_model extends CI_Model
{
  //load database
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  public function get_homepage()
  {
    $query = $this->db->get('homepage');
    return $query->row();
  }
  public function detail_homepage($id)
  {
    $this->db->select('*');
    $this->db->from('homepage');
    $this->db->where('id', $id);
    $query = $this->db->get();
    return $query->row();
  }
  public function update($data)
  {
    $this->db->where('id', $data['id']);
    $this->db->update('homepage', $data);
  }
}
