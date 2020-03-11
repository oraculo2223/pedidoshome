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
          <li class="active"><a href="Pedidoconfirmado.php"><i class="fa fa-link"></i> <span>Pedidos confirmados</span></a></li>
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
          <small>Pedidos confirmados</small>
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
                    <table style="display:none" id="tablahome" class="table-responsive table-bordered">
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
                            <tr>
                                <td> IMAGEN </td>
                                <td>
                                    <a href="" id="imagena"><img src="" width="150px" height="120px" id="imagen"></a>
                                    <a href="" id="imagena2"><img src="" width="150px" height="120px" id="imagen2"></a>
                                    <a href="" id="imagena3"><img src="" width="150px" height="120px" id="imagen3"></a>
                                    <a href="" id="imagena4"><img src="" width="150px" height="120px" id="imagen4"></a>
                                    <a href="" id="imagena5"><img src="" width="150px" height="120px" id="imagen5"></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table style="display:none" id="tablageneral" class="table-responsive table-bordered">
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
                            <tr>
                                <td> IMAGEN </td>
                                <td>
                                    <a href="" id="imagenag"><img src="" width="150px" height="120px" id="imageng"></a>
                                    <a href="" id="imagena2g"><img src="" width="150px" height="120px" id="imagen2g"></a>
                                    <a href="" id="imagena3g"><img src="" width="150px" height="120px" id="imagen3g"></a>
                                    <a href="" id="imagena4g"><img src="" width="150px" height="120px" id="imagen4g"></a>
                                    <a href="" id="imagena5g"><img src="" width="150px" height="120px" id="imagen5g"></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table style="display:none" id="tablatelmex" class="table-responsive table-bordered">
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
                            <tr>
                                <td> IMAGEN </td>
                                <td>
                                    <a href="" id="imagenat"><img src="" width="150px" height="120px" id="imagent"></a>
                                    <a href="" id="imagena2t"><img src="" width="150px" height="120px" id="imagen2t"></a>
                                    <a href="" id="imagena3t"><img src="" width="150px" height="120px" id="imagen3t"></a>
                                    <a href="" id="imagena4t"><img src="" width="150px" height="120px" id="imagen4t"></a>
                                    <a href="" id="imagena5t"><img src="" width="150px" height="120px" id="imagen5t"></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table style="display:none" id="tablashein" class="table-responsive table-bordered">
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
                                <td id="nickk"></td>
                            </tr>
                            <tr>
                                <td> IMAGEN </td>
                                <td>
                                    <a href="" id="imagenas"><img src="" width="150px" height="120px" id="imagens"></a>
                                    <a href="" id="imagena2s"><img src="" width="150px" height="120px" id="imagen2s"></a>
                                    <a href="" id="imagena3s"><img src="" width="150px" height="120px" id="imagen3s"></a>
                                    <a href="" id="imagena4s"><img src="" width="150px" height="120px" id="imagen4s"></a>
                                    <a href="" id="imagena5s"><img src="" width="150px" height="120px" id="imagen5s"></a>
                                </td>
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
                <th>ESTATUS</th>
                <th>ACCIONES</th>
              </thead>
              <tbody>                            
              </tbody>
            </table>
        </div>
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
                <h1 id="titulo"></h1>
                <form style="display:none" name="formulario" id="contact-form" role="form" method="POST">
                    <div class="controls">
                        <div class="row">   
                            <div class="col-lg-6"> 
                                <div class="form-group">
                                    <label for="nombre1">Nombre *</label>
                                    <input id="nombre1" type="text" name="nombre1" class="form-control" placeholder="Nombre" required="required"
                                        data-error="Nombre es requerido.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="materno1">Apellido Materno*</label>
                                    <input id="materno1" type="text" name="materno1" class="form-control" placeholder="Apellido Materno" required="required"
                                        data-error="Apellido Materno es requerido.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="paterno1">Apellido Paterno*</label>
                                        <input id="paterno1" type="text" name="paterno1" class="form-control" placeholder="Apellido Paterno" required="required"
                                            data-error="Apellido Paterno es requerido">
                                        <div class="help-block with-errors"></div>
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="telefono1">Telefono*</label>
                                        <input id="telefono1" type="number" name="telefono1" class="form-control" placeholder="Telefono" required="required"
                                            data-error="Telefono es requerido">
                                        <div class="help-block with-errors"></div>
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="tienda1">Tienda*</label>
                                        <input id="tienda1" type="text" name="tienda1" class="form-control" placeholder="Tienda" required="required"
                                            data-error="tienda es requerido">
                                        <div class="help-block with-errors"></div>
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="ciudad1">Ciudad*</label>
                                        <input id="ciudad1" type="text" name="ciudad1" class="form-control" placeholder="Ciudad" required="required"
                                            data-error="Ciudad es requerido">
                                        <div class="help-block with-errors"></div>
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="estado1">Estado*</label>
                                        <input id="estado1" type="text" name="estado1" class="form-control" placeholder="Estado" required="required"
                                            data-error="Estado es requerido">
                                        <div class="help-block with-errors"></div>
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="link11">LINK 1*</label>
                                        <input id="link11" type="text" name="link11" class="form-control" placeholder="link1">
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="art11">CANTIDAD DE PIEZAS1 1*</label>
                                        <input id="art11" type="text" name="art11" class="form-control" placeholder="CANTIDAD DE PIEZAS1">
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="link21">LINK 2*</label>
                                        <input id="link21" type="text" name="link21" class="form-control" placeholder="link2">
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="art21">CANTIDAD DE PIEZAS 2*</label>
                                        <input id="art21" type="text" name="art21" class="form-control" placeholder="CANTIDAD DE PIEZAS2">
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="link31">LINK 3*</label>
                                        <input id="link31" type="text" name="link31" class="form-control" placeholder="link3">
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="art31">CANTIDAD DE PIEZAS 3*</label>
                                        <input id="art31" type="text" name="art31" class="form-control" placeholder="CANTIDAD DE PIEZAS3">
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="link41">LINK 4*</label>
                                        <input id="link41" type="text" name="link41" class="form-control" placeholder="link4">
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="art41">CANTIDAD DE PIEZAS 4*</label>
                                        <input id="art41" type="text" name="art41" class="form-control" placeholder="CANTIDAD DE PIEZAS4">
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="link51">LINK 5*</label>
                                        <input id="link51" type="text" name="link51" class="form-control" placeholder="link5">
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="art51">CANTIDAD DE PIEZAS 5*</label>
                                        <input id="art51" type="text" name="art51" class="form-control" placeholder="CANTIDAD DE PIEZAS5">
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="link61">LINK 6*</label>
                                        <input id="link61" type="text" name="link61" class="form-control" placeholder="link6">
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="art61">CANTIDAD DE PIEZAS 6*</label>
                                        <input id="art61" type="text" name="art61" class="form-control" placeholder="CANTIDAD DE PIEZAS6">
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="link71">LINK 7*</label>
                                        <input id="link71" type="text" name="link71" class="form-control" placeholder="link7">
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="art71">CANTIDAD DE PIEZAS 7*</label>
                                        <input id="art71" type="text" name="art71" class="form-control" placeholder="CANTIDAD DE PIEZAS7">
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="link81">LINK 8*</label>
                                        <input id="link81" type="text" name="link81" class="form-control" placeholder="link8">
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="art81">CANTIDAD DE PIEZAS 8*</label>
                                        <input id="art81" type="text" name="art81" class="form-control" placeholder="CANTIDAD DE PIEZAS8">
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="link91">LINK 9*</label>
                                        <input id="link91" type="text" name="link91" class="form-control" placeholder="link9">
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="art91">CANTIDAD DE PIEZAS 9*</label>
                                        <input id="art91" type="text" name="art91" class="form-control" placeholder="CANTIDAD DE PIEZAS9">
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="link101">LINK 10*</label>
                                        <input id="link101" type="text" name="link101" class="form-control" placeholder="link10">
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="art101">CANTIDAD DE PIEZAS 10*</label>
                                        <input id="art101" type="text" name="art101" class="form-control" placeholder="CANTIDAD DE PIEZAS10">
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="monto1">Monto a pagar*</label>
                                        <input id="monto1" type="number" name="monto1" class="form-control" placeholder="monto" required="required"
                                            data-error="Monto es requerido">
                                        <div class="help-block with-errors"></div>
                                    </div>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Imagen:</label>
                                    <input type="file" class="form-control" name="imagen" id="imagen">
                                    <input type="hidden" name="imagenactual" id="imagenactual">
                                    <img src="" width="150px" height="120px" id="imagenmuestra">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Imagen2:</label>
                                    <input type="file" class="form-control" name="imagen2" id="imagen2">
                                    <input type="hidden" name="imagenactual2" id="imagenactual2">
                                    <img src="" width="150px" height="120px" id="imagenmuestra2">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Imagen3:</label>
                                    <input type="file" class="form-control" name="imagen3" id="imagen3">
                                    <input type="hidden" name="imagenactual3" id="imagenactual3">
                                    <img src="" width="150px" height="120px" id="imagenmuestra3">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Imagen4:</label>
                                    <input type="file" class="form-control" name="imagen4" id="imagen4">
                                    <input type="hidden" name="imagenactual4" id="imagenactual4">
                                    <img src="" width="150px" height="120px" id="imagenmuestra4">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Imagen5:</label>
                                    <input type="file" class="form-control" name="imagen5" id="imagen5">
                                    <input type="hidden" name="imagenactual5" id="imagenactual5">
                                    <img src="" width="150px" height="120px" id="imagenmuestra5">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button id="" type="submit" class="btn btn-primary actualizar">Guardar Cambios</button>
                    </div>
                </form>
                <form style="display:none" name="formulariog" id="contact-formg" role="form" method="POST">
                    <div class="controls">
                        <div class="row">   
                            <div class="col-lg-6"> 
                                <div class="form-group">
                                    <label for="nombre1g">Nombre *</label>
                                    <input id="nombre1g" type="text" name="nombre1" class="form-control" placeholder="Nombre" required="required"
                                        data-error="Nombre es requerido.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="materno1g">Apellido Materno*</label>
                                    <input id="materno1g" type="text" name="materno1" class="form-control" placeholder="Apellido Materno" required="required"
                                        data-error="Apellido Materno es requerido.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="paterno1g">Apellido Paterno*</label>
                                        <input id="paterno1g" type="text" name="paterno1" class="form-control" placeholder="Apellido Paterno" required="required"
                                            data-error="Apellido Paterno es requerido">
                                        <div class="help-block with-errors"></div>
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="telefono1g">Telefono*</label>
                                        <input id="telefono1g" type="number" name="telefono1" class="form-control" placeholder="Telefono" required="required"
                                            data-error="Telefono es requerido">
                                        <div class="help-block with-errors"></div>
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="ciudad1g">Ciudad*</label>
                                        <input id="ciudad1g" type="text" name="ciudad1" class="form-control" placeholder="Ciudad" required="required"
                                            data-error="Ciudad es requerido">
                                        <div class="help-block with-errors"></div>
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="estado1g">Estado*</label>
                                        <input id="estado1g" type="text" name="estado1" class="form-control" placeholder="Estado" required="required"
                                            data-error="Estado es requerido">
                                        <div class="help-block with-errors"></div>
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="calleg">Calle*</label>
                                        <input id="calleg" type="text" name="calleg" class="form-control" placeholder="Calle" required="required"
                                            data-error="Calle es requerido">
                                        <div class="help-block with-errors"></div>
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="noexteriorg">No exterior*</label>
                                        <input id="noexteriorg" type="text" name="noexteriorg" class="form-control" placeholder="No exterior" required="required"
                                            data-error="No exterior es requerido">
                                        <div class="help-block with-errors"></div>
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="nointeriorg">No interior*</label>
                                        <input id="nointeriorg" type="text" name="nointeriorg" class="form-control" placeholder="No interior" required="required"
                                            data-error="No interior es requerido">
                                        <div class="help-block with-errors"></div>
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="coloniag">Colonia*</label>
                                        <input id="coloniag" type="text" name="coloniag" class="form-control" placeholder="Colonia" required="required"
                                            data-error="Colonia es requerido">
                                        <div class="help-block with-errors"></div>
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="cpg">Código postal*</label>
                                        <input id="cpg" type="text" name="cpg" class="form-control" placeholder="Código postal" required="required"
                                            data-error="Código postal es requerido">
                                        <div class="help-block with-errors"></div>
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="municipiog">Municipio*</label>
                                        <input id="municipiog" type="text" name="municipiog" class="form-control" placeholder="Municipio" required="required"
                                            data-error="Municipio es requerido">
                                        <div class="help-block with-errors"></div>
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="entrecalleg">Entre calle*</label>
                                        <input id="entrecalleg" type="text" name="entrecalleg" class="form-control" placeholder="Entre calle" required="required"
                                            data-error="Entre calle es requerido">
                                        <div class="help-block with-errors"></div>
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="ycalleg">Y calle*</label>
                                        <input id="ycalleg" type="text" name="ycalleg" class="form-control" placeholder="Y calle" required="required"
                                            data-error="Y calle es requerido">
                                        <div class="help-block with-errors"></div>
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="especificacionesg">Especificaciones*</label>
                                        <input id="especificacionesg" type="text" name="especificacionesg" class="form-control" placeholder="especificaciones" required="required"
                                            data-error="especificaciones es requerido">
                                        <div class="help-block with-errors"></div>
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="monto1g">Monto a pagar*</label>
                                        <input id="monto1g" type="number" name="monto1" class="form-control" placeholder="monto" required="required"
                                            data-error="Monto es requerido">
                                        <div class="help-block with-errors"></div>
                                    </div>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Imagen:</label>
                                    <input type="file" class="form-control" name="imagen" id="imagen">
                                    <input type="hidden" name="imagenactual" id="imagenactualg">
                                    <img src="" width="150px" height="120px" id="imagenmuestrag">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Imagen2:</label>
                                    <input type="file" class="form-control" name="imagen2" id="imagen2">
                                    <input type="hidden" name="imagenactual2" id="imagenactual2g">
                                    <img src="" width="150px" height="120px" id="imagenmuestra2g">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Imagen3:</label>
                                    <input type="file" class="form-control" name="imagen3" id="imagen3">
                                    <input type="hidden" name="imagenactual3" id="imagenactual3g">
                                    <img src="" width="150px" height="120px" id="imagenmuestra3g">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Imagen4:</label>
                                    <input type="file" class="form-control" name="imagen4" id="imagen4">
                                    <input type="hidden" name="imagenactual4" id="imagenactual4g">
                                    <img src="" width="150px" height="120px" id="imagenmuestra4g">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Imagen5:</label>
                                    <input type="file" class="form-control" name="imagen5" id="imagen5">
                                    <input type="hidden" name="imagenactual5" id="imagenactual5g">
                                    <img src="" width="150px" height="120px" id="imagenmuestra5g">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button id="" type="submit" class="btn btn-primary actualizarg">Guardar Cambios</button>
                    </div>
                </form>
                <form style="display:none" name="formulariot" id="contact-formt" role="form" method="POST">
                    <div class="controls">
                        <div class="row">
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="contrasena">Contraseña*</label>
                                        <input id="contrasena" type="text" name="contrasena" class="form-control" placeholder="Contraseña" required="required"
                                            data-error="Contraseña es requerido">
                                        <div class="help-block with-errors"></div>
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="telefono1t">Telefono*</label>
                                        <input id="telefono1t" type="number" name="telefono1" class="form-control" placeholder="Telefono">
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="email1t">Email*</label>
                                        <input id="email1t" type="email" name="email1" class="form-control" placeholder="Email">
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="monto1t">Monto a pagar*</label>
                                        <input id="monto1t" type="number" name="monto1" class="form-control" placeholder="monto" required="required"
                                            data-error="Monto es requerido">
                                        <div class="help-block with-errors"></div>
                                    </div>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Imagen:</label>
                                    <input type="file" class="form-control" name="imagen" id="imagen">
                                    <input type="hidden" name="imagenactual" id="imagenactualt">
                                    <img src="" width="150px" height="120px" id="imagenmuestrat">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Imagen2:</label>
                                    <input type="file" class="form-control" name="imagen2" id="imagen2">
                                    <input type="hidden" name="imagenactual2" id="imagenactual2t">
                                    <img src="" width="150px" height="120px" id="imagenmuestra2t">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Imagen3:</label>
                                    <input type="file" class="form-control" name="imagen3" id="imagen3">
                                    <input type="hidden" name="imagenactual3" id="imagenactual3t">
                                    <img src="" width="150px" height="120px" id="imagenmuestra3t">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Imagen4:</label>
                                    <input type="file" class="form-control" name="imagen4" id="imagen4">
                                    <input type="hidden" name="imagenactual4" id="imagenactual4t">
                                    <img src="" width="150px" height="120px" id="imagenmuestra4t">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Imagen5:</label>
                                    <input type="file" class="form-control" name="imagen5" id="imagen5">
                                    <input type="hidden" name="imagenactual5" id="imagenactual5t">
                                    <img src="" width="150px" height="120px" id="imagenmuestra5t">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button id="" type="submit" class="btn btn-primary actualizart">Guardar Cambios</button>
                    </div>
                </form>
                <form style="display:none" name="formularios" id="contact-forms" role="form" method="POST">
                    <div class="controls">
                        <div class="row">
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="contrasenass">Contraseña*</label>
                                        <input id="contrasenass" type="text" name="contrasena" class="form-control" placeholder="Contraseña" required="required"
                                            data-error="Contraseña es requerido">
                                        <div class="help-block with-errors"></div>
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="email1s">Email*</label>
                                        <input id="email1s" type="email" name="email1" class="form-control" placeholder="Email">
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="monto1s">Monto a pagar*</label>
                                        <input id="monto1s" type="number" name="monto1" class="form-control" placeholder="monto" required="required"
                                            data-error="Monto es requerido">
                                        <div class="help-block with-errors"></div>
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="nicks">NICK*</label>
                                        <input id="nicks" type="text" name="nickk" class="form-control" placeholder="nick" required="required"
                                            data-error="NICK es requerido">
                                        <div class="help-block with-errors"></div>
                                    </div>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Imagen:</label>
                                    <input type="file" class="form-control" name="imagen" id="imagen">
                                    <input type="hidden" name="imagenactual" id="imagenactuals">
                                    <img src="" width="150px" height="120px" id="imagenmuestras">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Imagen2:</label>
                                    <input type="file" class="form-control" name="imagen2" id="imagen2">
                                    <input type="hidden" name="imagenactual2" id="imagenactual2s">
                                    <img src="" width="150px" height="120px" id="imagenmuestra2s">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Imagen3:</label>
                                    <input type="file" class="form-control" name="imagen3" id="imagen3">
                                    <input type="hidden" name="imagenactual3" id="imagenactual3s">
                                    <img src="" width="150px" height="120px" id="imagenmuestra3s">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Imagen4:</label>
                                    <input type="file" class="form-control" name="imagen4" id="imagen4">
                                    <input type="hidden" name="imagenactual4" id="imagenactual4s">
                                    <img src="" width="150px" height="120px" id="imagenmuestra4s">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Imagen5:</label>
                                    <input type="file" class="form-control" name="imagen5" id="imagen5">
                                    <input type="hidden" name="imagenactual5" id="imagenactual5s">
                                    <img src="" width="150px" height="120px" id="imagenmuestra5s">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button id="" type="submit" class="btn btn-primary actualizars">Guardar Cambios</button>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="exampleModalCenter0" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <input type="hidden" value="" class="modalestablecer">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Califique el pedido</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="form-group">
                    <select id="tipodepedido" class="form-control" required>
                        <option value disabled selected>Selecciona el status del pedido</option>
                        <option value="2">PEDIDO RECHAZADO</option>
                        <option value="3">PEDIDO EXITOSO</option>
                    </select>
                </div>

                    <h1 id="titulo"></h1>
                    <form style="display:none" name="formulario" id="contact-form-calificarexitoso" role="form" method="POST">
                        <div class="controls">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label>Imagen:</label>
                                        <input type="file" class="form-control" name="imagen" id="imagenexitosa">
                                        <input type="hidden" name="imagenactual" id="imagenactualexitosa">
                                        <img src="" width="150px" height="120px" id="imagenmuestraexitosa">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button id="" type="submit" class="btn btn-primary actualizarexitoso">Guardar Cambios</button>
                        </div>
                    </form>
                    <h1 id="titulo"></h1>
                    <form style="display:none" name="formulario" id="contact-form-calificarrechazado" role="form" method="POST">
                        <div class="controls">
                            <div class="row">   
                                <div class="col-lg-6"> 
                                    <div class="form-group">
                                        <label for="comentarios">Comentarios *</label>
                                        <input id="comentarios" type="text" name="comentarios" class="form-control" placeholder="comentarios" required="required"
                                            data-error="comentario es requerido.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button id="" type="submit" class="btn btn-primary actualizarrechazado">Guardar Cambios</button>
                        </div>
                    </form>
            </div>
          </div>
        </div>
        <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">el pedido fue rechazado</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <P id="mostrarrechazado"></P>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Pedido exitoso acontinuación puedes ver el comprobante</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <a href="" id="imagenexitosoadmin"><img src="" width="250px" height="220px" id="imagenaexitosoadmin"></a>
                </div>
            </div>
        </div>
        <!-- modal comisionista-->
        <div class="modal fade" id="exampleModalCenterc0" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Tu pedido aún no ha sido calificado</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModalCenterc1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">el pedido fue rechazado</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <P id="mostrarrechazadocomi"></P>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModalCenterc2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">el pedido fue exitoso a contonuación puedes ver el comprobante</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        <a href="" id="imagenexitosocomi"><img src="" width="250px" height="220px" id="imagencomi"></a>
                    </div>
                </div>
            </div>
        </div>
                    <!-- modal comisionista-->
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
<script type="text/javascript" src="js/pedidoconfirmado.js"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>