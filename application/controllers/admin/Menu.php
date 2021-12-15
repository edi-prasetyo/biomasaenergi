<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
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
    $this->load->model('menu_model');
    $this->load->library('pagination');
  }
  public function index()
  {
    $list_menu = $this->menu_model->get_menu();
    $data = [
      'title'                     => 'Manajemen Menu',
      'list_menu'                 => $list_menu,
      'content'                   => 'admin/menu/index'
    ];
    $this->load->view('admin/layout/wrapp', $data, FALSE);
  }
  public function create()
  {
    $this->form_validation->set_rules(
      'name_id',
      'Nama Menu Indonesia',
      'required',
      [
        'required'                => 'Nama Menu Indonesia Email harus di isi',
      ]
    );
    $this->form_validation->set_rules(
      'urutan',
      'Urutan',
      'required|is_unique[menu.urutan]',
      [
        'required'                => 'Nama Menu Indonesia Email harus di isi',
        'is_unique'               => 'nomor Urut sudah ada, Gunakan nomor lain'
      ]
    );

    if ($this->form_validation->run() == false) {
      $data = [
        'title'                   => "Create menu",
        'content'                 => 'admin/menu/create'
      ];
      $this->load->view('admin/layout/wrapp', $data, FALSE);
    } else {
      $data = [
        'name_en'                 => $this->input->post('name_en'),
        'name_id'                 => $this->input->post('name_id'),
        'url'                     => $this->input->post('url'),
        'urutan'                  => $this->input->post('urutan'),
        'created_at'              => date('Y-m-d H:i:s')
      ];
      $this->menu_model->create($data);
      $this->session->set_flashdata('message', '<div class="alert alert-success">Data telah ditambahkan</div>');
      redirect(base_url('admin/menu'), 'refresh');
    }
  }
  public function update($id)
  {
    $menu = $this->menu_model->detail_menu($id);
    $this->form_validation->set_rules(
      'name_id',
      'Nama Menu Indonesia',
      'required',
      [
        'required'                => 'Nama Menu Indonesia Email harus di isi',
      ]
    );
    $this->form_validation->set_rules(
      'urutan',
      'Urutan',
      'required|is_unique[menu.urutan]',
      [
        'required'                => 'Nama Menu Indonesia Email harus di isi',
        'is_unique'               => 'nomor Urut sudah ada, Gunakan nomor lain'
      ]
    );
    if ($this->form_validation->run() == false) {
      $data = [
        'title'                   => "Update menu",
        'menu'                    => $menu,
        'content'                 => 'admin/menu/update'
      ];
      $this->load->view('admin/layout/wrapp', $data, FALSE);
    } else {
      $data = [
        'id'                      => $id,
        'name_en'                 => $this->input->post('name_en'),
        'name_id'                 => $this->input->post('name_id'),
        'url'                     => $this->input->post('url'),
        'urutan'                  => $this->input->post('urutan'),
        'updated_at'              => date('Y-m-d H:i:s')
      ];
      $this->menu_model->update($data);
      $this->session->set_flashdata('message', '<div class="alert alert-success">Data telah di ubah</div>');
      redirect(base_url('admin/menu'), 'refresh');
    }
  }
  public function delete($id)
  {
    is_login();
    $menu = $this->menu_model->detail_menu($id);
    $data = array('id'   => $menu->id);
    $this->menu_model->delete($data);
    $this->session->set_flashdata('message', '<div class="alert alert-danger">Data telah di Hapus</div>');
    redirect(base_url('admin/menu'), 'refresh');
  }
}
