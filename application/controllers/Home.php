<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    /**
     * Development By Edi Prasetyo
     * edikomputer@gmail.com
     * 0812 3333 5523
     * https://edikomputer.com
     * https://grahastudio.com
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('meta_model');
        $this->load->model('berita_model');
        $this->load->model('homepage_model');
        $this->load->model('layanan_model');
        $this->load->model('category_model');
        $this->load->model('product_model');
    }
    public function index()
    {
        $meta                     = $this->meta_model->get_meta();
        $berita                   = $this->berita_model->berita_home();
        $homepage                 = $this->homepage_model->get_homepage();
        $layanan                  = $this->layanan_model->get_layanan();
        $product                  = $this->product_model->get_product();

        // var_dump($homepage);
        // die;


        // Desktop View
        $data = array(
            'title'                 => $meta->title . ' - ' . $meta->tagline,
            'keywords'              => $meta->title . ' - ' . $meta->tagline . ',' . $meta->keywords,
            'deskripsi'             => $meta->description,
            'berita'                => $berita,
            'homepage'              => $homepage,
            'layanan'               => $layanan,
            'product'               => $product,
            'content'               => 'front/home/index'
        );
        $this->load->view('front/layout/wrapp', $data, FALSE);
    }
    public function translate($language)
    {
        $newData = [
            'language' => $language
        ];
        $this->session->set_userdata($newData);
        if ($this->session->userdata('language')) {
            redirect($_SERVER['HTTP_REFERER']);
        };
    }
}
