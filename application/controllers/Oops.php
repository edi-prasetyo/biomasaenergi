<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Oops extends CI_Controller
{
    /**
     * Development By Edi Prasetyo
     * edikomputer@gmail.com
     * 0812 3333 5523
     * https://edikomputer.com
     * https://grahastudio.com
     */
    public function index()
    {
        if (!$this->agent->is_mobile()) {
            // Desktop View
            $data = array(
                'title'     => 'Oops! Halaman tidak di temukan',
                'deskripsi' => 'error 404',
                'keywords'  => 'keywords',
                'content'   => 'front/oops/index_oops'
            );
            $this->load->view('front/layout/wrapp', $data, FALSE);
        } else {
            // Mobile View
            $data = array(
                'title'     => '404',
                'deskripsi' => 'error 404',
                'keywords'  => 'keywords',
                'content'   => 'mobile/oops/index'
            );
            $this->load->view('mobile/layout/wrapp', $data, FALSE);
        }
    }
}
