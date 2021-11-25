<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
    /**
     * Development By Edi Prasetyo
     * edikomputer@gmail.com
     * 0812 3333 5523
     * https://edikomputer.com
     * https://grahastudio.com
     */
    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->output->enable_profiler(FALSE);
        $this->load->model('product_model');
        $this->load->model('category_model');
        $this->load->model('meta_model');
        $this->load->library('pagination');
    }
    public function index()
    {
        $meta                           = $this->meta_model->get_meta();
        $category                       = $this->category_model->get_category();

        $this->load->library('pagination');
        $config['base_url']             = base_url('product/index/');
        $config['total_rows']           = count($this->product_model->total());
        $config['per_page']             = 6;
        $config['uri_segment']          = 3;

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
        $limit                          = $config['per_page'];
        $start                          = ($this->uri->segment(3)) ? ($this->uri->segment(3)) : 0;
        $this->pagination->initialize($config);
        $product = $this->product_model->product($limit, $start);

        if (!$this->agent->is_mobile()) {
            // Desktop View
            $data = array(
                'title'                       => 'Product - ' . $meta->title,
                'deskripsi'                   => 'Product - ' . $meta->description,
                'keywords'                    => 'Product - ' . $meta->keywords,
                'paginasi'                    => $this->pagination->create_links(),
                'category'                    => $category,
                'content'                     => 'front/product/index_product'
            );
            $this->load->view('front/layout/wrapp', $data, FALSE);
        } else {
            // Mobile View
            $data = array(
                'title'                       => 'Product - ' . $meta->title,
                'deskripsi'                   => 'Product - ' . $meta->description,
                'keywords'                    => 'Product - ' . $meta->keywords,
                'paginasi'                    => $this->pagination->create_links(),
                'product'                      => $product,
                'category'                    => $category,
                'content'                     => 'mobile/product/index'
            );
            $this->load->view('mobile/layout/wrapp', $data, FALSE);
        }
    }
    public function detail($product_slug = NULL)
    {
        if (!empty($product_slug)) {
            $product_slug;
        } else {
            redirect(base_url('product'));
        }
        $category                       = $this->category_model->get_category();
        $product                         = $this->product_model->read($product_slug);
        // var_dump($product->product_title_id);
        // die;

        if (!$this->agent->is_mobile()) {
            // Desktop View
            $data                           = array(
                'title'                       => 'Product',
                'deskripsi'                   => 'Product',
                'keywords'                    => $product->product_keywords,
                'product'                      => $product,
                'category'                    => $category,
                'content'                     => 'front/product/detail'
            );
            $this->add_count($product_slug);
            $this->load->view('front/layout/wrapp', $data, FALSE);
        } else {
            // Mobile View
            $data                           = array(
                'title'                       => $product->product_title_id,
                'deskripsi'                   => $product->product_title_id,
                'keywords'                    => $product->product_keywords,
                'product'                      => $product,
                'category'                    => $category,
                'content'                     => 'mobile/product/detail'
            );
            $this->add_count($product_slug);
            $this->load->view('mobile/layout/wrapp', $data, FALSE);
        }
    }
    function add_count($product_slug)
    {
        // load cookie helper
        $this->load->helper('cookie');
        // this line will return the cookie which has slug name
        $check_visitor = $this->input->cookie(urldecode($product_slug), FALSE);
        // this line will return the visitor ip address
        $ip = $this->input->ip_address();
        // if the visitor visit this article for first time then //
        //set new cookie and update article_views column  ..
        //you might be notice we used slug for cookie name and ip
        //address for value to distinguish between articles  views
        if ($check_visitor == false) {
            $cookie = array(
                "name"                      => urldecode($product_slug),
                "value"                     => "$ip",
                "expire"                    =>  time() + 7200,
                "secure"                    => false
            );
            $this->input->set_cookie($cookie);
            $this->product_model->update_counter(urldecode($product_slug));
        }
    }
}
