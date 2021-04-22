<div class="wrapper">
    <div class="main-header">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="blue">

            <a href="<?= site_url('Dashboard') ?>" class="logo">
                <h4 class="text-white" style="font-family: 'Bebas Neue', cursive; margin-top: 18px; font-size: 22px; letter-spacing: 3px;">GO-Laundry</h4>
            </a>
            <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <i class="icon-menu"></i>
                </span>
            </button>
            <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="icon-menu"></i>
                </button>
            </div>
        </div>
        <!-- End Logo Header -->

        <!-- Navbar Header -->
        <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

            <div class="container-fluid">
                <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                    <li class="nav-item dropdown hidden-caret">
                        <a class="dropdown-toggle d-flex align-items-center" data-toggle="dropdown" href="#" aria-expanded="false">
                            <p class="text-white m-0 mr-3"><?= $this->session->userdata('nama_lengkap'); ?></p>
                            <div class="avatar-sm mr-4">
                                <img src="<?= base_url('assets/img/user.jpg') ?>" alt="User" class="avatar-img rounded-circle">
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-user animated fadeIn">
                            <div class="dropdown-user-scroll scrollbar-outer">
                                <li>
                                    <div class="user-box">
                                        <div class="avatar-lg"><img src="assets/img/user.jpg" alt="image profile" class="avatar-img rounded"></div>
                                        <div class="u-text">
                                            <h4><?= $this->session->userdata('nama_lengkap'); ?></h4>
                                            <p class="text-muted mt-0"><?= $this->session->userdata('nama_role'); ?></p>
                                            <p class="text-muted mt--1"><?= $this->session->userdata('nama_outlet'); ?></p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a class="dropdown-item pt-2 pb-2" href="javascript:void(0);" id="logout">Logout</a>
                                </li>
                            </div>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- End Navbar -->
    </div>

    <!-- Sidebar -->
    <div class="sidebar sidebar-style-2">
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
            <div class="sidebar-content">
                <ul class="nav nav-primary">
                    <li class="nav-item">
                        <a href="<?= site_url('Dashboard') ?>">
                            <i class="fas fa-home"></i>
                            <p>Dashboard</p>
                            <input type="hidden" value="<?= $sess = $this->session->userdata('nama_role'); ?>">
                        </a>
                    </li>
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section">SUB MENU</h4>
                    </li>
                    <?php if ($sess == 'Admin') { ?>
                        <li class="nav-item">
                            <a href="<?= site_url('Paket') ?>">
                                <i class="fas fa-th-list"></i>
                                <p>Paket</p>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if ($sess != 'Owner') { ?>
                        <li class="nav-item">
                            <a href="<?= site_url('Member') ?>">
                                <i class="fas fa-users"></i>
                                <p>Member</p>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if ($sess == 'Admin') { ?>
                        <li class="nav-item">
                            <a href="<?= site_url('Outlet') ?>">
                                <i class="fas fa-map-marked-alt"></i>
                                <p>Outlet</p>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if ($sess != 'Owner') { ?>
                        <li class="nav-item">
                            <a href="<?= site_url('Transaksi') ?>">
                                <i class="fas fa-coins"></i>
                                <p>Transaksi</p>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if ($sess == 'Admin') { ?>
                        <li class="nav-item">
                            <a href="<?= site_url('User') ?>">
                                <i class="fas fa-user"></i>
                                <p>User</p>
                            </a>
                        </li>
                    <?php } ?>
                    <li class="nav-item">
                        <a href="<?= site_url('Laporan') ?>">
                            <i class="fas fa-print"></i>
                            <p>Laporan</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Sidebar -->