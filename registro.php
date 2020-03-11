<?php
session_start();
if ($_SESSION['nivel']==1 || $_SESSION['nivel']==0) { ?>
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
          <li class="active"><a href="registro.php"><i class="fa fa-user"></i> <span>Usuarios</span></a></li>
          <li><a href="direcciones.php"><i class="fa fa-link"></i> <span>Direcciones</span></a></li>
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
          Usuarios
          <small>Administrador de usuarios</small>
        </h1>
      </section>

      <!-- Main content -->
      <section class="content container-fluid">

        <!--------------------------
          | Your Page Content Here |
          -------------------------->
          <!-- form content -->
          <form name="formulario" id="formulario" method="POST">
            <div class="form-group">
                    <label for="nick">NICK</label>
                    <input type="text" class="form-control" id="nick" name="nick" placeholder="Enter Nick" required="required">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">E-MAIL</label>
              <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email" required="required">
            </div>
            <div class="form-group">
              <label for="pass">Password</label>
              <input type="password" class="form-control" id="pass" name="pass" placeholder="Password" required="required">
            </div>
            <div class="form-group">
              <select class="design" id="sel" name="nivel" required="required">
                <option selected>Elije...</option>
                <option value="2"> Comisionista </option>
                <?php if ($_SESSION['nivel']==0) { ?>
                <option value="1"> Administrador </option>
                <?php } ?>
              </select>
            </div>
            <button type="button" class="btn btn-primary" id="btnGuardar">Registrar</button>
          </form>
          <!-- end form -->
          <!-- Main datatable user -->
          <div class="panel-body table-responsive">
            <table id="listadousuarios" class="table table-striped table-bordered table-condensed table-hover">
              <thead>
                  <th>Nick</th>
                  <th>E-mail</th>
                  <th>Nivel</th>
                  <th>Acciones</th>
              </thead>
            </table>
          </div>
          <!-- /.end datatable user -->   
                          <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                        <form name="formulario2" id="formulario2" role="form" method="POST">
                            <div class="controls">
                                <div class="row">   
                                    <div class="col-lg-6"> 
                                        <div class="form-group">
                                            <label for="nickeditar">Nombre *</label>
                                            <input id="nickeditar" type="text" name="nickeditar" class="form-control" placeholder="Nick" required="required"
                                                data-error="Nombre requerido.">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="emaileditar">E-mail*</label>
                                            <input id="emaileditar" type="email" name="emaileditar" class="form-control" placeholder="E-mail" required="required"
                                                data-error="email es requerido.">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="passeditar">Nueva contraseña*</label>
                                                <input id="passeditar" type="password" name="passeditar" class="form-control" placeholder="Contraseña" required="required"
                                                    data-error="Contraseña es requerido">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button id="" type="submit" class="btn btn-primary actualizar">Guardar Cambios</button>
                            </div>
                        </form>
                </div>
            </div>
          </div>
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
<script type="text/javascript" src="js/usuarios.js"></script>
<script src="js/bootbox.min.js"></script> 
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
<?php 
} else {
  header('Location: login.php');
  exit;
}
?>