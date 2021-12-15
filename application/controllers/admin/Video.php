<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Video extends CI_Controller
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
        $this->load->model('video_model');
    }

    public function index()
    {
        $config['base_url']       = base_url('admin/video/index/');
        $config['total_rows']     = count($this->video_model->total_row());
        $config['per_video']       = 10;
        $config['uri_segment']    = 4;

        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="video-item"><span class="video-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="video-item active"><span class="video-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="video-item"><span class="video-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="video-item"><span class="video-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="video-item"><span class="video-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="video-item"><span class="video-link">';
        $config['last_tagl_close']  = '</span></li>';

        $limit                    = $config['per_video'];
        $start                    = ($this->uri->segment(4)) ? ($this->uri->segment(4)) : 0;

        $this->pagination->initialize($config);

        $video = $this->video_model->get_video($limit, $start);
        $data = [
            'title'             => 'Halaman',
            'video'              => $video,
            'pagination'        => $this->pagination->create_links(),
            'content'           => 'admin/video/index'
        ];
        $this->load->view('admin/layout/wrapp', $data, FALSE);
    }

    public function create()
    {
        $this->form_validation->set_rules(
            'video_title',
            'Judul Halaman',
            'required',
            array(
                'required'         => '%s Harus Diisi'
            )
        );
        if ($this->form_validation->run() === FALSE) {
            $data = [
                'title'             => 'Buat Video',
                'deskripsi'         => 'Deskripsi',
                'keywords'          => 'Keywords',
                'content'           => 'admin/video/create'
            ];
            $this->load->view('admin/layout/wrapp', $data, FALSE);
        } else {
            $slugcode = random_string('numeric', 5);
            $video_slug  = url_title($this->input->post('video_title'), 'dash', TRUE);
            $data  = [
                'video_title'            => $this->input->post('video_title'),
                'video_title_en'         => $this->input->post('video_title_en'),
                'video_desc'             => $this->input->post('video_desc'),
                'video_desc_en'          => $this->input->post('video_desc_en'),
                'video_embed'          => $this->input->post('video_embed'),
                'created_at'      => date('Y-m-d H:i:s')
            ];
            $this->video_model->create($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data telah ditambahkan</div>');
            redirect(base_url('admin/video'), 'refresh');
        }
    }

    public function update($id)
    {
        $video = $this->video_model->detail_video($id);

        $this->form_validation->set_rules(
            'video_title',
            'Judul Video',
            'required',
            array('required'         => '%s Harus Diisi')
        );
        if ($this->form_validation->run() === FALSE) {
            $data = [
                'title'             => 'Edit halaman',
                'video'              => $video,
                'content'           => 'admin/video/update'
            ];
            $this->load->view('admin/layout/wrapp', $data, FALSE);
        } else {

            $data  = [
                'id'                        => $id,
                'video_title'               => $this->input->post('video_title'),
                'video_title_en'            => $this->input->post('video_title_en'),
                'video_desc'                => $this->input->post('video_desc'),
                'video_desc_en'             => $this->input->post('video_desc_en'),
                'video_embed'               => $this->input->post('video_embed'),
                'updated_at'                => date('Y-m-d H:i:s')
            ];
            $this->video_model->update($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data telah di Update</div>');
            redirect(base_url('admin/video'), 'refresh');
        }
    }

    public function delete($id)
    {
        is_login();

        $video = $this->video_model->detail_video($id);
        $data = ['id'   => $video->id];
        $this->video_model->delete($data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger">Data telah di Hapus</div>');
        redirect(base_url('admin/video'), 'refresh');
    }
}
