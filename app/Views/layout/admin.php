<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Lavaprinting | Dashboard</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="/public/assets/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="/public/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="/public/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- select 2 -->
        <link rel="stylesheet" href="/public/assets/plugins/select2/css/select2.min.css">
        <link rel="stylesheet" href="/public/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
        <!-- JQVMap -->
        <link rel="stylesheet" href="/public/assets/plugins/jqvmap/jqvmap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="/public/assets/dist/css/adminlte.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="/public/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="/public/assets/plugins/daterangepicker/daterangepicker.css">
        <!-- summernote -->
        <link rel="stylesheet" href="/public/assets/plugins/summernote/summernote-bs4.min.css">
        <!-- custom -->
        <link rel="stylesheet" href="/public/assets/css/admin.css?v=<?= time(); ?>">
    </head>
    <?php 
    $session = \Config\Services::session();
    $user = $session->get('current_user');
    ?>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>

                <!-- Right navbar links -->
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="/admin" class="brand-link">
                    <img src="/public/assets/dist/img/AdminLTELogo.png" alt="Lavaprinting Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">Lavaprinting</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="/public/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block"><?php echo $user->firstname.' '.$user->lastname; ?></a>
                        </div>
                    </div>

                    

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                                 with font-awesome or any other icon font library -->
                            
                            
                            <li class="nav-item">
                                <a href="/admin" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="/admin/mybanners" class="nav-link">
                                    <i class="nav-icon fas fa-image"></i>
                                    <p>Banners</p>
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="/admin/pages" class="nav-link">
                                    <i class="nav-icon fas fa-list-alt"></i>
                                    <p>Pages</p>
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="/admin/quotes" class="nav-link">
                                    <i class="nav-icon fas fa-quote-left"></i>
                                    <p>Quotes</p>
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="/admin/blogs" class="nav-link">
                                    <i class="nav-icon fas fa-bars"></i>
                                    <p>Blogs</p>
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="/admin/faqs" class="nav-link">
                                    <i class="nav-icon fas fa-list"></i>
                                    <p>Faq's</p>
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="/admin/categories" class="nav-link">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>Categories</p>
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="/admin/products" class="nav-link">
                                    <i class="nav-icon fab fa-product-hunt"></i>
                                    <p>Products</p>
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="/admin/testimonials" class="nav-link">
                                    <i class="nav-icon fa fa-quote-left"></i>
                                    <p>Testimonials</p>
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="/admin/users" class="nav-link">
                                    <i class="nav-icon fa fa-users"></i>
                                    <p>Users</p>
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="/admin/profile" class="nav-link">
                                    <i class="nav-icon fa fa-user"></i>
                                    <p>Profile</p>
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="/admin/settings" class="nav-link">
                                    <i class="nav-icon fa fa-cog"></i>
                                    <p>Settings</p>
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="/admin/dashboard/logout" class="nav-link">
                                    <i class="nav-icon fa fa-sign-out-alt"></i>
                                    <p>Logout</p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Main content -->
                <?= $this->renderSection('content') ?>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <strong>Copyright &copy; 2014-<?php echo date('Y'); ?> <a href="#">DGSOFT</a>.</strong>
                All rights reserved.
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <script src="/public/assets/plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="/public/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="/public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- ChartJS -->
        <script src="/public/assets/plugins/chart.js/Chart.min.js"></script>
        <!-- Sparkline -->
        <script src="/public/assets/plugins/sparklines/sparkline.js"></script>
        <!-- JQVMap -->
        <script src="/public/assets/plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="/public/assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="/public/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="/public/assets/plugins/moment/moment.min.js"></script>
        <script src="/public/assets/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="/public/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Summernote -->
        <script src="/public/assets/plugins/summernote/summernote-bs4.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="/public/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- select2 picker -->
        <script src="/public/assets/plugins/select2/js/select2.min.js"></script>
        <!-- datatables App -->
        <script src="/public/assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="/public/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        
        <script src="/public/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="/public/assets/plugins/datatables-buttons/js/buttons.flash.min.js"></script>
        <script src="/public/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="/public/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.14.1/adapters/jquery.min.js"></script>
        <!-- AdminLTE App -->
        <script src="/public/assets/dist/js/adminlte.js"></script>
        
        <script>
            var admin_url = '<?php echo site_url('/admin/'); ?>';
        </script>
        <!-- multiple files -->
        <script src="/public/assets/js/jquery.multifile.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="/public/assets/js/admin.js?v=<?= time(); ?>"></script>
    </body>
</html>
