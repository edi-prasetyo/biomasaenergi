<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galery extends CI_Controller
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
    $this->load->model('galery_model');
    $this->load->library('pagination');
  }

  public function index()
  {
    $config['base_url']                   = base_url('admin/galery/index/');
    $config['total_rows']                 = count($this->galery_model->total_row());
    $config['per_page']                   = 8;
    $config['uri_segment']                = 4;

    $config['first_link']                 = 'First';
    $config['last_link']                  = 'Last';
    $config['next_link']                  = 'Next';
    $config['prev_link']                  = 'Prev';
    $config['full_tag_open']              = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
    $config['full_tag_close']             = '</ul></nav></div>';
    $config['num_tag_open']               = '<li class="page-item"><span class="page-link">';
    $config['num_tag_close']              = '</span></li>';
    $config['cur_tag_open']               = '<li class="page-item active"><span class="page-link">';
    $config['cur_tag_close']              = '<span class="sr-only">(current)</span></span></li>';
    $config['next_tag_open']              = '<li class="page-item"><span class="page-link">';
    $config['next_tagl_close']            = '<span aria-hidden="true">&raquo;</span></span></li>';
    $config['prev_tag_open']              = '<li class="page-item"><span class="page-link">';
    $config['prev_tagl_close']            = '</span>Next</li>';
    $config['first_tag_open']             = '<li class="page-item"><span class="page-link">';
    $config['first_tagl_close']           = '</span></li>';
    $config['last_tag_open']              = '<li class="page-item"><span class="page-link">';
    $config['last_tagl_close']            = '</span></li>';

    $limit                                = $config['per_page'];
    $start                                = ($this->uri->segment(4)) ? ($this->uri->segment(4)) : 0;

    $this->pagination->initialize($config);
    $galery = $this->galery_model->get_galery($limit, $start);
    $data = [
      'title'                               => 'Data Galery',
      'galery'                              => $galery,
      'pagination'                          => $this->pagination->create_links(),
      'content'                             => 'admin/galery/index'
    ];
    $this->load->view('admin/layout/wrapp', $data, FALSE);
  }

  public function create()
  {
    $this->form_validation->set_rules(
      'galery_title',
      'Judul Gambar',
      'required',
      [
        'required'                        => 'Judul Gambar harus di isi',
      ]
    );

    if ($this->form_validation->run()) {
      $config['upload_path']              = './assets/img/galery/';
      $config['allowed_types']            = 'gif|jpg|png|jpeg';
      $config['max_size']                 = 5000000;
      $config['max_width']                = 5000000;
      $config['max_height']               = 5000000;
      $config['remove_spaces']            = TRUE;
      $config['encrypt_name']             = TRUE;
      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('galery_img')) {

        $data = [
          'title'                         => 'Tambah Galery',
          'error_upload'                  => $this->upload->display_errors(),
          'content'                       => 'admin/galery/create'
        ];
        $this->load->view('admin/layout/wrapp', $data, FALSE);
      } else {
        $upload_data    = array('uploads'  => $this->upload->data());
        $config['image_library']          = 'gd2';
        $config['source_image']           = './assets/img/galery/' . $upload_data['uploads']['file_name'];
        $config['create_thumb']           = TRUE;
        $config['maintain_ratio']         = TRUE;
        $config['width']                  = 1000;
        $config['height']                 = 1000;
        $config['thumb_marker']           = '';
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
        $slugcode = random_string('numeric', 5);
        $galery_slug  = url_title($this->input->post('galery_title'), 'dash', TRUE);

        $data  = [
          'user_id'                             => $this->session->userdata('id'),
          'galery_slug'                         => $slugcode . '-' . $galery_slug,
          'galery_title'                        => $this->input->post('galery_title'),
          'galery_desc'                         => $this->input->post('galery_desc'),
          'galery_url'                          => $this->input->post('galery_url'),
          'galery_img'                          => $upload_data['uploads']['file_name'],
          'galery_type'                         => $this->input->post('galery_type'),
          'date_created'                        => time()
        ];
        $this->galery_model->create($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data Galery telah ditambahkan</div>');
        redirect(base_url('admin/galery'), 'refresh');
      }
    }
    $data = [
      'title'                             => 'Tambah Galery',
      'content'                           => 'admin/galery/create'
    ];
    $this->load->view('admin/layout/wrapp', $data, FALSE);
  }

  public function Update($id)
  {
    $galery = $this->galery_model->galery_detail($id);

    $valid = $this->form_validation;
    $valid->set_rules(
      'galery_title',
      'Nama Gambar',
      'required',
      ['required'                         => '%s harus diisi']
    );
    if ($valid->run()) {

      if (!empty($_FILES['galery_img']['name'])) {
        $config['upload_path']            = './assets/img/galery/';
        $config['allowed_types']          = 'gif|jpg|png|jpeg';
        $config['max_size']               = 5000000;
        $config['max_width']              = 5000000;
        $config['max_height']             = 5000000;
        $config['remove_spaces']          = TRUE;
        $config['encrypt_name']           = TRUE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('galery_img')) {

          $data = [
            'title'                         => 'Edit Galery',
            'galery'                        => $galery,
            'error_upload'                  => $this->upload->display_errors(),
            'content'                       => 'admin/galery/update'
          ];
          $this->load->view('admin/layout/wrapp', $data, FALSE);
        } else {

          $upload_data                    = array('uploads'  => $this->upload->data());
          $config['image_library']        = 'gd2';
          $config['source_image']         = './assets/img/galery/' . $upload_data['uploads']['file_name'];
          $config['create_thumb']         = TRUE;
          $config['maintain_ratio']       = TRUE;
          $config['width']                = 1000;
          $config['height']               = 1000;
          $config['thumb_marker']         = '';
          $this->load->library('image_lib', $config);
          $this->image_lib->resize();
          if ($galery->galery_img != "") {
            unlink('./assets/img/galery/' . $galery->galery_img);
          }

          $data  = [
            'id'                                  => $id,
            'user_id'                             => $this->session->userdata('id'),
            'galery_title'                        => $this->input->post('galery_title'),
            'galery_desc'                         => $this->input->post('galery_desc'),
            'galery_url'                          => $this->input->post('galery_url'),
            'galery_img'                          => $upload_data['uploads']['file_name'],
            'galery_type'                         => $this->input->post('galery_type'),
            'date_updated'                        => time()
          ];
          $this->galery_model->update($data);
          $this->session->set_flashdata('message', '<div class="alert alert-success">Data telah di Update</div>');
          redirect(base_url('admin/galery'), 'refresh');
        }
      } else {
        if ($galery->galery_img != "")
          $data  = [
            'id'                                  => $id,
            'user_id'                             => $this->session->userdata('id'),
            'galery_title'                        => $this->input->post('galery_title'),
            'galery_desc'                         => $this->input->post('galery_desc'),
            'galery_url'                          => $this->input->post('galery_url'),
            'galery_type'                         => $this->input->post('galery_type'),
            'date_updated'                        => time()
          ];
        $this->galery_model->update($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data telah di Update</div>');
        redirect(base_url('admin/galery'), 'refresh');
      }
    }
    $data = [
      'title'                               => 'Update Galery',
      'galery'                              => $galery,
      'content'                             => 'admin/galery/update'
    ];
    $this->load->view('admin/layout/wrapp', $data, FALSE);
  }

  public function delete($id)
  {
    is_login();
    $galery                               = $this->galery_model->galery_detail($id);
    if ($galery->galery_img != "") {
      unlink('./assets/img/galery/' . $galery->galery_img);
    }
    $data = ['id'                           => $galery->id];
    $this->galery_model->delete($data);
    $this->session->set_flashdata('message', '<div class="alert alert-danger">Data telah di Hapus</div>');
    redirect($_SERVER['HTTP_REFERER']);
  }
}
