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
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
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
          <li class="active"><a href="pedidosfacturados.php"><i class="fa fa-link"></i> <span>Pedidos facturados</span></a></li>
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
          <small>Pedidos facturados</small>
        </h1>
      </section>

      <!-- Main content -->
      <section class="content container-fluid">

        <!--------------------------
          | Your Page Content Here |
          -------------------------->
           <!-- Button trigger modal -->
        <?php if ($_SESSION['nivel']==0) { ?>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
          Eliminar todos los pedidos
          </button>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaleliminarfacturados">
          Eliminar pedidos facturados
          </button>
          <br>
        <?php } ?> 
          <!-- Modal -->
          <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">¿ESTA SEGURO DE ELIMINAR TODOS LOS PEDIDOS?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                          <button type="button" class="btn btn-primary" onclick="borrarbase()">Confirmar</button>
                      </div>
                  </div>
              </div>
          </div>
          <!-- Large modal -->
          <!-- Modal eliminar pedidos facturados-->
          <div class="modal fade" id="modaleliminarfacturados" tabindex="-1" role="dialog" aria-labelledby="modaleliminarfacturadosTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">¿ESTA SEGURO DE ELIMINAR TODOS LOS PEDIDOS FACTURADOS?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                          <button type="button" class="btn btn-primary" onclick="borrarpedidosfacturados()">Confirmar</button>
                      </div>
                  </div>
              </div>
          </div>
          <!-- Large modal eliminar facturados-->
          <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="modal-header">
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
                                      <td> CONSTRASEÑA: </td>
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
                                      <td> CONSTRASEÑA: </td>
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
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <h5>comprobante de pago</h3>
                          <form name="form" id="contact-form" method="POST">
                              <div class="form-group">
                                  <label>Imagen:</label>
                                  <input type="file" class="form-control" name="imagen" id="imagen">
                                  <input type="hidden" name="imagenactual" id="imagenactual">
                                  <a href="" id="imagenp"><img src="" width="150px" height="120px" id="imagenmuestra"></a>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                  <button id="" type="submit" class="btn btn-primary pagar">Enviar</button>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
          <h1>PEDIDOS FACTURADOS</h1>
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
          <hr>
          <?php if ($_SESSION['nivel']==1 || $_SESSION['nivel']==0) { ?>
          <br>
          <h1>REPORTES GENERALES STATS</h1>
          <br>
          <!-- begin stats pedidos entregados -->
          <div class="panel-body table-responsive" id="listadoregistros">
              <table id="tbllistado2" class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                  <th>Nùmero de pedido</th>
                  <th>Tipo de pedido</th>
                  <th>Monto</th>
                  <th>Comisionista</th>
                  <th>% Comisionista</th>
                  <th>Administrador</th>
                  <th>% Administrador</th>
                  <th>Gastos operativos</th>
                  <th>Total</th>
                </thead>
                <tbody>                            
                </tbody>
              </table>
          </div>  <!-- end stats pedidos entregados -->
          <?php } ?>
          <!-- Modal -->
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="js/pedidosfacturados.js"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>