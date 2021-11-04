<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Link extends CI_Controller
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
        $this->load->model('link_model');
        $this->load->library('pagination');

        $id = $this->session->userdata('id');
        $user = $this->user_model->user_detail($id);
        if ($user->role_id == 2) {
            redirect('admin/dashboard');
        }
    }
    public function index()
    {

        $list_link = $this->link_model->get_link();
        $data = [
            'title'             => 'Manajemen Link',
            'list_link'         => $list_link,
            'content'           => 'admin/link/index'

        ];
        $this->load->view('admin/layout/wrapp', $data, FALSE);
    }
    public function create()
    {
        $this->form_validation->set_rules(
            'link_name',
            'Nama Link',
            'required',
            [
                'required'      => 'Nama Link harus di isi',
            ]
        );
        $this->form_validation->set_rules(
            'link_url',
            'Link Url',
            'required',
            [
                'required'      => 'Link Url Harus di isi',
            ]
        );

        if ($this->form_validation->run() == false) {
            $data = [
                'title'         => "Create link",
                'content'       => 'admin/link/create'
            ];
            $this->load->view('admin/layout/wrapp', $data, FALSE);
        } else {

            $data = [
                'link_name'             => $this->input->post('link_name'),
                'link_url'              => $this->input->post('link_url'),
                'date_created'          => time()
            ];
            $this->link_model->create($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data telah ditambahkan</div>');
            redirect(base_url('admin/link'), 'refresh');
        }
    }
    public function update($id)
    {
        $link = $this->link_model->detail_link($id);
        $this->form_validation->set_rules(
            'link_name',
            'Nama Link',
            'required',
            [
                'required'      => 'Nama Link harus di isi',
            ]
        );

        if ($this->form_validation->run() == false) {
            $data = [
                'title'         => "Update link",
                'link'          => $link,
                'content'       => 'admin/link/update'
            ];
            $this->load->view('admin/layout/wrapp', $data, FALSE);
        } else {
            $data = [
                'id'                    => $id,
                'link_name'             => $this->input->post('link_name'),
                'link_url'              => $this->input->post('link_url'),
                'date_updated'          => time()
            ];
            $this->link_model->update($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data telah di ubah</div>');
            redirect(base_url('admin/link'), 'refresh');
        }
    }
    public function delete($id)
    {
        is_login();
        $link = $this->link_model->detail_link($id);

        $data = array('id'   => $link->id);
        $this->link_model->delete($data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger">Data telah di Hapus</div>');
        redirect(base_url('admin/link'), 'refresh');
    }
}
