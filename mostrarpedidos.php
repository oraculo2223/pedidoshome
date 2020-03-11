<?php
session_set_cookie_params(60*60*12);
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
          <li class="active"><a href="mostrarpedidos.php"><i class="fa fa-link"></i> <span>Mostrar pedidos</span></a></li>
          <li><a href="Pedidoconfirmado.php"><i class="fa fa-link"></i> <span>Pedidos confirmados</span></a></li>
          <li><a href="pedidosentregados.php"><i class="fa fa-link"></i> <span>Pedidos entregados</span></a></li>
          <?php if ($_SESSION['nivel']==1 || $_SESSION['nivel']==0) { ?>
          <li><a href="pedidospagados.php"><i class="fa fa-link"></i> <span>Pedidos pagados</span></a></li>
          <li><a href="pedidosfacturados.php"><i class="fa fa-link"></i> <span>Pedidos facturados</span></a></li>
          <?php } ?>
          <?php if ($_SESSION['nivel']==1 || $_SESSION['nivel']==0) { ?>
          <li><a href="creditos.php"><i class="fa fa-user"></i> <span>Creditos</span></a></li>
          <li><a href="registro.php"><i class="fa fa-user"></i> <span>Usuarios</span></a></li>
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
          Pedidos
          <small>Primer levantamiento de pedidos</small>
        </h1>
      </section>

      <!-- Main content -->
      <section class="content container-fluid">

        <!--------------------------
          | Your Page Content Here |
          -------------------------->
                              <!-- Large modal -->
          <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title"></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                        <table style="display:none" id="tablahome" class="table table-striped table-bordered table-condensed table-hover">
                            <tbody>
                                <tr>
                                    <td>COMISIONISTA: </td>
                                    <td id="comisionista"></td>
                                </tr>
                                <tr>
                                    <td>NOMBRE: </td>
                                    <td id="nombre"></td>
                                </tr>
                                <tr>
                                    <td> APELLIDO MATERNO: </td>
                                    <td id="materno"></td>
                                </tr>
                                <tr>
                                    <td>APELLIDO PATERNO: </td>
                                    <td id="paterno"></td>
                                </tr>
                                <tr>
                                    <td> NUMERO DE TELEFONO: </td>
                                    <td id="telefono"></td>
                                </tr>
                                <tr>
                                    <td> TIENDA EN LA CUAL RECOGE: </td>
                                    <td id="tienda"></td>
                                </tr>
                                <tr>
                                    <td> CIUDAD: </td>
                                    <td id="ciudad"></td>
                                </tr>
                                <tr>
                                    <td> ESTADO: </td>
                                    <td id="estado"></td>
                                </tr>
                                <tr>
                                    <td> LINK: </td>
                                    <td id="link1"></td>
                                </tr>
                                <tr>
                                    <td> CANTIDAD DE ARTICULOS LINK 1: </td>
                                    <td id="art1"></td>
                                </tr>
                                <tr>
                                    <td> LINK: </td>
                                    <td id="link2"></td>
                                </tr>
                                <tr>
                                    <td> CANTIDAD DE ARTICULOS LINK 2: </td>
                                    <td id="art2"></td>
                                </tr>
                                <tr>
                                    <td> LINK: </td>
                                    <td id="link3"></td>
                                </tr>
                                <tr>
                                    <td> CANTIDAD DE ARTICULOS LINK 3: </td>
                                    <td id="art3"></td>
                                </tr>
                                <tr>
                                    <td> LINK: </td>
                                    <td id="link4"></td>
                                </tr>
                                <tr>
                                    <td> CANTIDAD DE ARTICULOS LINK 4: </td>
                                    <td id="art4"></td>
                                </tr>
                                <tr>
                                    <td> LINK: </td>
                                    <td id="link5"></td>
                                </tr>
                                <tr>
                                    <td> CANTIDAD DE ARTICULOS LINK 5: </td>
                                    <td id="art5"></td>
                                </tr>
                                <tr>
                                    <td> LINK: </td>
                                    <td id="link6"></td>
                                </tr>
                                <tr>
                                    <td> CANTIDAD DE ARTICULOS LINK 6: </td>
                                    <td id="art6"></td>
                                </tr>
                                <tr>
                                    <td> LINK: </td>
                                    <td id="link7"></td>
                                </tr>
                                <tr>
                                    <td> CANTIDAD DE ARTICULOS LINK 7: </td>
                                    <td id="art7"></td>
                                </tr>
                                <tr>
                                    <td> LINK: </td>
                                    <td id="link8"></td>
                                </tr>
                                <tr>
                                    <td> CANTIDAD DE ARTICULOS LINK 8: </td>
                                    <td id="art8"></td>
                                </tr>
                                <tr>
                                    <td> LINK: </td>
                                    <td id="link9"></td>
                                </tr>
                                <tr>
                                    <td> CANTIDAD DE ARTICULOS LINK 9: </td>
                                    <td id="art9"></td>
                                </tr>
                                <tr>
                                    <td> LINK: </td>
                                    <td id="link10"></td>
                                </tr>
                                <tr>
                                    <td> CANTIDAD DE ARTICULOS LINK 10: </td>
                                    <td id="art10"></td>
                                </tr>
                                <tr>
                                    <td> MONTO A PAGAR: </td>
                                    <td id="monto"></td>
                                </tr>
                            </tbody>
                        </table>
                        <table style="display:none" id="tablageneral" class="table table-striped table-bordered table-condensed table-hover">
                            <tbody>
                                <tr>
                                    <td>COMISIONISTA: </td>
                                    <td id="comisionistag"></td>
                                </tr>
                                <tr>
                                    <td>NOMBRE: </td>
                                    <td id="nombreg"></td>
                                </tr>
                                <tr>
                                    <td> APELLIDO MATERNO: </td>
                                    <td id="maternog"></td>
                                </tr>
                                <tr>
                                    <td>APELLIDO PATERNO: </td>
                                    <td id="paternog"></td>
                                </tr>
                                <tr>
                                    <td> NUMERO DE TELEFONO: </td>
                                    <td id="telefonog"></td>
                                </tr>
                                <tr>
                                    <td> Calle: </td>
                                    <td id="calle"></td>
                                </tr>
                                <tr>
                                    <td> CIUDAD: </td>
                                    <td id="ciudadg"></td>
                                </tr>
                                <tr>
                                    <td> ESTADO: </td>
                                    <td id="estadog"></td>
                                </tr>
                                <tr>
                                    <td> NO EXTERIOR: </td>
                                    <td id="noexterior"></td>
                                </tr>
                                <tr>
                                    <td> NO INTERIOR: </td>
                                    <td id="nointerior"></td>
                                </tr>
                                <tr>
                                    <td> COLONIA </td>
                                    <td id="colonia"></td>
                                </tr>
                                <tr>
                                    <td> CÓDIGO POSTAL </td>
                                    <td id="cp"></td>
                                </tr>
                                <tr>
                                    <td> MUNICIPIO O DELEGACIÓN </td>
                                    <td id="municipio"></td>
                                </tr>
                                <tr>
                                    <td> ENTRE LA CALLE </td>
                                    <td id="entrecalle"></td>
                                </tr>
                                <tr>
                                    <td> Y LA CALLE </td>
                                    <td id="ycalle"></td>
                                </tr>
                                <tr>
                                    <td> DESCRIPCIÓN ESPECIFICACIONES ETC</td>
                                    <td id="especificaciones"></td>
                                </tr>
                                
                                <tr>
                                    <td> MONTO A PAGAR: </td>
                                    <td id="montog"></td>
                                </tr>
                            </tbody>
                        </table>
                        <table style="display:none" id="tablatelmex" class="table table-striped table-bordered table-condensed table-hover">
                            <tbody>
                                <tr>
                                    <td>COMISIONISTA: </td>
                                    <td id="comisionistat"></td>
                                </tr>
                                <tr>
                                    <td> CONTRASEÑA: </td>
                                    <td id="contrasenat"></td>
                                </tr>
                                <tr>
                                    <td> E-MAIL: </td>
                                    <td id="emailt"></td>
                                </tr>
                                <tr>
                                    <td> NUMERO DE TELEFONO: </td>
                                    <td id="telefonot"></td>
                                </tr>
                                <tr>
                                    <td> MONTO A PAGAR: </td>
                                    <td id="montot"></td>
                                </tr>
                            </tbody>
                        </table>
                        <table style="display:none" id="tablashein" class="table table-striped table-bordered table-condensed table-hover">
                            <tbody>
                                <tr>
                                    <td>COMISIONISTA: </td>
                                    <td id="comisionistas"></td>
                                </tr>
                                <tr>
                                    <td> CONTRASEÑA: </td>
                                    <td id="contrasenas"></td>
                                </tr>
                                <tr>
                                    <td> E-MAIL: </td>
                                    <td id="emails"></td>
                                </tr>
                                <tr>
                                    <td> MONTO A PAGAR: </td>
                                    <td id="montos"></td>
                                </tr>
                                <tr>
                                    <td> NICK: </td>
                                    <td id="nicks"></td>
                                </tr>
                            </tbody>
                        </table>
                </div>
            </div>
          </div>
          <div class="panel-body table-responsive" id="listadoregistros">
            <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
              <thead>
                <th>ID</th>
                <th>TIPO DE PEDIDO</th>
                <th>COMISIONISTA</th>
                <th>MONTO</th>
                <th>ESTADO</th>
                <th>CUIDAD</th>
                <th>TELEFONO</th>
                <th>ACCIONES</th>
              </thead>
              <tbody>                            
              </tbody>
            </table>
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
    header('Location: /login.php');
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
<script type="text/javascript" src="js/pedidos.js"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>