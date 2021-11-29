<?php
defined('BASEPATH') or exit('No direct script access allowed');


require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Report extends CI_Controller
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
        $this->load->model('report_model');
        $this->load->model('product_model');
        $this->load->model('customer_model');
        $this->load->library('pagination');
    }
    public function index()
    {
        $config['base_url']         = base_url('admin/report/index/');
        $config['total_rows']       = count($this->report_model->total_row());
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
        $report                 = $this->report_model->get_report($limit, $start);
        $total_unit             = $this->report_model->total_unit();
        $total_pembelian        = $this->report_model->total_pembelian();
        $total_penjualan        = $this->report_model->total_penjualan();
        $total_profit           = $this->report_model->total_profit();
        $customer               = $this->customer_model->get_customer();

        $transaction_month      = $this->report_model->transaction_month();
        $pembelian_month        = $this->report_model->pembelian_month();
        $penjualan_month        = $this->report_model->penjualan_month();
        $profit_month           = $this->report_model->profit_month();
        // var_dump(count($transaction_month));
        // die;

        $data = [
            'title'                     => 'Laporan Penjualan',
            'report'                    => $report,
            'total_unit'                => $total_unit,
            'total_pembelian'           => $total_pembelian,
            'total_penjualan'           => $total_penjualan,
            'total_profit'              => $total_profit,
            'customer'                  => $customer,
            'transaction_month'         => $transaction_month,
            'pembelian_month'           => $pembelian_month,
            'penjualan_month'           => $penjualan_month,
            'profit_month'              => $profit_month,
            'pagination'                => $this->pagination->create_links(),
            'content'                   => 'admin/report/index'
        ];
        $this->load->view('admin/layout/wrapp', $data, FALSE);
    }

    public function cancel()
    {
        $config['base_url']         = base_url('admin/report/cancel/index/');
        $config['total_rows']       = count($this->report_model->total_row_cancel());
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
        $cancel                 = $this->report_model->get_cancel($limit, $start);
        // $total_unit             = $this->report_model->total_unit();
        // $total_pembelian        = $this->report_model->total_pembelian();
        // $total_penjualan        = $this->report_model->total_penjualan();
        // $total_profit           = $this->report_model->total_profit();
        // $customer               = $this->customer_model->get_customer();


        $data = [
            'title'                     => 'Laporan Cancel Order',
            'cancel'                    => $cancel,
            // 'total_unit'                => $total_unit,
            // 'total_pembelian'           => $total_pembelian,
            // 'total_penjualan'           => $total_penjualan,
            // 'total_profit'              => $total_profit,
            // 'customer'                  => $customer,
            'pagination'                => $this->pagination->create_links(),
            'content'                   => 'admin/report/cancel'
        ];
        $this->load->view('admin/layout/wrapp', $data, FALSE);
    }

    public function filter()
    {
        $start_date = "";
        if ($this->input->post('start_date') != NULL) {
            $start_date = $this->input->post('start_date');
            //$this->session->set_userdata(array("start_date" => $start_date));
        } else {
            if ($this->session->userdata('start_date') != NULL) {
                //$start_date = $this->session->userdata('start_date');
            }
        }
        $end_date = "";
        if ($this->input->post('end_date') != NULL) {
            $end_date = $this->input->post('end_date');
            //$this->session->set_userdata(array("end_date" => $end_date));
        } else {
            if ($this->session->userdata('end_date') != NULL) {
                //$end_date = $this->session->userdata('end_date');
            }
        }
        $customer_id = "";
        if ($this->input->post('customer_id') != NULL) {
            $customer_id = $this->input->post('customer_id');
            //$this->session->set_userdata(array("customer_id" => $customer_id));
            $company = $this->customer_model->customer_detail($customer_id);
            $company_name = $company->company;
        } else {
            if ($this->session->userdata('customer_id') != NULL) {
                // $customer_id = $this->session->userdata('customer_id');
                $company = $this->customer_model->customer_detail($customer_id);
                $company_name = $company->company;
            }
        }

        $report                             = $this->report_model->filter_report($start_date, $end_date, $customer_id);
        $total_pembelian                    = $this->report_model->total_pricebuy_date($start_date, $end_date, $customer_id);
        $total_penjualan                    = $this->report_model->total_pricesell_date($start_date, $end_date, $customer_id);
        $total_unit                         = $this->report_model->total_unit_date($start_date, $end_date, $customer_id);
        $total_profit                       = $this->report_model->total_profit_date($start_date, $end_date, $customer_id);
        //$customer                         = $this->report_model->total_profit_date($start_date, $end_date, $customer_id);
        $customer                           = $this->customer_model->get_customer();
        // $total_pemasukan                 = $this->kas_model->total_pemasukan();
        // $total_pengeluaran               = $this->kas_model->total_pengeluaran();

        $data = [
            'title'                         => 'Filter Laporan Per tanggal',
            'report'                        => $report,
            'total_pembelian'               => $total_pembelian,
            'total_penjualan'               => $total_penjualan,
            'total_unit'                    => $total_unit,
            'total_profit'                  => $total_profit,
            'customer'                      => $customer,
            'start_date'                    => $start_date,
            'end_date'                      => $end_date,
            'company_name'                  => $company_name,
            'content'                       => 'admin/report/filter'
        ];
        $this->session->set_flashdata('messagefilter',  '<div class="alert alert-success">Data Penjualan dari Tanggal ' . date(" j, F Y,", strtotime($start_date)) . ' Sampai Tanggal ' .  date(" j, F Y,", strtotime($end_date)) . '</div>');
        $this->load->view('admin/layout/wrapp', $data, FALSE);
    }



    public function export()
    {

        $transaction = $this->report_model->get_alltransaction();
        $total_profit           = $this->report_model->total_profit();

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Tanggal')
            ->setCellValue('C1', 'Customer')
            ->setCellValue('D1', 'Harga Beli')
            ->setCellValue('E1',  'Harga Jual')
            ->setCellValue('F1',  'Profit')
            ->setCellValue('D2',  $total_profit)
            ->setCellValue('E2',  $total_profit)
            ->setCellValue('F2',  $total_profit);
        $kolom = 3;
        $nomor = 1;
        foreach ($transaction as $transaction) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, date('j F Y', strtotime($transaction->created_at)))
                ->setCellValue('C' . $kolom, $transaction->company)
                ->setCellValue('D' . $kolom, $transaction->price_buy)
                ->setCellValue('E' . $kolom, $transaction->price_sell)
                ->setCellValue('F' . $kolom, $transaction->profit)
                ->getStyle($kolom)
                ->getNumberFormat()
                ->setFormatCode(PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_CURRENCY_IDR_SIMPLE);

            $kolom++;
            $nomor++;
        }
        $spreadsheet->getActiveSheet()->getCell('E1')->getCalculatedValue();


        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Latihan.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
