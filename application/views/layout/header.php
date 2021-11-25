<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, materialpro admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, materialpro admin lite design, materialpro admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Material Pro Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Alumni Undip</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/materialpro-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/undip.png');?>">
    <!-- chartist CSS -->
    <link href="<?= base_url('assets/main/vendor/bootstrap-4.1/bootstrap.min.css');?>" rel="stylesheet" media="all">
    <link href="<?= base_url('assets/main/plugins/chartist-js/dist/chartist.min.css');?>" rel="stylesheet">
    <link href="<?= base_url('assets/main/plugins/chartist-js/dist/chartist-init.css');?>" rel="stylesheet">
    <link href="<?= base_url('assets/main/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css');?>" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="<?= base_url('assets/main/plugins/c3-master/c3.min.css');?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url('assets/main/css/style.min.css');?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.css"/>
    <link rel="stylesheet" href="<?= base_url('assets/searchable/chosen.css');?>" media="all">
    <style>
        input[type=number]::-webkit-inner-spin-button, 
        input[type=number]::-webkit-outer-spin-button { 
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            margin: 0; 
        }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand ms-4" href="index.html">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="<?= base_url('assets/main/images/undip.png');?>" alt="homepage" class="dark-logo" height="40" weight="40"/>

                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <h2 style="color: white;">ALUMNI</h2>

                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <a class="nav-toggler waves-effect waves-light text-white d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav d-lg-none d-md-block ">
                        <li class="nav-item">
                            <a class="nav-toggler nav-link waves-effect waves-light text-white "
                                href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php
        if(empty($username)){    
        ?>
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <div class="text-center">
                            <img src="<?= base_url('assets/user.png');?>" alt="Profile" weight="120" height="120"/>
                        </div>
                        <h4 class="text-center" style="margin-top: 1rem;">Anda belum login</h4>
                            <form method="POST" action="<?php base_url('Welcome') ?>" style="margin-top: 1.5rem;">
                                 <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?>
                                    <div class="row">
                                         <label for="">Username</label>
                                             <div class="input-group mb-3">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="far fa-user"></i>
                                                </span>
                                              </div>
                                              <input name="username" type="text" class="form-control form-control-sm" placeholder="Enter Username" aria-label="Username" aria-describedby="basic-addon1" required>
                                              
                                         </div>
                                    </div>
                                     <div class="row">
                                         <label for="">Password</label>
                                             <div class="input-group mb-3">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fas fa-lock"></i>
                                                </span>
                                              </div>
                                              <input name="password" type="password" class="form-control form-control-sm" placeholder="Enter Password" aria-label="Username" aria-describedby="basic-addon1" required>
                                         </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary" style="width: 95%; margin-top:1rem;">Login</button>
                                        </div>
                                    </div>
                            </form>
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <!-- <div class="sidebar-footer">
                <div class="row">
                    <div class="col-4 link-wrap">
                        <a href="" class="link" data-toggle="tooltip" title="" data-original-title="Settings"><i
                                class="ti-settings"></i></a>
                    </div>
                    <div class="col-4 link-wrap">
                        <a href="" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i
                                class="mdi mdi-power"></i></a>
                    </div>
                    <div class="col-4 link-wrap">
                        <a href="" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i
                                class="mdi mdi-gmail"></i></a>
                    </div>
                </div>
            </div> -->
        </aside>
        <?php
        } 
        else {
        ?>
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="<?= base_url('Admin') ?>" aria-expanded="false"><i class="mdi me-2 mdi-gauge"></i><span
                                    class="hide-menu">Dashboard</span></a></li>
                        <?php if($username=="admin"){
                            ?>
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="<?= base_url('Admin/akun') ?>" aria-expanded="false"><i class="mdi me-2 mdi-account"></i><span
                                    class="hide-menu">Akun</span></a></li>
                        <?php } ?>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="<?= base_url('Welcome/changePass') ?>" aria-expanded="false"><i class="mdi me-2 mdi-lock-open-outline"></i><span
                                    class="hide-menu">Ubah Password</span></a></li>
                        <li class="text-center p-20 upgrade-btn">
                            <a href="<?= base_url('Welcome/logout') ?>"
                                class="btn btn-danger text-white mt-4">Log Out</a>
                        </li>
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <div class="sidebar-footer">
                <div class="row">
                    <div class="col-4 link-wrap">
                        <!-- item-->
                        <!-- <a href="" class="link" data-toggle="tooltip" title="" data-original-title="Settings"><i
                                class="ti-settings"></i></a> -->
                    </div>
                    <div class="col-4 link-wrap">
                        <!-- item-->
                        <a href="<?= base_url('Welcome/logout') ?>" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i
                                class="mdi mdi-power"></i></a>
                    </div>
                    <div class="col-4 link-wrap">
                        <!-- item-->
                        <!-- <a href="" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i
                                class="mdi mdi-gmail"></i></a> -->
                    </div>
                </div>
            </div>
        </aside>
        <?php } ?>