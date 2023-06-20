<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="description" content="<?php echo $_meta_deskripsi; ?>">
  <meta name="keywords" content="<?php echo $_meta_keyword; ?>">
  <meta name="author" content="Muhammad Ardi Setiawan">
  <title><?php echo $title; ?></title>
  <!-- Favicon-->
  <link rel="icon" href="<?php echo base_url('assets/webIcon.png'); ?>" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url('assets/landing-page'); ?>/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="<?php echo base_url('assets/landing-page'); ?>/css/mdb.min.css" rel="stylesheet">
  <link href="<?php echo base_url('assets/admin-page/css/font-awesome.min.css'); ?>" rel="stylesheet" />

  <?php echo (isset($additional_head) ? $additional_head : ''); ?>
  <style type="text/css">
    html,
    body,
    header, {
      height: 100%;
    }

    @media (min-width: 560px) and (max-width: 740px) {
      html,
      body,
      header, {
        height: 500px;
      }
    }

    @media (min-width: 800px) and (max-width: 850px) {
      html,
      body,
      header, {
        height: 500px;
      }
    }

    @media (min-width: 800px) and (max-width: 850px) {
      .navbar:not(.top-nav-collapse) {
        background: #1C2A48 !important;
      }

      .navbar {
        box-shadow: 0 2px 5px 0 rgba(0, 0, 0, .16), 0 2px 10px 0 rgba(0, 0, 0, .12) !important;
      }
    }

    .map-container-5 {
      overflow: hidden;
      padding-bottom: 56.25%;
      position: relative;
      height: 0;
    }

    .map-container-5 iframe {
      left: 0;
      top: 0;
      height: 100%;
      width: 100%;
      position: absolute;
    }

    .user {
      display: inline-block;
      width: 25px;
      height: 25px;
      border-radius: 50%;

      background-repeat: no-repeat;
      background-position: center center;
      background-size: cover;
    }

  </style>
</head>

<body class="event-lp">
    <?php
    $this->load->view('alert');
    ?>
  <!--Navigation & Intro-->
  <header>
    <!--Navbar-->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light" style="background: white; box-shadow: 0 2px 5px 0 rgba(0, 0, 0, .16), 0 2px 10px 0 rgba(0, 0, 0, .12) !important;">
      <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo base_url()?>">
          <strong><?php echo $_app_name; ?></strong>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!--Links-->
          <ul class="navbar-nav mr-auto smooth-scroll">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url() ?>">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
          </ul>
          <!--Social Icons-->
          <ul class="navbar-nav">
              <li class="nav-item">
                <?php if($this->session->userdata('is_Logged') == TRUE) { ?>
                  <div class="d-flex">
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo base_url('profile/keranjang'); ?>">
                        <i class="fas fa-shopping-cart"></i>
                      </a>
                    </li>
                    <a class="nav-link" href="<?php echo base_urL('profile') ?>">
                        <?php if (!$this->db->select('foto')->where("id_user", $this->session->userdata('id_user'))->limit(1)->get('users')->row()->foto) { ?>
                          <img class="user" src="<?php echo base_url('assets/DefaultProfile.jpg'); ?>"/>
                        <?php } else { ?>
                          <img class="user" src="<?php echo site_url('uploads/foto-profil/'.$this->db->select('foto')->where("id_user", $this->session->userdata('id_user'))->limit(1)->get('users')->row()->foto);?>" class="img-responsive" style="max-width: 258px; max-height: 258px; margin: auto;" alt="">
                        <?php } ?>
                      <?php echo $this->session->userdata('username')?>
                    </a>
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo base_url('profile/history'); ?>">
                        History
                      </a>
                    </li>
                    
                    <a class="nav-link" href="<?php echo base_urL('auth/logout') ?>">
                      <i class="fas fa-arrow-right pr-1"></i>
                    </a>
                  </div>
                <?php } else {?>
                  <a class="nav-link" href="<?php echo base_urL('auth/login') ?>">
                    Login
                  </a>
                <?php } ?>
              </li>
          </ul>
        </div>
      </div>
    </nav>
    <!--Navbar-->
    <div class="mb-3">
      <?php
        if (isset($content) && $content) {
          $this->load->view($content);
        }
      ?>
    </div>
  </header>
  <!--Navigation & Intro-->
  <!--Main content-->
  <!--Main content-->

  <!--Footer-->

  <footer class="page-footer indigo darken-3 text-center text-md-left pt-5">

    <!--Footer Links-->
    <div class="container mb-3">

      <!--First row-->
      <div class="row">

        <!--First column-->
        <div class="col-md-4 mt-1 mb-1 wow fadeIn" data-wow-delay="0.3s">
          <!--About-->
          <h5 class="title mb-4 font-weight-bold">Tentang <?php echo $_app_name; ?></h5>

          <p align="justify">
            <?php echo $_app_name; ?> merupakan aplikasi Belanja online berbasis web untuk memesan makanan yang berupa olahan ikan 
            yang dapat dipesan melalui Online.
          </p>
          <p align="justify">
            Dimana Pengguna dapat melakukan order terlebih dahulu melalui aplikasi ini, dan pesanan akan dikirim setelah melakukan Pembayaran.
          </p>
          <!--/About -->

        </div>
        <!--/First column-->

        <hr class="w-100 clearfix d-md-none">

        <!--Second column-->
        <div class="col-lg-3 ml-lg-auto col-md-4 mt-1 mb-1 wow fadeIn" data-wow-delay="0.3s">
          <!--Search-->
          <h5 class="text-uppercase mb-4 font-weight-bold">Hubungi Kami</h5>

          <!--Info-->
          <p><i class="fas fa-home pr-1"></i> <?php echo (!empty($kontak['alamat']) ? $kontak['alamat'] : 'New York, NY 10012, US'); ?></p>
          <p><i class="fas fa-envelope pr-1"></i> <?php echo (!empty($kontak['email']) ? $kontak['email'] : 'info@example.com'); ?></p>
          <p><i class="fas fa-phone pr-1"></i> <?php echo (!empty($kontak['no_telp']) ? $kontak['no_telp'] : '+ 01 234 567 88'); ?></p>

        </div>
        <!--/Second column-->

        <hr class="w-100 clearfix d-md-none">

        <!--Third column-->
        <div class="col-lg-3 ml-lg-auto col-md-4 mt-1 mb-1 wow fadeIn" data-wow-delay="0.3s">
          <!--Contact-->
          <h5 class="text-uppercase mb-4 font-weight-bold">Peta Lokasi</h5>

          <!--Google map-->
          <div id="map-container-google-9" class="z-depth-1-half map-container-5" style="height: 300px">
            <?php echo (!empty($kontak['maps_iframe']) ? $kontak['maps_iframe'] : '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.339226425949!2d110.39981325068287!3d-6.969247694940433!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70f4ca0f066c6b%3A0x418ec7cc043f575f!2sSMK%20Pelayaran%20Wira%20Samudera!5e0!3m2!1sid!2sid!4v1662432807416!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          '); ?>
          </div>
          <!--Google Maps-->

        </div>
        <!--/Third column-->

      </div>
      <!--/First row-->

    </div>
    <!--/Footer Links-->

    <!--Copyright-->
    <div class="footer-copyright py-3 text-center">
      <div class="container-fluid">
        © <?php echo date('Y'); ?> Copyright: <a> <?php echo $_app_name; ?> </a>
      </div>
    </div>
    <!--/Copyright-->

  </footer>
  <!--/Footer-->

  <!--SCRIPTS-->

  <!--JQuery-->
  <script src="<?php echo base_url('assets/admin-page/js/jquery.min.js'); ?>"></script>

  <!--Bootstrap tooltips-->
  <script type="text/javascript" src="<?php echo base_url('assets/landing-page'); ?>/js/popper.min.js"></script>

  <!-- Bootstrap Core Js -->
  <script src="<?php echo base_url('assets/admin-page'); ?>/plugins/bootstrap/js/bootstrap.js"></script>

  <!--Bootstrap core JavaScript-->
  <script type="text/javascript" src="<?php echo base_url('assets/landing-page'); ?>/js/bootstrap.min.js"></script>

  <!--MDB core JavaScript-->
  <script type="text/javascript" src="<?php echo base_url('assets/landing-page'); ?>/js/mdb.min.js"></script>
  <?php echo (isset($additional_body) ? $additional_body : ''); ?>
  <script>
    //Animation init
    new WOW().init();

    // Material Select Initialization
    $(document).ready(function() {
      $('.mdb-select').material_select();

    });
  </script>
  <?php if (isset($kontak['whatsapp_number'])) { ?>
    <!-- GetButton.io widget -->
    <script type="text/javascript">
      (function() {
        var options = {
          whatsapp: "<?php echo $kontak['whatsapp_number']; ?>", // WhatsApp number
          call_to_action: "Butuh Bantuan?", // Call to action
          position: "right", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol,
          host = "getbutton.io",
          url = proto + "//static." + host;
        var s = document.createElement('script');
        s.type = 'text/javascript';
        s.async = true;
        s.src = url + '/widget-send-button/js/init.js';
        s.onload = function() {
          WhWidgetSendButton.init(host, proto, options);
        };
        var x = document.getElementsByTagName('script')[0];
        x.parentNode.insertBefore(s, x);
      })();
    </script>
    <!-- /GetButton.io widget -->
  <?php } ?>
</body>

</html>