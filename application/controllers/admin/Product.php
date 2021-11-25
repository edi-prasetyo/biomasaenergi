<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
    //load data
    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');
    }
    // List Product
    public function index()
    {
        $product = $this->product_model->get_product();
        $data = array(
            'title'         => 'Data Product (' . count($product) . ')',
            'product'       => $product,
            'content'       => 'admin/product/index'
        );
        $this->load->view('admin/layout/wrapp', $data, FALSE);
    }

    // Detail Product
    public function detail($id)
    {
        $product = $this->product_model->detail($id);
        $data = array(
            'title'         => 'Detail Product',
            'product'       => $product,
            'content'       => 'admin/product/detail'
        );
        $this->load->view('admin/layout/wrapp', $data, FALSE);
    }
    //Add Product
    public function create()
    {
        //Validasi
        $valid = $this->form_validation;

        $valid->set_rules(
            'product_name',
            'Nama Produk',
            'required',
            array('required'      => '%s harus di isi')
        );

        if ($valid->run()) {

            $config['upload_path']          = './assets/img/product/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg|webp';
            $config['max_size']             = 5000000000000; //Dalam Kilobyte
            $config['max_width']            = 5000000000000; //Lebar (pixel)
            $config['max_height']           = 5000000000000; //tinggi (pixel)
            $config['remove_spaces']        = TRUE;
            $config['encrypt_name']         = TRUE;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('product_img')) {

                //End Validasi
                $data = array(
                    'title'             => 'Tambah Produk',
                    'error_upload'      => $this->upload->display_errors(),
                    'content'           => 'admin/product/create'
                );
                $this->load->view('admin/layout/wrapp', $data, FALSE);
                //Masuk Database

            } else {

                $upload_data    = array('uploads'  => $this->upload->data());

                $config['image_library']    = 'gd2';
                $config['source_image']     = './assets/img/product/' . $upload_data['uploads']['file_name'];
                $config['create_thumb']     = TRUE;
                $config['maintain_ratio']   = TRUE;
                $config['width']            = 300;
                $config['height']           = 300;
                $config['thumb_marker']     = '';

                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $slugcode = random_string('numeric', 5);
                $product_slug  = url_title($this->input->post('product_name'), 'dash', TRUE);
                $data  = [
                    'created_by'                => $this->session->userdata('id'),
                    'product_slug'              => $slugcode . '-' . $product_slug,
                    'product_name'              => $this->input->post('product_name'),
                    'product_name_en'           => $this->input->post('product_name_en'),
                    'description'               => $this->input->post('description'),
                    'description_en'            => $this->input->post('description_en'),
                    'spesification'             => $this->input->post('spesification'),
                    'spesification_en'          => $this->input->post('spesification_en'),
                    'product_img'               => $upload_data['uploads']['file_name'],
                    'product_keywords'          => $this->input->post('product_keywords'),
                    'created_at'                => date('Y-m-d H:i:s')
                ];
                $this->product_model->create($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success">Data telah ditambahkan</div>');
                redirect(base_url('admin/product'), 'refresh');
            }
        }
        //End Masuk Database
        $data = array(
            'title'             => 'Tambah Product',
            'content'           => 'admin/product/create'
        );
        $this->load->view('admin/layout/wrapp', $data, FALSE);
    }

    //Edit Produk
    public function update($id)
    {
        $product        = $this->product_model->detail($id);
        //Validasi
        $valid = $this->form_validation;

        $valid->set_rules(
            'product_name',
            'Nama Produk',
            'required',
            array('required'      => '%s harus di Isi')
        );

        if ($valid->run()) {
            //Kalau nggak Ganti gambar
            if (!empty($_FILES['product_img']['name'])) {

                $config['upload_path']          = './assets/img/product/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg|webp';
                $config['max_size']             = 500000000000; //Dalam Kilobyte
                $config['max_width']            = 500000000000; //Lebar (pixel)
                $config['max_height']           = 500000000000; //tinggi (pixel)
                $config['remove_spaces']        = TRUE;
                $config['encrypt_name']         = TRUE;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('product_img')) {

                    //End Validasi
                    $data = array(
                        'title'             => 'Update Produk',
                        'product'           => $product,
                        'error_upload'      => $this->upload->display_errors(),
                        'content'           => 'admin/product/update'
                    );
                    $this->load->view('admin/layout/wrapp', $data, FALSE);
                } else {

                    $upload_data    = array('uploads'  => $this->upload->data());

                    $config['image_library']    = 'gd2';
                    $config['source_image']     = './assets/img/product/' . $upload_data['uploads']['file_name'];
                    $config['create_thumb']     = TRUE;
                    $config['maintain_ratio']   = TRUE;
                    $config['width']            = 300;
                    $config['height']           = 300;
                    $config['thumb_marker']     = '';

                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    // Hapus Gambar Lama Jika Ada upload gambar baru
                    if ($product->product_img != "") {
                        unlink('./assets/img/product/' . $product->product_img);
                    }
                    //End Hapus Gambar
                    $data  = array(
                        'id'                        => $id,
                        'updated_by'                => $this->session->userdata('id'),
                        'product_name'              => $this->input->post('product_name'),
                        'product_name_en'           => $this->input->post('product_name_en'),
                        'description'               => $this->input->post('description'),
                        'description_en'            => $this->input->post('description_en'),
                        'spesification'             => $this->input->post('spesification'),
                        'spesification_en'          => $this->input->post('spesification_en'),
                        'product_img'               => $upload_data['uploads']['file_name'],
                        'product_keywords'          => $this->input->post('product_keywords'),
                        'updated_at'                => date('Y-m-d H:i:s')
                    );
                    $this->product_model->update($data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success">Data telah Diedit</div>');
                    redirect(base_url('admin/product'), 'refresh');
                }
            } else {
                //Update Produk Tanpa Ganti Gambar
                // Hapus Gambar Lama Jika ada upload gambar baru
                if ($product->product_img != "")
                    $data  = array(
                        'id'                        => $id,
                        'updated_by'                => $this->session->userdata('id'),
                        'product_name'              => $this->input->post('product_name'),
                        'product_name_en'           => $this->input->post('product_name_en'),
                        'description'               => $this->input->post('description'),
                        'description_en'            => $this->input->post('description_en'),
                        'spesification'             => $this->input->post('spesification'),
                        'spesification_en'          => $this->input->post('spesification_en'),
                        'product_keywords'          => $this->input->post('product_keywords'),
                        'updated_at'                => date('Y-m-d H:i:s')
                    );
                $this->product_model->update($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success">Data telah Diedit</div>');
                redirect(base_url('admin/product'), 'refresh');
            }
        }
        //End Masuk Database
        $data = array(
            'title'             => 'Edit Product',
            'product'           => $product,
            'content'           => 'admin/product/update'
        );
        $this->load->view('admin/layout/wrapp', $data, FALSE);
    }

    //delete
    public function delete($id)
    {
        //Proteksi delete
        is_login();

        $product = $this->product_model->detail($id);
        //Hapus gambar
        if ($product->product_img != "") {
            unlink('./assets/img/product/' . $product->product_img);
        }
        //End Hapus Gambar
        $data = array('id'   => $product->id);
        $this->product_model->delete($data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger">Data telah di Hapus</div>');
        redirect(base_url('admin/product'), 'refresh');
    }

    // AUTOCOMPLETE
    // function get_autocomplete()
    // {
    //     if (isset($_GET['term'])) {
    //         $result = $this->product_model->autocomplete($_GET['term']);
    //         if (count($result) > 0) {
    //             foreach ($result as $row)
    //                 $arr_result[] = array(
    //                     'label'                         => $row->product_name,
    //                     'spesification'                 => $row->spesification,
    //                     'id'                            => $row->id,
    //                 );
    //             echo json_encode($arr_result);
    //         }
    //     }
    // }

    // AUTOFILL
    public function get_autofill()
    {
        $id         = $this->input->post('id');
        $data       = $this->product_model->get_autofill($id);
        echo json_encode($data);
    }
}
