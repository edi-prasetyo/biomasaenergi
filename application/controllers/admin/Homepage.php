<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homepage extends CI_Controller
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
        $this->load->model('homepage_model');
        $this->load->model('berita_model');
        $this->load->model('layanan_model');
    }
    public function index()
    {
        $homepage                       = $this->homepage_model->get_homepage();
        // var_dump($pembelian);
        // die;
        $data = [
            'title'                     => 'Seting Homepage',
            'homepage'                  => $homepage,
            'content'                   => 'admin/homepage/index'
        ];
        $this->load->view('admin/layout/wrapp', $data, FALSE);
    }

    public function image_hero($id)
    {
        $homepage = $this->homepage_model->detail_homepage($id);
        // var_dump($homepage->id);
        // die;
        $config['upload_path']        = './assets/img/galery/';
        $config['allowed_types']      = 'gif|jpg|png|jpeg|svg';
        $config['max_size']           = 5000000;
        $config['max_width']          = 5000000;
        $config['max_height']         = 5000000;
        $config['remove_spaces']      = TRUE;
        $config['encrypt_name']       = TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('hero_img')) {

            $data = [
                'title'                   => 'Update Background',
                'homepage'                => $homepage,
                'error'                   => $this->upload->display_errors(),
                'content'                 => 'admin/homepage/index'
            ];
            $this->load->view('admin/layout/wrapp', $data, FALSE);
        } else {

            $upload_data                = array('uploads'  => $this->upload->data());
            $config['image_library']    = 'gd2';
            $config['source_image']     = './assets/img/galery/' . $upload_data['uploads']['file_name'];
            $config['new_image']        = './assets/img/galery/thumbs/' . $upload_data['uploads']['file_name'];
            $config['create_thumb']     = TRUE;
            $config['maintain_ratio']   = TRUE;
            $config['width']            = 200;
            $config['height']           = 200;
            $config['thumb_marker']     = '';
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            if ($homepage->hero_img != "") {
                unlink('./assets/img/galery/' . $homepage->hero_img);
                unlink('./assets/img/galery/thumbs/' . $homepage->hero_img);
            }
            $data  = [
                'id'                      => $homepage->id,
                'hero_img'                => $upload_data['uploads']['file_name']
            ];
            $this->homepage_model->update($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data telah diubah</div>');
            redirect(base_url('admin/homepage'), 'refresh');
        }
    }

    public function hero_content($id)
    {
        $homepage = $this->homepage_model->detail_homepage($id);
        $this->form_validation->set_rules(
            'hero_title_id',
            'Judul',
            'required',
            array('required'            => '%s Harus Diisi')
        );
        if ($this->form_validation->run() === FALSE) {
            $data = [
                'title'                   => 'Update Profile Web',
                'homepage'                => $homepage,
                'content'                 => 'admin/homepage/index'
            ];
            $this->load->view('admin/layout/wrapp', $data, FALSE);
        } else {
            $data = [
                'id'                        => $id,
                'hero_title_id'             => $this->input->post('hero_title_id'),
                'hero_title_en'             => $this->input->post('hero_title_en'),
                'hero_button_id'            => $this->input->post('hero_button_id'),
                'hero_button_en'            => $this->input->post('hero_button_en'),
                'hero_url'                  => $this->input->post('hero_url'),
                'updated_at'              => date('Y-m-d H:i:s')
            ];
            $this->homepage_model->update($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data telah di ubah</div>');
            redirect(base_url('admin/homepage'), 'refresh');
        }
    }


    public function service($id)
    {
        $homepage = $this->homepage_model->detail_homepage($id);
        $this->form_validation->set_rules(
            'service_title_id',
            'Judul',
            'required',
            array('required'            => '%s Harus Diisi')
        );
        if ($this->form_validation->run() === FALSE) {
            $data = [
                'title'                   => 'Update Layanan',
                'homepage'                => $homepage,
                'content'                 => 'admin/homepage/index'
            ];
            $this->load->view('admin/layout/wrapp', $data, FALSE);
        } else {
            $data = [
                'id'                            => $id,
                'service_title_id'              => $this->input->post('service_title_id'),
                'service_title_en'              => $this->input->post('service_title_en'),
                'service_desc_id'               => $this->input->post('service_desc_id'),
                'service_desc_en'               => $this->input->post('service_desc_en'),
                'updated_at'                    => date('Y-m-d H:i:s')
            ];
            $this->homepage_model->update($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data telah di ubah</div>');
            redirect(base_url('admin/homepage'), 'refresh');
        }
    }
    public function about($id)
    {
        $homepage = $this->homepage_model->detail_homepage($id);
        if (!empty($_FILES['about_img']['name'])) {
            $config['upload_path']        = './assets/img/galery/';
            $config['allowed_types']      = 'gif|jpg|png|jpeg|svg';
            $config['max_size']           = 5000000;
            $config['max_width']          = 5000000;
            $config['max_height']         = 5000000;
            $config['remove_spaces']      = TRUE;
            $config['encrypt_name']       = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('about_img')) {

                $data = [
                    'title'                   => 'Update Gambar',
                    'homepage'                => $homepage,
                    'error'                   => $this->upload->display_errors(),
                    'content'                 => 'admin/homepage/index'
                ];
                $this->load->view('admin/layout/wrapp', $data, FALSE);
            } else {

                $upload_data                = array('uploads'  => $this->upload->data());
                $config['image_library']    = 'gd2';
                $config['source_image']     = './assets/img/galery/' . $upload_data['uploads']['file_name'];
                $config['new_image']        = './assets/img/galery/thumbs/' . $upload_data['uploads']['file_name'];
                $config['create_thumb']     = TRUE;
                $config['maintain_ratio']   = TRUE;
                $config['width']            = 200;
                $config['height']           = 200;
                $config['thumb_marker']     = '';
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                if ($homepage->about_img != "") {
                    unlink('./assets/img/galery/' . $homepage->about_img);
                    unlink('./assets/img/galery/thumbs/' . $homepage->about_img);
                }
                $data  = [
                    'id'                        => $homepage->id,
                    'about_title_id'            => $this->input->post('about_title_id'),
                    'about_title_en'            => $this->input->post('about_title_en'),
                    'about_desc_id'             => $this->input->post('about_desc_id'),
                    'about_desc_en'             => $this->input->post('about_desc_en'),
                    'about_button_id'           => $this->input->post('about_button_id'),
                    'about_button_en'           => $this->input->post('about_button_en'),
                    'about_url'                 => $this->input->post('about_url'),
                    'about_img'                 => $upload_data['uploads']['file_name'],
                    'created_at'              => date('Y-m-d H:i:s')
                ];
                $this->homepage_model->update($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success">Data telah diubah</div>');
                redirect(base_url('admin/homepage'), 'refresh');
            }
        } else {

            if ($homepage->about_img != "")
                $data  = [
                    'id'                        => $homepage->id,
                    'about_title_id'            => $this->input->post('about_title_id'),
                    'about_title_en'            => $this->input->post('about_title_en'),
                    'about_desc_id'             => $this->input->post('about_desc_id'),
                    'about_desc_en'             => $this->input->post('about_desc_en'),
                    'about_button_id'           => $this->input->post('about_button_id'),
                    'about_button_en'           => $this->input->post('about_button_en'),
                    'about_url'                 => $this->input->post('about_url'),
                    'created_at'                => date('Y-m-d H:i:s')
                ];
            $this->homepage_model->update($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data telah di Update</div>');
            redirect(base_url('admin/homepage'), 'refresh');
        }
    }
    public function product($id)
    {
        $homepage = $this->homepage_model->detail_homepage($id);
        if (!empty($_FILES['product_img']['name'])) {
            $config['upload_path']        = './assets/img/galery/';
            $config['allowed_types']      = 'gif|jpg|png|jpeg|svg';
            $config['max_size']           = 5000000;
            $config['max_width']          = 5000000;
            $config['max_height']         = 5000000;
            $config['remove_spaces']      = TRUE;
            $config['encrypt_name']       = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('product_img')) {

                $data = [
                    'title'                   => 'Update Gambar',
                    'homepage'                => $homepage,
                    'error'                   => $this->upload->display_errors(),
                    'content'                 => 'admin/homepage/index'
                ];
                $this->load->view('admin/layout/wrapp', $data, FALSE);
            } else {

                $upload_data                = array('uploads'  => $this->upload->data());
                $config['image_library']    = 'gd2';
                $config['source_image']     = './assets/img/galery/' . $upload_data['uploads']['file_name'];
                $config['new_image']        = './assets/img/galery/thumbs/' . $upload_data['uploads']['file_name'];
                $config['create_thumb']     = TRUE;
                $config['maintain_ratio']   = TRUE;
                $config['width']            = 200;
                $config['height']           = 200;
                $config['thumb_marker']     = '';
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                if ($homepage->product_img != "") {
                    unlink('./assets/img/galery/' . $homepage->product_img);
                    unlink('./assets/img/galery/thumbs/' . $homepage->product_img);
                }
                $data  = [
                    'id'                          => $homepage->id,
                    'product_title_id'            => $this->input->post('product_title_id'),
                    'product_title_en'            => $this->input->post('product_title_en'),
                    'product_desc_id'             => $this->input->post('product_desc_id'),
                    'product_desc_en'             => $this->input->post('product_desc_en'),
                    'product_img'                 => $upload_data['uploads']['file_name'],
                    'created_at'                  => date('Y-m-d H:i:s')
                ];
                $this->homepage_model->update($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success">Data telah diubah</div>');
                redirect(base_url('admin/homepage'), 'refresh');
            }
        } else {

            if ($homepage->product_img != "")
                $data  = [
                    'id'                        => $homepage->id,
                    'product_title_id'            => $this->input->post('product_title_id'),
                    'product_title_en'            => $this->input->post('product_title_en'),
                    'product_desc_id'             => $this->input->post('product_desc_id'),
                    'product_desc_en'             => $this->input->post('product_desc_en'),
                    'created_at'                => date('Y-m-d H:i:s')
                ];
            $this->homepage_model->update($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data telah di Update</div>');
            redirect(base_url('admin/homepage'), 'refresh');
        }
    }
}
