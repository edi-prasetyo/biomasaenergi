<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Layanan extends CI_Controller
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
        $this->load->library('pagination');
        $this->load->model('layanan_model');

        $id = $this->session->userdata('id');
        $user = $this->user_model->user_detail($id);
        if ($user->role_id == 2) {
            redirect('admin/dashboard');
        }
    }

    public function index()
    {
        $config['base_url']         = base_url('admin/layanan/index/');
        $config['total_rows']       = count($this->layanan_model->total_row());
        $config['per_layanan']      = 10;
        $config['uri_segment']      = 4;

        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="layanan-item"><span class="layanan-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="layanan-item active"><span class="layanan-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="layanan-item"><span class="layanan-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="layanan-item"><span class="layanan-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="layanan-item"><span class="layanan-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="layanan-item"><span class="layanan-link">';
        $config['last_tagl_close']  = '</span></li>';

        $limit                      = $config['per_layanan'];
        $start                      = ($this->uri->segment(4)) ? ($this->uri->segment(4)) : 0;

        $this->pagination->initialize($config);
        $layanan = $this->layanan_model->get_layanan($limit, $start);
        $data = [
            'title'             => 'Layanan',
            'layanan'           => $layanan,
            'pagination'        => $this->pagination->create_links(),
            'content'           => 'admin/layanan/index'
        ];
        $this->load->view('admin/layout/wrapp', $data, FALSE);
    }

    public function create()
    {
        $this->form_validation->set_rules(
            'layanan_name',
            'Nama Layanan',
            'required',
            array(
                'required'         => '%s Harus Diisi'
            )
        );
        $this->form_validation->set_rules(
            'layanan_desc',
            'Deskripsi Halaman',
            'required',
            array(
                'required'         => '%s Harus Diisi'
            )
        );
        if ($this->form_validation->run() === FALSE) {
            $data = [
                'title'             => 'Buat Layanan',
                'deskripsi'         => 'Deskripsi',
                'keywords'          => 'Keywords',
                'content'           => 'admin/layanan/create'
            ];
            $this->load->view('admin/layout/wrapp', $data, FALSE);
        } else {
            $slugcode = random_string('numeric', 5);
            $layanan_slug  = url_title($this->input->post('layanan_name'), 'dash', TRUE);
            $data  = [
                'user_id'               => $this->session->userdata('id'),
                'layanan_slug'          =>  $layanan_slug . '-' . $slugcode,
                'layanan_name'          => $this->input->post('layanan_name'),
                'layanan_icon'          => $this->input->post('layanan_icon'),
                'layanan_color'         => $this->input->post('layanan_color'),
                'layanan_desc'          => $this->input->post('layanan_desc'),
                'date_created'          => time()
            ];
            $this->layanan_model->create($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data telah ditambahkan</div>');
            redirect(base_url('admin/layanan'), 'refresh');
        }
    }

    public function update($id)
    {
        $layanan = $this->layanan_model->detail_layanan($id);

        $this->form_validation->set_rules(
            'layanan_name',
            'Nama Layanan',
            'required',
            array('required'         => '%s Harus Diisi')
        );
        $this->form_validation->set_rules(
            'layanan_desc',
            'Deskripsi Halaman',
            'required',
            array('required'         => '%s Harus Diisi')
        );
        if ($this->form_validation->run() === FALSE) {
            $data = [
                'title'             => 'Edit Layanan',
                'layanan'              => $layanan,
                'content'           => 'admin/layanan/update'
            ];
            $this->load->view('admin/layout/wrapp', $data, FALSE);
        } else {

            $data  = [
                'id'                        => $id,
                'user_id'                   => $this->session->userdata('id'),
                'layanan_name'              => $this->input->post('layanan_name'),
                'layanan_icon'              => $this->input->post('layanan_icon'),
                'layanan_color'              => $this->input->post('layanan_color'),
                'layanan_desc'              => $this->input->post('layanan_desc'),
                'date_updated'              => time()
            ];
            $this->layanan_model->update($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data telah di Update</div>');
            redirect(base_url('admin/layanan'), 'refresh');
        }
    }

    public function delete($id)
    {
        is_login();

        $layanan = $this->layanan_model->detail_layanan($id);
        $data = ['id'   => $layanan->id];
        $this->layanan_model->delete($data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger">Data telah di Hapus</div>');
        redirect(base_url('admin/layanan'), 'refresh');
    }
}
