<?php
session_start();
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pedidos</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<?php if(isset($_SESSION['email'])) { ?>
  <div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

      <!-- Logo -->
      <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>S</b>P</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Sistema de </b>Pedidos</span>
      </a>

      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <!-- /.messages-menu -->
            <!-- Tasks Menu -->
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"><?php echo $_SESSION['nick']; ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                  <p>
                    <?php echo $_SESSION['nick']; ?>
                    <small>Miembro</small>
                  </p>
                </li>
                <!-- Menu Body -->
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Perfil</a>
                  </div>
                  <div class="pull-right">
                    <a href="controlador/usuario.php?op=salir" class="btn btn-default btn-flat">Cerrar sesión</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?php echo $_SESSION['nick']; ?></p>
            <!-- Status -->
            <a href="#"><i class="fa fa-circle text-success"></i> En linea</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">Módulos</li>
          <!-- Optionally, you can add icons to the links -->
          <li><a href="mostrarpedidos.php"><i class="fa fa-link"></i> <span>Mostrar pedidos</span></a></li>
          <li><a href="Pedidoconfirmado.php"><i class="fa fa-link"></i> <span>Pedidos confirmados</span></a></li>
          <li><a href="pedidosentregados.php"><i class="fa fa-link"></i> <span>Pedidos entregados</span></a></li>
          <?php if ($_SESSION['nivel']==1 || $_SESSION['nivel']==0) { ?>
          <li><a href="pedidospagados.php"><i class="fa fa-link"></i> <span>Pedidos pagados</span></a></li>
          <li><a href="pedidosfacturados.php"><i class="fa fa-link"></i> <span>Pedidos facturados</span></a></li>
          <?php } ?>
          <?php if ($_SESSION['nivel']==1 || $_SESSION['nivel']==0) { ?>
          <li><a href="creditos.php"><i class="fa fa-user"></i> <span>Creditos</span></a></li>
          <li><a href="registro.php"><i class="fa fa-user"></i> <span>Usuarios</span></a></li>
          <li class="active"><a href="direcciones.php"><i class="fa fa-link"></i> <span>Direcciones</span></a></li>
          <?php } ?>
          <?php if ($_SESSION['nivel']==2) { ?>
          <li><a href="login.php"><i class="fa fa-link"></i> <span>Realizar pedido</span></a></li>
          <?php } ?>
        </ul>
        <!-- /.sidebar-menu -->
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Direcciones
          <small>Administrador de direcciones</small>
        </h1>
      </section>

      <!-- Main content -->
      <section class="content container-fluid">
      <div class="container">
        <!--------------------------
          | Your Page Content Here |
          -------------------------->
          <button type="button" class="btn btn-success" id="nueva">Nueva Dirección</button>
          <button type="button" class="btn btn-primary" id="verdir">Ver Direcciones</button>
          <br>
          <br>
            <div class="row" style="display:none" id="form">
                <div class="">
                    <form name="formulario" id="formulario" method="POST">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <select class="selectpicker" data-live-search="true" id="idcomnueva" name="idcomi" required="required">
                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="paterno">Apellido Paterno:</label>
                                    <input type="text" class="form-control" id="paterno" name="paterno" placeholder="Apellido paterno" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="materno">Apellido Materno:</label>
                                    <input type="text" class="form-control" id="materno" name="materno" placeholder="Apellido paterno" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="cp">Código postal:</label>
                                    <input type="number" class="form-control" id="cp" name="cp" placeholder="Código postal" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="telefono">Teléfono:</label>
                                    <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="estado">Estado:</label>
                                    <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="municipio">Municipio o Delegación:</label>
                                    <input type="text" class="form-control" id="municipio" name="municipio" placeholder="Municipio" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="ciudad">Ciudad:</label>
                                    <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ciudad" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="colonia">Colonia:</label>
                                    <input type="text" class="form-control" id="colonia" name="colonia" placeholder="Colonia" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="calle">Calle:</label>
                                    <input type="text" class="form-control" id="calle" name="calle" placeholder="Calle" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="noexterior">No. exterior:</label>
                                    <input type="number" class="form-control" id="noexterior" name="noexterior" placeholder="No. exterior" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="nointerior">No. interior:</label>
                                    <input type="number" class="form-control" id="nointerior" name="nointerior" placeholder="No. interior" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="entrecalle">Entre Calle:</label>
                                    <input type="text" class="form-control" id="entrecalle" name="entrecalle" placeholder="Entre Calle:" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="ycalle">Y Calle:</label>
                                    <input type="text" class="form-control" id="ycalle" name="ycalle" placeholder="Y Calle:" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="referencias">Referencias del domicilio:</label>
                                    <textarea type="text" class="form-control" id="referencias" name="referencias" placeholder="Referencias del domicilio" required></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" id="btnGuardar">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END nuevas direcciones -->
            <!-- BEGIN select verdirecciones de comisionista -->
            <div style="display:none" id="selecver">
                <select class="selectpicker" data-live-search="true" id="idcomver">
                </select>
            </div>
            <br>
            <div class="row" id="dir" style="display:none"> 
            </div>
            <!-- END select verdirecciones de comisionista -->
          </div>    
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="pull-right hidden-xs">
        Anything you want
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2020 <a href="#">Pedidos</a>.</strong> Todos los derechos.
    </footer>
    <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
<?php } 
  else {
    header('Location: login.php');
    exit;
  }
?>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>
<script type="text/javascript" src="js/direcciones.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
<script src="js/bootbox.min.js"></script> 
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>