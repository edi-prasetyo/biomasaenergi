<?php
defined('BASEPATH') or exit('No direct script access allowed');

class City extends CI_Controller
{
    //load data
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('city_model');
    }
    //Index City
    public function index()
    {


        $config['base_url']         = base_url('admin/city/index/');
        $config['total_rows']       = count($this->city_model->total_row());
        $config['per_page']         = 10;
        $config['uri_segment']      = 4;

        //Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        //Limit dan Start
        $limit                      = $config['per_page'];
        $start                      = ($this->uri->segment(4)) ? ($this->uri->segment(4)) : 0;
        //End Limit Start
        $this->pagination->initialize($config);
        $city = $this->city_model->get_city($limit, $start);


        $data = [
            'title'                             => 'City Artikel',
            'city'                              => $city,
            'pagination'                        => $this->pagination->create_links(),
            'content'                           => 'admin/city/index_city'
        ];
        $this->load->view('admin/layout/wrapp', $data, FALSE);
    }

    //delete City
    public function delete($id)
    {
        //Proteksi delete
        is_login();
        $city = $this->city_model->detail_city($id);
        $data = ['id'   => $city->id];
        $this->city_model->delete($data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger">Data telah di Hapus</div>');
        redirect($_SERVER['HTTP_REFERER']);
    }
}
