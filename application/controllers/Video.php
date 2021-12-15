<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Video extends CI_Controller
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
    $this->load->model('video_model');
    $this->load->model('meta_model');
    $this->load->library('pagination');
  }
  public function index()
  {
    $meta                           = $this->meta_model->get_meta();
    $this->load->library('pagination');
    $config['base_url']             = base_url('video/index/');
    $config['total_rows']           = count($this->video_model->total());
    $config['per_page']             = 3;
    $config['uri_segment']          = 4;
    $limit                          = $config['per_page'];
    $start                          = ($this->uri->segment(3)) ? ($this->uri->segment(3)) : 0;
    $this->pagination->initialize($config);
    $video                         = $this->video_model->video($limit, $start);

    if (!$this->agent->is_mobile()) {
      // Desktop View
      $data = array(
        'title'                       => 'Galery - ' . $meta->title,
        'deskripsi'                   => 'Galery - ' . $meta->description,
        'keywords'                    => 'Galery - ' . $meta->keywords,
        'paginasi'                    => $this->pagination->create_links(),
        'video'                      => $video,
        'content'                     => 'front/video/index'
      );
      $this->load->view('front/layout/wrapp', $data, FALSE);
    } else {
      // Mobile View
      $data = array(
        'title'                       => 'Galery',
        'deskripsi'                   => 'Galery - ' . $meta->description,
        'keywords'                    => 'Galery - ' . $meta->keywords,
        'paginasi'                    => $this->pagination->create_links(),
        'video'                      => $video,
        'content'                     => 'mobile/video/index'
      );
      $this->load->view('mobile/layout/wrapp', $data, FALSE);
    }
  }
  public function detail($video_slug = NULL)
  {
    if (!empty($video_slug)) {
      $video_slug;
    } else {
      redirect(base_url('video'));
    }
    $video                         = $this->video_model->read($video_slug);
    $data                           = array(
      'title'                       => $video->video_title,
      'deskripsi'                   => $video->video_title,
      'keywords'                    => $video->video_keywords,
      'video'                      => $video,
      'tanggal_post'                => date('Y-m-d H:i:s'),
      'content'                     => 'front/video/detail_video'
    );
    $this->load->view('front/layout/wrapp', $data, FALSE);
  }
}
