<?php
$meta = $this->meta_model->get_meta();
// error_reporting(0);
// ini_set('display_errors', 0);
?>




<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $meta->title ?> | <?php echo $meta->tagline ?></title>
  <link rel="shortcut icon" href="<?php echo base_url('assets/img/logo/' . $meta->favicon); ?>">
  <meta name="description" content="<?php echo $deskripsi ?>">
  <meta name="keywords" content="<?php echo $meta->title . ',' . $keywords ?>">
  <meta name="author" content="<?php echo $meta->title ?>">
  <meta name="google-site-verification" content="<?php echo $meta->google_meta ?>" />
  <meta name="msvalidate.01" content="<?php echo $meta->bing_meta ?>" />

  <link rel="canonical" href="<?php echo base_url(); ?>" />
  <meta property="og:locale" content="en_US" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="<?php echo $meta->title . ',' . $keywords ?>" />
  <meta property="og:description" content="<?php echo $deskripsi ?>" />
  <meta property="og:url" content="<?php echo base_url(); ?>" />
  <meta property="og:image" content="<?php echo base_url('assets/img/logo/' . $meta->logo); ?>" />
  <meta property="og:site_name" content="<?php echo $meta->title ?>" />
  <meta name="twitter:description" content="<?php echo $deskripsi ?>" />
  <meta name="twitter:title" content="<?php echo $meta->title ?>" />



  <!-- Vendor CSS Files -->
  <!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/web/vendor/bootstrap/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/web/vendor/offcanvas/offcanvas.css">
  <link href="<?php echo base_url('assets/template/web/vendor/icons/feather-icons/feather.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/template/web/vendor/icons/fontawesome/css/all.min.css'); ?>" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url('assets/template/web/vendor/bootstrap-icons/bootstrap-icons.css'); ?>">
  <!-- flag-icon-css -->
  <link rel="stylesheet" href="<?php echo base_url('assets/template/web/vendor/flag-icon-css/css/flag-icon.min.css'); ?>">
  <!-- Custom CSS File -->
  <link href="<?php echo base_url('assets/template/web/css/style.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/template/web/css/custom.css'); ?>" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">