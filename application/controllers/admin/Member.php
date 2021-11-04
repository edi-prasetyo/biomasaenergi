<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
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
    $this->load->model('user_model');
    $this->load->library('pagination');
  }
  public function index()
  {
    $list_seller = $this->user_model->user_member();
    $data = [
      'title'                 => 'Data Member',
      'list_seller'           => $list_seller,
      'content'               => 'admin/user/index_member'
    ];
    $this->load->view('admin/layout/wrapp', $data, FALSE);
  }

  public function detail($id)
  {
    $user_detail =  $this->user_model->detail($id);
    $data = [
      'title'                 => 'Data User',
      'user_detail'           => $user_detail,
      'content'               => 'admin/user/detail_user'
    ];
    $this->load->view('admin/layout/wrapp', $data, FALSE);
  }

  public function banned($id)
  {
    is_login();
    $data = [
      'id'                    => $id,
      'is_active'             => 0,
    ];
    $this->user_model->update($data);
    $this->session->set_flashdata('message', '<div class="alert alert-danger">User Telah di banned</div>');
    redirect($_SERVER['HTTP_REFERER']);
  }
  public function activated($id)
  {
    is_login();
    $data = [
      'id'                    => $id,
      'is_active'             => 1,
    ];
    $this->user_model->update($data);
    $this->session->set_flashdata('message', '<div class="alert alert-success">User Telah di Aktifkan</div>');
    redirect($_SERVER['HTTP_REFERER']);
  }
}
