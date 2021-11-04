<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Province extends CI_Controller
{
    //load data
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('province_model');
        $this->load->model('city_model');
    }
    //Index Province
    public function index()
    {

        $config['base_url']         = base_url('admin/province/index/');
        $config['total_rows']       = count($this->province_model->total_row());
        $config['per_page']         = 10;
        $config['uri_segment']      = 4;

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
        $limit                      = $config['per_page'];
        $start                      = ($this->uri->segment(4)) ? ($this->uri->segment(4)) : 0;
        //End Limit Start
        $this->pagination->initialize($config);
        $province = $this->province_model->get_province($limit, $start);

        //Validasi
        $this->form_validation->set_rules(
            'province_name',
            'Province',
            'required|is_unique[province.province_name]',
            array(
                'required'                        => '%s Harus Diisi',
                'is_unique'                        => '%s <strong>' . $this->input->post('province_name') .
                    '</strong> Sudah Tersedia!'
            )
        );
        if ($this->form_validation->run() === FALSE) {
            $data = [
                'title'                 => 'Data Province',
                'province'             => $province,
                'pagination'            => $this->pagination->create_links(),
                'content'               => 'admin/province/index_province'
            ];
            $this->load->view('admin/layout/wrapp', $data, FALSE);
        } else {
            $data  = [
                'created_by'                         => $this->session->userdata('id'),
                'province_name'                   => $this->input->post('province_name'),
                'created_at'                    => date('Y-m-d H:i:s')
            ];
            $this->province_model->create($data);
            $this->session->set_flashdata('message', 'Data telah ditambahkan');
            redirect(base_url('admin/province'), 'refresh');
        }
    }
    //Update
    public function update($id)
    {
        $province = $this->province_model->detail_province($id);

        //Validasi
        $this->form_validation->set_rules(
            'province_name',
            'Nama Provinsi',
            'required',
            array('required'                  => '%s Harus Diisi')
        );
        if ($this->form_validation->run() === FALSE) {
            //End Validasi
            $data = [
                'title'                         => 'Edit kategori Berita',
                'province'                      => $province,
                'content'                       => 'admin/province/update_province'
            ];
            $this->load->view('admin/layout/wrapp', $data, FALSE);
            //Masuk Database
        } else {
            $data  = [
                'id'                            => $id,
                'updated_by'                         => $this->session->userdata('id'),
                'province_name'                 => $this->input->post('province_name'),
                'updated_at'                  => date('Y-m-d H:i:s')
            ];
            $this->province_model->update($data);
            $this->session->set_flashdata('message', 'Data telah di Update');
            redirect(base_url('admin/province'), 'refresh');
        }
        //End Masuk Database
    }
    //delete Province
    public function delete($id)
    {
        //Proteksi delete
        is_login();
        $province = $this->province_model->detail_province($id);
        $data = ['id'   => $province->id];
        $this->province_model->delete($data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger">Data telah di Hapus</div>');
        redirect(base_url('admin/province'), 'refresh');
    }


    public function view($id)
    {
        $province = $this->province_model->detail_province($id);
        $data = [
            'title'                         => 'Data Kota',
            'province'                      => $province,
            'content'                       => 'admin/province/view_province'
        ];
        $this->load->view('admin/layout/wrapp', $data, FALSE);
    }

    //Kota
    public function city($province_id)
    {
        $province       = $this->province_model->detail($province_id);
        $city           = $this->province_model->list_city($province_id);

        //Validasi
        $valid = $this->form_validation;

        $valid->set_rules(
            'city_name',
            'Nama Kota',
            'required|is_unique[city.city_name]',

            array(
                'required'      => '%s harus diisi',
                'is_unique'                        => '%s <strong>' . $this->input->post('city_name') .
                    '</strong> Sudah Tersedia!'
            )
        );


        if ($valid->run() === FALSE) {
            //End Validasi
            $data = array(
                'title'             => 'Tambah Kota',
                'province'          => $province,
                'city'              => $city,
                'province_id'       => $province_id,
                'content'           => 'admin/province/city'
            );
            $this->load->view('admin/layout/wrapp', $data, FALSE);

            //Masuk Database

        } else {
            $data  = array(
                'province_id'           => $province_id,
                'created_by'               => $this->session->userdata('id'),
                'city_name'             => $this->input->post('city_name'),
                'created_at'          => date('Y-m-d H:i:s')
            );
            $this->city_model->create($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable fade show"><button class="close" data-dismiss="alert" aria-label="Close">×</button> Data telah ditambahkan</div>');
            redirect(base_url('admin/province/city/' . $province_id), 'refresh');
        }

        //End Masuk Database
        $data = array(
            'title'             => 'Tambah Kota',
            'province'          => $province,
            'city'              => $city,
            'province_id'       => $province_id,
            'content'           => 'admin/province/city'
        );
        $this->load->view('admin/layout/wrapp', $data, FALSE);
    }
    public function update_city($id)
    {
        $city = $this->city_model->detail_city($id);

        //Validasi
        $this->form_validation->set_rules(
            'city_name',
            'Nama Kota',
            'required',
            array('required'                  => '%s Harus Diisi')
        );
        if ($this->form_validation->run() === FALSE) {
            //End Validasi
            $data = [
                'title'                         => 'Edit Kota',
                'city'                          => $city,
                'content'                       => 'admin/province/update_city'
            ];
            $this->load->view('admin/layout/wrapp', $data, FALSE);
            //Masuk Database
        } else {
            $data  = [
                'id'                            => $id,
                'updated_by'                       => $this->session->userdata('id'),
                'city_name'                     => $this->input->post('city_name'),
                'updated_at'                  => date('Y-m-d H:i:s')
            ];
            $this->city_model->update($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable fade show"><button class="close" data-dismiss="alert" aria-label="Close">×</button> Data telah di Update</div>');
            redirect($_SERVER['HTTP_REFERER']);
        }
        //End Masuk Database
    }
}
