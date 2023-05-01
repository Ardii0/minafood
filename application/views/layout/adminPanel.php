<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="<?php echo $_meta_deskripsi; ?>">
    <meta name="keywords" content="<?php echo $_meta_keyword; ?>">
    <meta name="author" content="Muhammad Ardi Setiawan">
    <title><?php echo $title; ?></title>
    <link rel="icon" href="<?php echo base_url('assets/WebIcon.png'); ?>" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url('assets/admin-page'); ?>/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url('assets/admin-page'); ?>/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url('assets/admin-page'); ?>/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url('assets/admin-page'); ?>/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url('assets/admin-page'); ?>/css/themes/all-themes.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets/admin-page'); ?>/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <?php echo (isset($additional_head) ? $additional_head : ''); ?>
</head>

<body class="theme-blue">
    <?php
    $this->load->view('alert');
    ?>
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="bars" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a class="navbar-brand" href="<?php echo site_url('dashboard'); ?>" style="display: flex;">
                    <?php echo '<img src="'.base_url('assets/WebIcon.png').'" style="position: absolute; margin: -14px 0 0 0;" width="48" height="48" alt="User" /><p style="margin-left: 60px">' . $_app_name . ' </p>'; ?>
                </a>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?php echo base_url('assets/DefaultProfile.webp'); ?>" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo ucfirst($this->session->userdata('username')); ?></div>
                    <div class="email"><?php echo $this->session->userdata('email'); ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="<?php echo site_url('akun'); ?>"><i class="material-icons">person</i>Akun</a></li>
                            <li><a href="<?php echo site_url('auth/logout'); ?>"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="active"></li>
                    <li>
                        <a href="<?php echo site_url('dashboard'); ?>">
                            <i class="material-icons">dashboard</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('produk'); ?>">
                            <i class="material-icons">trolley</i>
                            <span>Produk</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('produk/kategori'); ?>">
                            <i class="material-icons">category</i>
                            <span>Kategori</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('produk/tipe'); ?>">
                            <i class="material-icons">category</i>
                            <span>Tipe</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">summarize</i>
                            <span>Pembayaran</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo site_url('laporan/pembayaran_notconf'); ?>">Pembayaran Belum Dikonfirmasi</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('laporan/pembayaran_conf'); ?>">Pembayaran Dikonfirmasi</a>
                            </li>
                        </ul>
                    </li>
                    <!-- <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">public</i>
                            <span>Identitas</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo site_url('situs'); ?>">Situs</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('kontak'); ?>">Kontak</a>
                            </li>
                        </ul>
                    </li> -->
                </ul>
            </div>
            <script>
                $(document).ready(function() {
                    /** add active class and stay opened when selected */
                    var url = window.location;

                    // for sidebar menu entirely but not cover treeview
                    $('ul.list a').filter(function() {
                        return this.href == url;
                    }).parent().siblings().removeClass('active').end().addClass('active');

                    // for treeview
                    $('ul.ml-menu a').filter(function() {
                        return this.href == url;
                    }).parentsUntil(".list > .ml-menu").siblings().removeClass('active').end().addClass('active');
                });
            </script>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <a href="<?php echo site_url('auth/logout'); ?>" style="display: flex; color: #333333; font-weight: 700; text-decoration: none;">
                    <i class="material-icons">input</i>
                    <span style="display: flex; items-align: center; margin: 5px 0 0 10px;">Keluar</span>
                </a>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

    <?php
    if (isset($content) && $content) {
        $this->load->view($content);
    }
    ?>

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url('assets/admin-page'); ?>/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url('assets/admin-page'); ?>/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo base_url('assets/admin-page'); ?>/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url('assets/admin-page'); ?>/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url('assets/admin-page'); ?>/plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url('assets/admin-page'); ?>/js/admin.js"></script>
    <!-- Jquery DataTable Plugin Js -->
    <script src="<?php echo base_url('assets/admin-page')?>/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?php echo base_url('assets/admin-page')?>/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url('assets/admin-page')?>/js/pages/tables/jquery-datatable.js">
    </script>
    <?php echo (isset($additional_body) ? $additional_body : ''); ?>
</body>

</html>