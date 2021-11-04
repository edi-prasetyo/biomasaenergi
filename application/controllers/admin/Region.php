<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Region extends CI_Controller
{

    public function index()
    {
        // load base_url 
        $this->load->helper('url');

        //load model 
        $this->load->model('region_model');

        // get cities 
        $data['province'] = $this->region_model->getProvince();

        // load view 
        $this->load->view('wilayah_view', $data);
    }

    public function getCity()
    {
        // POST data 
        $postData = $this->input->post();

        // load model 
        $this->load->model('region_model');

        // get data 
        $data = $this->region_model->getCity($postData);
        echo json_encode($data);
    }

    public function getKecamatan()
    {
        // POST data 
        $postData = $this->input->post();

        // load model 
        $this->load->model('region_model');

        // get data 
        $data = $this->region_model->getKecamatan($postData);
        echo json_encode($data);
    }
}
