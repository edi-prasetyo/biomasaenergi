<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan extends CI_Controller
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
        $this->load->model('pengaturan_model');
        $this->load->model('pembayaran_model');
        $this->load->model('kirimemail_model');
    }
    public function index()
    {
        $email_register                = $this->pengaturan_model->email_register();
        $email_order                   = $this->pengaturan_model->email_order();
        $payment                        = $this->pembayaran_model->get_pembayaran();
        $sendemail                      = $this->kirimemail_model->get_sendemail();

        $data    = [
            'title'                     => 'Pengaturan',
            'email_register'            => $email_register,
            'email_order'               => $email_order,
            'payment'                   => $payment,
            'sendemail'                 => $sendemail,
            'content'                   => 'admin/pengaturan/index_pengaturan'
        ];
        $this->load->view('admin/layout/wrapp', $data, FALSE);
    }

    public function update($id)
    {
        $pengaturan = $this->pengaturan_model->detail_pengaturan($id);
        $this->form_validation->set_rules(
            'name',
            'Nama',
            'required',
            array('required'            => '%s Harus Diisi')
        );
        if ($this->form_validation->run() === FALSE) {
            $data = [
                'title'                   => 'Update Pengaturan',
                'pengaturan'                    => $pengaturan,
                'content'                 => 'admin/pengaturan/update_pengaturan'
            ];
            $this->load->view('admin/layout/wrapp', $data, FALSE);
        } else {
            $data = [
                'id'                        => $pengaturan->id,
                'name'                      => $this->input->post('name'),
                'protocol'                  => $this->input->post('protocol'),
                'smtp_host'                 => $this->input->post('smtp_host'),
                'smtp_port'                 => $this->input->post('smtp_port'),
                'smtp_user'                 => $this->input->post('smtp_user'),
                'smtp_pass'                 => $this->input->post('smtp_pass'),
                'date_updated'              => time()
            ];
            $this->pengaturan_model->update($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data telah di ubah</div>');
            redirect(base_url('admin/pengaturan'), 'refresh');
        }
    }
    public function payment()
    {
        $payment = $this->pembayaran_model->get_pembayaran();
        $this->form_validation->set_rules(
            'status',
            'Nama',
            'required',
            array('required'            => '%s Harus Diisi')
        );
        if ($this->form_validation->run() === FALSE) {
            $data = [
                'title'                   => 'Update Pengaturan',
                'payment'                 => $payment,
                'content'                 => 'admin/pengaturan/payment'
            ];
            $this->load->view('admin/layout/wrapp', $data, FALSE);
        } else {
            $data = [
                'id'                        => $this->input->post('id'),
                'status'                    => $this->input->post('status'),
                'date_updated'              => time()
            ];
            $this->pembayaran_model->update($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data telah di ubah</div>');
            redirect(base_url('admin/pengaturan'), 'refresh');
        }
    }

    public function payment_inactive($id)
    {
        is_login();
        $data = [
            'id'                    => $id,
            'status'             => 0,
        ];
        $this->pembayaran_model->update($data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger">Pembayaran di Nonaktifkan</div>');
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function payment_active($id)
    {
        is_login();
        $data = [
            'id'                    => $id,
            'status'             => 1,
        ];
        $this->pembayaran_model->update($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Pembayaran Telah di Aktifkan</div>');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function sendemail()
    {
        $sendemail = $this->pengaturan_model->sendemail_status_all();
        $data = [
            'title'     => 'Kirim Email',
            'sendemail'  => $sendemail,
            'content'   => 'admin/pengaturan/index_pengaturan'
        ];
        $this->load->view('admin/layout/wrapp', $data, FALSE);
    }
    public function sendemail_inactive($id)
    {
        is_login();
        $data = [
            'id'                    => $id,
            'status'                => 0,
        ];
        $this->kirimemail_model->update($data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Telah di Update</div>');
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function sendemail_active($id)
    {
        is_login();
        $data = [
            'id'                    => $id,
            'status'                => 1,
        ];
        $this->kirimemail_model->update($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data Telah di Update</div>');
        redirect($_SERVER['HTTP_REFERER']);
    }
}
