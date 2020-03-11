<?php
ob_start();
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
        <style type="text/css">
	.login-form {
		width: 340px;
    	margin: 50px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
</style>
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
<?php if(isset($_SESSION['email'])) { ?>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

      <!-- Logo -->
      <a href="index2.html" class="logo">
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
          <li class="active"><a href="login.php"><i class="fa fa-link"></i> <span>Realizar pedido</span></a></li>
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
          <span id="montonoasignado"></span>
          <span id="montototal">Monto total:</span>
          <span id="montoasignado"></span>
          <span id="montogastado"> Usado:</span>
          <span id="montodisponible"></span>
          <span id="montodisp"> Disponible:</span>
          <span id="montod"></span>
        </h1>
      </section>

      <!-- Main content -->
      <section class="content container-fluid">

        <!--------------------------
          | Your Page Content Here |
          -------------------------->
          <div class="container" id="levantarpedidos" style="display:none">
              <div class="row">
                  <div class="col-xl-8 offset-xl-2">
                      <h1 id="nombrepedido">Registrar pedido</h1>
                      <div class="col-lg-6"> 
                          <div class="form-group">
                              <select id="tipodepedido" class="form-control" required>
                                  <option value disabled selected>Selecciona el tipo de pedido</option>
                                  <option value="1">PEDIDO HOME</option>
                                  <option value="2">PEDIDO GENERAL</option>
                                  <option value="3">PEDIDO TELMEX</option>
                                  <option value="4">PEDIDO SHEIN</option>
                                  <option value="5">PEDIDO WALMART</option>
                              </select>
                          </div>
                      </div> 
                      <form id="contact-form" method="post" action="vista/pedidorealizado.php" role="form">
                          <div class="messages"></div>
                          <div class="controls">
                              <div class="row">
                                  <div class="col-lg-6" style="display:none">
                                      <div class="form-group">
                                          <label for="comisionista">Comisionista</label>
                                          <input id="comisionista" type="text" name="comisionista" class="form-control" placeholder="Comisionista" required="required" value="<?php echo $_SESSION['nick']; ?>"
                                              data-error="Comisionista es requerido.">
                                          <div class="help-block with-errors"></div>
                                      </div>   
                                  </div>  
                                  <div class="col-lg-6"> 
                                      <div class="form-group">
                                          <label for="nombre">Nombre *</label>
                                          <input id="nombre" type="text" name="nombre" class="form-control" placeholder="Nombre" required="required"
                                              data-error="Nombre es requerido.">
                                          <div class="help-block with-errors"></div>
                                      </div>
                                  </div>
                                  <div class="col-lg-6">
                                      <div class="form-group">
                                          <label for="materno">Apellido Materno*</label>
                                          <input id="materno" type="text" name="materno" class="form-control" placeholder="Apellido Materno" required="required"
                                              data-error="Apellido Materno es requerido.">
                                          <div class="help-block with-errors"></div>
                                      </div>
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="paterno">Apellido Paterno*</label>
                                              <input id="paterno" type="text" name="paterno" class="form-control" placeholder="Apellido Paterno" required="required"
                                                  data-error="Apellido Paterno es requerido">
                                              <div class="help-block with-errors"></div>
                                          </div>
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="telefono">Telefono*</label>
                                              <input id="telefono" type="text" name="telefono" class="form-control" placeholder="Telefono" pattern="[0-9]{10}" title="Número a 10 digitos" maxlength="10" required="required"
                                                  data-error="Telefono es requerido">
                                              <div class="help-block with-errors"></div>
                                          </div>
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="tienda">Tienda*</label>
                                              <input id="tienda" type="text" name="tienda" class="form-control" placeholder="Tienda" required="required"
                                                  data-error="tienda es requerido">
                                              <div class="help-block with-errors"></div>
                                          </div>
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="ciudad">Ciudad*</label>
                                              <input id="ciudad" type="text" name="ciudad" class="form-control" placeholder="Ciudad" required="required"
                                                  data-error="Ciudad es requerido">
                                              <div class="help-block with-errors"></div>
                                          </div>
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="estado">Estado*</label>
                                              <input id="estado" type="text" name="estado" class="form-control" placeholder="Estado" required="required"
                                                  data-error="Estado es requerido">
                                              <div class="help-block with-errors"></div>
                                          </div>
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="link1">LINK 1*</label>
                                              <input id="link1" type="text" name="link1" class="form-control" placeholder="link1">
                                          </div>
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="CANTIDAD DE PIEZAS1">CANTIDAD DE PIEZAS1 1*</label>
                                              <input id="CANTIDAD DE PIEZAS1" type="text" name="art1" class="form-control" placeholder="CANTIDAD DE PIEZAS1">
                                          </div>
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="link2">LINK 2*</label>
                                              <input id="link2" type="text" name="link2" class="form-control" placeholder="link2">
                                          </div>
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="CANTIDAD DE PIEZAS2">CANTIDAD DE PIEZAS 2*</label>
                                              <input id="CANTIDAD DE PIEZAS2" type="text" name="art2" class="form-control" placeholder="CANTIDAD DE PIEZAS2">
                                          </div>
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="link3">LINK 3*</label>
                                              <input id="link3" type="text" name="link3" class="form-control" placeholder="link3">
                                          </div>
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="CANTIDAD DE PIEZAS3">CANTIDAD DE PIEZAS 3*</label>
                                              <input id="CANTIDAD DE PIEZAS3" type="text" name="art3" class="form-control" placeholder="CANTIDAD DE PIEZAS3">
                                          </div>
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="link4">LINK 4*</label>
                                              <input id="link4" type="text" name="link4" class="form-control" placeholder="link4">
                                          </div>
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="CANTIDAD DE PIEZAS4">CANTIDAD DE PIEZAS 4*</label>
                                              <input id="CANTIDAD DE PIEZAS4" type="text" name="art4" class="form-control" placeholder="CANTIDAD DE PIEZAS4">
                                          </div>
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="link5">LINK 5*</label>
                                              <input id="link5" type="text" name="link5" class="form-control" placeholder="link5">
                                          </div>
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="CANTIDAD DE PIEZAS5">CANTIDAD DE PIEZAS 5*</label>
                                              <input id="CANTIDAD DE PIEZAS5" type="text" name="art5" class="form-control" placeholder="CANTIDAD DE PIEZAS5">
                                          </div>
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="link6">LINK 6*</label>
                                              <input id="link6" type="text" name="link6" class="form-control" placeholder="link6">
                                          </div>
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="CANTIDAD DE PIEZAS6">CANTIDAD DE PIEZAS 6*</label>
                                              <input id="CANTIDAD DE PIEZAS6" type="text" name="art6" class="form-control" placeholder="CANTIDAD DE PIEZAS6">
                                          </div>
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="link7">LINK 7*</label>
                                              <input id="link7" type="text" name="link7" class="form-control" placeholder="link7">
                                          </div>
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="CANTIDAD DE PIEZAS7">CANTIDAD DE PIEZAS 7*</label>
                                              <input id="CANTIDAD DE PIEZAS7" type="text" name="art7" class="form-control" placeholder="CANTIDAD DE PIEZAS7">
                                          </div>
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="link8">LINK 8*</label>
                                              <input id="link8" type="text" name="link8" class="form-control" placeholder="link8">
                                          </div>
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="CANTIDAD DE PIEZAS8">CANTIDAD DE PIEZAS 8*</label>
                                              <input id="CANTIDAD DE PIEZAS8" type="text" name="art8" class="form-control" placeholder="CANTIDAD DE PIEZAS8">
                                          </div>
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="link9">LINK 9*</label>
                                              <input id="link9" type="text" name="link9" class="form-control" placeholder="link9">
                                          </div>
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="CANTIDAD DE PIEZAS9">CANTIDAD DE PIEZAS 9*</label>
                                              <input id="CANTIDAD DE PIEZAS9" type="text" name="art9" class="form-control" placeholder="CANTIDAD DE PIEZAS9">
                                          </div>
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="link10">LINK 10*</label>
                                              <input id="link10" type="text" name="link10" class="form-control" placeholder="link10">
                                          </div>
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="CANTIDAD DE PIEZAS10">CANTIDAD DE PIEZAS 10*</label>
                                              <input id="CANTIDAD DE PIEZAS10" type="text" name="art10" class="form-control" placeholder="CANTIDAD DE PIEZAS10">
                                          </div>
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="monto">Monto a pagar*</label>
                                              <input id="monto" type="number" name="monto" class="form-control" placeholder="monto" required="required"
                                                  data-error="Monto es requerido">
                                              <div class="help-block with-errors"></div>
                                          </div>
                                  </div>
                              </div>
                              <input type="submit" class="btn btn-success btn-send" value="Realizar pedido">

                              <p class="text-muted">
                                  &copy; 2019 miempresa
                              </p>

                          </div>

                      </form>
                      <form id="contact-form1" method="post" action="vista/pedidorealizado.php" role="form">
                          <div class="messages"></div>
                          <div class="controls">
                              <div class="row">
                                  <div class="col-lg-6" style="display:none">
                                      <div class="form-group">
                                          <label for="comisionista">Comisionista</label>
                                          <input id="comisionista" type="text" name="comisionista" class="form-control" placeholder="Comisionista" required="required" value="<?php echo $_SESSION['nick']; ?>"
                                              data-error="Comisionista es requerido.">
                                          <div class="help-block with-errors"></div>
                                      </div>   
                                  </div>    
                                  <div class="col-lg-6"> 
                                      <div class="form-group">
                                          <label for="nombre">Nombre *</label>
                                          <input id="nombre" type="text" name="nombre" class="form-control" placeholder="Nombre" required="required"
                                              data-error="Nombre es requerido.">
                                          <div class="help-block with-errors"></div>
                                      </div>
                                  </div>
                                  <div class="col-lg-6">
                                      <div class="form-group">
                                          <label for="materno">Apellido Materno*</label>
                                          <input id="materno" type="text" name="materno" class="form-control" placeholder="Apellido Materno" required="required"
                                              data-error="Apellido Materno es requerido.">
                                          <div class="help-block with-errors"></div>
                                      </div>
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="paterno">Apellido Paterno*</label>
                                              <input id="paterno" type="text" name="paterno" class="form-control" placeholder="Apellido Paterno" required="required"
                                                  data-error="Apellido Paterno es requerido">
                                              <div class="help-block with-errors"></div>
                                          </div>
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="telefono">Telefono*</label>
                                              <input id="telefono" type="number" name="telefono" class="form-control" placeholder="Telefono" maxlength="10" required="required"
                                                  data-error="Telefono es requerido">
                                              <div class="help-block with-errors"></div>
                                          </div>
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="calle">Calle*</label>
                                              <input id="calle" type="text" name="calle" class="form-control" placeholder="Calle" required="required"
                                                  data-error="calle es requerido">
                                              <div class="help-block with-errors"></div>
                                          </div>
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="noexterior">No Exterior*</label>
                                              <input id="noexterior" type="text" name="noexterior" class="form-control" placeholder="Numero Exterior" required="required"
                                                  data-error="Numero Exterior es requerido">
                                              <div class="help-block with-errors"></div>
                                          </div>
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="nointerior">No Interior*</label>
                                              <input id="nointerior" type="text" name="nointerior" class="form-control" placeholder="Numero Interior" required="required"
                                                  data-error="Numero Interior es requerido">
                                              <div class="help-block with-errors"></div>
                                          </div>
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="colonia">Colonia*</label>
                                              <input id="colonia" type="text" name="colonia" class="form-control" placeholder="Colonia" required="required"
                                                  data-error="Colonia es requerido">
                                              <div class="help-block with-errors"></div>
                                          </div>
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="cp">Código Postal*</label>
                                              <input id="cp" type="number" name="cp" class="form-control" placeholder="Codigo Postal" maxlength="5" required="required"
                                                  data-error="Codigo Postal es requerido">
                                              <div class="help-block with-errors"></div>
                                          </div>
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="ciudad">Ciudad*</label>
                                              <input id="ciudad" type="text" name="ciudad" class="form-control" placeholder="Ciudad" required="required"
                                                  data-error="Ciudad es requerido">
                                              <div class="help-block with-errors"></div>
                                          </div>
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="municipio">Municipio o Delegación*</label>
                                              <input id="municipio" type="text" name="municipio" class="form-control" placeholder="Municipio o Delegacion" required="required"
                                                  data-error="Municipio o Delegacion es requerido">
                                              <div class="help-block with-errors"></div>
                                          </div>
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="estado">Estado*</label>
                                              <input id="estado" type="text" name="estado" class="form-control" placeholder="Estado" required="required"
                                                  data-error="Estado es requerido">
                                              <div class="help-block with-errors"></div>
                                          </div>
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="entrecalle">Entre la calle*</label>
                                              <input id="entrecalle" type="text" name="entrecalle" class="form-control" placeholder="Entre la calle" required="required"
                                                  data-error="Entre la calle es requerido">
                                              <div class="help-block with-errors"></div>
                                          </div>
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="ycalle">Y la calle*</label>
                                              <input id="ycalle" type="text" name="ycalle" class="form-control" placeholder="Y la calle" required="required"
                                                  data-error="Y la calle es requerido">
                                              <div class="help-block with-errors"></div>
                                          </div>
                                  </div>
                                  <div class="col-lg-12">
                                  <div class="form-group">
                                          <label for="especificaciones">Descripción Especificaciones etc </label>
                                          <textarea class="form-control" id="especificaciones" name="especificaciones" rows="3"></textarea>
                                  </div>
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="monto">Monto a pagar*</label>
                                              <input id="monto" type="number" name="monto" class="form-control" placeholder="monto" required="required"
                                                  data-error="Monto es requerido">
                                              <div class="help-block with-errors"></div>
                                          </div>
                                  </div>
                              </div>
                              <input type="submit" class="btn btn-success btn-send" value="Realizar pedido">

                              <p class="text-muted">
                                  &copy; 2019 miempresa
                              </p>

                          </div>

                      </form>
                      <!-- begin form pedidos telmex -->
                      <form id="contact-form2" method="post" action="vista/pedidorealizado.php" role="form">
                          <div class="messages"></div>
                          <div class="controls">
                              <div class="row">
                                  <div class="col-lg-6" style="display:none">
                                      <div class="form-group">
                                          <label for="comisionista">Comisionista</label>
                                          <input id="comisionista" type="text" name="comisionista" class="form-control" placeholder="Comisionista" required="required" value="<?php echo $_SESSION['nick']; ?>"
                                              data-error="Comisionista es requerido.">
                                          <div class="help-block with-errors"></div>
                                      </div>   
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="email">Email*</label>
                                              <input id="email" type="email" name="email" class="form-control" placeholder="E-mail">
                                          </div>
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="telefono">Telefono*</label>
                                              <input id="telefono" type="number" name="telefono" class="form-control" placeholder="Telefono">
                                          </div>
                                  </div>
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
                                              <label for="monto">Monto a pagar*</label>
                                              <input id="monto" type="number" name="monto" class="form-control" placeholder="monto" required="required"
                                                  data-error="Monto es requerido">
                                              <div class="help-block with-errors"></div>
                                          </div>
                                  </div>
                              </div>
                              <input type="submit" class="btn btn-success btn-send" value="Realizar pedido">

                              <p class="text-muted">
                                  &copy; 2019 miempresa
                              </p>

                          </div>

                      </form>
                      <!-- end form pedidos telmex -->
                      <!-- begin form pedidos shein -->
                      <form id="contact-form3" method="post" action="vista/pedidorealizado.php" role="form">
                          <div class="messages"></div>
                          <div class="controls">
                              <div class="row">
                                  <div class="col-lg-6" style="display:none">
                                      <div class="form-group">
                                          <label for="comisionista">Comisionista</label>
                                          <input id="comisionista" type="text" name="comisionista" class="form-control" placeholder="Comisionista" required="required" value="<?php echo $_SESSION['nick']; ?>"
                                              data-error="Comisionista es requerido.">
                                          <div class="help-block with-errors"></div>
                                      </div>   
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="email">Email*</label>
                                              <input id="email" type="email" name="email" class="form-control" placeholder="E-mail">
                                          </div>
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                          <h6 style="color:red">Atención con las contraseñas, respetar mayúsculas, minusculas y signos, MONTO MAXIMO 2400, si excedes se eliminan productos.</h6>
                                              <label for="contrasena">Contraseña*</label>
                                              <input id="contrasena" type="text" name="contrasena" class="form-control" placeholder="Contraseña" required="required"
                                                  data-error="Contraseña es requerido">
                                              <div class="help-block with-errors"></div>
                                          </div>
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="monto">Monto a pagar*</label>
                                              <input id="monto" type="number" name="monto" class="form-control" placeholder="monto" required="required"
                                                  data-error="Monto es requerido">
                                              <div class="help-block with-errors"></div>
                                          </div>
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="nick">Nick*</label>
                                              <input id="nick" type="text" name="nick" class="form-control" placeholder="nick" required="required"
                                                  data-error="nick es requerido">
                                              <div class="help-block with-errors"></div>
                                          </div>
                                  </div>
                              </div>
                              <input type="submit" class="btn btn-success btn-send" value="Realizar pedido">

                              <p class="text-muted">
                                  &copy; 2019 miempresa
                              </p>

                          </div>

                      </form>
                      <!-- end form pedidos shein -->
                      <!-- begin form pedidos walmart -->
                      <form id="contact-form4" method="post" action="vista/pedidorealizado.php" role="form">
                          <div class="messages"></div>
                          <div class="controls">
                              <div class="row">
                                  <div class="col-lg-6" style="display:none">
                                      <div class="form-group">
                                          <label for="comisionista">Comisionista</label>
                                          <input type="hidden" name="walmart" value="walmart">
                                          <input id="comisionista" type="text" name="comisionista" class="form-control" placeholder="Comisionista" required="required" value="<?php echo $_SESSION['nick']; ?>"
                                              data-error="Comisionista es requerido.">
                                          <div class="help-block with-errors"></div>
                                      </div>   
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="email">Email*</label>
                                              <input id="email" type="email" name="email" class="form-control" placeholder="E-mail">
                                          </div>
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                          <h6 style="color:red">Atención con las contraseñas, respetar mayúsculas, minusculas y signos, MONTO MAXIMO 2400, si excedes se eliminan productos.</h6>
                                              <label for="contrasena">Contraseña*</label>
                                              <input id="contrasena" type="text" name="contrasena" class="form-control" placeholder="Contraseña" required="required"
                                                  data-error="Contraseña es requerido">
                                              <div class="help-block with-errors"></div>
                                          </div>
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="monto">Monto a pagar*</label>
                                              <input id="monto" type="number" name="monto" class="form-control" placeholder="monto" required="required"
                                                  data-error="Monto es requerido">
                                              <div class="help-block with-errors"></div>
                                          </div>
                                  </div>
                                  <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="nick">Nick*</label>
                                              <input id="nick" type="text" name="nick" class="form-control" placeholder="nick" required="required"
                                                  data-error="nick es requerido">
                                              <div class="help-block with-errors"></div>
                                          </div>
                                  </div>
                              </div>
                              <input type="submit" class="btn btn-success btn-send" value="Realizar pedido">

                              <p class="text-muted">
                                  &copy; 2019 miempresa
                              </p>

                          </div>

                      </form>
                      <!-- end form pedidos walmart -->

                  </div>
                  <!-- /.8 -->

              </div>
              <!-- /.row-->

          </div>
          <!-- /.container-->
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
  else { ?>
    <div class="login-form">
        <form id="frmAcceso" method="post">
            <h2 class="text-center">Sistema de pedidos</h2>       
            <div class="form-group">
                <input type="text" id="logina" class="form-control" placeholder="E-mail" name="logina" required="required">
            </div>
            <div class="form-group">
                <input type="password" id="clavea" class="form-control" placeholder="Password" name="clavea" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">INICIAR SESIÓN</button>
            </div>
            <div class="clearfix">
                <label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label>
                <a href="#" class="pull-right">Olvide mi contraseña</a>
            </div>        
        </form>
    </div>
  <?php
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
<script src="js/bootbox.min.js"></script> 
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>