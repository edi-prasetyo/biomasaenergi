<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Video_model extends CI_Model
{
    //load database
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function get_video()
    {
        $this->db->select('*');
        $this->db->from('video');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
    public function video($limit, $start)
    {
        $this->db->select('*');
        $this->db->from('video');
        $this->db->order_by('id', 'DESC');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }
    public function detail_video($id)
    {
        $this->db->select('*');
        $this->db->from('video');
        $this->db->where('id', $id);
        $this->db->order_by('id');
        $query = $this->db->get();
        return $query->row();
    }
    //Read Berita
    public function read($video_slug)
    {
        $this->db->select('*');
        $this->db->from('video');
        // Join

        //End Join
        $this->db->where(array(
            'video.video_slug'      =>  $video_slug
        ));
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->row();
    }

    public function create($data)
    {
        $this->db->insert('video', $data);
    }
    public function update($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('video', $data);
    }
    //Delete Data
    public function delete($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->delete('video', $data);
    }

    //Total Berita Main Page
    public function total_row()
    {
        $this->db->select('*');
        $this->db->from('video');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
    public function total()
    {
        $this->db->select('*');
        $this->db->from('video');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
}
