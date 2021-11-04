<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kirimemail_model extends CI_Model
{
    //load database
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    //listing Paket
    public function get_sendemail()
    {
        $this->db->select('*');
        $this->db->from('kirim_email');
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    //Detail kirim_email
    public function detail_kirim_email($id)
    {
        $this->db->select('*');
        $this->db->from('kirim_email');
        $this->db->where('id', $id);
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        return $query->row();
    }
    //tambah / Insert Data
    public function create($data)
    {
        $this->db->insert('kirim_email', $data);
    }

    //Edit Data
    public function update($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('kirim_email', $data);
    }

    //Delete Data
    public function delete($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->delete('kirim_email', $data);
    }

    public function get_kirim_email_active()
    {
        $this->db->select('*');
        $this->db->from('kirim_email');
        $this->db->where('status', 1);
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }
}

/* end of file kirim_email_model.php */
/* Location /application/controller/admin/kirim_email_model.php */
