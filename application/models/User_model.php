<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
  //load database
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  //listing Pendaftaran
  public function listUser()
  {
    $this->db->select('*');
    $this->db->from('user');
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }
  public function get_admin()
  {
    $this->db->select('user.*, user_role.role');
    $this->db->from('user');
    // join
    $this->db->join('user_role', 'user_role.id = user.role_id', 'LEFT');
    // End Join
    $this->db->where('role_id', 2);
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }
  public function user_detail()
  {
    $this->db->select('user.*, user_role.role');
    $this->db->from('user');
    // join
    $this->db->join('user_role', 'user_role.id = user.role_id', 'LEFT');
    // End Join
    $this->db->where(array(
      'user.email'    => $this->session->userdata('email')
    ));
    $query = $this->db->get();
    return $query->row();
  }
  public function update($data)
  {
    $this->db->where('id', $data['id']);
    $this->db->update('user', $data);
  }
  // Dashboard
  public function user_member()
  {
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('role_id', 3);
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }
  // Product User Read
  public function detail($id)
  {
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('id', $id);
    $this->db->order_by('id');
    $query = $this->db->get();
    return $query->row();
  }
}
