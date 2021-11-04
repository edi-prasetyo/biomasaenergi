<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
    $this->load->model('transaction_model');
  }
  public function index()
  {
    $user_member                  = $this->user_model->user_member();
    $transaction                    = $this->transaction_model->get_alltransaction();
    $pembelian                    = $this->transaction_model->get_pembelian();
    $penjualan                    = $this->transaction_model->get_penjualan();
    $profit                    = $this->transaction_model->get_profit();
    $count_user                   = $this->user_model->listUser();
    // var_dump($pembelian);
    // die;
    $data = [
      'title'                     => 'Dashboard',
      'user_member'               => $user_member,
      'transaction'               => $transaction,
      'pembelian'                 => $pembelian,
      'penjualan'                 => $penjualan,
      'profit'                    => $profit,
      'count_user'                => $count_user,
      'content'                   => 'admin/dashboard/dashboard'
    ];
    $this->load->view('admin/layout/wrapp', $data, FALSE);
  }
}
