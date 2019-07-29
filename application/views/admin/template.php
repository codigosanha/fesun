<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Asociados | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
      <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/timepicker/bootstrap-timepicker.min.css">
      <!-- bootstrap timepicker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!--Select 2-->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/select2/dist/css/select2.min.css">
    <!-- SweetAlert  -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/sweetalert/sweetalert.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- DataTables Export -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/datatables-export/css/buttons.dataTables.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/css/style.css">
    
    <!-- SweetAlert  -->
    <script src="<?php echo base_url();?>assets/sweetalert/sweetalert.min.js"></script>
</head>
<body class="sidebar-mini skin-green">
    
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <?php if ($this->session->userdata("rol")==2): ?>
                <a href="<?php echo base_url(); ?>usuario/perfil" class="logo">
            <?php else: ?>
                <a href="<?php echo base_url(); ?>dashboard" class="logo">
            <?php endif ?>
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>OFV</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>OFICINA VIRTUAL</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo base_url();?>assets/images/usuarios/<?php echo $this->backend_lib->getUsuarioAutenticado()->imagen;?>" alt="" class="user-image">
                                <?php echo $this->session->userdata("nombres");?>
                            </a>
                            <ul class="dropdown-menu">
                              <li><a href="<?php echo base_url();?>auth/logout">Cerrar Session</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">Menú de Navegación</li>
                    <?php if ($this->session->userdata('rol') == 1): ?>
                    <li>
                        <a href="<?php echo base_url();?>dashboard"><i class="fa fa-home"></i> <span>Inicio</span></a>
                    </li>
                    
                    <li>
                        <a href="<?php echo base_url();?>backend/asociados"><i class="fa fa-home"></i> <span>Asociados</span></a>
                    </li>
                    <?php endif;?>
                    <?php if ($this->session->userdata('rol') == 3 || $this->session->userdata('rol') == 1): ?>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-user"></i> <span>Admin. Archivos</span>
                                <span class="pull-right-container">
                                  <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url();?>myfiles"><i class="fa fa-circle-o"></i> Mis Archivos</a></li>
                                <li><a href="<?php echo base_url();?>file/shared-with-me"><i class="fa fa-circle-o"></i> Compartidos Conmigo</a></li>
                                
                            </ul>
                        </li>
                    <?php endif ?>

                    <?php if ($this->session->userdata('rol') == 1):?>
                    
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user"></i> <span>Reportes</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url();?>reportes/archivos"><i class="fa fa-circle-o"></i> Archivos</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user"></i> <span>Administrador</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url();?>administrador/usuarios"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                            <li><a href="<?php echo base_url();?>administrador/usuarios/logs"><i class="fa fa-circle-o"></i> Logs</a></li>
                            <!--<li><a href="<?php echo base_url();?>administrador/usuarios/download_backup"><i class="fa fa-circle-o"></i> Backup</a></li>
                            <li><a href="<?php echo base_url();?>administrador/usuarios/download_backup"><i class="fa fa-circle-o"></i> Importar Data</a></li>
                            <li><a href="<?php echo base_url();?>reportes/archivos"><i class="fa fa-circle-o"></i> Archivos</a></li>
                        -->
                            <li><a href="<?php echo base_url();?>administrador/fincas"><i class="fa fa-circle-o"></i> Fincas</a></li>
                        </ul>
                    </li>
                    <?php endif?>
                    <?php if ($this->session->userdata("rol") != 3): ?>
                        <li>
                            <a href="<?php echo base_url();?>backend/aportes"><i class="fa fa-home"></i> <span>Aportes</span></a>
                        </li>
                    <?php endif ?>
                    
                    <li>
                        <a href="<?php echo base_url();?>usuario/perfil"><i class="fa fa-info-circle"></i> <span>Mi perfil</span></a>
                    </li>
                    
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <?php echo $contenido;?>
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->
    

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url();?>assets/select2/dist/js/select2.full.min.js"></script>
<!-- Timepicker -->
<script src="<?php echo base_url();?>assets/timepicker/bootstrap-timepicker.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- DataTables Export -->
<script src="<?php echo base_url(); ?>assets/datatables-export/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatables-export/js/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatables-export/js/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatables-export/js/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/datatables-export/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatables-export/js/buttons.print.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
<script src="<?php echo base_url();?>assets/jquery-print/jquery.print.js"></script>
<script>

  $(document).ready(function () {

    $('.sidebar-menu').tree()
  })
</script>
<script>
    var base_url = "<?php echo base_url();?>";
    var rol = "<?php echo $this->session->userdata('rol'); ?>";
    var uri_segment = "<?php echo $this->uri->segment(2) === false ? '':$this->uri->segment(2); ?>";

    console.log(uri_segment);
</script>
<script src="<?php echo base_url(); ?>assets/backend/script.js"></script>
<script src="<?php echo base_url(); ?>assets/backend/computadoras.js"></script>
</body>
</html>
