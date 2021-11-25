<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

// use Restserver\Libraries\REST_Controller;

class Berita extends REST_Controller
{

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function index_get($id = 0)
    {
        if (!empty($id)) {
            $data = $this->db->get_where("berita", ['id' => $id])->row_array();
        } else {
            $data = $this->db->get("berita")->result();
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }
    public function detail($berita_slug = 0)
    {
        if (!empty($berita_slug)) {
            $data = $this->db->get_where("berita", ['berita_slug' => $berita_slug])->row_array();
        } else {
            $data = $this->db->get("berita")->result();
        }

        $this->response($data, REST_Controller::HTTP_OK);
    }
}
