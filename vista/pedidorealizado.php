<?php
 require_once "../modelo/Pedido.php";
session_start();    
    if (!empty($_POST)&&isset($_SESSION['email'])) {
    
        //data send to form
        $comisionista=@$_POST['comisionista'];
        $nombre=@$_POST['nombre'];
        $materno=@$_POST['materno'];
        $paterno=@$_POST['paterno'];
        $telefono=@$_POST['telefono'];
        $tienda=@$_POST['tienda'];
        $ciudad=@$_POST['ciudad'];
        $estado=@$_POST['estado'];
        $link1=@$_POST['link1'];
        $art1=@$_POST['art1'];
        $link2=@$_POST['link2'];
        $art2=@$_POST['art2'];
        $link3=@$_POST['link3'];
        $art3=@$_POST['art3'];
        $link4=@$_POST['link4'];
        $art4=@$_POST['art4'];
        $link5=@$_POST['link5'];
        $art5=@$_POST['art5'];
        $link6=@$_POST['link6'];
        $art6=@$_POST['art6'];
        $link7=@$_POST['link7'];
        $art7=@$_POST['art7'];
        $link8=@$_POST['link8'];
        $art8=@$_POST['art8'];
        $link9=@$_POST['link9'];
        $art9=@$_POST['art9'];
        $link10=@$_POST['link10'];
        $art10=@$_POST['art10'];
        $monto=@$_POST['monto'];
        $idusuario=$_SESSION['id'];

        /* campos extra de pedidos generales */
        $municipio=@$_POST['municipio'];
        $entrecalle=@$_POST['entrecalle'];
        $ycalle=@$_POST['ycalle'];
        $especificaciones=@$_POST['especificaciones'];
        $calle=@$_POST['calle'];
        $noexterior=@$_POST['noexterior'];
        $nointerior=@$_POST['nointerior'];
        $colonia=@$_POST['colonia'];
        $cp=@$_POST['cp'];
        /*End campos extra de pedidos generales */

        /*BEGIN campos extra de PEDIDOS TELMEX */
        $contrasena=@$_POST['contrasena'];
        $email=@$_POST['email'];
        /*End campos extra de PEDIDOS TELMEX */

        /*BEGIN campos extra de PEDIDOS Shein */
        $nickk=@$_POST['nick'];
        /*End campos extra de PEDIDOS Shein */

        /*BEGIN campos extra de PEDIDOS walmart */
        $walmart=@$_POST['walmart'];
        /*End campos extra de PEDIDOS walmart */

        if (isset($tienda)) {
            $tipodepedido=true;
        }
        if (isset($municipio)) {
            $tipodepedido=false;
        }
        if (isset($contrasena)) {
            $tipodepedido=2;
        }
        if (isset($nickk)) {
            $tipodepedido=3;
        }
        if (isset($walmart)) {
            $tipodepedido=4;
        }
        $obtenermonto=$pedido->verificarpedido($idusuario);
        $montodisponible= $obtenermonto['monto']-$obtenermonto['usado'];
            if ($monto<=$montodisponible) {
                $rspta=$pedido->insertar($comisionista,$nombre,$materno,$paterno,$telefono,$tienda,$ciudad,$estado,$link1,$art1,$link2,$art2,$link3,$art3,$link4,$art4,$link5,$art5,$link6,$art6,$link7,$art7,$link8,$art8,$link9,$art9,$link10,$art10,$monto,$idusuario,$municipio,$entrecalle,$ycalle,$especificaciones,$calle,$noexterior,$nointerior,$colonia,$cp,$tipodepedido,$email,$contrasena,$nickk);
                $nuevomonto=$obtenermonto['usado']+$monto;
                $acumularmonto=$pedido->acumularmonto($nuevomonto,$idusuario);
                $idpedido = $pedido->regresarid();
                $idpedido= $idpedido->fetch_assoc();
            } else {
                $rspta=0;
                $idpedido=0;
            }
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
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="../dist/css/skins/skin-blue.min.css">

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
                <img src="../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"><?php echo $_SESSION['nick']; ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

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
                    <a href="../controlador/usuario.php?op=salir" class="btn btn-default btn-flat">Cerrar sesión</a>
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
            <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
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
          <li><a href="../mostrarpedidos.php"><i class="fa fa-link"></i> <span>Mostrar pedidos</span></a></li>
          <li><a href="../Pedidoconfirmado.php"><i class="fa fa-link"></i> <span>Pedidos confirmados</span></a></li>
          <li><a href="../pedidosentregados.php"><i class="fa fa-link"></i> <span>Pedidos entregados</span></a></li>
          <?php if ($_SESSION['nivel']==1 || $_SESSION['nivel']==0) { ?>
          <li><a href="../pedidospagados.php"><i class="fa fa-link"></i> <span>Pedidos pagados</span></a></li>
          <li><a href="../pedidosfacturados.php"><i class="fa fa-link"></i> <span>Pedidos facturados</span></a></li>
          <?php } ?>
          <?php if ($_SESSION['nivel']==1 || $_SESSION['nivel']==0) { ?>
          <li class="active"><a href="../registro.php"><i class="fa fa-user"></i> <span>Usuarios</span></a></li>
          <li><a href="../direcciones.php"><i class="fa fa-link"></i> <span>Direcciones</span></a></li>
          <?php } ?>
          <?php if ($_SESSION['nivel']==2) { ?>
          <li><a href="../login.php"><i class="fa fa-link"></i> <span>Realizar pedido</span></a></li>
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
          Status del pedido realizado
          <small>Pedido realizado</small>
        </h1>
      </section>

      <!-- Main content -->
      <section class="content container-fluid">

        <!--------------------------
          | Your Page Content Here |
          -------------------------->
          <?php if (isset($tienda)) { ?> 
        <div class="row">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <tbody>
                    <tr>
                        <td>NUMERO DE PEDIDO: </td>
                        <td> <?php echo $idpedido['idpedido'];?></td>
                    </tr>
                    <tr>
                        <td>COMISIONISTA: </td>
                        <td> <?php echo $comisionista ?></td>
                    </tr>
                    <tr>
                        <td>NOMBRE: </td>
                        <td><?php echo $nombre ?></td>
                    </tr>
                    <tr>
                        <td> APELLIDO MATERNO: </td>
                        <td><?php echo $materno ?></td>
                    </tr>
                    <tr>
                        <td>APELLIDO PATERNO: </td>
                        <td><?php echo $paterno ?></td>
                    </tr>
                    <tr>
                        <td> NUMERO DE TELEFONO: </td>
                        <td> <?php echo $telefono ?></td>
                    </tr>
                    <tr>
                        <td> TIENDA EN LA CUAL RECOGE: </td>
                        <td> <?php echo $tienda ?></td>
                    </tr>
                    <tr>
                        <td> CIUDAD: </td>
                        <td> <?php echo $ciudad ?></td>
                    </tr>
                    <tr>
                        <td> ESTADO: </td>
                        <td> <?php echo $estado ?></td>
                    </tr>
                    <tr>
                        <td> LINK: </td>
                        <td> <?php echo $link1 ?></td>
                    </tr>
                    <tr>
                        <td> CANTIDAD DE ARTICULOS LINK 1: </td>
                        <td> <?php echo $art1 ?></td>
                    </tr>
                    <tr>
                        <td> LINK: </td>
                        <td> <?php echo $link2 ?></td>
                    </tr>
                    <tr>
                        <td> CANTIDAD DE ARTICULOS LINK 2: </td>
                        <td> <?php echo $art2 ?></td>
                    </tr>
                    <tr>
                        <td> LINK: </td>
                        <td> <?php echo $link3 ?></td>
                    </tr>
                    <tr>
                        <td> CANTIDAD DE ARTICULOS LINK 3: </td>
                        <td> <?php echo $art3 ?></td>
                    </tr>
                    <tr>
                        <td> LINK: </td>
                        <td> <?php echo $link4 ?></td>
                    </tr>
                    <tr>
                        <td> CANTIDAD DE ARTICULOS LINK 4: </td>
                        <td> <?php echo $art4 ?></td>
                    </tr>
                    <tr>
                        <td> LINK: </td>
                        <td> <?php echo $link5 ?></td>
                    </tr>
                    <tr>
                        <td> CANTIDAD DE ARTICULOS LINK 5: </td>
                        <td> <?php echo $art5 ?></td>
                    </tr>
                    <tr>
                        <td> LINK: </td>
                        <td> <?php echo $link6 ?></td>
                    </tr>
                    <tr>
                        <td> CANTIDAD DE ARTICULOS LINK 6: </td>
                        <td> <?php echo $art6 ?></td>
                    </tr>
                    <tr>
                        <td> LINK: </td>
                        <td> <?php echo $link7 ?></td>
                    </tr>
                    <tr>
                        <td> CANTIDAD DE ARTICULOS LINK 7: </td>
                        <td> <?php echo $art7 ?></td>
                    </tr>
                    <tr>
                        <td> LINK: </td>
                        <td> <?php echo $link8 ?></td>
                    </tr>
                    <tr>
                        <td> CANTIDAD DE ARTICULOS LINK 8: </td>
                        <td> <?php echo $art8 ?></td>
                    </tr>
                    <tr>
                        <td> LINK: </td>
                        <td> <?php echo $link9 ?></td>
                    </tr>
                    <tr>
                        <td> CANTIDAD DE ARTICULOS LINK 9: </td>
                        <td> <?php echo $art9 ?></td>
                    </tr>
                    <tr>
                        <td> LINK: </td>
                        <td> <?php echo $link10 ?></td>
                    </tr>
                    <tr>
                        <td> CANTIDAD DE ARTICULOS LINK 10: </td>
                        <td> <?php echo $art10 ?></td>
                    </tr>
                    <tr>
                        <td> MONTO A PAGAR: </td>
                        <td>$ <?php echo $monto ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php } ?>

        <?php if (isset($municipio)) { ?> 
        <div class="row">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <tbody>
                    <tr>
                        <td>NUMERO DE PEDIDO: </td>
                        <td> <?php echo $idpedido['idpedido'];?></td>
                    </tr>
                    <tr>
                        <td>COMISIONISTA: </td>
                        <td> <?php echo $comisionista ?></td>
                    </tr>
                    <tr>
                        <td>NOMBRE: </td>
                        <td><?php echo $nombre ?></td>
                    </tr>
                    <tr>
                        <td> APELLIDO MATERNO: </td>
                        <td><?php echo $materno ?></td>
                    </tr>
                    <tr>
                        <td>APELLIDO PATERNO: </td>
                        <td><?php echo $paterno ?></td>
                    </tr>
                    <tr>
                        <td> NUMERO DE TELEFONO: </td>
                        <td> <?php echo $telefono ?></td>
                    </tr>
                    <tr>
                        <td> CALLE: </td>
                        <td> <?php echo $calle ?></td>
                    </tr>
                    <tr>
                        <td> NO EXTERIOR: </td>
                        <td> <?php echo $noexterior ?></td>
                    </tr>
                    <tr>
                        <td> NO INTERIOR: </td>
                        <td> <?php echo $nointerior ?></td>
                    </tr>
                    <tr>
                        <td> COLONIA: </td>
                        <td> <?php echo $colonia ?></td>
                    </tr>
                    <tr>
                        <td> CÓDIGO POSTAL: </td>
                        <td> <?php echo $cp ?></td>
                    </tr>
                    <tr>
                        <td> CIUDAD: </td>
                        <td> <?php echo $ciudad ?></td>
                    </tr>
                    <tr>
                        <td> MUNICIPIO O DELEGACIÓN: </td>
                        <td> <?php echo $municipio ?></td>
                    </tr>
                    <tr>
                        <td> ESTADO: </td>
                        <td> <?php echo $estado ?></td>
                    </tr>
                    <tr>
                        <td> ENTRE LA CALLE: </td>
                        <td> <?php echo $entrecalle ?></td>
                    </tr>
                    <tr>
                        <td> Y LA CALLE: </td>
                        <td> <?php echo $ycalle ?></td>
                    </tr>
                    <tr>
                        <td> DESCRIPCIÓN ESPECIFICACIONES: </td>
                        <td> <?php echo $especificaciones ?></td>
                    </tr>
                    <tr>
                        <td> MONTO A PAGAR:$ </td>
                        <td>$ <?php echo $monto ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php } ?>
        <?php if (isset($contrasena) && !(isset($nickk))) { ?> 
        <div class="row">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <tbody>
                    <tr>
                        <td>NUMERO DE PEDIDO: </td>
                        <td> <?php echo $idpedido['idpedido'];?></td>
                    </tr>
                    <tr>
                        <td>COMISIONISTA: </td>
                        <td> <?php echo $comisionista ?></td>
                    </tr>
                    <tr>
                        <td> E-MAIL: </td>
                        <td> <?php echo $email ?></td>
                    </tr>
                    <tr>
                        <td> NUMERO DE TELEFONO: </td>
                        <td> <?php echo $telefono ?></td>
                    </tr>
                    <tr>
                        <td> CONTRASEÑA </td>
                        <td> <?php echo $contrasena ?></td>
                    </tr>
                    <tr>
                        <td> MONTO A PAGAR: </td>
                        <td>$ <?php echo $monto ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php } ?>
        <?php if (isset($nickk)) { ?> 
        <div class="row">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <tbody>
                    <tr>
                        <td>NUMERO DE PEDIDO: </td>
                        <td> <?php echo $idpedido['idpedido'];?></td>
                    </tr>
                    <tr>
                        <td>COMISIONISTA: </td>
                        <td> <?php echo $comisionista ?></td>
                    </tr>
                    <tr>
                        <td> E-MAIL: </td>
                        <td> <?php echo $email ?></td>
                    </tr>
                    <tr>
                        <td> CONTRASEÑA </td>
                        <td> <?php echo $contrasena ?></td>
                    </tr>
                    <tr>
                        <td> MONTO A PAGAR: </td>
                        <td>$ <?php echo $monto ?></td>
                    </tr>
                    <tr>
                        <td> NICK: </td>
                        <td> <?php echo $nickk ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php } ?>
        <?php echo $rspta ? "<p class='bg-success'>Pedido registrado </P>" : "<p class='bg-danger'>El pedido no se pudo registrar ocurrio un error o no cuenta con suficiente credito disponible</P>"; ?>
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

    <!-- Control Sidebar -->
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
<?php } 
  else {
    header('Location: ../login.php');
    exit;
  }
?>
<?php 
    }
    else {
        header("Location: ../login.php"); 
    }
    
?>
<!-- ./wrapper -->
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
     <script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
     <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
     <script src="../dist/js/adminlte.min.js"></script>
</body>
</html>