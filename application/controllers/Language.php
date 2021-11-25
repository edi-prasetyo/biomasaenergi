<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Language extends CI_Controller
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
