<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction extends CI_Controller
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
        $this->load->model('transaction_model');
        $this->load->model('customer_model');
        $this->load->model('product_model');
        $this->load->library('pagination');
    }
    public function index()
    {
        $config['base_url']         = base_url('admin/transaction/index/');
        $config['total_rows']       = count($this->transaction_model->total_row());
        $config['per_page']         = 10;
        $config['uri_segment']      = 4;

        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $limit                      = $config['per_page'];
        $start                      = ($this->uri->segment(4)) ? ($this->uri->segment(4)) : 0;

        $this->pagination->initialize($config);
        $transaction = $this->transaction_model->get_transaction($limit, $start);
        $data = [
            'title'                         => 'Penjualan',
            'transaction'                   => $transaction,
            'pagination'                    => $this->pagination->create_links(),
            'content'                       => 'admin/transaction/index'
        ];
        $this->load->view('admin/layout/wrapp', $data, FALSE);
    }
    public function create()
    {

        $product = $this->product_model->get_product();
        $order_code = date('dmy') . strtoupper(random_string('alnum', 3));
        $customer = $this->customer_model->get_customer();

        $this->form_validation->set_rules(
            'qty',
            'Quantity',
            'required',
            [
                'required'                  => 'Quantity harus di isi',
            ]
        );
        if ($this->form_validation->run() == false) {
            $data = [
                'title'                     => 'Buat Penjualan',
                'product'                   => $product,
                'customer'                 => $customer,
                'content'                   => 'admin/transaction/create'
            ];
            $this->load->view('admin/layout/wrapp', $data, FALSE);
        } else {

            $input_buy                  = $this->input->post('price_buy');
            $price_buy                  = preg_replace('/\D/', '', $input_buy);

            $input_sell                 = $this->input->post('price_sell');
            $price_sell                 = preg_replace('/\D/', '', $input_sell);

            $input_qty                  = $this->input->post('qty');
            $qty                        = preg_replace('/\D/', '', $input_qty);


            $profit = (int)$price_sell - (int)$price_buy;
            $data = [
                'created_by'                => $this->session->userdata('id'),
                'customer_id'               => $this->input->post('customer_id'),
                'fullname'                  => $this->input->post('fullname'),
                'company'                   => $this->input->post('company'),
                'address'                   => $this->input->post('address'),
                'city_name'                 => $this->input->post('city_name'),
                'province_name'             => $this->input->post('province_name'),
                'postal_code'               => $this->input->post('postal_code'),
                'email'                     => $this->input->post('email'),
                'phone'                     => $this->input->post('phone'),
                'whatsapp'                  => $this->input->post('whatsapp'),
                'order_code'                => $order_code,
                'product_id'                => $this->input->post('product_id'),
                'product_name'              => $this->input->post('product_name'),
                'product_spesification'     => $this->input->post('product_spesification'),
                'qty'                       => $qty,
                'price_buy'                 => $price_buy,
                'price_sell'                => $price_sell,
                'profit'                    => $profit,
                'payment'                   => $this->input->post('payment'),
                'payment_status'            => 'Paid',
                'created_at'                => date('Y-m-d H:i:s')
            ];
            $insert_id = $this->transaction_model->create($data);
            $this->_autoupdate($insert_id);
            $this->_count_order($insert_id);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data telah ditambahkan</div>');
            redirect(base_url('admin/transaction'), 'refresh');
        }
    }
    public function _autoupdate($insert_id)
    {
        $transaction = $this->transaction_model->last_detail($insert_id);
        if ($transaction->payment == 'transfer') {
            $due_date           = date('Y-m-d');
            $number             = str_pad($insert_id, 4, '0', STR_PAD_LEFT);
            $date_inv           = date("d/m/y");
            $invoice_number     = 'INV/BEM/' . $date_inv . '/' . $number;
            $delivery_number    = 'DLV/BEM/' . $date_inv . '/' . $number;
            $data = [
                'id'                        => $insert_id,
                'invoice_number'            => $invoice_number,
                'delivery_number'            => $delivery_number,
                'due_date'                  => $due_date,
            ];
            $this->transaction_model->update($data);
        } elseif ($transaction->payment == '7') {
            $date           = date("Y-m-d");
            $due_date       = date("Y-m-d", strtotime("$date +7 day"));
            $number         = str_pad($insert_id, 4, '0', STR_PAD_LEFT);
            $date_inv       = date("d/m/y");
            $payment_status = 'Unpaid';
            $invoice_number = 'INV/BEM/' . $date_inv . '/' . $number;
            $delivery_number = 'DLV/BEM/' . $date_inv . '/' . $number;
            $data = [
                'id'                        => $insert_id,
                'invoice_number'            => $invoice_number,
                'delivery_number'            => $delivery_number,
                'payment_status'            => $payment_status,
                'due_date'                  => $due_date,
            ];
            $this->transaction_model->update($data);
        } else {
            $date           = date("Y-m-d");
            $due_date       = date("Y-m-d", strtotime("$date +14 day"));
            $number         = str_pad($insert_id, 4, '0', STR_PAD_LEFT);
            $date_inv       = date("d/m/y");
            $payment_status = 'Unpaid';
            $invoice_number = 'INV/BEM/' . $date_inv . '/' . $number;
            $delivery_number = 'DLV/BEM/' . $date_inv . '/' . $number;
            $data = [
                'id'                        => $insert_id,
                'invoice_number'            => $invoice_number,
                'delivery_number'            => $delivery_number,
                'payment_status'            => $payment_status,
                'due_date'                  => $due_date,
            ];
            $this->transaction_model->update($data);
        }
    }
    public function _count_order($insert_id)
    {
        $transaction = $this->transaction_model->last_detail($insert_id);
        $customer_id = $transaction->customer_id;
        $customer = $this->customer_model->customer_detail($customer_id);

        $customer_order = $customer->customer_order + 1;

        $data = [
            'id'                        => $customer_id,
            'customer_order'            => $customer_order,
        ];
        $this->customer_model->update($data);
    }
    public function update($id)
    {
        $product = $this->product_model->get_product();
        $transaction = $this->transaction_model->detail($id);
        $this->form_validation->set_rules(
            'qty',
            'Quantity',
            'required',
            [
                'required'                => 'Quantity harus di isi',
            ]
        );
        if ($this->form_validation->run() == false) {
            $data = [
                'title'                   => "Ubah Pembelian",
                'transaction'             => $transaction,
                'product'                   => $product,
                'content'                 => 'admin/transaction/update'
            ];
            $this->load->view('admin/layout/wrapp', $data, FALSE);
        } else {
            $input_buy                  = $this->input->post('price_buy');
            $price_buy                  = preg_replace('/\D/', '', $input_buy);

            $input_sell                 = $this->input->post('price_sell');
            $price_sell                 = preg_replace('/\D/', '', $input_sell);

            $input_qty                  = $this->input->post('qty');
            $qty                        = preg_replace('/\D/', '', $input_qty);

            $profit = (int)$price_sell - (int)$price_buy;
            $data = [
                'id'                        => $id,
                'created_by'                => $this->session->userdata('id'),
                'customer_id'               => $this->input->post('customer_id'),
                'fullname'                  => $this->input->post('fullname'),
                'company'                   => $this->input->post('company'),
                'address'                   => $this->input->post('address'),
                'city_name'                 => $this->input->post('city_name'),
                'province_name'             => $this->input->post('province_name'),
                'postal_code'               => $this->input->post('postal_code'),
                'email'                     => $this->input->post('email'),
                'phone'                     => $this->input->post('phone'),
                'whatsapp'                  => $this->input->post('whatsapp'),
                'product_id'                => $this->input->post('product_id'),
                'product_name'              => $this->input->post('product_name'),
                'product_spesification'     => $this->input->post('product_spesification'),
                'qty'                       => $qty,
                'price_buy'                 => $price_buy,
                'price_sell'                => $price_sell,
                'profit'                    => $profit,
                'payment'                   => $this->input->post('payment'),
                'updated_at'                => date('Y-m-d H:i:s')
            ];
            $this->transaction_model->update($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data telah di ubah</div>');
            redirect(base_url('admin/transaction'), 'refresh');
        }
    }
    public function paid($id)
    {
        $data = [
            'id'                        => $id,
            'payment_status'            => 'Paid',
        ];
        $this->transaction_model->update_paid($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Status Pembayaran Telah di ubah</div>');
        redirect(base_url('admin/transaction/detail/' . $id), 'refresh');
    }
    public function detail($id)
    {
        $transaction = $this->transaction_model->detail($id);
        $data = [
            'title'                   => "Detail Penjualan",
            'transaction'             => $transaction,
            'content'                 => 'admin/transaction/detail'
        ];
        $this->load->view('admin/layout/wrapp', $data, FALSE);
    }
    public function invoice($id)
    {
        $transaction = $this->transaction_model->detail($id);
        $data = [
            'title'                   => "Invoice",
            'transaction'             => $transaction,
            'content'                 => 'admin/transaction/invoice'
        ];
        $this->load->view('admin/layout/wrapp', $data, FALSE);
    }
    public function print_invoice($id)
    {
        $transaction = $this->transaction_model->detail($id);
        $data = [
            'title'                   => "Invoice",
            'transaction'             => $transaction,
        ];
        $this->load->view('admin/transaction/print_invoice', $data, FALSE);
    }
    public function delivery($id)
    {
        $transaction = $this->transaction_model->detail($id);
        $data = [
            'title'                   => "Surat Jalan",
            'transaction'             => $transaction,
            'content'                 => 'admin/transaction/delivery'
        ];
        $this->load->view('admin/layout/wrapp', $data, FALSE);
    }
    public function print_delivery($id)
    {
        $transaction = $this->transaction_model->detail($id);
        $data = [
            'title'                   => "Surat Jalan",
            'transaction'             => $transaction,
        ];
        $this->load->view('admin/transaction/print_delivery', $data, FALSE);
    }
    public function cancel($id)
    {
        is_login();
        $data = [
            'id'                        => $id,
            'status'                    => 0,
        ];
        $this->transaction_model->update($data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger">Transaksi telah di cancel</div>');
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function delete($id)
    {
        is_login();
        $transaction = $this->transaction_model->detail($id);
        $data = array('id'   => $transaction->id);
        $this->transaction_model->delete($data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger">Data telah di Hapus</div>');
        redirect(base_url('admin/transaction'), 'refresh');
    }
    function convertpdf()
    {


        // Get output html
        $html = $this->output->get_output();

        // Load pdf library
        $this->load->library('pdf');

        // Load HTML content
        $this->pdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $this->pdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $this->pdf->render();

        // Output the generated PDF (1 = download and 0 = preview)
        $this->pdf->stream("welcome.pdf", array("Attachment" => 0));
    }
}
