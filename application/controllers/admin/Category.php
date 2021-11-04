<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
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
    $this->load->model('category_model');
  }

  public function index()
  {
    $category = $this->category_model->get_category();

    $this->form_validation->set_rules(
      'category_name',
      'Nama Kategori',
      'required|is_unique[category.category_name]',
      array(
        'required'                        => '%s Harus Diisi',
        'is_unque'                        => '%s <strong>' . $this->input->post('category_name') .
          '</strong>Nama Kategori Sudah Ada. Buat Nama yang lain!'
      )
    );
    if ($this->form_validation->run() === FALSE) {
      $data = [
        'title'                           => 'Category Artikel',
        'category'                        => $category,
        'content'                         => 'admin/category/index'
      ];
      $this->load->view('admin/layout/wrapp', $data, FALSE);
    } else {
      $slugcode = random_string('numeric', 5);
      $category_slug  = url_title($this->input->post('category_name'), 'dash', TRUE);
      $data  = [
        'category_slug'                   => $slugcode . '-' . $category_slug,
        'category_name'                   => $this->input->post('category_name'),
        'date_created'                    => time()
      ];
      $this->category_model->create($data);
      $this->session->set_flashdata('message', '<div class="alert alert-success">Data telah ditambahkan</div>');
      redirect(base_url('admin/category'), 'refresh');
    }
  }

  public function update($id)
  {
    $category = $this->category_model->detail_category($id);

    $this->form_validation->set_rules(
      'category_name',
      'Nama Kategori',
      'required',
      array('required'                  => '%s Harus Diisi')
    );
    if ($this->form_validation->run() === FALSE) {

      $data = [
        'title'                         => 'Edit kategori Berita',
        'category'                      => $category,
        'content'                       => 'admin/category/update'
      ];
      $this->load->view('admin/layout/wrapp', $data, FALSE);
    } else {
      $data  = [
        'id'                            => $id,
        'category_name'                 => $this->input->post('category_name'),
        'date_updated'                  => time()
      ];
      $this->category_model->update($data);
      $this->session->set_flashdata('message', '<div class="alert alert-success">Data telah di Update</div>');
      redirect(base_url('admin/category'), 'refresh');
    }
  }

  public function delete($id)
  {
    is_login();
    $category = $this->category_model->detail_category($id);
    $data = ['id'   => $category->id];
    $this->category_model->delete($data);
    $this->session->set_flashdata('message', '<div class="alert alert-danger">Data telah di Hapus</div>');
    redirect(base_url('admin/category'), 'refresh');
  }
}
