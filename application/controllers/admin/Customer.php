<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('customer_model');
        $this->load->model('region_model');
        $this->load->model('province_model');
        $this->load->model('city_model');
        $this->load->library('pagination');
    }
    public function index()
    {

        $config['base_url']       = base_url('admin/customer/index/');
        $config['total_rows']     = count($this->customer_model->total_row_customer());
        $config['per_page']       = 10;
        $config['uri_segment']    = 4;

        //Membuat Style pagination untuk BootStrap v4
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


        //Limit dan Start
        $limit                    = $config['per_page'];
        $start                    = ($this->uri->segment(4)) ? ($this->uri->segment(4)) : 0;
        //End Limit Start
        $this->pagination->initialize($config);

        $keyword = $this->input->post('keyword');
        $customer = $this->customer_model->get_allcustomer($limit, $start, $keyword);
        $data = [
            'title'                     => 'Data Customer',
            'customer'                  => $customer,
            'pagination'                => $this->pagination->create_links(),
            'content'                   => 'admin/customer/index'

        ];
        $this->load->view('admin/layout/wrapp', $data, FALSE);
    }

    public function detail($id)
    {
        $customer = $this->customer_model->detail($id);
        $data = [
            'title'         => 'Detail Customer',
            'customer'      => $customer,
            'content'       => 'admin/customer/detail'
        ];
        $this->load->view('admin/layout/wrapp', $data, FALSE);
    }
    // Pencarian Customer
    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['customer'] = $this->customer_model->get_customer_keyword($keyword);
        $data['title'] = 'Data';
        $data['content'] = 'admin/customer/search_customer';
        $this->load->view('admin/layout/wrapp', $data);
    }
    //Create Customer
    public function create()
    {
        $province       = $this->region_model->getProvince();
        $this->form_validation->set_rules(
            'fullname',
            'Nama',
            'required',
            [
                'required'      => 'Nama harus di isi',
            ]
        );
        $this->form_validation->set_rules(
            'company',
            'Nomor',
            'is_unique[customer.company]',
            [
                'is_unique'     => '%s <strong>' . $this->input->post('company') . '</strong> sudah Ada!',
            ]
        );
        $this->form_validation->set_rules(
            'phone',
            'Nomor',
            'is_unique[customer.phone]',
            [
                'is_unique'     => '%s <strong>' . $this->input->post('phone') . '</strong> sudah Ada!',
            ]
        );
        $this->form_validation->set_rules(
            'company',
            'Perusahaan',
            'is_unique[customer.company]',
            [
                'is_unique'     => '%s <strong>' . $this->input->post('company') . '</strong> sudah Ada!',
            ]
        );
        if ($this->form_validation->run() === FALSE) {
            $data = [
                'title'                 => 'Tambah Customer',
                'province'              => $province,
                'content'               => 'admin/customer/create'
            ];
            $this->load->view('admin/layout/wrapp', $data, FALSE);
        } else {

            $province_id = $this->input->post('province_id');
            $city_id = $this->input->post('city_id');
            $data  = [
                'created_by'            => $this->session->userdata('id'),
                'fullname'              => $this->input->post('fullname'),
                'company'               => $this->input->post('company'),
                'email'                 => $this->input->post('email'),
                'phone'                 => $this->input->post('phone'),
                'whatsapp'              => $this->input->post('whatsapp'),
                'province_id'           => $province_id,
                'province_name'         => $this->input->post('province_name'),
                'city_id'               => $city_id,
                'city_name'             => $this->input->post('city_name'),
                'address'               => $this->input->post('address'),
                'postal_code'           => $this->input->post('postal_code'),
                'is_active '            => 1,
                'created_at'            => date('Y-m-d H:i:s')
            ];
            $insert_id = $this->customer_model->create($data);
            $this->_UpdateDataRegion($insert_id, $province_id, $city_id);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data Customer telah ditambahkan</div>');
            redirect(base_url('admin/customer'), 'refresh');
        }
    }

    // Add Customer dari Halaman TRANSAKSI
    //Create Customer
    public function add()
    {
        $province       = $this->region_model->getProvince();
        $this->form_validation->set_rules(
            'fullname',
            'Nama',
            'required',
            [
                'required'      => 'Nama harus di isi',
            ]
        );
        $this->form_validation->set_rules(
            'phone',
            'Nomor Handphone',
            'required|is_unique[customer.phone]',
            [
                'is_unique'     => '%s <strong>' . $this->input->post('phone') . '</strong> sudah digunakan!',
                'required'      => 'Nomor Handphone harus di isi',
            ]
        );
        if ($this->form_validation->run() === FALSE) {
            $data = [
                'title'                 => 'Tambah Customer',
                'province'              => $province,
                'content'               => 'admin/customer/create'
            ];
            $this->load->view('admin/layout/wrapp', $data, FALSE);
        } else {

            $province_id = $this->input->post('province_id');
            $city_id = $this->input->post('city_id');

            $data  = [
                'created_by'            => $this->session->userdata('id'),
                'fullname'              => $this->input->post('fullname'),
                'company'               => $this->input->post('company'),
                'email'                 => $this->input->post('email'),
                'phone'                 => $this->input->post('phone'),
                'whatsapp'              => $this->input->post('whatsapp'),
                'province_id'           => $province_id,
                'province_name'         => $this->input->post('province_name'),
                'city_id'               => $city_id,
                'city_name'             => $this->input->post('city_name'),
                'address'               => $this->input->post('address'),
                'postal_code'           => $this->input->post('postal_code'),
                'is_active '            => 1,
                'created_at'            => date('Y-m-d H:i:s')
            ];
            $insert_id = $this->customer_model->create($data);
            $this->_UpdateDataRegion($insert_id, $province_id, $city_id);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data Customer telah ditambahkan</div>');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    // Update Customer
    public function update($id)
    {
        $province       = $this->region_model->getProvince();
        $customer = $this->customer_model->read($id);
        $this->form_validation->set_rules(
            'fullname',
            'Nama',
            'required',
            [
                'required'      => 'Nama harus di isi',
            ]
        );
        if ($this->form_validation->run() === FALSE) {
            $data = [
                'title'                 => 'Update Customer',
                'customer'              => $customer,
                'province'              => $province,
                'content'               => 'admin/customer/update'
            ];
            $this->load->view('admin/layout/wrapp', $data, FALSE);
        } else {

            $province_id = $this->input->post('province_id');
            $city_id = $this->input->post('city_id');

            $data  = [
                'id'                    => $id,
                'updated_by'            => $this->session->userdata('id'),
                'fullname'              => $this->input->post('fullname'),
                'company'               => $this->input->post('company'),
                'email'                 => $this->input->post('email'),
                'phone'                 => $this->input->post('phone'),
                'whatsapp'              => $this->input->post('whatsapp'),
                'province_id'           => $province_id,
                'province_name'         => $this->input->post('province_name'),
                'city_id'               => $city_id,
                'city_name'             => $this->input->post('city_name'),
                'address'               => $this->input->post('address'),
                'postal_code'           => $this->input->post('postal_code'),
                'created_at'            => date('Y-m-d H:i:s')
            ];
            $this->customer_model->update($data);
            $insert_id = $id;
            $this->_UpdateDataRegion($insert_id, $province_id, $city_id);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data Customer telah diupdate </div>');
            redirect(base_url('admin/customer'), 'refresh');
        }
    }

    public function _UpdateDataRegion($insert_id, $province_id, $city_id)
    {
        $province = $this->province_model->detail($province_id);
        $city = $this->city_model->detail($city_id);
        $province_name = $province->province_name;
        $city_name = $city->city_name;
        $data = [
            'id'                    => $insert_id,
            'province_name'         => $province_name,
            'city_name'             => $city_name,
        ];
        $this->customer_model->update($data);
    }

    //DELETE
    public function delete($id)
    {
        //Proteksi delete
        is_login();

        $customer = $this->customer_model->read($id);

        $data = ['id'   => $customer->id];
        $this->customer_model->delete($data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger">Data telah di Hapus</div>');
        redirect($_SERVER['HTTP_REFERER']);
    }

    // AUTOCOMPLETE
    function get_autocomplete()
    {
        if (isset($_GET['term'])) {
            $result = $this->customer_model->search_blog($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = array(
                        'label'                 => $row->company,
                        'phone'                 => $row->phone,
                        'address'               => $row->address,
                        'fullname'              => $row->fullname,
                        'id'                    => $row->id,
                        'email'                 => $row->email,
                        'whatsapp'              => $row->whatsapp,
                        'province_name'         => $row->province_name,
                        'city_name'             => $row->city_name,
                        'postal_code'           => $row->postal_code,
                    );
                echo json_encode($arr_result);
            }
        }
    }
    public function get_autofill()
    {
        $id         = $this->input->post('id');
        $data       = $this->customer_model->get_autofill($id);
        echo json_encode($data);
    }
}
