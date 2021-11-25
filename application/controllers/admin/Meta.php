<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Meta extends CI_Controller
{
  /**
   * Development By Edi Prasetyo
   * edikomputer@gmail.com
   * 0812 3333 5523
   * https://edikomputer.com
   * https://grahastudio.com
   */
  //Load Data Konfigurasi
  public function __construct()
  {
    parent::__construct();
    $this->load->model('meta_model');
  }
  public function index()
  {
    $meta                       = $this->meta_model->get_meta();
    $data                       = [
      'title'                   => 'Profile Web',
      'meta'                    => $meta,
      'content'                 => 'admin/meta/index_meta'
    ];
    $this->load->view('admin/layout/wrapp', $data, FALSE);
  }
  public function update($id)
  {
    $meta = $this->meta_model->detail_meta($id);
    $this->form_validation->set_rules(
      'title',
      'Judul Web',
      'required',
      array('required'            => '%s Harus Diisi')
    );
    if ($this->form_validation->run() === FALSE) {
      $data = [
        'title'                   => 'Update Profile Web',
        'meta'                    => $meta,
        'content'                 => 'admin/meta/update_meta'
      ];
      $this->load->view('admin/layout/wrapp', $data, FALSE);
    } else {
      $data = [
        'id'                      => $meta->id,
        'user_id'                 => $this->session->userdata('id'),
        'title'                   => $this->input->post('title'),
        'tagline'                 => $this->input->post('tagline'),
        'description'             => $this->input->post('description'),
        'keywords'                => $this->input->post('keywords'),
        'google_meta'             => $this->input->post('google_meta'),
        'bing_meta'               => $this->input->post('bing_meta'),
        'google_analytics'        => $this->input->post('google_analytics'),
        'google_tag'              => $this->input->post('google_tag'),
        'email'                   => $this->input->post('email'),
        'telepon'                 => $this->input->post('telepon'),
        'whatsapp'                => $this->input->post('whatsapp'),
        'alamat'                  => $this->input->post('alamat'),
        'link'                    => $this->input->post('link'),
        'map'                     => $this->input->post('map'),
        'facebook'                => $this->input->post('facebook'),
        'instagram'               => $this->input->post('instagram'),
        'youtube'                 => $this->input->post('youtube'),
        'twitter'                 => $this->input->post('twitter'),
        'date_updated'            => time()
      ];
      $this->meta_model->update($data);
      $this->session->set_flashdata('message', '<div class="alert alert-success">Data telah di ubah</div>');
      redirect(base_url('admin/meta'), 'refresh');
    }
  }
  public function logo()
  {
    $meta = $this->meta_model->get_meta();

    $this->form_validation->set_rules(
      'id',
      'Logo',
      'required',
      array('required'              => '%s Harus Diisi')
    );
    if ($this->form_validation->run()) {
      $config['upload_path']        = './assets/img/logo/';
      $config['allowed_types']      = 'gif|jpg|png|jpeg|svg';
      $config['max_size']           = 5000000;
      $config['max_width']          = 5000000;
      $config['max_height']         = 5000000;
      $config['remove_spaces']      = TRUE;
      $config['encrypt_name']       = TRUE;
      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('logo')) {

        $data = [
          'title'                   => 'Update Logo',
          'meta'                    => $meta,
          'error'                   => $this->upload->display_errors(),
          'content'                 => 'admin/meta/index_meta'
        ];
        $this->load->view('admin/layout/wrapp', $data, FALSE);
      } else {

        $upload_data                = array('uploads'  => $this->upload->data());
        $config['image_library']    = 'gd2';
        $config['source_image']     = './assets/img/logo/' . $upload_data['uploads']['file_name'];
        $config['new_image']        = './assets/img/logo/thumbs/' . $upload_data['uploads']['file_name'];
        $config['create_thumb']     = TRUE;
        $config['maintain_ratio']   = TRUE;
        $config['width']            = 200;
        $config['height']           = 200;
        $config['thumb_marker']     = '';
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();

        if ($meta->logo != "") {
          unlink('./assets/img/logo/' . $meta->logo);
          unlink('./assets/img/logo/thumbs/' . $meta->logo);
        }
        $data  = [
          'id'                      => $meta->id,
          'user_id'                 => $this->session->userdata('id'),
          'logo'                    => $upload_data['uploads']['file_name']
        ];
        $this->meta_model->update($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data telah diubah</div>');
        redirect(base_url('admin/meta'), 'refresh');
      }
    }

    $data = [
      'title'                       => 'Logo Website',
      'meta'                        => $meta,
      'content'                     => 'admin/meta/index_meta'
    ];
    $this->load->view('admin/layout/wrapp', $data, FALSE);
  }
  public function favicon()
  {
    $meta = $this->meta_model->get_meta();

    $this->form_validation->set_rules(
      'id',
      'Nama Perusahaan',
      'required',
      array('required'              => '%s Harus Diisi')
    );
    if ($this->form_validation->run()) {

      $config['upload_path']          = './assets/img/logo/';
      $config['allowed_types']        = 'gif|jpg|png|jpeg|svg';
      $config['max_size']             = 5000000;
      $config['max_width']            = 5000000;
      $config['max_height']           = 5000000;
      $config['remove_spaces']        = TRUE;
      $config['encrypt_name']         = TRUE;
      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('favicon')) {

        $data = [
          'title'                     => 'Update Favicon',
          'meta'                      => $meta,
          'error'                     => $this->upload->display_errors(),
          'content'                   => 'admin/meta/index_meta'
        ];
        $this->load->view('admin/layout/wrapp', $data, FALSE);
      } else {
        $upload_data                  = array('uploads'  => $this->upload->data());
        $config['image_library']      = 'gd2';
        $config['source_image']       = './assets/img/logo/' . $upload_data['uploads']['file_name'];
        $config['new_image']          = './assets/img/logo/thumbs/' . $upload_data['uploads']['file_name'];
        $config['create_thumb']       = TRUE;
        $config['maintain_ratio']     = TRUE;
        $config['width']              = 200;
        $config['height']             = 200;
        $config['thumb_marker']       = '';
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
        if ($meta->favicon != "") {
          unlink('./assets/img/logo/' . $meta->favicon);
          unlink('./assets/img/logo/thumbs/' . $meta->favicon);
        }
        $data  = [
          'id'                        => $meta->id,
          'user_id'                   => $this->session->userdata('id'),
          'favicon'                   => $upload_data['uploads']['file_name']
        ];
        $this->meta_model->update($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data telah diubah</div>');
        redirect(base_url('admin/meta'), 'refresh');
      }
    }
    $data = [
      'title'                         => 'Favicon Website',
      'meta'                          => $meta,
      'content'                       => 'admin/meta/index_meta'
    ];
    $this->load->view('admin/layout/wrapp', $data, FALSE);
  }
}
